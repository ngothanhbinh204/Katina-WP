<?php
/**
 * Template Part: Home About Section
 */
$title = get_field('about_title');
$subtitle = get_field('about_subtitle');
$content = get_field('about_content');
$button = get_field('about_button');
$image = get_field('about_image');
?>
<section class="home-2 home-item-animation section-py">
    <div class="container-fluid">
        <div class="wrapper-main grid lg:grid-cols-[calc(780/1620*100%)_1fr] grid-cols-1 xl:gap-base gap-4">
            <div class="col-left xl:py-16 py-10">
                <?php if ($title): ?>
                    <h2 class="block-title title heading-1 font-bold"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                
                <?php if ($subtitle): ?>
                    <div class="sub-title heading-3 font-semibold mt-5 mb-base text-Primary-1-Subtitle" animate-title="fade-up">
                        <?php echo wp_kses_post($subtitle); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($content): ?>
                    <div class="format-content body-1 font-light mb-base space-y-8" data-aos="fade-right" data-aos-delay="200" data-aos-duration="700">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($button): ?>
                    <div class="wrap-btn" data-aos="fade-right" data-aos-delay="400" data-aos-duration="700">
                        <a class="btn btn-primary style-default" href="<?php echo esc_url($button['url']); ?>" target="<?php echo esc_attr($button['target']); ?>">
                            <span><?php echo esc_html($button['title']); ?></span>
                            <div class="icon"> </div>
                        </a>
                    </div>
                <?php endif; ?>
                
                <?php if (have_rows('about_stats')): ?>
                    <div class="wrap-list flex flex-wrap gap-5 xl:mt-16 mt-base">
                        <?php while (have_rows('about_stats')): the_row(); 
                            $prefix = get_sub_field('prefix');
                            $num = get_sub_field('number');
                            $suffix = get_sub_field('suffix');
                            $s_title = get_sub_field('title');
                        ?>
                            <div class="item">
                                <div class="number countup flex" data-number="<?php echo esc_attr($num); ?>"> 
                                    <?php if ($prefix): ?> <span class="prefix"><?php echo esc_html($prefix); ?></span><?php endif; ?>
                                    <span class="count-value"></span>
                                    <?php if ($suffix): ?> <span class="suffix"><?php echo esc_html($suffix); ?></span><?php endif; ?>
                                </div>
                                <div class="title body-1 font-normal"><?php echo esc_html($s_title); ?></div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-right" data-aos="fade-left" data-aos-delay="600" data-aos-duration="700">
                <?php if ($image): ?>
                    <div class="img"> 
                        <a class="img-ratio ratio:pt-[774_798]" href="#"> 
                            <img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
