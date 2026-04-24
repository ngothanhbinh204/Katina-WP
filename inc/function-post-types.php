<?php
// Register Career Custom Post Type
function create_career_post_type() {
    $labels = array(
        'name'                  => 'Careers',
        'singular_name'         => 'Career',
        'menu_name'             => 'Careers',
        'name_admin_bar'        => 'Career',
        'archives'              => 'Career Archives',
        'attributes'            => 'Career Attributes',
        'parent_item_colon'     => 'Parent Career:',
        'all_items'             => 'All Careers',
        'add_new_item'          => 'Add New Career',
        'add_new'               => 'Add New',
        'new_item'              => 'New Career',
        'edit_item'             => 'Edit Career',
        'update_item'           => 'Update Career',
        'view_item'             => 'View Career',
        'view_items'            => 'View Careers',
        'search_items'          => 'Search Career',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into career',
        'uploaded_to_this_item' => 'Uploaded to this career',
        'items_list'            => 'Careers list',
        'items_list_navigation' => 'Careers list navigation',
        'filter_items_list'     => 'Filter careers list',
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'career'),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array('title', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-businessman',
    );

    register_post_type('career', $args);
}
add_action('init', 'create_career_post_type');

// Register Career Category Taxonomy
function create_career_taxonomy() {
    $labels = array(
        'name'                       => 'Career Categories',
        'singular_name'              => 'Career Category',
        'search_items'               => 'Search Categories',
        'popular_items'              => 'Popular Categories',
        'all_items'                  => 'All Categories',
        'parent_item'                => 'Parent Category',
        'parent_item_colon'          => 'Parent Category:',
        'edit_item'                  => 'Edit Category',
        'update_item'                => 'Update Category',
        'add_new_item'               => 'Add New Category',
        'new_item_name'              => 'New Category Name',
        'separate_items_with_commas' => 'Separate categories with commas',
        'add_or_remove_items'        => 'Add or remove categories',
        'choose_from_most_used'      => 'Choose from the most used categories',
        'not_found'                  => 'No categories found.',
        'menu_name'                  => 'Categories',
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'career-category'),
        'show_in_rest'          => true,
    );

    register_taxonomy('career-category', array('career'), $args);
}
add_action('init', 'create_career_taxonomy');

// Register Project Custom Post Type
function create_project_post_type() {
    $labels = array(
        'name'                  => 'Projects',
        'singular_name'         => 'Project',
        'menu_name'             => 'Projects',
        'name_admin_bar'        => 'Project',
        'archives'              => 'Project Archives',
        'attributes'            => 'Project Attributes',
        'parent_item_colon'     => 'Parent Project:',
        'all_items'             => 'All Projects',
        'add_new_item'          => 'Add New Project',
        'add_new'               => 'Add New',
        'new_item'              => 'New Project',
        'edit_item'             => 'Edit Project',
        'update_item'           => 'Update Project',
        'view_item'             => 'View Project',
        'view_items'            => 'View Projects',
        'search_items'          => 'Search Project',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into project',
        'uploaded_to_this_item' => 'Uploaded to this project',
        'items_list'            => 'Projects list',
        'items_list_navigation' => 'Projects list navigation',
        'filter_items_list'     => 'Filter projects list',
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'project'),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-portfolio',
    );

    register_post_type('project', $args);
}
add_action('init', 'create_project_post_type');

/**
 * Register taxonomy for Projects
 */
function create_project_taxonomy() {
    $labels = array(
        'name'              => 'Project Categories',
        'singular_name'     => 'Project Category',
        'search_items'      => 'Search Categories',
        'all_items'         => 'All Categories',
        'parent_item'       => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Categories',
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-category'),
    );

    register_taxonomy('project-category', array('project'), $args);
}
add_action('init', 'create_project_taxonomy');

// Register Service Custom Post Type
function create_service_post_type() {
    $labels = array(
        'name'                  => 'Services',
        'singular_name'         => 'Service',
        'menu_name'             => 'Services',
        'name_admin_bar'        => 'Service',
        'archives'              => 'Service Archives',
        'attributes'            => 'Service Attributes',
        'parent_item_colon'     => 'Parent Service:',
        'all_items'             => 'All Services',
        'add_new_item'          => 'Add New Service',
        'add_new'               => 'Add New',
        'new_item'              => 'New Service',
        'edit_item'             => 'Edit Service',
        'update_item'           => 'Update Service',
        'view_item'             => 'View Service',
        'view_items'            => 'View Services',
        'search_items'          => 'Search Service',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into service',
        'uploaded_to_this_item' => 'Uploaded to this service',
        'items_list'            => 'Services list',
        'items_list_navigation' => 'Services list navigation',
        'filter_items_list'     => 'Filter services list',
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'service'),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-hammer',
    );

    register_post_type('service', $args);
}
add_action('init', 'create_service_post_type');

