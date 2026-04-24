<?php
/**
 * Template Part: Overview Values Section
 */
$title = get_field('overview_values_title');
?>
<section class="overview-2 xl:pt-24 xl:rem:pb-[104px] py-10" tab-wrapper="parent" tab-mode="mouseenter">
    <div class="container-fluid"> 
        <?php if ($title): ?>
            <h2 class="title text-right heading-96 font-bold mb-12"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        
        <?php if (have_rows('overview_values_list')): ?>
            <div class="lists flex flex-col gap-base">
                <?php 
                $count = 1;
                while (have_rows('overview_values_list')): the_row(); 
                    $v_title = get_sub_field('title');
                    $content = get_sub_field('content');
                    $image = get_sub_field('image');
                ?>
                    <div class="item media-item-wrapper grid lg:grid-cols-[calc(718/1600*100%)_1fr] grid-cols-1 items-center cursor-pointer" tab-item="parent" tab-item-value="<?php echo $count; ?>">
                        <div class="wrap-content grid items-center grid-cols-[calc(80/718*100%)_1fr] gap-6">
                            <?php if ($count): ?>
                                <div class="number heading-banner font-bold uppercase text-Primary-1-Subtitle"><?php echo esc_html($count); ?></div>
                            <?php endif; ?>
                            
                            <div class="caption">
                                <?php if ($v_title): ?>
                                    <h3 class="title heading-3 font-semibold text-Primary-4-Subtitle"><?php echo esc_html($v_title); ?></h3>
                                <?php endif; ?>
                                
                                <div class="toggle-hidden">
                                    <div>
                                        <?php if ($content): ?>
                                            <div class="format-content body-1 font-light mt-5"> 
                                                <?php echo wp_kses_post($content); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-image xl:rem:pl-[230px]"> 
                            <?php if ($image): ?>
                                <a class="img-ratio ratio:pt-[118_650]" href="#"> 
                                    <img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php 
                $count++;
                endwhile; 
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>
