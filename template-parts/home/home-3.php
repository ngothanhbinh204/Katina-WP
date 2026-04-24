<?php
/**
 * Template Part: Home Values Section
 */
$title = get_field('values_title');
$line_img = get_field('values_line');
?>
<section class="home-3 section-py overflow-hidden">
    <div class="decor"> 
        <?php echo get_image_attrachment($line_img, "image") ?>
    </div>
    <div class="wrap-container title-fade-left xl:rem:pr-[140px] xl:px-0 px-4 xl:rem:pl-[160px] max-w-full w-full">
        <?php if ($title): ?>
            <div class="title bottom-title text-right font-bold heading-96 xl:mb-0 mb-base">
                <?php echo wp_kses_post($title); ?>
            </div>
        <?php endif; ?>
        
        <?php if (have_rows('values_list')): ?>
            <div class="wrapper-lists flex flex-col gap-25">
                <?php while (have_rows('values_list')): the_row(); 
                    $gallery = get_sub_field('gallery');
                    $v_title = get_sub_field('title');
                    $content = get_sub_field('content');
                ?>
                    <div class="wrapper flex lg:flex-row flex-col items-center xl:gap-0 gap-base">
                        <div class="col-left lg:w-6/12 w-full xl:pr-[9.8rem] xl:ml-[2rem]">
                            <div class="dot"> <img class="img-svg" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/dot.svg" alt=""></div>
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
                        <div class="col-right lg:w-6/12 w-full xl:pl-[5rem] xl:mr-[12.7rem]">
                            <?php if ($v_title): ?>
                                <h2 class="title title-32 text-Primary-1 font-bold mb-5"><?php echo esc_html($v_title); ?></h2>
                            <?php endif; ?>
                            <?php if ($content): ?>
                                <div class="format-content body-1 font-light">
                                    <?php echo wp_kses_post($content); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
