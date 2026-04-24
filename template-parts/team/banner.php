<?php
/**
 * Template Part: Team Banner Section
 */
$image = get_field('team_banner_image');
$title = get_field('team_banner_title');
$subtitle = get_field('team_banner_subtitle');

get_template_part('modules/common/banner', null, array(
    'image' => $image,
    'title' => $title,
    'subtitle' => $subtitle
));
?>
