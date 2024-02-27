<?php

/** @var WP_Term[] $brands */
$brands = get_categories([
	'taxonomy' => 'brand',
	'per_page' => 0,
]);

$current_categories = $_GET['cat_ids'] ?? [];

$parent_current_categories = $_GET['parent_cat_ids'] ?? [];

if (get_queried_object() instanceof WP_Term) {
	if (is_tax('directors_parent')) {
		$parent_current_categories[] = get_queried_object()->term_id;
	}
	
	if (is_tax('directors_category')) {
		$current_categories[] = get_queried_object()->term_id;
	}
}

if (!empty($post)) {
$directors = get_the_terms($post->ID, 'directors_category') ? get_the_terms($post->ID, 'directors_category') : get_the_terms($post->ID, 'category');
}

$directors_count = !empty($directors) ? count($directors) : null;

?>

<div class="director-single__header">

	<a class="director-single__logo" href="<?= esc_url(home_url('/')); ?>">
		<img class="director-single__logo__image" src="<?= DIST_URI . '/images/twice-green.png'; ?>"
			alt="Twice Pictures Logo">
	</a>
	<?php if ($directors_count === 1) : ?>
	<h1 class="director-single__director-name">
		<?php foreach ($directors as $individual) :
				$director_names = $individual->name;
			?>
		<?= $director_names ?>
		<?php endforeach; ?>
		<span class='hidden'>director</span>
	</h1>
	<?php else : ?>

	<h1 class="director-single__director-name">
		<?php
			for ($count = 0; $count < $directors_count; $count++) { ?>
		<?php
				if ($count < $directors_count - 1) {
					echo $directors[$count]->name . ' //';
				} else {
					echo $directors[$count]->name;
				} ?>
		<?php } ?>
		<span class='hidden'>director</span>
	</h1>

	<?php endif; ?>
</div>

<?php if (!empty($post)): ?>
<div class="director-single__items">
	<?php $counter = 1; ?>
	<?php foreach ($brands as $brand) : ?>
	<?php
		$tax_query = [];
		$tax_query[] = [
			'taxonomy' => 'brand',
			'field'    => 'term_id',
			'terms'    => $brand->term_id,
		];
		if (!empty($current_categories)) {
			$tax_query[] = [
				'taxonomy' => 'directors_category',
				'field'    => 'term_id',
				'terms'    => $current_categories,
			];
		}
		if (!empty($parent_current_categories)) {
			$tax_query[] = [
				'taxonomy' => 'directors_parent',
				'field'    => 'term_id',
				'terms'    => $parent_current_categories,
			];
		}
		$query = new WP_Query([
			'post_type' => 'project',
			'tax_query' => $tax_query,
			'order_by' => 'menu_order',
			'order' => 'ASC'
		]);
		$projects = $query->posts;

		?>
	<?php if ($projects) : ?>

	<?php foreach ($projects as $project) : ?>
	<a class="director-single__film" href="<?= get_permalink($project) ?>" title="Go to project">
		<div class="director-single__film__meta">
			<span class="director-single__film__meta__brand-name"><?= $brand->name ?>:</span>
			<span class="director-single__film__meta__title">
				<?= $project->post_title ?>
			</span>
		</div>
		<div class="director-single__film__wrapper">
			<?php show_project_inner_video($project->ID); ?>
		</div>
	</a>
	<?php endforeach; ?>

	<?php endif; ?>
	<?php endforeach; ?>

</div>

<?php else: ?>
<div class="director-single__empty">
	<p>We'll be adding this directors' films soon, stay tuned!
		<br>
		Experience our other <a class="director-single__empty__link" href="/directors">Directors</a>.
	</p>
</div>
<?php endif; ?>