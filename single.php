<?php get_header(); 
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content-single', get_post_format() );
	endwhile; endif;
	?>
 <?php get_footer(); ?>