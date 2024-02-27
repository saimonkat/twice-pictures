<?php
$contacts = get_field('contacts', 'options');
$social = get_field('social', 'options');
$footer = get_field('footer', 'options');
?>

<section class="contacts-page full-height">
	<h1 class="heading contacts-page__title"><?php the_title() ?></h1>

	<div class="contacts-page__content">

		<div class="contact__row contact__row--top">

			<div class="contact__address">
				<?php if ($contacts['uk_contacts']) :
						$uk_contacts = $contacts['uk_contacts']; ?>
				<div class="contact__address-details">
					<?php	if ($uk_contacts['address']) : ?>
					<address class="address"><?= $uk_contacts['address'] ?></address>
					<?php endif;
							if ($uk_contacts['contacts']) :
								foreach ($uk_contacts['contacts'] as $contact) : ?>
					<div class="contact">
						<?php echo $contact['name'];
										if ($contact['email']) : ?>
						<a href="mailto:<?= $contact['email'] ?>"><?= $contact['email'] ?></a>
						<?php endif;
										if ($contact['phone']) : ?>
						<a href="tel:<?= $contact['phone'] ?>"><?= $contact['phone'] ?></a>
						<?php endif; ?>
					</div>
					<?php endforeach;
							endif; ?>
				</div>
				<?php endif; ?>
			</div>

		</div>
		<div class="contact__row contact__row--bottom">
			<ul class="contact__socials">
				<?php foreach ($social as $item) :
							$link = $item['link']; ?>
				<li class="contact__socials-item">
					<a class="contact__socials-link" href="<?= $link['url'] ?>" target="_blank"><?= $link['title'] ?>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<svg class="icon icon--logo contacts-page__logo" width="55" height="49">
		<use xlink:href="<?= DIST_URI . '/images/icons/svg-sprite.svg#logo'; ?>"></use>
	</svg>
</section>