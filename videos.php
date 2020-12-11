<?php /* Template Name: Videos */ ?>

<?php get_header(); ?>

<!-- bradcam_area_start -->
<div class="bradcam_area utoflat_bg">
    <h3>Music and Event Videos</h3>
</div>
<!-- bradcam_area_end -->


<!-- videos_area_start -->
<div class="best_bodys_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <br><br>
                <div class="section_title mb-70 text-center">
                    <h3><span>Videos</span></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- youtube_video_area  -->
    <div class="youtube_video_area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
            <?php
                $how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));
                if($how_many_last_posts > 200 || $how_many_last_posts < 2) $how_many_last_posts = 15;
                $my_query = new WP_Query('post_type=music-video&nopaging=1');
                if($my_query->have_posts()) {
                    $counter = 1;
                    while($my_query->have_posts() && $counter <= $how_many_last_posts) {
                        $my_query->the_post(); 
                        ?>  
                            <div class="col-xl-3 col-lg-3 col-md-6">
                            <?php 
                                $youtube = get_post_meta( get_the_ID(), 'youtube-video-link', true); 
                                $albumevent = get_post_meta( get_the_ID(), 'album-event-name', true); 
                                $year = get_post_meta( get_the_ID(), 'year-of-release', true); 
                                if( ! empty( $youtube ) ) { ?>
                                    <div class="single_video">
                                        <div class="thumb">
                                            <?php the_post_thumbnail( 'medium' ) ?>
                                        </div>
                                        <div class="hover_elements">
                                            <div class="video">
                                                <a class="play-btn" href="<?php echo $youtube; ?>">
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
                            <?php
                            $counter++;
                        }
                        wp_reset_postdata();
                    }
                ?>
            </div>
        </div>  
    </div>
    <div class="bottom-line">&nbsp;</div>
</div>
<!-- video_area_end -->

<?php get_footer(); ?>