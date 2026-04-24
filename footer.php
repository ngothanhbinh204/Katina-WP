    </main>

    <footer class="footer xl:pt-15 xl:pb-20 py-10">
        <?php 
        $footer_bg = get_field('footer_bg', 'option');
        if ($footer_bg): ?>
            <div class="color"> <img src="<?php echo esc_url($footer_bg['url']); ?>" alt="<?php echo esc_attr($footer_bg['alt']); ?>"></div>
        <?php else: ?>
            <div class="color"> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/color-bg.png" alt=""></div>
        <?php endif; ?>
        
        <div class="container-fluid">
            <div class="footer-top">
                <div class="footer-wrapper grid lg:grid-cols-2 grid-cols-1 xl:rem:gap-[438px] gap-base">
                    <div class="col-left flex flex-col justify-between">
                        <div class="footer-logo"> 
                            <a class="img-ratio ratio:pt-[126_239]" href="<?php echo esc_url(home_url('/')); ?>"> 
                                <?php 
                                $footer_logo = get_field('footer_logo', 'option');
                                if ($footer_logo): ?>
                                    <img class="lozad" data-src="<?php echo esc_url($footer_logo['url']); ?>" alt="<?php echo esc_attr($footer_logo['alt']); ?>" />
                                <?php else: ?>
                                    <img class="lozad" data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo-footer.png" alt="Footer Logo" />
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="wrap-content">
                            <div class="footer-social">
                                <ul>
                                    <?php if (have_rows('social_media', 'option')): ?>
                                        <?php while (have_rows('social_media', 'option')): the_row(); 
                                            $icon = get_sub_field('icon');
                                            $title = get_sub_field('title');
                                            $link = get_sub_field('link');
                                        ?>
                                        <li> 
                                            <a href="<?php echo esc_url($link); ?>" target="_blank">
                                                <div class="icon"> <i class="<?php echo esc_attr($icon); ?>"></i></div>
                                                <?php if ($title): ?><span><?php echo esc_html($title); ?></span><?php endif; ?>
                                            </a>
                                        </li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="footer-bottom body-4">
                                <div class="text body-4 font-normal text-black/80 mb-4">
                                    <?php 
                                    $copyright = get_field('footer_copyright', 'option');
                                    if ($copyright) {
                                        echo wp_kses_post($copyright);
                                    } else {
                                        echo '© Katina Capital Partners. All Rights Reserved. Website designed by CanhCam.';
                                    }
                                    ?>
                                </div>
                                <ul>
                                    <?php if (have_rows('footer_bottom_links', 'option')): ?>
                                        <?php while (have_rows('footer_bottom_links', 'option')): the_row(); 
                                            $link = get_sub_field('link');
                                            if ($link):
                                        ?>
                                            <li><a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                                        <?php 
                                            endif;
                                        endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-right">
                        <div class="footer-menu">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu',
                                'container'      => false,
                                'menu_class'     => '',
                                'fallback_cb'    => false,
                            ));
                            ?>
                        </div>
                        <div class="nav-contact flex flex-col gap-2 body-1">
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
        </div>
        
        <div class="tool-fixed-cta">
            <div class="btn button-to-top">
                <div class="btn-icon">
                    <div class="icon"> </div>
                </div>
            </div>
            
            <?php 
            $fixed_phone_text = get_field('fixed_phone_text', 'option');
            if ($fixed_phone_text):
            ?>
            <div class="btn btn-content bg-Primary-1" href="">
                <div class="btn-icon">
                    <div class="icon"><i class="fa-light fa-phone"></i></div>
                </div>
                <div class="content">
                    <?php echo wp_kses_post($fixed_phone_text); ?>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if (have_rows('fixed_socials', 'option')): ?>
            <div class="btn btn-content btn-social">
                <div class="btn-icon">
                    <div class="icon"><i class="fa-light fa-messages"></i></div>
                </div>
                <div class="content">
                    <ul>
                        <?php while (have_rows('fixed_socials', 'option')): the_row(); 
                            $icon = get_sub_field('icon');
                            $link = get_sub_field('link');
                        ?>
                        <li> <a href="<?php echo esc_url($link); ?>" target="_blank"> <i class="<?php echo esc_attr($icon); ?>"></i></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </footer>

    <?php wp_footer(); ?>
    <?php echo get_field('field_config_body', 'options'); ?>
</body>
</html>