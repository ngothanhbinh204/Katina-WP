<?php
/**
 * Template Part: Home Media Section
 */
$title = get_field('media_title');
?>
<section class="home-6 section-py !pt-0" tab-wrapper="parent" tab-mode="mouseenter">
    <div class="container-fluid">
        <div class="wrap-tabslet" data-toggle="tabslet">
            <div class="wrap-heading flex md:flex-row gap-base flex-col items-center justify-between">
                <h2 class="heading-1 block-title font-bold text-Primary-1">
                    <?php echo esc_html($title ? $title : 'Media'); ?>
                </h2>
                <ul class="tabslet-tab nav-primary">
                    <li class="active"><a href="#tab1">All news</a></li>
                    <li><a href="#tab2">News</a></li>
                    <li><a href="#">Insights</a></li>
                    <li><a href="#">Thought Leadership</a></li>
                </ul>
            </div>
            
            <div class="tabslet-content active" id="tab1">
                <div class="wrapper-main" data-media-list>
                    <?php
                    // Displaying placeholder data based on static HTML for phase 1. 
                    // To be replaced with WP_Query for posts in next phase.
                    for ($i = 1; $i <= 4; $i++): 
                    ?>
                        <div class="item media-item-wrapper grid lg:grid-cols-[calc(1240/1600*100%)_1fr] grid-cols-1 gap-base" tab-item="parent" tab-item-value="<?php echo $i; ?>">
                            <div class="wrap-content grid items-center xl:grid-cols-[calc(205/1240*100%)_1fr] grid-cols-1 xl:rem:gap-[115px]">
                                <div class="month">Feb.06</div>
                                <div class="infos">
                                    <h3 class="title heading-3 font-semibold mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h3>
                                    <div class="format-content body-1 font-light text-Utility-gray-600 mb-5">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                    </div>
                                    <div class="icon text-xl"><i class="fa-solid fa-plus"></i></div>
                                </div>
                            </div>
                            <div class="wrap-image"> 
                                <a class="img-ratio rounded-2 ratio:pt-[240_320]" href="#" tab-content="parent" tab-content-value="<?php echo $i; ?>"> 
                                    <img class="lozad" data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/1.jpg" alt="" />
                                </a>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="button-more rem:mt-[31px] xl:rem:ml-[320px]" data-load-more-media>
                    <button class="btn btn-primary style-default"><span>Show More</span>
                        <div class="icon"></div>
                    </button>
                </div>
            </div>
            
            <div class="tabslet-content" id="tab2">
                <div class="wrapper-main" data-media-list>
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                        <div class="item media-item-wrapper grid lg:grid-cols-[calc(1240/1600*100%)_1fr] grid-cols-1 gap-base" tab-item="parent" tab-item-value="<?php echo $i; ?>">
                            <div class="wrap-content grid items-center grid-cols-[calc(205/1240*100%)_1fr] xl:rem:gap-[115px]">
                                <div class="month">Feb.06</div>
                                <div class="infos">
                                    <h3 class="title heading-3 font-semibold mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h3>
                                    <div class="format-content body-1 font-light text-Utility-gray-600 mb-5">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                    </div>
                                    <div class="icon text-xl"><i class="fa-solid fa-plus"></i></div>
                                </div>
                            </div>
                            <div class="wrap-image"> 
                                <a class="img-ratio rounded-2 ratio:pt-[240_320]" href="#" tab-content="parent" tab-content-value="<?php echo $i; ?>"> 
                                    <img class="lozad" data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/1.jpg" alt="" />
                                </a>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="button-more rem:mt-[31px] xl:rem:ml-[320px]" data-load-more-media>
                    <button class="btn btn-primary style-default"><span>Show More</span>
                        <div class="icon"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
