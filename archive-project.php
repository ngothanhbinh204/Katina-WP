<?php
get_header();

// Get the terms for the category navigation
$terms = get_terms(array(
    'taxonomy' => 'project-category',
	// 'parent' => 0,
    'hide_empty' => false,
));

$current_term_id = 0;
if (is_tax('project-category')) {
    $current_term = get_queried_object();
    $current_term_id = $current_term->term_id;
}
?>

<main>
    <?php get_template_part('modules/common/banner'); ?>

    <section class="project-1 xl:pb-20 pb-10">
        <div class="container">
            <?php if (!empty($terms) && !is_wp_error($terms)): ?>
                <div class="wrap-heading pt-10">
                    <ul class="nav-primary">
                        <?php foreach ($terms as $term): ?>
                            <li>
                                <a href="<?php echo get_term_link($term); ?>" class="<?php echo ($current_term_id === $term->term_id) ? 'active' : ''; ?>">
                                    <?php echo esc_html($term->name); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (have_posts()): ?>
                <div class="wrapper-main grid lg:grid-cols-[calc(480/1400*100%)_1fr] grid-cols-1 xl:gap-0 gap-base xl:pt-20 pt-10">
                    <?php 
                    // Feature the first post
                    the_post(); 
                    $sub_title = get_field('sub_title');
                    ?>
                    <div class="col-left xl:py-10 xl:px-8 p-4 bg-Utility-gray-50">
                        <div class="wrap-content-top rem:mb-[27px]">
                            <?php if ($sub_title): ?>
                                <div class="sub-title mb-3 text-Primary-1-Subtitle"><?php echo esc_html($sub_title); ?></div>
                            <?php endif; ?>
                            <h3 class="title heading-3 text-Primary-1 font-bold">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                        </div>
                        <?php if (have_rows('overview_infos')): ?>
                            <div class="wrap-infos flex flex-col gap-4">
                                <?php 
                                $count = 0;
                                while (have_rows('overview_infos') && $count < 3): the_row(); 
                                    $label = get_sub_field('label');
                                    $value = get_sub_field('value');
                                    $count++;
                                ?>
                                    <div class="item flex gap-3">
                                        <div class="icon w-6 h-5 inline-flex body-2 text-Primary-1">
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
                        <div class="wrap-btn rem:mt-[27px]">
                            <a class="btn btn-primary style-default" href="<?php the_permalink(); ?>">
                                <span><?php _e('Explore More', 'canhcamtheme'); ?></span>
                                <div class="icon"> </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-right">
                        <div class="img">
                            <a class="img-ratio ratio:pt-[506_920] zoom-img" href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()): ?>
                                    <img class="lozad" data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                <?php else: ?>
                                    <img class="lozad" data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/1.jpg" alt="" />
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                </div>

                <?php if (have_posts()): ?>
                    <div class="list-projects grid md:grid-cols-3 grid-cols-2 gap-base mt-base">
                        <?php while (have_posts()): the_post(); 
                            $sub_title = get_field('sub_title');
                        ?>
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
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                
                <div class="pagination flex-center mt-base">
                    <?php
                    echo paginate_links(array(
                        'prev_text' => '<i class="fa-light fa-angle-left"></i>',
                        'next_text' => '<i class="fa-light fa-angle-right"></i>',
                        'type'      => 'list',
                    ));
                    ?>
                </div>
				

            <?php else: ?>
                <div class="text-center pt-10">
                    <p><?php _e('No projects found.', 'canhcamtheme'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>