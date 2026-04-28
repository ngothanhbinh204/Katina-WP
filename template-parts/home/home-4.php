<?php
/**
 * Template part for displaying Home 4
 */
$title = get_field('services_title');
$bg = get_field('services_bg');
$bg_url = $bg ? esc_url($bg['url']) : esc_url(get_template_directory_uri()) . '/img/home-overview-bg.png';
$services = get_field('services_list');

// Lấy ảnh của service đầu tiên làm mặc định
$first_img = '';
if ($services && isset($services[0])) {
    $first_img = get_the_post_thumbnail_url($services[0]->ID, 'full');
}
if (!$first_img) {
    $first_img = esc_url(get_template_directory_uri()) . '/img/3.png';
}
?>
<section class="home-4">
    <div class="container-fluid">
        <h2 class="heading-1 block-title font-bold text-Primary-1 mb-base"><?php echo esc_html($title ? $title : 'Our Services'); ?></h2>
    </div>
</section>
<section class="home-overview-section" setBackground="<?php echo $bg_url; ?>">
    <div class="overview-cover-img"><img src="<?php echo esc_url($first_img); ?>" alt="Overview Cover"></div>
    <div class="container-fluid">
        <div class="home-overview-list">
            <?php 
            if ($services): 
                foreach ($services as $post): 
                    setup_postdata($post); 
                    $item_bg_url = get_the_post_thumbnail_url( $post->ID, 'full' );
                    if (!$item_bg_url) $item_bg_url = esc_url(get_template_directory_uri()) . '/img/3.png';
                    
                    $s_title = get_the_title();
                    // Get summary from excerpt, fallback to content
                    $content = get_the_content();
                    $link_url = get_permalink();
                ?>
                    <div class="home-overview-item" setBackground="<?php echo esc_url($item_bg_url); ?>" data-background-image="<?php echo esc_url($item_bg_url); ?>">
                        <div class="content-wrapper">
                            <div class="caption">
                                <h3 class="title"><?php echo esc_html($s_title); ?></h3>
                                <div class="toggle-hidden">
                                    <div>
                                        <div class="wrap-content">
                                            <div class="format-content">
                                               <?php echo wp_kses_post($content) ?>
                                            </div>
                                            <div class="wrap-btn"> 
                                                <a class="btn btn-primary style-transparent" href="<?php echo esc_url($link_url); ?>">
                                                    <span><?php _e('Read more', 'canhcamtheme'); ?></span>
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
            endif; 
            ?>
        </div>
    </div>
</section>
