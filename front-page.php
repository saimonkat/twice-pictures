<?php get_header(); ?>

<main class="main">
	<?php get_template_part('template-parts/front-page/main-banner');
		get_template_part('template-parts/front-page/ticker');
    get_template_part('template-parts/front-page/recent') ; //project 1-2
    get_template_part('template-parts/front-page/slider');
    get_template_part('template-parts/front-page/movie-center-right'); //project 3
    get_template_part('template-parts/front-page/movie-full-right'); //project 4-5
    get_template_part('template-parts/front-page/slider2')?>
	<div class="get-in-touch">
		<?php get_template_part('template-parts/contact-link') ?>
	</div>
	<?php get_template_part('template-parts/instagram') ?>
	<?php get_template_part('template-parts/subscribe') ?>
</main>
<?php get_footer(); ?>