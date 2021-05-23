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
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $custom_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 2,
                        'paged' => $paged
                    );
                    $custom_query = new WP_Query( $custom_args );
                    if( $custom_query->have_posts() ) : 
                        while( $custom_query->have_posts() ) : 
                            $custom_query->the_post(); ?>                            
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
                                                ?> |
                                            </a>
                                            <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
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
                        endwhile;  
                    endif; 
                    wp_reset_postdata();              
                    // Add Pagination
                    if (function_exists('custom_pagination')) {
                        custom_pagination($custom_query->max_num_pages,"",$paged);
                    }
                        ?>
                </div>
                <!-- Page Nav -->
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>