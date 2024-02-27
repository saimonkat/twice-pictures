<?php 
$directors = get_field('directors');
$terms = $directors['directors_list'];
if( $terms ): 
?>

<div class="directors__wrapper">

	<a class="directors__logo" href="<?= esc_url(home_url('/')); ?>">
		<img class="directors__logo__image" src="<?= DIST_URI . '/images/twice.png'; ?>" alt="Twice Pictures Logo">
	</a>

	<ul class="directors__list">
		<?php foreach( $terms as $term ): ?>
		<li class="directors__list__item">
			<a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
				<h2><?php echo esc_html( $term->name ); ?></h2>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</div>