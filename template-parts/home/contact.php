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
                } else {
                    // Fallback static HTML form for visual representation during development phase
                ?>
                    <form action="">
                        <div class="wrap-form grid grid-cols-1 gap-5 text-Primary-1">
                            <div class="form-group">
                                <div class="label">Name*</div>
                                <input type="text" name="name" placeholder="Họ và tên">
                            </div>
                            <div class="form-group">
                                <div class="label">Title*</div>
                                <select name="service" id="service">
                                    <option value="1">Dịch vụ 1</option>
                                    <option value="2">Dịch vụ 2</option>
                                    <option value="3">Dịch vụ 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="label">Mobile*</div>
                                <input type="text" name="mobile" placeholder="Số điện thoại">
                            </div>
                            <div class="form-group">
                                <div class="label">Email*</div>
                                <input type="text" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <div class="label">Subject*</div>
                                <select name="subject" id="subject">
                                    <option value="1">Subject 1</option>
                                    <option value="2">Subject 2</option>
                                    <option value="3">Subject 3</option>
                                </select>
                            </div>
                            <div class="form-group textarea w-full col-span-full">
                                <div class="label">Message*</div>
                                <textarea name="message" placeholder="Nội dung"></textarea>
                            </div>
                        </div>
                        <div class="form-submit mt-5">
                            <button class="btn btn-primary style-default"> <span>Send</span>
                                <div class="icon"> </div>
                            </button>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
