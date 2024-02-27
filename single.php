<?php

get_header();

switch (get_post_type()) {
    case 'project':
        get_template_part('template-parts/project/single');
        break;
    case 'mailpoet_page':
        get_template_part('template-parts/mailpoet/single');
        break;
    default:
        get_template_part('template-parts/blog/single');
        break;
}


get_footer();
