<?php
// $instagram = get_field('')
?>
<section class="instagram">

	<a href="https://www.instagram.com/twice.pictures.twice/">
		<h2 class="title instagram__title">@twice.pictures.twice</h2>
	</a>
	<div class="instagram-grid">
		<!-- <?= do_shortcode('[insta-gallery id="1"]') ?> -->
		<?= do_shortcode('[instagram-feed]'); ?>
	</div>
	<svg class="icon icon--logo instagram__icon" width="55" height="49">
		<use xlink:href="#logo"></use>
	</svg>
</section>