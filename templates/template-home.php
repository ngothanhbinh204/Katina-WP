<?php
/**
 * Template Name: Home Page
 */
get_header();
?>

<main>
    <?php get_template_part('template-parts/home/home-1'); ?>
    <?php get_template_part('template-parts/home/home-2'); ?>
    <?php get_template_part('template-parts/home/home-3'); ?>
    <?php get_template_part('template-parts/home/home-4'); ?>
    <?php get_template_part('template-parts/home/home-5'); ?>
    <?php get_template_part('template-parts/home/home-6'); ?>
    <?php get_template_part('template-parts/home/contact'); ?>
</main>

<?php get_footer(); ?>
