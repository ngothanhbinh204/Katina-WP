<?php
/**
 * Common Banner Module
 * Can receive $args with 'image', 'title', 'subtitle'.
 * If not provided, it auto-detects based on context (taxonomy, archive, or single post).
 */

$image = isset($args['image']) ? $args['image'] : null;
$title = isset($args['title']) ? $args['title'] : null;
$subtitle = isset($args['subtitle']) ? $args['subtitle'] : null;

// Auto-detect if no specific args are provided
if (!isset($args['image']) && !isset($args['title'])) {
    if (is_tax() || is_category() || is_tag()) {
        $queried_object = get_queried_object();
        $term_id = $queried_object->term_id;
        $taxonomy = $queried_object->taxonomy;
        $id = $taxonomy . '_' . $term_id;
        
        $image = get_field('term_banner_image', $id);
        $title = get_field('term_banner_title', $id) ?: single_term_title('', false);
        $subtitle = get_field('term_banner_subtitle', $id);
    } elseif (is_post_type_archive()) {
        $post_type = get_query_var('post_type');
        $image = get_field($post_type . '_archive_banner', 'option');
        $title = get_field($post_type . '_archive_title', 'option') ?: post_type_archive_title('', false);
        $subtitle = get_field($post_type . '_archive_subtitle', 'option');
    } else {
        $image = get_field('banner_image', get_the_ID());
        $title = get_field('banner_title', get_the_ID()) ?: get_the_title();
        $subtitle = get_field('banner_subtitle', get_the_ID());
    }
}

// Fallback for title if still empty
if (empty($title)) {
    if (is_tax() || is_category() || is_tag()) {
        $title = single_term_title('', false);
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } else {
        $title = get_the_title();
    }
}
?>

<section class="page-banner-main">
    <div class="img img-ratio pt-[calc(960/1920*100rem)]">
        <?php if ($image): ?>
            <img class="lozad" data-src="<?php echo esc_url(is_array($image) ? $image['url'] : $image); ?>" alt="<?php echo esc_attr(is_array($image) ? $image['alt'] : ''); ?>" />
        <?php else: ?>
            <img class="lozad" data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/1.jpg" alt="" />
        <?php endif; ?>
    </div>
    <div class="content">
        <div class="container">
            <div class="global-breadcrumb">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            </div>
            
            <h2 class="title xl:rem:text-[128px] rem:text-[64px] font-bold uppercase text-white mb-3">
                <?php echo esc_html($title); ?>
            </h2>
            
            <?php if ($subtitle): ?>
                <div class="sub-title heading-3 font-semibold text-white">
                    <?php echo wp_kses_post($subtitle); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>