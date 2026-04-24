<?php
/**
 * Template Part: Overview Mission Section
 */
$title = get_field('overview_mission_title');
$content = get_field('overview_mission_content');
$left_images = get_field('overview_mission_left_images');
$right_image = get_field('overview_mission_right_image');
?>
<section class="overview-1 section-py !pb-0">
    <div class="container-fluid"> 
        <?php if ($title): ?>
            <h2 class="title text-right heading-96 font-bold mb-12"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        
        <?php if ($content): ?>
            <div class="wrap-content rem:max-w-[1053px] w-full mx-auto xl:rem:mb-[84px] mb-base">
                <div class="format-content heading-3 font-normal">
                    <?php echo wp_kses_post($content); ?>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="wrapper-main grid lg:grid-cols-[calc(492/1600*100%)_1fr] grid-cols-1 gap-5">
            <div class="col-left flex flex-col gap-4">
                <?php if ($left_images): ?>
                    <?php foreach ($left_images as $img): ?>
                        <div class="img">
                            <a class="img-ratio ratio:pt-[310_492] zoom-img" href="<?php echo esc_url($img['url']); ?>" data-fancybox="mission-gallery"> 
                                <img class="lozad" data-src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>"/>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="col-right">
                <?php if ($right_image): ?>
                    <div class="img"> 
                        <a class="img-ratio ratio:pt-[640_1088] zoom-img" href="<?php echo esc_url($right_image['url']); ?>" data-fancybox="mission-gallery"> 
                            <img class="lozad" data-src="<?php echo esc_url($right_image['url']); ?>" alt="<?php echo esc_attr($right_image['alt']); ?>"/>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
