<?php
get_header();
?>

<main>
    <section class="global-breadcrumb">
        <div class="container">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
    </section>

    <?php while (have_posts()): the_post(); 
        $career_image = get_field('career_image');
        $information = get_field('career_information');
        $job_descriptions = get_field('career_job_descriptions');
        $application_file = get_field('career_application_file');

        $position = $information['position'] ?? get_the_title();
        $level = $information['level'] ?? '';
        $degree = $information['degree'] ?? '';
        $salary = $information['salary'] ?? '';
        $quantity = $information['quantity'] ?? '';
        $location = $information['location'] ?? '';
        $deadline = $information['application_deadline'] ?? '';
    ?>
        <section class="recruit-detail section-py">
            <div class="container">
                <div class="grid grid-cols-12 gap-10">
                    <div class="col-span-12 lg:col-span-9">
                        <div class="info-wrap block lg:p-10 bg-Utility-gray-50 p-6 mb-10">
                            <h2 class="heading-1 mb-6 lg:mb-10 text-Primary-1"><?php the_title(); ?></h2>
                            <div class="row">
                                <div class="col w-full rem:max-w-[360px]">
                                    <div class="img zoom-in overflow-hidden">
                                        <a class="img-ratio ratio:pt-[300_360]">
                                            <?php if ($career_image): ?>
                                                <img class="lozad" data-src="<?php echo esc_url($career_image['url']); ?>" alt="<?php echo esc_attr($career_image['alt']); ?>" />
                                            <?php elseif (has_post_thumbnail()): ?>
                                                <img class="lozad" data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                            <?php else: ?>
                                                <img class="lozad" data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/1.jpg" alt="" />
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="col w-full">
                                    <div class="table-wrap">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td><?php _e('Positions', 'canhcamtheme'); ?></td>
                                                    <td><?php echo esc_html($position); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php _e('Level', 'canhcamtheme'); ?></td>
                                                    <td><?php echo esc_html($level); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php _e('Qualification', 'canhcamtheme'); ?></td>
                                                    <td><?php echo esc_html($degree); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php _e('Salary', 'canhcamtheme'); ?></td>
                                                    <td><?php echo esc_html($salary); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php _e('Quantity', 'canhcamtheme'); ?></td>
                                                    <td><?php echo esc_html($quantity); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php _e('Location', 'canhcamtheme'); ?></td>
                                                    <td><?php echo esc_html($location); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php _e('Application deadline', 'canhcamtheme'); ?></td>
                                                    <td><?php echo esc_html($deadline ? date('d/m/Y', strtotime($deadline)) : ''); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php if ($job_descriptions): ?>
                            <?php foreach ($job_descriptions as $jd): ?>
                                <div class="block-wrap bg-Utility-gray-50 p-6 lg:p-10 mb-10 last:mb-0">
                                    <h3 class="heading-3 mb-5 text-Primary-1"><?php echo esc_html($jd['title']); ?></h3>
                                    <div class="format-content">
                                        <?php echo wp_kses_post($jd['content']); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-span-12 lg:col-span-3">
                        <div class="btn-group p-6 w-full mb-10 bg-Utility-gray-50">
                            <a class="btn w-full btn-primary style-default mb-3" href="#recruit-modal" data-fancybox>
                                <span><?php _e('Apply now', 'canhcamtheme'); ?></span>
                                <em class="fa-regular fa-plus"></em>
                            </a>
                            <?php if ($application_file): ?>
                                <a class="btn w-full btn-primary white" href="<?php echo esc_url($application_file); ?>" download target="_blank">
                                    <span><?php _e('Download CV', 'canhcamtheme'); ?></span>
                                    <em class="fa-regular fa-file-download"></em>
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <?php 
                        // Query related careers
                        $related_args = array(
                            'post_type'      => 'career',
                            'posts_per_page' => 4,
                            'post__not_in'   => array(get_the_ID()),
                            'orderby'        => 'rand' // or standard fallback
                        );
                        $related_careers = new WP_Query($related_args);
                        
                        if ($related_careers->have_posts()):
                        ?>
                            <div class="other-recruit">
                                <div class="tilte-wrap bg-Primary-1 p-5">
                                    <h3 class="heading-3 text-white"><?php _e('Other positions', 'canhcamtheme'); ?></h3>
                                </div>
                                <div class="wrap bg-grey-50">
                                    <?php while ($related_careers->have_posts()): $related_careers->the_post(); 
                                        $rel_info = get_field('career_information');
                                        $rel_position = $rel_info['position'] ?? get_the_title();
                                        $rel_deadline = $rel_info['application_deadline'] ?? '';
                                    ?>
                                        <div class="recruit-item group border-b overflow-hidden p-6">
                                            <div class="txt col-hor">
                                                <h3 class="mb-3 text-base font-normal">
                                                    <a href="<?php the_permalink(); ?>" class="group-hover:underline"><?php echo esc_html($rel_position); ?></a>
                                                </h3>
                                                <div class="timeline text-lg text-grey-500">
                                                    <em class="fa-regular fa-calendar-star"></em>
                                                    <span><?php _e('Application deadline:', 'canhcamtheme'); ?></span>
                                                    <strong class="inline-block text-primary-1"><?php echo $rel_deadline ? date('d/m/Y', strtotime($rel_deadline)) : ''; ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="popup-modal recruit-modal hidden" id="recruit-modal">
            <div class="popup-modal-wrap">
                <h2 class="form-title text-center text-primary-1 font-bold"><?php echo esc_html(get_the_title()); ?></h2>
                <div class="desc my-4 text-center body-1"><?php _e('Please fill out the form below to apply. We will contact you as soon as possible.', 'canhcamtheme'); ?></div>
                
                <?php 
                    $career_shortcode_form = get_field('career_shortcode_form', 'option');
                    if($career_shortcode_form){
                        echo do_shortcode($career_shortcode_form);
                    }
                ?>
               
            </div>
        </div>
    <?php endwhile; ?>

   
</main>

<?php get_footer(); ?>