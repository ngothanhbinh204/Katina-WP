<?php
/**
 * Template Part: Home Services Section
 */
$title = get_field('services_title');
$cover = get_field('services_cover');
$bg = get_field('services_bg');
$bg_url = $bg ? esc_url($bg['url']) : esc_url(get_template_directory_uri()) . '/img/home-overview-bg.png';
?>
<section class="home-4">
    <div class="container-fluid">
        <h2 class="heading-1 block-title font-bold text-Primary-1 mb-base"><?php echo esc_html($title ? $title : 'Our Services'); ?></h2>
    </div>
</section>
<section class="home-overview-section" setBackground="<?php echo $bg_url; ?>">
    <?php if ($cover): ?>
        <div class="overview-cover-img"><img src="<?php echo esc_url($cover['url']); ?>" alt="<?php echo esc_attr($cover['alt']); ?>"></div>
    <?php endif; ?>
    <div class="container-fluid">
        <div class="home-overview-list">
            <?php 
            $services = get_field('services_list');
            if ($services): 
                foreach ($services as $post): 
                    setup_postdata($post); 
                    $item_bg_url = get_the_post_thumbnail_url( $post->ID, 'full' );
                    $s_title = get_the_title();
                    $content = get_the_excerpt();
                    $link_url = get_permalink();
                ?>
                    <div class="home-overview-item" setBackground="<?php echo $item_bg_url; ?>" data-background-image="<?php echo $item_bg_url; ?>">
                        <div class="content-wrapper">
                            <div class="caption">
                                <h3 class="title"><?php echo esc_html($s_title); ?></h3>
                                <div class="toggle-hidden">
                                    <div>
                                        <div class="wrap-content">
                                            <div class="format-content">
                                                <?php echo apply_filters('the_content', $content); ?>
                                            </div>
                                            <div class="wrap-btn"> 
                                                <a class="btn btn-primary style-transparent" href="<?php echo esc_url($link_url); ?>">
                                                    <span>Explore More</span>
                                                    <div class="icon"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                endforeach; 
                wp_reset_postdata(); 
            endif; ?>
        </div>
    </div>
</section>
