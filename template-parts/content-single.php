<div class="bradcam_area utoflat_bg">
    <h3><?php the_title(); ?></h3>
</div>
<!-- bradcam_area_end -->

<!-- News -->

<div class="news">
    <div class="container">
        <div class="row">
            <!-- News Post Column -->
            <div class="col-lg-8">
                
                <div class="news_post_container">
                    <!-- News Post -->
                    <div>
                        <div class="news_post_image">
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            } ?>
                        </div>
                        <div class="news_post_top d-flex flex-column flex-sm-row">
                            <div class="news_post_date_container">
                                <div class="news_post_date d-flex flex-column align-items-center justify-content-center">
                                    <div><?php the_time('M j') ?></div>
                                    <div><?php the_time('Y') ?></div>
                                </div>
                            </div>
                            <div class="news_post_title_container">
                                <div class="news_post_title">
                                    <a href="news_post.html"><?php the_title(); ?></a>
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
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                    if ( comments_open() || get_comments_number() ) :
			            comments_template();
                    endif;
                    ?>
                </div>
            </div> 
            <?php get_sidebar() ?>
        </div>
    </div>
</div>