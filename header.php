<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="manifest" href="<?= DIST_URI . '/images/favicon/site.webmanifest'; ?>">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
</head>

<body <?php body_class(is_home() ? 'home' : ''); ?>
	style="opacity: 0; overflow: <?= is_front_page() ? 'hidden' : '' ?>">
	<?php if (is_front_page()): ?>
	<div class="preloader">
		<div class="preloader__inner">
			<div class="icon icon--logo preloader__icon preloader__icon--1">
				<?php get_template_part('template-parts/icons/logo'); ?>
			</div>
			<div class="icon icon--logo preloader__icon preloader__icon--2">
				<?php get_template_part('template-parts/icons/logo'); ?>
			</div>
			<div class="icon icon--logo preloader__icon preloader__icon--3">
				<?php get_template_part('template-parts/icons/logo'); ?>
			</div>
			<div class="icon icon--logo preloader__icon preloader__icon--4">
				<?php get_template_part('template-parts/icons/logo'); ?>
			</div>
		</div>

	</div>
	<?php endif; ?>
	<div class="cursor"></div>
	<header class="header">
		<button class="hamburger header__hamburger" role="button">
			<div class="icon icon--logo hamburger__icon">
				<?php get_template_part('template-parts/icons/logo'); ?>
			</div>
		</button>
		<?php
        wp_nav_menu(
            array(
                'theme_location'  => 'header-menu',
                'container' => 'nav',
                'container_class' => 'header__nav menu',
                'container_id' => 'id',
                'menu_class' => ''
            )
        );
        ?>

	</header>
	<?php wp_body_open(); ?>