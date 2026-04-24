<?php
/*
Template Name: Page Career
*/

get_header();

// Get fields from option
$highlight_text = get_field('career_highlight_text', 'option');
$we_title = get_field('career_work_environment_title', 'option');
$we_list = get_field('career_work_environment_list', 'option');
$training_title = get_field('career_training_title', 'option');
$training_list = get_field('career_training_list', 'option');
$list_title = get_field('career_list_title', 'option');
$list_subtitle = get_field('career_list_subtitle', 'option');
?>

<main>
    <?php get_template_part('modules/common/banner'); ?>

    <?php if ($highlight_text): ?>
        <section class="recruit-banner bg-Primary-1 relative overflow-hidden xl:py-15 py-10">
            <h2 class="heading-3 italic text-white text-center"><?php echo esc_html($highlight_text); ?></h2>
        </section>
    <?php endif; ?>

    <?php if ($we_list): ?>
        <section class="recruit-1 relative overflow-hidden">
            <?php foreach ($we_list as $index => $item): 
                $image = $item['image'];
                $content = $item['content'];
            ?>
                <div class="container-fluid bg-grey-50">
                    <div class="row">
                        <div class="col w-full lg:w-1/2">
                            <div class="img">
                                <a class="img-ratio ratio:pt-[610_960] zoom-img">
                                    <?php if ($image): ?>
                                        <img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                                </a>
                            </div>
                        </div>
                        <div class="col w-full lg:w-1/2">
                            <div class="txt px-4 flex flex-col justify-center xl:pl-20 rem:lg:max-w-[760px] rem:xl:max-w-[790px] rem:2xl:max-w-[700px] h-full col-left">
                                <h2 class="heading-1 mb-base text-Primary-1"><?php echo esc_html($we_title); ?></h2>
                                <div class="scrollbar-wrap">
                                    <div class="format-content space-y-4">
                                        <?php echo wp_kses_post($content); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php if ($training_list): ?>
        <section class="recruit-2 relative overflow-hidden section-py">
            <div class="container">
                <h2 class="title heading-36 font-extrabold mb-base text-Primary-1 text-center"><?php echo esc_html($training_title); ?></h2>
                <div class="swiper-column-auto relative auto-3-column swiper-loop autoplay">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($training_list as $item): 
                                $image = $item['image'];
                                $title = $item['title'];
                                $desc = $item['description'];
                            ?>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <div class="img img-ratio ratio:pt-[248_440] zoom-img">
                                            <?php if ($image): ?>
                                                <img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <?php else: ?>
                                                <img class="lozad" data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/1.jpg" alt=""/>
                                            <?php endif; ?>
                                        </div>
                                        <div class="content xl:py-10 xl:px-10 p-4 bg-Utility-gray-50 text-center">
                                            <div class="title heading-3 font-bold rem:mb-[26px] text-Primary-1"><?php echo esc_html($title); ?></div>
                                            <div class="desc line-clamp-3 rem:mb-[26px]">
                                                <p><?php echo nl2br(esc_html($desc)); ?></p>
                                            </div>
                                            <div class="wrap-btn"> 
                                                <a href="javascript:;"> 
                                                    <span><?php _e('Xem thêm', 'canhcamtheme'); ?></span>
                                                    <div class="icon"><i class="fa-light fa-angle-down"></i></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="recruit-list section-py bg-Utility-gray-50">
        <div class="container">
            <div class="wrap-heading text-center mb-base">
                <h2 class="heading-36 font-extrabold mb-3 text-Primary-1 text-center"><?php echo esc_html($list_title ?: __('Danh sách vị trí đang tuyển dụng', 'canhcamtheme')); ?></h2>
                <?php if ($list_subtitle): ?>
                    <div class="sub-title"><?php echo nl2br(esc_html($list_subtitle)); ?></div>
                <?php endif; ?>
            </div>
            <div class="filter-table-wrap">
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th><?php _e('STT', 'canhcamtheme'); ?></th>
                                <th><?php _e('VỊ TRÍ ỨNG TUYỂN', 'canhcamtheme'); ?></th>
                                <th><?php _e('KHU VỰC', 'canhcamtheme'); ?></th>
                                <th><?php _e('HẠN NỘP HỒ SƠ', 'canhcamtheme'); ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="career-list" data-per-page="10">
                            <?php
                            $args = array(
                                'post_type' => 'career',
                                'posts_per_page' => 10,
                                'post_status' => 'publish',
                                'paged' => 1
                            );
                            $query = new WP_Query($args);
                            $count = 1;
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    $information = get_field('career_information');
                                    $position = get_the_title();
                                    $location = $information['location'] ?? '';
                                    $deadline = $information['application_deadline'] ?? '';
                            ?>
                                <tr>
                                    <td data-attr="STT"><?php echo sprintf("%02d", $count); ?></td>
                                    <td data-attr="Vị trí"><a class="title" href="<?php the_permalink(); ?>"><?php echo esc_html($position); ?></a></td>
                                    <td data-attr="NƠI LÀM VIỆC"><?php echo esc_html($location); ?></td>
                                    <td data-attr="hạn nộp hồ sơ"><?php echo $deadline ? date('d/m/Y', strtotime($deadline)) : ''; ?></td>
                                    <td>
                                        <div class="flex-center btn-wrap"> 
                                            <a class="btn btn-tertiary" href="<?php the_permalink(); ?>">
                                                <em class="fa-light fa-eye"></em><span><?php _e('Xem chi tiết', 'canhcamtheme'); ?></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $count++;
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
                $total_posts = wp_count_posts('career')->publish;
                if ($total_posts > 10) :
                ?>
                    <div class="ajax-btn-wrap mx-auto w-fit pt-9" id="load-more-container">
                        <a class="btn btn-primary style-default btn-load-more" id="load-more-btn">
                            <span><?php _e('Xem thêm', 'canhcamtheme'); ?></span>
                            <em class="fa-regular fa-chevron-down"></em>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>