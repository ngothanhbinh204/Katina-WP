<?php
/**
 * Template Part: Home Hero Section
 */
?>
<section class="home-1">
    <div class="slide relative">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php if (have_rows('hero_slides')): ?>
                    <?php while (have_rows('hero_slides')): the_row(); 
                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                    ?>
                    <div class="swiper-slide">
                        <div class="home-1-banner relative">
                            <a class="img-ratio ratio:pt-[960_1920]" href="#"> 
                                <?php if ($image): ?>
                                    <img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="home-1-content absolute bottom-0 left-0 w-full rem:pb-[38px]">
                            <div class="container-fluid relative">
                                <div class="wrap-inner rem:max-w-[780px] w-full">
                                    <?php if ($title): ?>
                                        <div class="block-title title heading-1 font-bold">
                                            <?php echo wp_kses_post($title); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="wrap-button-slide">
            <div class="btn btn-sw-1 btn-prev"></div>
            <div class="btn btn-sw-1 btn-next"></div>
        </div>
        <div class="home-1-timeline pointer-events-none absolute bottom-0 left-0 z-10 w-full">
            <div class="container-fluid relative rem:pb-[34px]">
                <div class="timeline-swiper w-full rounded-[2px] bg-white/40 h-1 before:absolute before:left-0 before:top-0 before:h-full before:w-[var(--progress)] before:bg-white relative">
                </div>
            </div>
        </div>
    </div>
</section>
