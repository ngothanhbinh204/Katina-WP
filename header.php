<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&amp;display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
    <?php echo get_field('field_config_head', 'options'); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header class="header">
        <div class="header-container xl:px-20 px-4">
            <div class="header-wrapper">
                <div class="header-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"> 
                        <?php 
                        $header_logo = get_field('header_logo', 'option');
                        if ($header_logo): ?>
                            <img class="lozad" data-src="<?php echo esc_url($header_logo['url']); ?>" alt="<?php echo esc_attr($header_logo['alt']); ?>" />
                        <?php else: ?>
                            <img class="lozad" data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo.png" alt="Logo" />
                        <?php endif; ?>
                    </a>
                </div>
                <div class="header-right">
                    <div class="header-right-inner">
                        <div class="header-language">
                            <?php do_action('wpml_add_language_selector'); ?>
                        </div>
                        <div class="header-search">
                            <i class="fa-regular fa-magnifying-glass"></i>
                        </div>
                        <div class="header-bar"><i class="fa-light fa-bars"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="nav-mobile fixed top-header right-0 w-full z-[200]">
        <div class="nav-main grid grid-cols-[calc(84/800*100%)_1fr] pl-5 h-full py-5 xl:rem:gap-[54px] gap-base">
            <div class="wrap-title flex flex-col items-center justify-between">
                <div class="item">PARTNER</div>
                <div class="item">CAPITAL</div>
                <div class="item">KATINA</div>
            </div>
            <div class="nav-wrapper h-full flex flex-col relative flex-1 overflow-hidden xl:pr-20 pr-10">
                <div class="close-nav"> <i class="fa-light fa-xmark"></i></div>
                <div class="nav-wrapper-inner overflow-auto overflow-x-hidden flex flex-col justify-between">
                    <nav>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'container'      => false,
                            'menu_class'     => '',
                            'fallback_cb'    => false,
                        ));
                        ?>
                    </nav>
                </div>
                
                <div class="nav-contact flex flex-col gap-2">
                    <?php if (have_rows('contact_info', 'option')): ?>
                        <?php while (have_rows('contact_info', 'option')): the_row(); 
                            $label = get_sub_field('label');
                            $content = get_sub_field('content');
                        ?>
                        <div class="item">
                            <?php if ($label): ?><label for=""><?php echo esc_html($label); ?></label><?php endif; ?>
                            <div class="content"><?php echo wp_kses_post($content); ?></div>
                        </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="header-search-form">
        <div class="close flex items-center justify-center absolute top-0 right-0 bg-white text-3xl cursor-pointer w-12.5 h-12.5">
            <i class="fa-light fa-xmark"></i>
        </div>
        <div class="container">
            <div class="wrap-form-search-product">
                <form class="productsearchbox" action="<?php echo esc_url(home_url('/')); ?>" method="GET">
                    <input type="text" name="s" placeholder="<?php esc_attr_e('Tìm kiếm thông tin', 'canhcamtheme'); ?>" value="<?php echo get_search_query(); ?>">
                    <button type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </div>

    <main>