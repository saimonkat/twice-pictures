<?php $frontpage_id = get_option('page_on_front'); ?>

<section class="section__ticker">
	<div class="swiper ticker-slider">
		<div class="swiper-wrapper ticker-slider__wrapper">
			<?php 
		
				if (have_rows('ticker', $frontpage_id)) : while (have_rows('ticker', $frontpage_id)) : the_row(); 
				$tax = get_sub_field('director');
				// $tax_url = get_site_url() . '/' . $tax->slug;
				$tax_url = get_category_link($tax);
			?>
			<div class="swiper-slide ticker-slider__item">
				<a class="ticker-slider__link" href="<?= $tax_url ?>">
					<h2><?= $tax->name ?? '' ?> \\</h2>
				</a>
			</div>
			<?php
          endwhile;
        endif;
        ?>
		</div>
	</div>
</section>