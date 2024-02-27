<?php
/*
  * Template Name: Directors
  * */
?>
<?php get_header(); ?>
<main class="main">
	<h1 class="hidden"><?php the_title(); ?></h1>
	<?php get_template_part('template-parts/directors/list') ?>
	<?php get_template_part('template-parts/subscribe') ?>
</main>
<?php get_footer(); ?>