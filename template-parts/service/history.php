<?php
/**
 * Template Part: Service History Section
 */
$title = get_field('sp_history_title');
?>
<section class="section-history section-py !pb-0">
    <div class="wrapper">
        <div class="container-fluid">
            <?php if ($title): ?>
                <h2 class="title bottom-title text-right font-bold heading-96"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            
            <?php if (have_rows('sp_history_list')): ?>
                <div class="thumb mb-base">
                    <div class="wrap-slide-years">
                        <div class="relative">
                            <div class="swiper history-swiper">
                                <div class="swiper-wrapper">
                                    <?php while (have_rows('sp_history_list')): the_row(); 
                                        $year = get_sub_field('year');
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="item-history flex flex-col items-center gap-8">
                                                <div class="content">
                                                    <div class="icon"> <img class="img-svg" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/location.svg" alt=""></div>
                                                    <div class="number"><?php echo esc_html($year); ?></div>
                                                </div>
                                                <div class="wrap">
                                                    <div class="line-year">
                                                        <div class="dot-icon"> <img class="img-svg" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/PIN.svg" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="main relative mt-base">
                    <div class="swiper swiper-main">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('sp_history_list')): the_row(); 
                                $year = get_sub_field('year');
                                $content = get_sub_field('content');
                                $gallery = get_sub_field('gallery');
                            ?>
                                <div class="swiper-slide">
                                    <div class="box">
                                        <div class="item grid xl:grid-cols-2 grid-cols-1 xl:gap-0 gap-base">
                                            <div class="col-left xl:pr-[6.15rem]">
                                                <?php if ($year): ?>
                                                    <div class="title heading-1 text-Primary-1 font-bold mb-base"><?php echo esc_html($year); ?></div>
                                                <?php endif; ?>
                                                <?php if ($content): ?>
                                                    <div class="format-content body-1 font-light xl:text-justify pr-6">
                                                        <?php echo wp_kses_post($content); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-right xl:pl-[5.270833rem]">
                                                <div class="swiper slider-introduce relative">
                                                    <div class="swiper-wrapper">
                                                        <?php if ($gallery): ?>
                                                            <?php foreach ($gallery as $img): ?>
                                                                <div class="swiper-slide">
                                                                    <div class="img img-ratio ratio:pt-[413_620]">
                                                                        <img class="lozad" data-src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="arrow-btn flex flex-col gap-3">
                                                        <div class="btn btn-sw-1 btn-prev"></div>
                                                        <div class="btn btn-sw-1 btn-next"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
