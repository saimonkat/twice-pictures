<?php
$meta = get_fields($post->ID);
$cat = wp_get_object_terms($post->ID, 'brand');

$prev_post = get_adjacent_post(false, '', true);
$next_post = get_adjacent_post(false, '', false);

$directors = (get_the_terms($post->ID, 'directors_category') ? get_the_terms($post->ID, 'directors_category') : get_the_terms($post->ID, 'category'));

?>
<main class="main">
	<section class="project-page">
		<div class="video-wrapper project-video">
			<?php show_project_inner_video($post->ID, true,''); ?>
		</div>
		<div class="container">
			<div class="project-info">
				<div class="project-info__header">
					<a class="project-control project-control__prev" href="<?= get_permalink($prev_post) ?>" title="Previous">
						<svg class="icon icon--prev" width="14" height="28">
							<use xlink:href="#prev"></use>
						</svg></a><a class="project-control project-control__next" href="<?= get_permalink($next_post) ?>"
						title="Next">
						<svg class="icon icon--next" width="14" height="28">
							<use xlink:href="#next"></use>
						</svg>
					</a>
					<?php foreach ($directors as $individual): 
						$director_names = $individual->name;
						?>
					<h2 class="project-info__directors">
						<?= $director_names ?>
					</h2>
					<?php endforeach; ?>
					<h1 class="project-info__title">
						<?php 
						if($meta['intro']['title']) { 
							echo $meta['intro']['title'] . " // ";
							 } ?>
						<?= get_the_title(); ?></h1>
				</div>
				<ul class="project-info__genres genres">
					<?php
					$genres = (get_the_terms($post->ID, 'genre') ? get_the_terms($post->ID, 'genre') : get_the_terms($post->ID, 'category'));
					// $genres = get_the_terms($post->ID, 'category') ?: [];
					foreach ($genres as $genre) : ?>
					<li class="genres__item">
						<span><?= $genre->name ?></span>
					</li>
					<?php endforeach; ?>
				</ul>
				<ul class="project-info__tags tags">
					<?php
					$tags = (get_the_terms($post->ID, 'directors_category') ? get_the_terms($post->ID, 'directors_category') : get_the_terms($post->ID, 'category'));
					// $tags = get_the_terms($post->ID, 'category') ?: [];
					foreach ($tags as $tag) : ?>
					<li class="tags__item">
						<a href="<?= get_category_link($tag) ?>"><?= $tag->name ?></a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php if ($meta['gallery']['enable_gallery']) : ?>
		<div class="project-gallery">
			<h3 class="project-gallery__title">Stills</h3>
			<div class="project-gallery__grid gallery">
				<div class="swiper stills-slider">
					<div class="swiper-wrapper stills-slider__wrapper">
						<?php
					foreach ($meta['gallery']['images'] as $image) :
					?>
						<div class="swiper-slide stills-slider__item">
							<img class="stills-slider__image" src="<?= $image['url'] ?>" alt="">
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php get_template_part('template-parts/front-page/ticker'); ?>
	</section>
</main>