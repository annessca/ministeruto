<?php /* Template Name: Album */ ?>

<?php get_header(); ?>

<!-- bradcam_area_start -->
<div class="bradcam_area utoblog_bg">
    <h3>Album Cover and Tracks Art</h3>
</div>
<!-- bradcam_area_end -->

<!-- cover_photo_gallery_start -->
<div class="gallery_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-80 text-center">
                    <br><br>
                    <h3><span>Photos</span></h3>
                </div>
            </div>
        </div>
    </div>
    <?php
        $how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));
        if($how_many_last_posts > 200 || $how_many_last_posts < 2) $how_many_last_posts = 15;
        $my_query = new WP_Query('post_type=cover&nopaging=1');
        if($my_query->have_posts()) {
            $counter = 1;
            while($my_query->have_posts() && $counter <= $how_many_last_posts) {
                $my_query->the_post(); 
                ?>    
                <div class="single_gallery partial_img">
                    <a class="prettyPhoto" data-rel="prettyPhoto" href="<?php the_post_thumbnail_url() ; ?>" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail( 'thumbnail' )?>
                    </a>
                    <?php the_post_thumbnail( 'full' )?>
                </div>
                <?php
                $counter++;
            }
            wp_reset_postdata();
        }
    ?>
</div>

<div class="bottom-line">&nbsp;</div>

<?php get_footer(); ?>