<?php
/**
 * Template Name: Single Project
 */
get_header();
?>

<main>
    <section class="global-breadcrumb">
        <div class="container">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
    </section>

    <?php while (have_posts()): the_post(); 
        $sub_title = get_field('sub_title');
        $gallery = get_field('gallery');
    ?>
        <section class="project-detail-1 section-py">
            <div class="container">
                <div class="wrap-heading mb-6">
                    <?php if ($sub_title): ?>
                        <div class="sub-title text-Primary-1-Subtitle mb-6"><?php echo esc_html($sub_title); ?></div>
                    <?php endif; ?>
                    <h2 class="title heading-36 font-extrabold text-Primary-1"><?php the_title(); ?></h2>
                </div>
                
                <?php if ($gallery): ?>
                    <div class="wrap-slide">
                        <div class="swiper swiper-main">
                            <div class="swiper-wrapper">
                                <?php foreach ($gallery as $img): ?>
                                    <div class="swiper-slide">
                                        <a class="img img-ratio ratio:pt-[786_1400] -lg:ratio:pt-[70%] zoom-img" href="<?php echo esc_url($img['url']); ?>" data-fancybox="gallery">
                                            <img class="lozad" data-src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="thumbs-wrapper relative">
                            <div class="swiper swiper-thumbs">
                                <div class="swiper-wrapper">
                                    <?php foreach ($gallery as $img): ?>
                                        <div class="swiper-slide">
                                            <div class="img img-ratio ratio:pt-[125_190]">
                                                <img class="lozad" data-src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="wrap-button-slide">
                                <div class="btn btn-prev btn-sw-1"></div>
                                <div class="btn btn-next btn-sw-1"></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="wrap-content grid grid-cols-12 gap-base xl:mt-16 mt-base">
                    <div class="col-left lg:col-span-8 col-span-full">
                        <div class="format-content font-normal space-y-3 text-[#3D3D3D]">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    
                    <?php if (have_rows('overview_infos')): ?>
                        <div class="col-right lg:col-span-4 col-span-full bg-Primary-1 text-white xl:p-10 p-4">
                            <div class="title heading-3 font-bold mb-8"><?php _e('Overview', 'canhcamtheme'); ?></div>
                            <div class="infos flex flex-col gap-5">
                                <?php while (have_rows('overview_infos')): the_row(); 
                                    $label = get_sub_field('label');
                                    $value = get_sub_field('value');
                                ?>
                                    <div class="item border-b border-b-white/20 pb-5 last:pb-0 last:border-transparent">
                                        <div class="label font-normal mb-2"><?php echo esc_html($label); ?>:</div>
                                        <div class="value font-bold"><?php echo esc_html($value); ?></div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>

    <?php 
    // Query related projects (same category)
    $terms = wp_get_post_terms(get_the_ID(), 'project-category', array('fields' => 'ids'));
    $related_args = array(
        'post_type'      => 'project',
        'posts_per_page' => 6,
        'post__not_in'   => array(get_the_ID()),
    );
    if (!empty($terms) && !is_wp_error($terms)) {
        $related_args['tax_query'] = array(
            array(
                'taxonomy' => 'project-category',
                'field'    => 'term_id',
                'terms'    => $terms,
            ),
        );
    }
    $related_projects = new WP_Query($related_args);
    
    if ($related_projects->have_posts()):
    ?>
        <section class="project-detail-2 section-py bg-Utility-gray-50">
            <div class="container">
                <h2 class="title heading-36 font-extrabold text-Primary-1 text-center mb-base"><?php _e('Related Projects', 'canhcamtheme'); ?></h2>
                <div class="swiper-column-auto relative auto-3-column swiper-loop autoplay">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php while ($related_projects->have_posts()): $related_projects->the_post(); 
                                $sub_title = get_field('sub_title');
                            ?>
                                <div class="swiper-slide">
                                    <div class="project-item group">
                                        <div class="img">
                                            <a class="img-ratio ratio:pt-[247_440] zoom-img" href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()): ?>
                                                    <img class="lozad" data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                                <?php else: ?>
                                                    <img class="lozad" data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/1.jpg" alt="" />
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="content bg-Utility-gray-50 p-4">
                                            <?php if ($sub_title): ?>
                                                <div class="sub-title text-xs text-Primary-1-Subtitle font-normal mb-1"><?php echo esc_html($sub_title); ?></div>
                                            <?php endif; ?>
                                            <h3 class="title heading-3 font-bold group-hover:text-Primary-1">
                                                <a class="line-clamp-2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <?php if (have_rows('overview_infos')): ?>
                                                <div class="wrap-infos flex flex-col gap-4 mt-4">
                                                    <?php 
                                                    $count = 0;
                                                    while (have_rows('overview_infos') && $count < 2): the_row(); 
                                                        $label = get_sub_field('label');
                                                        $value = get_sub_field('value');
                                                        $count++;
                                                    ?>
                                                        <div class="item flex gap-2">
                                                            <div class="icon w-6 h-4 inline-flex text-base text-Primary-1">
                                                                <i class="fa-light fa-user"></i>
                                                            </div>
                                                            <div class="content body-4">
                                                                <div class="label font-bold mb-1"><?php echo esc_html($label); ?></div>
                                                                <div class="value font-normal"><?php echo esc_html($value); ?></div>
                                                            </div>
                                                        </div>
                                                    <?php endwhile; ?>
                                                </div>
                                            <?php endif; ?>
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