<?php
/**
 * Template Part: Home Media Section
 */
$title = get_field('media_title');
$categories = get_field('media_categories'); // returns array of term objects or IDs
$button = get_field('media_button');

// Ensure $categories is an array of objects
if ($categories && is_array($categories) && is_numeric($categories[0])) {
    $terms = array();
    foreach ($categories as $cat_id) {
        $term = get_term($cat_id, 'category');
        if ($term && !is_wp_error($term)) {
            $terms[] = $term;
        }
    }
    $categories = $terms;
}

if (!$categories) {
    $categories = get_terms(array(
        'taxonomy' => 'category',
        'number' => 3,
        'hide_empty' => true
    ));
}

$cat_ids = wp_list_pluck($categories, 'term_id');
?>
<section class="home-6 section-py !pt-0" tab-wrapper="parent" tab-mode="mouseenter">
    <div class="container-fluid">
        <div class="wrap-tabslet" data-toggle="tabslet">
            <div class="wrap-heading flex md:flex-row gap-base flex-col items-center justify-between">
                <h2 class="heading-1 block-title font-bold text-Primary-1">
                    <?php echo esc_html($title ? $title : __('Media', 'canhcamtheme')); ?>
                </h2>
                <ul class="tabslet-tab nav-primary">
                    <li class="active"><a href="#tab-all"><?php _e('All news', 'canhcamtheme'); ?></a></li>
                    <?php foreach ($categories as $cat): ?>
                        <li><a href="#tab-<?php echo esc_attr($cat->term_id); ?>"><?php echo esc_html($cat->name); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Tab All -->
            <div class="tabslet-content active" id="tab-all">
                <div class="wrapper-main" data-media-list>
                    <?php
                    $args_all = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'category__in' => $cat_ids
                    );
                    $query_all = new WP_Query($args_all);
                    $i = 1;
                    if ($query_all->have_posts()):
                        while ($query_all->have_posts()): $query_all->the_post();
                            $month = get_the_date('M.d');
                            $item_title = get_the_title();
                            $excerpt = get_the_excerpt();
                    ?>
                        <div class="item media-item-wrapper grid lg:grid-cols-[calc(1240/1600*100%)_1fr] grid-cols-1 gap-base" tab-item="parent" tab-item-value="all-<?php echo $i; ?>">
                            <div class="wrap-content grid items-center xl:grid-cols-[calc(205/1240*100%)_1fr] grid-cols-1 xl:rem:gap-[115px]">
                                <div class="month"><?php echo esc_html($month); ?></div>
                                <div class="infos">
                                    <h3 class="title heading-3 font-semibold mb-5"><a href="<?php the_permalink(); ?>"><?php echo esc_html($item_title); ?></a></h3>
                                    <div class="format-content body-1 font-light text-Utility-gray-600 mb-5">
                                      <?php echo wp_kses_post(wp_trim_words($excerpt, 999, '')); ?>
                                    </div>
                                    <div class="icon text-xl"><a href="<?php the_permalink(); ?>"><i class="fa-solid fa-plus"></i></a></div>
                                </div>
                            </div>
                            <div class="wrap-image"> 
                                <a class="img-ratio rounded-2 ratio:pt-[240_320]" href="<?php the_permalink(); ?>" tab-content="parent" tab-content-value="all-<?php echo $i; ?>"> 
                                    <?php echo get_image_post(get_the_ID(), 'image') ?>
                                </a>
                            </div>
                        </div>
                    <?php 
                        $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif; 
                    ?>
                </div>
                <?php if ($button): ?>
                <div class="button-more rem:mt-[31px] xl:rem:ml-[320px]">
                    <a href="<?php echo esc_url($button['url']); ?>" target="<?php echo esc_attr($button['target'] ?: '_self'); ?>" class="btn btn-primary style-default">
                        <span><?php echo esc_html($button['title']); ?></span>
                        <div class="icon"></div>
                    </a>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Tabs per category -->
            <?php foreach ($categories as $cat): ?>
                <div class="tabslet-content" id="tab-<?php echo esc_attr($cat->term_id); ?>">
                    <div class="wrapper-main" data-media-list>
                        <?php
                        $args_cat = array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'cat' => $cat->term_id
                        );
                        $query_cat = new WP_Query($args_cat);
                        $i = 1;
                        if ($query_cat->have_posts()):
                            while ($query_cat->have_posts()): $query_cat->the_post();
                                $month = get_the_date('M.d');
                                $item_title = get_the_title();
                                $excerpt = wp_trim_words(get_the_excerpt() ?: get_the_content(), 999, '...');
                             
                        ?>
                            <div class="item media-item-wrapper grid lg:grid-cols-[calc(1240/1600*100%)_1fr] grid-cols-1 gap-base" tab-item="parent" tab-item-value="cat-<?php echo esc_attr($cat->term_id . '-' . $i); ?>">
                                <div class="wrap-content grid items-center xl:grid-cols-[calc(205/1240*100%)_1fr] grid-cols-1 xl:rem:gap-[115px]">
                                    <div class="month"><?php echo esc_html($month); ?></div>
                                    <div class="infos">
                                        <h3 class="title heading-3 font-semibold mb-5"><a href="<?php the_permalink(); ?>"><?php echo esc_html($item_title); ?></a></h3>
                                        <div class="format-content body-1 font-light text-Utility-gray-600 mb-5">
                                            <p><?php echo nl2br(esc_html($excerpt)); ?></p>
                                        </div>
                                        <div class="icon text-xl"><a href="<?php the_permalink(); ?>"><i class="fa-solid fa-plus"></i></a></div>
                                    </div>
                                </div>
                                <div class="wrap-image"> 
                                    <a class="img-ratio rounded-2 ratio:pt-[240_320]" href="<?php the_permalink(); ?>" tab-content="parent" tab-content-value="cat-<?php echo esc_attr($cat->term_id . '-' . $i); ?>"> 
                                        <?php echo get_image_post(get_the_ID(), 'image') ?>
                                    </a>
                                </div>
                            </div>
                        <?php 
                            $i++;
                            endwhile;
                            wp_reset_postdata();
                        endif; 
                        ?>
                    </div>
                    <?php if ($button): ?>
                    <div class="button-more rem:mt-[31px] xl:rem:ml-[320px]">
                        <a href="<?php echo esc_url($button['url']); ?>" target="<?php echo esc_attr($button['target'] ?: '_self'); ?>" class="btn btn-primary style-default">
                            <span><?php echo esc_html($button['title']); ?></span>
                            <div class="icon"></div>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
