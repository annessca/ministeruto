<?php /* Template Name: Events */ ?>

<?php get_header(); ?>

<!-- bradcam_area_start -->
<div class="bradcam_area utoblog_bg">
    <h3>Events: Past and Present</h3>
</div>
<!-- bradcam_area_end -->

<div class="segment_intro_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-80 text-center">
                    <br><br>
                    <h3><span>Events</span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="segment_intro_here">
    <?php
        $how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));
        if($how_many_last_posts > 200 || $how_many_last_posts < 2) $how_many_last_posts = 15;
        $my_query = new WP_Query('post_type=announce-event&nopaging=1');
        if($my_query->have_posts()) {
            $counter = 1;
            while($my_query->have_posts() && $counter <= $how_many_last_posts) {
                $my_query->the_post(); 
                ?>     
                <div class="single_segment_intro">
                    <div class="room_thumb">
                        <?php the_post_thumbnail( 'large' )?>
                        <div class="room_heading d-flex justify-content-between align-items-center">
                            <div class="room_heading_inner">
                                <h3><?php the_title(); ?></h3>
                            </div>                         
                        </div>
                    </div>
                </div>
                <?php
                $counter++;
            }
            wp_reset_postdata();
        }
    ?>
    </div>
</div>

<div class="bottom-line">&nbsp;</div>

<?php get_footer(); ?>