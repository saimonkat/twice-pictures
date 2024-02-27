<?php
$contacts = get_field('contacts', 'options');
$social = get_field('social', 'options');
$footer = get_field('footer', 'options');
?>
<footer class="footer">
	<div class="footer__main">
		<div class="container">
			<div class="footer__row footer__row--top">
				<a class="footer__logo" href="/" title="Twice pictures">
					<img src="<?= DIST_URI . '/images/twice.png'; ?>" width="253" height="49" alt="">
				</a>
				<ul class="footer__socials">
					<?php foreach ($social as $item) :
						$link = $item['link']; ?>
					<li class="footer__socials-item">
						<a class="footer__socials-link" href="<?= $link['url'] ?>" target="_blank"><?= $link['title'] ?>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="footer__row footer__row--bottom">
				<div class="footer__address">
					<?php if ($contacts['uk_contacts']) :
						$uk_contacts = $contacts['uk_contacts']; ?>

					<div class="footer__address-details">
						<?php if ($uk_contacts['phone']) : ?>
						<a class="phone" href="tel:+4402076924882"><?= $uk_contacts['phone'] ?></a>
						<?php endif; ?>

					</div>
					<?php endif; ?>
				</div>
				<div class="footer__address">
					<?php if ($contacts['uk_contacts']) :
						$uk_contacts = $contacts['uk_contacts']; ?>
					<div class="footer__address-country">UK</div>
					<div class="footer__address-details">
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
				<div class="footer__address">
					<?php if ($contacts['us_contacts']) :
						$us_contacts = $contacts['us_contacts']; ?>
					<div class="footer__address-country"></div>
					<div class="footer__address-details">
						<?php if ($us_contacts['phone']) : ?>
						<a class="phone" href="tel:<? $us_contacts['phone'] ?>"><?= $us_contacts['phone'] ?></a>
						<?php endif;
							if ($us_contacts['address']) : ?>
						<address class="address"><?= $us_contacts['address'] ?></address>
						<?php endif;
							if ($us_contacts['contacts']) :
								foreach ($us_contacts['contacts'] as $contact) : ?>
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
		</div>
	</div>
	<div class="footer__bottom">
		<div class="container">
			<div class="footer__line">
				<div class="copyright">©<?php $year = date('Y'); echo $year; ?> TWICE PICTURES</div>
				<div class="rights"><?= $footer['rights'] ?></div>
				<div class="design">Design
					<a href="<?= $footer['design_url'] ?>" target="_blank">
						<img src="<?= $footer['design_logo'] ?>" width="43" height="29" alt="">
					</a>
				</div>
				<div class="development">Development
					<a href="<?= $footer['dev_url'] ?>" target="_blank">
						<img src="<?= $footer['dev_logo'] ?>" width="323" height="26" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>