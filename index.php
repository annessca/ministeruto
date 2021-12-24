<?php get_header(); ?>

<!-- slider_area_start -->

<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-9 col-md-9 col-md-12">
                        <div class="slider_text text-center">
                            <div class="deal_text">
                                <span>&nbsp;</span>
                            </div>
                            <h3>&nbsp;<br>&nbsp;</h3>
                            <h4>&nbsp;</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-9 col-md-9 col-md-12">
                        <div class="slider_text text-center">
                            <div class="deal_text">
                                <span>&nbsp;</span>
                            </div>
                            <h3>&nbsp;<br>&nbsp;</h3>
                            <h4>&nbsp;</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- slider_area_end -->

<!-- about_area_start -->

<div class="about_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="about_thumb2">
                    <div class="img_1">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/about.png" alt="Website Logo"/>
                    </div> 
                </div>
            </div>

            <div class="col-xl-5 col-lg-5 offset-lg-1 col-md-6">
                <div class="about_info">
                    <div class="section_title mb-20px">
                        <span><?php echo get_bloginfo( 'name' ); ?></span>
                        <h4><?php echo get_bloginfo( 'description' ); ?></h4>
                    </div>
                    <p>Uto Essien's music ministry is targeted at building a true alter of worship to God.</p>
                    <p>She is a pastor and a law professional.</p>
                    <div class="img_thumb">
                        <a href="https://utoessienofficial.com/profile/">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/uto-essien-signature.png" alt="Uto Essien's signature"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- about_area_end -->

