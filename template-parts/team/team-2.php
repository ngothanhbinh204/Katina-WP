<?php
/**
 * Template Part: Team List Section
 */
$members_query = new WP_Query(array(
    'post_type'      => 'member',
    'posts_per_page' => -1,
));
?>
<section class="team-2 xl:pt-24 xl:rem:pb-[88px] py-10">
    <div class="container-fluid">
        <?php if ($members_query->have_posts()): ?>
            <div class="swiper-column-auto relative auto-4-column swiper-loop autoplay">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php while ($members_query->have_posts()): $members_query->the_post(); 
                            $role = get_field('member_role');
                            $img_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_template_directory_uri() . '/img/1.jpg';
                            $img_alt = get_the_title();
                            $popup_id = 'popup-team-' . get_the_ID();
                        ?>
                            <div class="swiper-slide">
                                <div class="item">
                                    <div class="img">
                                        <a class="img-ratio ratio:pt-[420_356] zoom-img" href="#<?php echo esc_attr($popup_id); ?>" data-fancybox> 
                                            <img class="lozad" data-src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" />
                                        </a>
                                    </div>
                                    <div class="content xl:pt-8 pt-4">
                                        <div class="wrap-top mb-8">
                                            <div class="name heading-3 font-bold underline mb-2"><?php the_title(); ?></div>
                                            <?php if ($role): ?>
                                                <div class="role body-1 font-light"><?php echo esc_html($role); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="wrap-btn">
                                            <a class="btn btn-primary style-default" href="#<?php echo esc_attr($popup_id); ?>" data-fancybox>
                                                <span>Explore More</span>
                                                <div class="icon"> </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
            
            <?php /* Popup Content */ ?>
            <?php while ($members_query->have_posts()): $members_query->the_post(); 
                $role = get_field('member_role');
                $img_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_template_directory_uri() . '/img/1.jpg';
                $popup_id = 'popup-team-' . get_the_ID();
            ?>
                <div id="<?php echo esc_attr($popup_id); ?>" style="display: none;" data-fancybox-modal>
                    <div class="popup-content w-full relative z-50 xl:px-20 xl:py-10 p-4">
                        <div class="wrapper grid grid-cols-[calc(216/916*100%)_1fr] xl:gap-15 gap-base">
                            <div class="img img-ratio ratio:pt-[255_216] zoom-img">
                                <img class="lozad" data-src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                            </div>
                            <div class="infos text-white mt-12">
                                <div class="name heading-3 font-bold mb-2"><?php the_title(); ?></div>
                                <?php if ($role): ?>
                                    <div class="role body-1 font-light"><?php echo esc_html($role); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="wrap-content mt-9">
                            <div class="format-content body-1 font-light">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>
