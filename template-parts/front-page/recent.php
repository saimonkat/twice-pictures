<?php

$recent = get_field('recent_films')
?>
<section class="recent">
	<?php
    if ($recent['project_1']):
        $project_id = $recent['project_1'];
        $project = get_post($project_id);
        $cat = wp_get_object_terms( $project_id, 'brand' )
        ?>
	<div class="recent__movie recent__movie--center">
		<a class="video-wrapper recent__movie-block" href="<?= get_permalink($project_id) ?>">
			<?php show_project_video($project_id); ?>
		</a>
		<a class="title recent__movie-title js-parallax-title"
			href="<?= get_permalink($project_id)  ?>"><span><?= $cat[0]->name ?? '' ?></span>
			\\<br><i><?= $project->post_title ?></i></a>
	</div>
	<?php endif;
    if ($recent['project_2']):
        $project_id = $recent['project_2'];
        $project = get_post($project_id);
        $cat = wp_get_object_terms( $project_id, 'brand' )
        ?>
	<div class="recent__movie">
		<a class="video-wrapper recent__movie-block" href="<?= get_permalink($project_id) ?>">
			<?php show_project_video($project_id) ?>
		</a>
		<a class="title recent__movie-title js-parallax-title"
			href="<?= get_permalink($project_id) ?>"><span><?= $cat[0]->name ?? '' ?></span>
			\\<br><i><?= $project->post_title ?></i></a>
	</div>
	<?php endif; ?>
</section>