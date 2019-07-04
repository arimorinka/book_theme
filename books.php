<?php
/**
* Template Name: Books 
*
*/

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<ul class="content-books">
			
			<?php 
				$args = array(
					'post_type' => 'books',
					'posts_per_page' => '10',
					'post_status' => 'publish',
					'order' => 'DESC',
					'orderby' => 'date'					

				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) : ?>
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<li>
							<h2>
								<a href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
							<p>Content: <?php the_content(); ?></p>

							<p><?php
						        $metaboxvalue = get_post_meta($post->ID, 'isbn', true);
						        echo 'meta box value: ' . $metaboxvalue;
						    ?></p>

						</li>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
				</ul>
		</main>
	</div>
<?php
get_footer();
