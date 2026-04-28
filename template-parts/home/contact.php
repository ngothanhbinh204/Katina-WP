<?php
/**
 * Template Part: Home Contact Section
 */
$decor = get_field('contact_decor');
$title = get_field('contact_title');
$desc = get_field('contact_desc');
$form_shortcode = get_field('contact_form_shortcode');
?>
<section class="home-7 section-py bg-Utility-gray-50">
    <div class="decor"> 
        <?php if ($decor): ?>
            <img class="lozad" data-src="<?php echo esc_url($decor['url']); ?>" alt="<?php echo esc_attr($decor['alt']); ?>" />
        <?php else: ?>
            <img class="lozad" data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/decor-form.png" alt="Decor" />
        <?php endif; ?>
    </div>
    <div class="container-fluid">
        <div class="wrapper-main grid lg:grid-cols-[calc(600/1600*100%)_1fr] grid-cols-1 xl:rem:gap-[160px] gap-base">
            <div class="col-left" data-aos="fade-right" data-aos-delay="200" data-aos-duration="700">
                <?php if ($title): ?>
                    <h2 class="heading-1 block-title font-bold text-Primary-1 mb-5"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                
                <?php if ($desc): ?>
                    <div class="format-content desc body-1 font-light">
                        <?php echo wp_kses_post($desc); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-right" data-aos="fade-left" data-aos-delay="400" data-aos-duration="700">
                <?php 
                if ($form_shortcode) {
                    echo do_shortcode($form_shortcode);
                } 
                ?>
            </div>
        </div>
    </div>
</section>
