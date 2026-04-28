<?php
/**
 * Template Name: Contact Page
 */
get_header();

// Fetch fields
$image = get_field('contact_banner_image');
$title = get_field('contact_banner_title');
$title = $title ? $title : get_the_title();
$subtitle = get_field('contact_banner_subtitle');

$form_title = get_field('contact_form_title');
$form_subtitle = get_field('contact_form_subtitle');
$form_shortcode = get_field('contact_form_shortcode');

$company_name = get_field('contact_company_name');
$info_list = get_field('contact_info_list');
$iframe = get_field('contact_iframe');
?>

<main>
    <?php
    get_template_part('modules/common/banner', null, array(
        'image' => $image,
        'title' => $title,
        'subtitle' => $subtitle
    ));
    ?>

    <section class="contact section-py">
        <div class="container">
            <div class="contact-main flex flex-col lg:flex-row xl:gap-20 gap-base">
                <div class="col-left lg:rem:w-[680px] w-full">
                    <?php if ($form_title): ?>
                        <div class="title heading-2 font-extrabold mb-2"><?php echo esc_html($form_title); ?></div>
                    <?php endif; ?>
                    
                    <?php if ($form_subtitle): ?>
                        <div class="sub-title mb-5"><?php echo nl2br(esc_html($form_subtitle)); ?></div>
                    <?php endif; ?>
                    
                    <div class="my-8">
                        <?php 
                        if ($form_shortcode) {
                            echo do_shortcode($form_shortcode);
                        } else {
                            // Fallback if no shortcode provided
                            echo '<p>' . __('Please configure Contact Form shortcode in WP Admin.', 'canhcamtheme') . '</p>';
                        }
                        ?>
                    </div>
                </div>
                
                <div class="col-right flex-1 lg:p-12 p-5 bg-Utility-50 w-full">
                    <?php if ($company_name): ?>
                        <h2 class="heading-2 text-Primary-2 font-extrabold mb-base uppercase"><?php echo esc_html($company_name); ?></h2>
                    <?php endif; ?>
                    
                    <?php if ($info_list): ?>
                        <div class="contact-box">
                            <div class="contact-list flex flex-col gap-5">
                                <?php foreach ($info_list as $item): 
                                    $icon_class = $item['icon_class'];
                                    $content = $item['content'];
                                ?>
                                    <div class="contact-item">
                                        <?php if ($icon_class): ?>
                                            <span class="text-xl text-Primary-2">
                                                <i class="<?php echo esc_attr($icon_class); ?>"></i>
                                            </span>
                                        <?php endif; ?>
                                        <div class="contact-wrap flex flex-col gap-2">
                                            <?php echo wp_kses_post($content); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <?php if ($iframe): ?>
                <div class="map-wrap mt-base lg:mt-20">
                    <div class="map">
                        <?php 
                        echo $iframe; 
                        ?>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>
    </section>
</main>

<?php get_footer(); ?>
