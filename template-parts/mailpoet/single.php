<?php get_header(); ?>
<main class="main">
    <section class="contacts-page full-height">
        <div class="contacts-page__content"><?php the_content() ?></div>
        <svg class="icon icon--logo contacts-page__logo" width="55" height="49">
            <use xlink:href="#logo"></use>
        </svg>
    </section>
    <?php get_template_part('template-parts/subscribe') ?>
</main>
<?php get_footer(); ?>
