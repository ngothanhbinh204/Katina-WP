<?php
/**
 * Template Part: Service List Section
 */
$title = get_field('sp_services_title');
$subtitle = get_field('sp_services_subtitle');
$content = get_field('sp_services_content');

$services_query = new WP_Query(array(
    'post_type'      => 'service',
    'posts_per_page' => -1,
));
?>
<section class="service-3 section-py !pt-0">
    <div class="container-fluid">
        <div class="wrap-heading grid lg:grid-cols-2 grid-cols-1 gap-base pb-10 border-b border-b-Utility-gray-200 mb-base">
            <div class="col-left">
                <?php if ($title): ?>
                    <h2 class="title bottom-title font-bold heading-96"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            </div>
            <div class="col-right">
                <?php if ($subtitle): ?>
                    <div class="sub-title heading-3 font-semibold text-Primary-1-Subtitle mb-4"><?php echo esc_html($subtitle); ?></div>
                <?php endif; ?>
                <?php if ($content): ?>
                    <div class="format-content body-1 font-light">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <?php if ($services_query->have_posts()): ?>
            <div class="wrap-main flex flex-col gap-base">
                <?php while ($services_query->have_posts()): $services_query->the_post(); 
                    $img_url = 
                    $img_alt = get_the_post_thumbnail_url(get_the_ID(), 'alt');
                ?>
                    <div class="wrap-lists grid lg:grid-cols-[calc(784/1600*100%)_1fr] grid-cols-1 xl:rem:gap-[136px] gap-base pb-10 border-b border-b-Utility-gray-200 last:pb-0 last:border-b-0">
                        <div class="col-left">
                            <div class="img"> 
                                <a class="img-ratio ratio:pt-[440_784] zoom-img" href="<?php the_permalink(); ?>"> 
                                    <?php echo get_image_post(get_the_ID(), 'image'); ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-right">
                            <h2 class="title heading-1 font-bold text-Primary-1 mb-base"><?php the_title(); ?></h2>
                            <div class="format-content body-1 font-light">
                                 <ul>
                                    <?php $information_list = get_field('information_list'); ?>
                                    <?php foreach ($information_list as $information): ?>
                                        <li><?php echo $information['title']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="wrap-btn mt-base">
                                <a class="btn btn-primary style-default" href="<?php the_permalink(); ?>">
                                    <span>
                                        <?php echo __('Explore More', 'canhcamtheme'); ?>
                                    </span>
                                    <div class="icon"> </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
