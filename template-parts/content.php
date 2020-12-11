<div class="col-lg-4">
    <div class="single-profile text-center mb-60">
        <div class="top-caption">
            <span><?php echo get_the_date(); ?></span>
            <p><em>Written by &nbsp;</em><?php the_author(); ?></p>
        </div>
        <?php if ( has_post_thumbnail()) { ?>
            <div class="profile-img">
                <?php the_post_thumbnail('medium'); ?>
                <div class="bottom-caption">
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <div class="quote-wrapper">
                        <p><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></p>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="bottom-caption">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <p><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></p>
            </div>  
        <?php } ?>
    </div> 
</div> 