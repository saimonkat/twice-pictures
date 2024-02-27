<?php
$banner = get_field('banner');
?>
<div class="main-banner full-height">
	<?php 
    if (wp_is_mobile()) {
        $sources = [[
                'url' => $banner['video_mobile'],
            'mime_type' => 'video/mp4',
        ]];
        get_video_el($sources, $banner['poster_mobile']['url'], 'main-banner__video'); ?>
	<?php
    } else {
        get_video_el($banner['video'], $banner['poster']['url'], 'main-banner__video');
    }
    ?>

	<div class="main-banner__overlay">
		<img class="main-banner__logo" src="<?= DIST_URI . '/images/twice.png'; ?>" alt="Twice Pictures Logo">
		<div class="main-banner__overlay__project">
			<a href="<?= $banner['link']; ?>" class="main-banner__overlay__link">WATCH FILM</a>
			<div class="main-banner__overlay__title"><?= $banner['title']; ?></div>
			<div class="main-banner__overlay__director"><?= $banner['director']; ?></div>
		</div>
	</div>

	<a class="main-banner__sound js-banner-sound" href="#">
		<svg class="icon icon--volume-on" width="30" height="30">
			<use xlink:href="<?= DIST_URI . '/images/icons/svg-sprite.svg#volume-on'; ?>"></use>
		</svg>
		<svg class="icon icon--volume-off active" width="30" height="30">
			<use xlink:href="<?= DIST_URI . '/images/icons/svg-sprite.svg#volume-off'; ?>"></use>
		</svg>
	</a>

</div>