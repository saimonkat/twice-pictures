<?php
$slider = get_field('slider_2');
$projects = get_posts([
    'include'   => $slider,
    'post_type' => 'project',
])
?>
<section class="movies">
	<div class="swiper movies-slider movies-slider--mixed">
		<div class="swiper-wrapper movies-slider__wrapper">
			<?php foreach ($projects as $project):
                $cat = wp_get_object_terms( $project->ID, 'brand' );
                $thumb_id = get_post_thumbnail_id($project);
                $src = wp_get_attachment_image_src($thumb_id, 'large')[0] ?? '';
                ?>
			<div class="swiper-slide movies-slider__item">
				<a class="movies-slider__poster" href="<?= get_permalink($project) ?>">
					<?php show_project_video($project->ID) ?>
				</a>
				<a class="title movies-slider__title" href="<?= get_permalink($project) ?>">
					<span><?= $cat[0]->name ?? '' ?></span> \\ <i><?= $project->post_title ?></i>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>