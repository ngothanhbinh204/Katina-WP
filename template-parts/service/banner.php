<?php
/**
 * Template Part: Service Banner Section
 */
$image = get_field('sp_banner_image');
$title = get_field('sp_banner_title');
$subtitle = get_field('sp_banner_subtitle');

get_template_part('modules/common/banner', null, array(
    'image' => $image,
    'title' => $title,
    'subtitle' => $subtitle
));
?>
