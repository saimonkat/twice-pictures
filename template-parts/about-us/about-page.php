<?php
$about_us = get_field('about_us', $post->ID);
$is_mobile = wp_is_mobile();
?>
<section class="about-page">
	<div class="about-page__icon"><img src="<?= DIST_URI . "/images/twice-green.png"?>" alt=""></div>
	<h1 class="about-page__title"><?= $about_us['title'] ?></h1>
	<svg class="icon icon--logo about-page__logo" width="83" height="74">
		<use xlink:href="#logo"></use>
	</svg>
	<div class="about-page__text"><?= $about_us['text'] ?></div>
	<div class="about-page__banner">
		<?php get_video_el($about_us['video']); ?>
		<a class="main-banner__sound js-banner-sound" href="#">
			<svg class="icon icon--volume-on" width="30" height="30">
				<use xlink:href="#volume-on"></use>
			</svg>
			<svg class="icon icon--volume-off active" width="30" height="30">
				<use xlink:href="#volume-off"></use>
			</svg></a>
	</div>
	<div class="about-page__quote">
		<h2 class="heading"><?= $about_us['quote'] ?></h2>
		<?php get_template_part('template-parts/contact-link') ?>
	</div>
	<div class="about-page__conclusion"><?= $about_us['conclusion'] ?></div>

	<div class="about-page__brand-list">
		<?php
		$about_us_brands = $about_us['brand_list'];
		foreach ($about_us_brands as $about_us_brand) :
			$brand = $about_us_brand['brand'];
		?>
		<div class="about-page__brand-list__brand">
			<?= $brand; ?>
		</div>
		<?php
		endforeach;
		?>
	</div>

</section>