<?php
/* Template Name: Front Page */
?>

<?php get_header(); ?>

		<!-- FEATURED -->
		<?php get_template_part('inc/featured'); ?>

		<!-- MAIN SECTION -->
		<section class="content--home content__main">
			<div class="container">
				<div class="content__left">

					<!-- FEATURED TOPIC -->
					<?php if (is_active_sidebar('featured-topic')) : ?>
						<?php dynamic_sidebar('featured-topic'); ?>
					<?php endif; ?>

					<!-- LATEST ARTICLES (10 posts)-->
					<div class="main">
						<div class="main__header">
							<h4 class="section__title">Latest Articles</h4>
						</div>

						<div class="main__body">

							<?php
								$args = array ('posts_per_page' => '10');
								$query = new WP_Query( $args );
							?>
							<?php if ($query->have_posts()): ?>
								<?php while ($query -> have_posts()) : $query -> the_post(); ?>

								<!-- article -->
								<?php
							    $classes = array(
							      'article',
							      'article--loop'
							    );
							  ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
									<!-- post thumbnail -->
									<div class="thumbnail">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php if ( has_post_thumbnail()): // Check if thumbnail exists ?>
												<?php the_post_thumbnail(array(100,100)); // Declare pixel size you need inside the array ?>
											<?php else: ?>
												<img src="http://placehold.it/100x100" alt="">
											<?php endif; ?>
										</a>
									</div>
									<!-- /post thumbnail -->

									<div class="article__excerpt">
										<!-- post title -->
										<h3>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
										</h3>
										<!-- /post title -->

										<div class="article__excerpt--content">
											<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
										</div>
									</div>
									<div class="meta">
										<div class="meta__date">
											<i class="icon icon__meta icon__meta--date"></i>
											<time>
												<?php the_time('F j, Y'); ?>
											</time>
										</div>

										<div class="meta__category">
											<i class="icon icon__meta icon__meta--category"></i>
											<div><?php the_category(', '); ?></div>
										</div>
										<?php if ( function_exists ( 'echo_tptn_post_count' ) ) : ?>
										<div class="meta__views">
											<i class="icon icon__meta icon__meta--views"></i>
											 <?php echo_tptn_post_count(); ?>
										</div>
										<?php endif; ?>
									</div>
								</article>
								<!-- /article -->

							<?php endwhile; ?>

							<?php else: ?>

								<!-- article -->
								<article class="article article-error">
									<h3><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h3>
								</article>
								<!-- /article -->

							<?php endif; ?>
							<?php wp_reset_postdata(); ?>

							<div class="a-right pt20">
            		<a href="/latest" class="btn btn-outline btn-outline--blue font-sm">Read more &raquo;</a>
            	</div>
            </div>

					</div>

				</div>

				<?php get_sidebar(); ?>
			</div>
		</section>

		<!-- INFOGRAPHIC -->
		<?php get_template_part('inc/infographic'); ?>

<?php get_footer(); ?>
