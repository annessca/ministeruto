<!-- Sidebar Column -->

<div class="col-lg-4">
	<div class="sidebar">

		<!-- Archives -->
		<div class="sidebar_section">
			<div class="sidebar_section_title">
				<h3>Categories</h3>
			</div>
			<ul class="sidebar_list">
				<?php 
				$categories = get_categories( array(
					'hide_empty' => 0,
					'number' => 8,
					'orderby' => 'id',
					'order' => 'DESC'
				) );
				foreach ( $categories as $category ) : ?>
					<li class="sidebar_list_item"><a href="<?php the_permalink() ?>"><?php echo $category->name; ?></a></li>
				<?php 
				endforeach; 
				?>
			</ul>
		</div>

		<!-- Latest Posts -->

		<div class="sidebar_section">
			<div class="sidebar_section_title">
				<h3>Latest posts</h3>
			</div>

			<div class="latest_posts">
			<?php
    			$how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));

    			/* Here, we're making sure that the number fetched is reasonable. In case it's higher than 200 or lower than 2, we're just resetting it to the default value of 15. */
    			if($how_many_last_posts > 200 || $how_many_last_posts < 2) $how_many_last_posts = 5;

				$my_query = new WP_Query('post_type=post&nopaging=1');
					if($my_query->have_posts()) {
						$counter = 1;
						while($my_query->have_posts() && $counter <= $how_many_last_posts) {
							$my_query->the_post(); 
							?>
							<div class="latest_post" id="post-<?php the_ID(); ?>">

								<div class="latest_post_image">
									<?php the_post_thumbnail('blog-archive'); ?>
								</div>
								<div class="latest_post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

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
							<?php
							$counter++;
						}
						//echo '</ol></div>';
						wp_reset_postdata();
					}
				?>
			</div>

		</div>

		<!-- Tags -->

		<div class="sidebar_section">
			<div class="sidebar_section_title">
				<h3>Tags</h3>
			</div>
			<div class="tags d-flex flex-row flex-wrap">
				<?php foreach ( get_tags() as $tag ) : ?>
					<div class="tag"><a href="<?php the_permalink() ?>"><?php echo $tag->name; ?></a></div>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</div>
	