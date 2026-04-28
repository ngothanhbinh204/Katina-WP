<?php get_header(); ?>

<?php
$term = get_queried_object();
// Fetch banner fields based on term
$banner_image = get_field('term_banner_image', $term);
$banner_title = get_field('term_banner_title', $term);
$banner_subtitle = get_field('term_banner_subtitle', $term);

if (!$banner_title) {
    $banner_title = $term->name;
}
?>

<main>
    <section class="page-banner-main">
        <div class="img img-ratio pt-[calc(960/1920*100rem)]">
            <?php if ($banner_image): ?>
                <img class="lozad" data-src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr($banner_title); ?>" />
            <?php else: ?>
                <img class="lozad" data-src="<?php echo esc_url(get_template_directory_uri() . '/img/1.jpg'); ?>" alt="Banner" />
            <?php endif; ?>
        </div>
        <div class="content"> 
            <div class="container">
                <div class="global-breadcrumb">
                    <nav class="rank-math-breadcrumb" aria-label="breadcrumbs">
                        <p>
                            <a href="<?php echo home_url(); ?>"><?php _e('Home', 'canhcamtheme'); ?></a>
                            <span class="separator"> | </span>
                            <span class="last"><?php echo esc_html($term->name); ?></span>
                        </p>
                    </nav>
                </div>
                <h2 class="title xl:rem:text-[128px] rem:text-[64px] font-bold uppercase text-white mb-3"><?php echo esc_html($banner_title); ?></h2>
                <?php if ($banner_subtitle): ?>
                    <div class="sub-title heading-3 font-semibold text-white"><?php echo wp_kses_post($banner_subtitle); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <section class="section-news section-py">
        <div class="container">
            <div class="news flex flex-col gap-base">
                <div class="news-heading-and-tab flex-center flex-wrap gap-4">
                    <ul class="nav-primary">
                        <?php
                        $current_term_id = $term->term_id;
                        $parent_id = $term->parent;
                        $siblings = get_terms(array(
                            'taxonomy' => 'category',
                            'parent' => $parent_id,
                            'hide_empty' => false,
                        ));

                        if ($parent_id != 0) {
                            $parent_term = get_term($parent_id);
                            echo '<li><a href="' . get_term_link($parent_term) . '">' . __('Tất cả', 'canhcamtheme') . '</a></li>';
                        } else {
                            $news_page = get_option('page_for_posts');
                            if ($news_page) {
                                echo '<li><a href="' . get_permalink($news_page) . '">' . __('Tất cả', 'canhcamtheme') . '</a></li>';
                            }
                        }

                        if (!empty($siblings) && !is_wp_error($siblings)) {
                            foreach ($siblings as $cat) {
                                $active_class = ($cat->term_id == $current_term_id) ? 'active' : '';
                                ?>
                                <li class="<?php echo $active_class; ?>">
                                    <a href="<?php echo get_term_link($cat); ?>">
                                        <?php echo esc_html($cat->name); ?>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <?php if (have_posts()): 
                    // Highlight news
                    $first_post = $wp_query->posts[0];
                    setup_postdata($first_post);
                ?>
                <div class="tab-news-item flex -lg:flex-col items-stretch rounded-5 overflow-hidden">
                    <div class="img-thumb w-full lg:shrink-0 lg:w-[calc(1184/1600*100%)]">
                        <a class="img-ratio ratio:pt-[652_1184]" href="<?php the_permalink(); ?>">
                            <?= get_image_post(get_the_ID(),"image"); ?>
                        </a>
                    </div>
                    <div class="block-info flex flex-col justify-center p-10 bg-Primary-1">
                        <span class="date body-4 text-white"><?php echo get_the_date('d/m/Y'); ?></span>
                        <h3 class="title heading-3 mt-2 text-white -xl:line-clamp-3 line-clamp-4">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="desc body-1 mt-6 text-white -xl:line-clamp-4 line-clamp-7">
                            <?php echo wp_trim_words(get_the_excerpt() ?: get_the_content(), 999, '...'); ?>
                        </p>
                        <a class="inline-block body-1 text-Primary-1 mt-10" href="<?php the_permalink(); ?>">
                            <?php _e('Read More', 'canhcamtheme'); ?>
                        </a>
                    </div>
                </div>
                <?php wp_reset_postdata(); ?>

                <ul class="list-news grid grid-cols-2 md:grid-cols-3 gap-base">
                    <?php
                    $wp_query->current_post = 0; // Reset
                    while (have_posts()):
                        the_post();
                        if ($wp_query->current_post === 0) continue; // Skip first post
                    ?>
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
                    <?php endwhile; ?>
                </ul>
                <div class="pagination flex-center">
                    <?php
                    $big = 999999999;
                    $pages = paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $wp_query->max_num_pages,
                        'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                        'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                        'type' => 'list',
                        'end_size' => 1,
                        'mid_size' => 1,
                    ));
                    if ($pages) {
                        echo $pages; // paginate_links with type 'list' returns an ul wrapper
                    }
                    ?>
                </div>
                <?php else: ?>
                    <div class="no-posts-found text-center py-10">
                        <h3><?php _e('No posts found', 'canhcamtheme'); ?></h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>