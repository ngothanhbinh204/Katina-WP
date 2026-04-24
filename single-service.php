<?php

get_header();
?>

<main>
    <section class="global-breadcrumb">
        <div class="container">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
    </section>

    <?php while (have_posts()): the_post(); ?>
        <section class="service-detail-1 xl:rem:py-[128px] py-10 bg-Utility-gray-50">
            <div class="container"> 
                <div class="wrap-content rem:max-w-[1088px] w-full mx-auto">
                    <h1 class="title xl:rem:text-[120px] rem:text-[64px] font-medium mb-base"><?php the_title(); ?></h1>
                    <div class="format-content body-1 font-light">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>

        <?php if (have_rows('information_list')): ?>
            <section class="service-detail-2" tab-wrapper="parent" tab-mode="mouseenter">
                <div class="wrapper-main xl:px-0 px-4">
                    <div class="item media-item-wrapper grid lg:grid-cols-2 grid-cols-1 xl:gap-0 gap-base">
                        <div class="col-left lg:block hidden">
                            <div class="image-ratio ratio:pt-[880_960] img-ratio">
                                <?php 
                                $count = 1;
                                while (have_rows('information_list')): the_row(); 
                                    $image = get_sub_field('image');
                                    if ($image):
                                ?>
                                    <a tab-content="parent" tab-content-value="<?php echo $count; ?>">
                                        <img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                                    </a>
                                <?php 
                                    endif;
                                    $count++;
                                endwhile; 
                                ?>
                            </div>
                        </div>
                        <div class="col-right flex flex-col justify-center xl:rem:pt-[93px] pt-10">
                            <h2 class="block-title heading-1 font-bold xl:rem:pl-[120px] xl:rem:mb-[56px] mb-base"><?php _e('Information', 'canhcamtheme'); ?></h2>
                            <div class="wrap flex flex-col xl:gap-0 gap-5">
                                <?php 
                                $count = 1;
                                while (have_rows('information_list')): the_row(); 
                                    $title = get_sub_field('title');
                                    $content = get_sub_field('content');
                                    $image = get_sub_field('image');
                                ?>
                                    <div class="item" tab-item="parent" tab-item-value="<?php echo $count; ?>">
                                        <a href="#">
                                            <div class="number"><?php echo sprintf('%02d', $count); ?></div>
                                            <div class="caption">
                                                <?php if ($title): ?>
                                                    <div class="title heading-3 font-bold"><?php echo esc_html($title); ?></div>
                                                <?php endif; ?>
                                                <div class="toggle-hidden"> 
                                                    <div>
                                                        <?php if ($content): ?>
                                                            <div class="format-content body-1 mt-5 text-white/75 font-light">
                                                                <?php echo wp_kses_post($content); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <?php if ($image): ?>
                                            <div class="img lg:hidden block"> 
                                                <a class="img-ratio ratio:pt-[760_880]" href="#"> 
                                                    <img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php 
                                $count++;
                                endwhile; 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>

    <?php 
    // Query other services
    $other_services = new WP_Query(array(
        'post_type' => 'service',
        'posts_per_page' => 4,
        'post__not_in' => array(get_the_ID()),
    ));
    if ($other_services->have_posts()):
    ?>
        <section class="service-detail-3 xl:py-24 py-10">
            <div class="container-fluid">
                <h2 class="heading-1 block-title font-bold text-Primary-1 mb-base"><?php _e('Other Services', 'canhcamtheme'); ?></h2>
                <div class="swiper-column-auto relative auto-3-column autoplay swiper-loop">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php while ($other_services->have_posts()): $other_services->the_post(); 
                            ?>
                                <div class="swiper-slide">
                                    <div class="service-item">
                                        <div class="img">
                                            <a class="img-ratio ratio:pt-[287_512] zoom-img" href="<?php the_permalink(); ?>"> 
                                                <?php echo get_image_post(get_the_ID(),'image') ?>
                                            </a>
                                        </div>
                                        <div class="content pt-6">
                                            <h3 class="title heading-3 font-semibold mb-5"> 
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <div class="format-content body-1 font-light text-justify">
                                                <ul>
                                                    <?php $information_list = get_field('information_list'); ?>
                                                    <?php foreach ($information_list as $information): ?>
                                                        <li><?php echo $information['title']; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <div class="wrap-btn"> 
                                                <a class="btn btn-primary style-default" href="<?php the_permalink(); ?>">
                                                    <span>
                                                        <?php echo __('Explore More', 'canhcamtheme'); ?>
                                                    </span>
                                                    <div class="icon"> </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <div class="wrap-button-slide">
                        <div class="btn btn-sw-1 btn-prev"></div>
                        <div class="btn btn-sw-1 btn-next"></div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