<div class="best_bodys_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-60">
                    <br>
                    <span>The Ministry in Videos</span>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row d-flex">
            <?php
            $args =  array(
                'post_type' => 'music-video',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 1
            );
            $custom_query = new WP_Query( $args );
            while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                <div class="col-md-3 mb-5 heading-section">
                    <h2 class="mb-4">Recent Video</h2>
                    <p class="mb3"><?php echo get_the_excerpt(); ?></p>
                    <p class="btn-view"><a href="https://utoessienofficial.com/videos/">More videos</a></p>
                </div>

                <div class="col-md-9 d-flex">
                    <div class="youtube_video_area">
                        <div class="p-0">
                            <div class="row no-gutters">
                                <?php 
                                $youtube = get_post_meta( get_the_ID(), 'youtube-video-link', true); 
                                $albumevent = get_post_meta( get_the_ID(), 'album-event-name', true); 
                                $year = get_post_meta( get_the_ID(), 'year-of-release', true); 
                                if( ! empty( $youtube ) ) { ?>
                                    <div class="single_video">
                                        <?php if ( has_post_thumbnail() ) { ?>  
                                            <div class="thumb">
                                                <?php the_post_thumbnail( 'full' ); ?>                                              
                                            </div>
                                        <?php } ?>
                                        <div class="hover_elements">
                                            <div class="video">
                                                <a class="lightbox play-btn" rel="lightbox" href="<?php echo $youtube; ?>">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div>
                                            <div class="hover_inner">
                                                <span class="text-white"><?php echo $albumevent; ?> - <?php echo $year; ?></span>
                                                <h3><a><?php the_title(); ?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
            endwhile;
            wp_reset_postdata();
            ?>
            </div>
        </div>
    </section>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="section_title text-center mb-lone">
                <span>The next event: coming soon!</span>
            </div>
        </div>
    </div>
</div>

<!-- Event Home Start -->

<div class="event-area event-padding overlay overlay-bg">
    <div class="container">
        <div class="row">
            <div class=" offset-lg-1 col-12">
            <?php
            $args =  array(
                'post_type' => 'announce-event',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 1
            );
            $custom_query = new WP_Query( $args );
            while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                <div class="event-caption text-white">
                    <h2 class="text-white"><?php the_title(); ?></h2>
                    <p class="text-white"><?php echo get_the_excerpt(); ?></p>
                    <div class="countdown">
                        <div id="timer" class="text-white"></div>
                    </div>
                    <?php 
                        $field1 = get_post_meta( get_the_ID(), 'datetime', true);
                        $field2 = get_post_meta( get_the_ID(), 'address', true);
                        if( ! empty( $field1 ) ) { ?>
                            <h4 class="text-white"><i class="fa fa-calendar"></i><span>&nbsp;&nbsp;&nbsp;</span><?php echo $field1; ?></h4>
                            <h4 class="text-white"><i class="fa fa-map"></i><span>&nbsp;&nbsp;&nbsp;</span><?php echo $field2; ?></h4>
                            <h4 class="text-white"><i class="fa fa-envelope"></i><span>&nbsp;&nbsp;&nbsp;</span>utopreciouse@gmail.com</h4>
                            <button id="myImg" class="btn">Event Details</button>
                        <?php } ?>                        
                </div>
                <!-- The Modal -->

                <div id="myModal" class="modal">
                <!--div class="close">X</div-->
                    <div class='alltogether'>
                        <?php the_post_thumbnail( 'full', [ 'alt' => esc_html ( get_the_title() ), 'class' => 'modal-content' ] ); ?>
                        <div id="caption" class="text-white"><?php the_title(); ?></div>
                    </div>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            ?>
            </div>
        </div>
    </div>
</div>
<!-- Event Home End -->   

<!-- video_area_start -->
<div class="video_area">
    <video class="video-fluid z-depth-1" autoplay loop controls muted>
        <source src="<?php echo get_template_directory_uri() ?>/assets/img/video/thevideo.mp4" type="video/mp4" />
    </video>
</div>
<!-- video_area_end -->

<!-- Profile of artiste start-->
<div class="article-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-80">
                    <span>Recent Articles</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', get_post_format() );
            endwhile; endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<!-- Profile of artiste end-->

<!-- cover_photo_gallery_start -->
<div class="gallery_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-5 text-center">
                    <br><br><br>
                    <span>The ministry in pictures</span>
                </div>
            </div>
        </div>
    </div>
    <?php
        $args =  array(
            'post_type' => 'cover',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 4
        );
        $custom_query = new WP_Query( $args );
        while ($custom_query->have_posts()) : $custom_query->the_post();
        ?>
        <div class="single_gallery partial_img">
            <?php
                $galleryImage = get_post_meta( get_the_ID(), 'galleryImage', true); 
            ?>
            <a class="prettyPhoto" data-rel="prettyPhoto" href="<?php the_post_thumbnail_url() ; ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail( 'thumbnail' )?>
            </a>
            <?php the_post_thumbnail( 'full' )?>
        </div>
    <?php endwhile; wp_reset_postdata();?>
</div>
<!-- cover_photo_gallery_end -->

<!-- music_area  -->
<div class="music_area music_gallery">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-65">
                    <span>New Music: Audio Download</span>
                </div>
            </div>
        </div>
        <?php

            $args =  array(
                'post_type' => 'audio-track',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 1
            );
            $custom_query = new WP_Query( $args );
            while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                    <div class="row align-items-center justify-content-center mb-20">
                        <div class="col-xl-10">
                            <div class="row align-items-center">
                                <div class="col-xl-9 col-md-9">
                                    <div class="music_field">
                                        <div class="thumb">
                                            <?php if ( has_post_thumbnail()) { ?>
                                                <?php the_post_thumbnail( 'medium' )?>
                                            <?php } else { ?>
                                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/audiogirl.jpg" alt="">
                                            <?php } ?>
                                        </div>
                                        <div class="audio_name">
                                            <div class="name">
                                                <h4><?php the_title(); ?></h4>
                                                <p><?php the_date(); ?></p>
                                            </div>
                                            <audio preload="auto" controls>
                                                <?php
                                                    $audiolink = get_post_meta( get_the_ID(), 'audiolink', true);
                                                    if( ! empty( $audiolink ) ) {
                                                ?>
                                                    <source src="<?php echo $audiolink; ?>">
                                                <?php } ?>
                                            </audio>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3">
                                    <div class="music_btn">
                                        <a href="https://utoessienofficial.com/audio/"><button class="learn-more">More Music</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
            <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>

<!-- music_area end  -->

<?php get_footer(); ?>