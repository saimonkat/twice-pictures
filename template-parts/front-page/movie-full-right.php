<?php
$projects = get_field('project_4_and_5');
?>
<section class="movie movie--full">
	<?php
    if ($projects['project_1']):
        $project_id = $projects['project_1'];
        $project = get_post($project_id);
        $cat = wp_get_object_terms( $project_id, 'brand' ) ?>
	<a class="video-wrapper movie-block" href="<?= get_permalink($project_id) ?>">
		<?php show_project_video($project_id) ?>
	</a>
	<div class="container">
		<a class="title movie-title movie-title--right movie-title--mix js-parallax-title"
			href="<?= get_permalink($project_id) ?>"><span><?= $cat[0]->name ?? '' ?></span>
			\\<br><i><?= $project->post_title ?></i>
		</a>
	</div>
	<?php endif;
    if ($projects['project_2']):
        $project_id = $projects['project_2'];
        $project = get_post($project_id);
        $cat = wp_get_object_terms( $project_id, 'brand' ) ?>
	<div class="movie-right">
		<a class="video-wrapper movie-block" href="<?= get_permalink($project_id) ?>">
			<?php show_project_video($project_id) ?>
		</a>
		<a class="title movie-title js-parallax-title"
			href="<?= get_permalink($project_id) ?>"><span><?= $cat[0]->name ?? '' ?></span>
			\\<br><i><?= $project->post_title ?></i></a>
	</div>
	<?php endif; ?>
</section>