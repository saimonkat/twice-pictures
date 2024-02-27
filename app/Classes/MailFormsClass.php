<?php

namespace App\Classes;
use MailPoet\API\API;
use MailPoet\API\MP\v1\APIException;

class MailFormsClass
{
    /**
     * @var string
     */
    private string $from = '';
    
    /**
     * @var string
     */
    private string $sendTo = '';
    
    /**
     * @var string
     */
    private string $subject = '';
    
    public function __construct()
    {
        add_action('wp_ajax_send_mail', [$this, 'send_mail']);
        add_action('wp_ajax_nopriv_send_mail', [$this, 'send_mail']);
        add_action('wp_enqueue_scripts', [$this, 'localizeVariables']);
				add_action('wp_ajax_nopriv_subscribe', [$this, 'ajaxSubscribe']);
        add_action('wp_ajax_subscribe', [$this, 'ajaxSubscribe']);
    }

		public function ajaxSubscribe()
    {
        $email = $_POST['email'];

        $mailpoet_api = API::MP('v1');
        $lists = [3];

        try {
            $mailpoet_api->addSubscriber([
                'email' => $email
            ], $lists);
        } catch (APIException $e) {
            if ($e->getCode() === APIException::SUBSCRIBER_EXISTS) {
                //send confirmation again
                $subscriber = $mailpoet_api->getSubscriber($email);
                $mailpoet_api->subscribeToLists($subscriber['id'], $lists);
            }
        }

        ob_start();
        ?> <p class="subscribe__text" style="color: #198754">Check your inbox or spam folder to confirm your
	subscription.</p> <?php
        $html = ob_get_clean();

        $response = [
            'message' => $html,
        ];
        wp_send_json($response);
    }
    
    /**
     * @return void
     */
    public function send_mail(): void
    {
        if ( ! wp_verify_nonce($_POST['nonce'], 'send-mail')) {
            die();
        }
        
        $result = wp_mail(
            $this->sendTo,
            $this->subject,
            $this->getMessage(),
            $this->getHeaders(),
            $this->getFiles()
        );
        
        if ($result) {
            wp_send_json_success();
        }
        
        wp_send_json_error();
    }
    
    /**
     * @return string
     */
    private function getMessage(): string
    {
        return '';
    }
    
    /**
     * @return string
     */
    private function getHeaders(): string
    {
        $headers = "From: " . strip_tags($this->from) . "\r\n";
        $headers .= "Reply-To: " . strip_tags($this->from) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
        
        return $headers;
    }
    
    /**
     * @return array
     */
    private function getFiles(): array
    {
        $files = [];
        
        if (isset($_FILES['files']) && empty($_FILES["file"]["error"])) {
            foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
                $file_path       = dirname($tmp_name);
                $new_file_uri    = $file_path . '/' . $_FILES['files']['name'][$key];
                $moved           = move_uploaded_file($tmp_name, $new_file_uri);
                $attachment_file = $moved ? $new_file_uri : $tmp_name;
                $files[]         = $attachment_file;
            }
        }
        
        return $files;
    }
    
    /**
     * @return void
     */
    public function localizeVariables(): void
    {
        wp_localize_script('scripts', 'mailer_data',
            array(
                'action'   => 'send_mail',
                'ajax_url' => site_url() . '/wp-admin/admin-ajax.php',
                'nonce'    => wp_create_nonce('send-mail'),
            )
        );
    }
}