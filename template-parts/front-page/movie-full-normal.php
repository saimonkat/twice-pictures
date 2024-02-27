<?php
$project = get_field('project_6');
if ($project_id = $project['link']):
    $project = get_post($project_id);
    $cat = wp_get_object_terms( $project_id, 'brand' )
    ?>

<section class="movie movie--full">
	<a class="video-wrapper movie-block" href="<?= get_permalink($project_id) ?>">
		<?php show_project_video($project_id) ?>
	</a>
	<div class="container">
		<a class="title movie-title movie-title--mix js-parallax-title" href="<?= get_permalink($project_id) ?>">
			<span><?= $cat[0]->name ?? '' ?></span> \\<br><i><?= $project->post_title ?></i>
		</a>
	</div>
</section>
<?php
endif;