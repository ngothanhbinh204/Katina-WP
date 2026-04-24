<?php
/**
 * Template Part: Service Stats Section
 */
?>
<section class="service-2 section-py">
    <div class="container-fluid">
        <?php if (have_rows('sp_stats_list')): ?>
            <div class="wrapper-list grid lg:grid-cols-4 grid-cols-2 xl:gap-16 gap-base">
                <?php while (have_rows('sp_stats_list')): the_row(); 
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
</section>
