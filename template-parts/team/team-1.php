<?php
/**
 * Template Part: Team Mission Section
 */
$title = get_field('team_mission_title');
$content = get_field('team_mission_content');
$gallery = get_field('team_mission_gallery');
?>
<section class="team-1 section-py !pb-0">
    <div class="container">
        <div class="wrap-content rem:max-w-[1218px] w-full mx-auto text-center">
            <div class="wrap-heading">
                <?php if ($title): ?>
                    <h2 class="heading-1 block-title font-bold text-Primary-1"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                
                <?php if ($content): ?>
                    <div class="format-content body-1 font-light xl:my-12 my-10">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if ($gallery): ?>
                <div class="swiper-column-auto relative swiper-loop autoplay">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($gallery as $img): ?>
                                <div class="swiper-slide">
                                    <div class="img img-ratio ratio:pt-[716_1218] zoom-img">
                                        <?php echo get_image_attrachment($img, 'image'); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="wrap-button-slide">
                        <div class="btn btn-sw-1 btn-prev"></div>
                        <div class="btn btn-sw-1 btn-next"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
