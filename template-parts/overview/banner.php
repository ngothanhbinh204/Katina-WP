<?php
/**
 * Template Part: Overview Banner Section
 */
$image = get_field('overview_banner_image');
$title = get_field('overview_banner_title');
$subtitle = get_field('overview_banner_subtitle');

get_template_part('modules/common/banner', null, array(
    'image' => $image,
    'title' => $title,
    'subtitle' => $subtitle
));
?>
