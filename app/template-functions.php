<?php

function get_video_el($sources, $poster_url = '', $class = 'video', $add_controls = false)
{
	if ($poster_url) {
?>
<img src="<?= $poster_url ?>" class="video-bg" alt="">
<?php
	}
	?>

<video class="<?= $class ?>" width="100%" <?= $poster_url ? 'poster="' . $poster_url . '"' : '' ?>
	<?= $add_controls ? 'controls' : '' ?> loop muted autoplay playsinline preload="none">
	<?php foreach ($sources as $source) : ?>
	<source src="<?= $source['url'] ?>" type="<?= $source['mime_type'] ?>">
	<?php endforeach; ?>
</video>
<?php
}

function show_project_video($project_id, $single_page = false, $class = 'video')
{
	$video = get_field('video', $project_id);

	$poster_url = $video['poster']['url'] ?? '';

	if (wp_is_mobile()) {
		if ($single_page) {
			$video_sources = [
				[
					'url'       => $video['video_mobile'],
					'mime_type' => 'video/mp4'
				]
			];
		} else {
			$video_sources = [
				[
					'url'       => $video['video_mobile'],
					'mime_type' => 'video/mp4'
				]
			];
		}
	} else {
		if ($single_page) {
			$video_sources = $video['video'];
		} else {
			$video_sources = $video['video_content'] ?: $video['video'];
		}
	}
	get_video_el($video_sources, $poster_url, $class, $single_page);
}

function get_project_inner_video_el($sources, $poster_url = '', $class = 'video', $add_controls = false)
{
	if ($poster_url) {
?>
<!-- <img src="<?= $poster_url ?>" class="video-bg" alt=""> -->
<?php
	}
	?>

<video class="<?= $class ?>" width="100%" <?= $poster_url ? 'poster="' . $poster_url . '"' : '' ?>
	<?= $add_controls ? 'controls' : '' ?> playsinline preload="none">
	<?php foreach ($sources as $source) : ?>
	<source src="<?= $source['url'] ?>" type="<?= $source['mime_type'] ?>">
	<?php endforeach; ?>
</video>
<?php
}

function show_project_inner_video($project_id, $single_page = false, $class = 'video')
{
	$video = get_field('video', $project_id);

	$poster_url = $video['poster']['url'] ?? '';

	if (wp_is_mobile()) {
		if ($single_page) {
			$video_sources = [
				[
					'url'       => $video['video_mobile'],
					'mime_type' => 'video/mp4'
				]
			];
		} else {
			$video_sources = [
				[
					'url'       => $video['video_mobile'],
					'mime_type' => 'video/mp4'
				]
			];
		}
	} else {
		if ($single_page) {
			$video_sources = $video['video'];
		} else {
			$video_sources = $video['video_content'] ?: $video['video'];
		}
	}
	get_project_inner_video_el($video_sources, $poster_url, $class, $single_page);
}