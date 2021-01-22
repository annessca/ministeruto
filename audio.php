<?php /* Template Name: Audio */ ?>



<?php get_header(); ?>



<!-- bradcam_area_start -->
<div class="bradcam_area utoflat_bg">
    <h3>Audio Downloadable Music</h3>
</div>
<!-- bradcam_area_end -->

<!-- music_area  -->

<div class="music_area music_gallery">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-65">
                    <span>Song Archives</span>
                </div>
            </div>
        </div>
        <?php
            $how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));
            if($how_many_last_posts > 200 || $how_many_last_posts < 2) $how_many_last_posts = 15;
            $my_query = new WP_Query('post_type=audio-track&nopaging=1');
            if($my_query->have_posts()) {
                $counter = 1;
                while($my_query->have_posts() && $counter <= $how_many_last_posts) {
                    $my_query->the_post(); 
                    ?>   
                    <div class="row align-items-center justify-content-center mb-20">
                        <div class="col-xl-10">
                            <div class="row align-items-center">
                                <div class="col-xl-9 col-md-9">
                                    <div class="music_field">
                                        <?php if ( has_post_thumbnail() ) { ?>    
                                            <div class="thumb">
                                                <?php the_post_thumbnail( 'medium' )?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="thumb">
                                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/audiogirl.jpg" alt="music staff">
                                            </div>
                                        <?php } ?>
                                        <div class="audio_name">
                                            <div class="name">
                                                <h4><?php the_title(); ?></h4>
                                                <p><?php echo get_the_date(); ?></p>
                                            </div>
                                            <audio preload="auto" controls>
                                                <?php
                                                $audiolink = get_post_meta( get_the_ID(), 'audiolink', true);
                                                if( ! empty( $audiolink ) ) { ?>
                                                    <source src="<?php echo $audiolink; ?>">
                                                <?php } ?>
                                            </audio>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3">
                                    <div class="music_btn">
                                        <a href="<?php the_permalink(); ?>" class="boxed-btn3" download>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php

                    $counter++;

                }

                wp_reset_postdata();

            }

        ?>

        

    </div>

</div>

<!-- music_area end  -->



<div class="bottom-line">&nbsp;</div>



<?php get_footer(); ?>

