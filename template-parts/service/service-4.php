<?php
/**
 * Template Part: Service Difference Section
 */
$title = get_field('sp_diff_title');
?>
<section class="service-4 xl:py-24 py-10 bg-Utility-gray-100">
    <div class="wrapper-container xl:rem:pr-[212px] xl:rem:pl-[160px] px-4">
        <?php if ($title): ?>
            <h2 class="heading-1 block-title font-bold text-Primary-1 mb-base"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        
        <?php if (have_rows('sp_diff_list')): ?>
            <div class="wrapper-list row justify-center spacing-48">
                <?php while (have_rows('sp_diff_list')): the_row(); 
                    $icon = get_sub_field('icon');
                    $content = get_sub_field('content');
                ?>
                    <div class="col-item col-md-4 col-12">
                        <div class="item">
                            <?php if ($icon): ?>
                                <div class="icon"><span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span></div>
                            <?php endif; ?>
                            
                            <?php if ($content): ?>
                                <div class="desc mt-5 body-2 font-normal">
                                    <?php echo wp_kses_post($content); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
