<?php
/**
 * Template Part: Home Partners Section
 */
$gallery = get_field('partners_gallery');
?>
<section class="home-5 section-py home-item-animation">
    <div class="slide">
        <div class="swiper-column-auto relative swiper-loop autoplay" data-time="0" data-speed="2000">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php if ($gallery): ?>
                        <?php foreach ($gallery as $img): ?>
                            <div class="swiper-slide">
                                <div class="item">
                                    <div class="img img-ratio ratio:pt-[96_192]">
                                        <img class="lozad" data-src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