function create_service_taxonomy() {
    $labels = array(
        'name'              => 'Service Categories',
        'singular_name'     => 'Service Category',
        'search_items'      => 'Search Categories',
        'all_items'         => 'All Categories',
        'parent_item'       => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Categories',
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'service-category'),
    );

    register_taxonomy('service-category', array('service'), $args);
}
add_action('init', 'create_service_taxonomy');

/**
 * Enable Rank Math metabox and sitemap settings for our custom taxonomies (single, robust block)
 */
add_action('plugins_loaded', function() {

    // Bail if Rank Math isn't active
    if ( ! ( defined( 'RANK_MATH_VERSION' ) || function_exists( 'rank_math' ) || class_exists( 'RankMath' ) ) ) {
        return;
    }

    $custom_taxonomies = array(
        'career-category',
        'project-category',
        'service-category',
    );

    // add taxonomies to Rank Math lists
    add_filter( 'rank_math/sitemap/taxonomies', function( $taxonomies ) use ( $custom_taxonomies ) {
        return array_merge( (array) $taxonomies, $custom_taxonomies );
    }, 20 );

    add_filter( 'rank_math/metabox/taxonomies', function( $taxonomies ) use ( $custom_taxonomies ) {
        return array_merge( (array) $taxonomies, $custom_taxonomies );
    }, 20 );

    // ensure metabox appears on each taxonomy term editor
    foreach ( $custom_taxonomies as $taxonomy ) {
        add_filter( "rank_math/metabox/taxonomy/{$taxonomy}", '__return_true' );
    }

    // optional: ensure taxonomy included in sitemap
    add_filter( 'rank_math/sitemap/include_taxonomy', function( $include, $taxonomy ) use ( $custom_taxonomies ) {
        if ( in_array( $taxonomy, $custom_taxonomies, true ) ) {
            return true;
        }
        return $include;
    }, 20, 2 );
});

/**
 * Insert custom taxonomy term into Rank Math breadcrumbs for single CPTs.
 */
add_filter( 'rank_math/frontend/breadcrumb/items', function( $crumbs, $class ) {

    if ( ! is_singular() ) {
        return $crumbs;
    }

    // Map CPT => taxonomy
    $map = array(
        'career'  => 'career-category',
        'project' => 'project-category',
        'service' => 'service-category',
    );

    $post = get_queried_object();
    if ( ! $post || ! isset( $post->post_type ) ) {
        return $crumbs;
    }

    $post_type = $post->post_type;
    if ( empty( $map[ $post_type ] ) ) {
        return $crumbs;
    }

    $taxonomy = $map[ $post_type ];

    // Get terms assigned to the post for that taxonomy
    $terms = wp_get_post_terms( $post->ID, $taxonomy );

    if ( empty( $terms ) || is_wp_error( $terms ) ) {
        return $crumbs;
    }

    // Choose a term — currently: first in the returned array.
    // If you need a different selection strategy (primary term), replace this block.
    $term = $terms[0];

    // Build breadcrumb item: [ label, url ]
    $term_item = array( $term->name, get_term_link( $term ) );

    // Avoid duplicates: check if already present
    foreach ( $crumbs as $c ) {
        if ( isset( $c[1] ) && untrailingslashit( $c[1] ) === untrailingslashit( $term_item[1] ) ) {
            // term already in crumbs
            return $crumbs;
        }
    }

    // Insert before last item (which is usually the post title)
    $insert_at = max( 0, count( $crumbs ) - 1 );
    array_splice( $crumbs, $insert_at, 0, array( $term_item ) );

    // Re-index to keep numeric keys continuous
    $crumbs = array_values( $crumbs );

    return $crumbs;
}, 15, 2 );

// Register Member Custom Post Type
function create_member_post_type() {
    $labels = array(
        'name'                  => 'Members',
        'singular_name'         => 'Member',
        'menu_name'             => 'Members',
        'name_admin_bar'        => 'Member',
        'archives'              => 'Member Archives',
        'attributes'            => 'Member Attributes',
        'parent_item_colon'     => 'Parent Member:',
        'all_items'             => 'All Members',
        'add_new_item'          => 'Add New Member',
        'add_new'               => 'Add New',
        'new_item'              => 'New Member',
        'edit_item'             => 'Edit Member',
        'update_item'           => 'Update Member',
        'view_item'             => 'View Member',
        'view_items'            => 'View Members',
        'search_items'          => 'Search Member',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Avatar',
        'set_featured_image'    => 'Set avatar',
        'remove_featured_image' => 'Remove avatar',
        'use_featured_image'    => 'Use as avatar',
        'insert_into_item'      => 'Insert into member',
        'uploaded_to_this_item' => 'Uploaded to this member',
        'items_list'            => 'Members list',
        'items_list_navigation' => 'Members list navigation',
        'filter_items_list'     => 'Filter members list',
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'member'),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-groups',
    );

    register_post_type('member', $args);
}
add_action('init', 'create_member_post_type');
