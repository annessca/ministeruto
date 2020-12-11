<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

<!-- bradcam_area_start -->
<div class="bradcam_area utoflat_bg">
    <h3>Blog</h3>
</div>
<!-- bradcam_area_end -->

<!-- News -->

<div class="news">
    <div class="container">
        <div class="row">
            
            <!-- News Column -->

            <div class="col-lg-12">
                <div class="news_posts">
                    <?php
                    $how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));
                    if($how_many_last_posts > 200 || $how_many_last_posts < 2) $how_many_last_posts = 15;
                    $my_query = new WP_Query('post_type=post&nopaging=1');
                        if($my_query->have_posts()) {
                            $counter = 1;
                            while($my_query->have_posts() && $counter <= $how_many_last_posts) {
                                $my_query->the_post(); 
                                ?>                            
                                    <!-- News Post -->
                                    <div class="news_post">
                                        <?php if ( has_post_thumbnail() ) { ?>            
                                        <div class="news_post_image">
                                            <?php the_post_thumbnail('full');?>
                                        </div>
                                        <?php } ?>
                                        <div class="news_post_top d-flex flex-column flex-sm-row">
                                            <div class="news_post_date_container">
                                                <div class="news_post_date d-flex flex-column align-items-center justify-content-center">
                                                    <div><?php the_time('M j') ?></div>
                                                    <div><?php the_time('Y') ?></div>
                                                </div>
                                            </div>
                                            <div class="news_post_title_container">
                                                <div class="news_post_title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </div>
                                                <div class="news_post_meta">
                                                    <span class="news_post_author"><a href="#">By <?php the_author(); ?> |</span>
                                                    <a class="news_post_comments" href="<?php comments_link(); ?>">
                                                        <?php
                                                        printf(
                                                            _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( get_comments_number() ) ); 
                                                        ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="news_post_text">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <div class="news_post_button text-center trans_200">
                                            <a href="<?php the_permalink(); ?>">Read More</a>
                                        </div>
                                    </div>                    
                                <?php
                                $counter++;
                            }
                            //echo '</ol></div>';
                            wp_reset_postdata();
                        }
                    ?>
                </div>
                <!-- Page Nav -->
                
                <div class="bottom-line">&nbsp;</div>
                <!--div class="news_page_nav">
                    <ul>
                        <li class="active text-center trans_200"><a href="#">Prev</a></li>
                        <li class="text-center trans_200"><a href="#">Next</a></li>
                    </ul>
                </div-->
                <div class="bottom-line">&nbsp;</div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>