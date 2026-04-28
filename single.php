<?php get_header(); ?>
<?php get_template_part('modules/common/breadcrumb'); ?>
    <section class="news-detail section-py">
        <div class="container"> 
            <h2 class="heading-2 font-extrabold mb-6"><?php the_title(); ?></h2>
            <time class="body-4 mb-base text-Utility-gray-500 font-normal"><?php the_date('d.m.Y'); ?></time>
            <div class="swiper-column-auto mt-base">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="img">
                                <a class="img-ratio ratio:pt-[788_1400] rounded-5 zoom-img">
                                    <?= get_image_post(get_the_ID(),"image"); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-content rem:max-w-[1050px] w-full mx-auto mt-base">
                <div class="format-content font-normal">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php
    $categories = wp_get_post_categories(get_the_ID());
    if ($categories) {
        $args = array(
            'category__in' => $categories,
            'post__not_in' => array(get_the_ID()),
            'posts_per_page' => 5,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $related_posts = new WP_Query($args);
        
        if ($related_posts->have_posts()) : ?>
        <section class="news-other section-py bg-Utility-gray-50">
            <div class="container"> 
                <h2 class="title heading-2 font-bold text-Primary-2 mb-base text-center"><?php _e('Related Posts', 'canhcamtheme'); ?></h2>
                <div class="swiper-column-auto relative swiper-loop autoplay">
                    <div class="swiper">
                        <div class="swiper-wrapper"> 
                            <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                <div class="swiper-slide">
                                    <div class="news-item group">
                                        <div class="img"> 
                                            <a class="img-ratio ratio:pt-[293_440] rounded-4 zoom-img" href="<?php the_permalink(); ?>"> 
                                                <?= get_image_post(get_the_ID(),"image"); ?>
                                            </a>
                                        </div>
                                        <div class="content xl:py-6 xl:px-4 p-4">
                                            <div class="top-content flex items-center gap-2 font-normal body-4">
                                                <div class="day"><?php echo get_the_date('d.m.Y'); ?></div>
                                                <div class="category text-Primary-1">
                                                    <?php 
                                                    $cats = get_the_category();
                                                    if ($cats) echo esc_html($cats[0]->name);
                                                    ?>
                                                </div>
                                            </div>
                                            <h3 class="heading-6 font-semibold my-2 group-hover:text-Primary-1"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <div class="desc line-clamp-2"> 
                                                <p><?php echo wp_trim_words(get_the_excerpt() ?: get_the_content(), 20, '...'); ?></p>
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
        <?php endif; 
    }
    ?>

<?php get_footer(); ?>