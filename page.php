<?php get_header(); ?>

	<section class="content__main">
		<div class="container">
			<div class="content__left">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<!-- article -->
					<?php $classes = array('article', 'article--page'); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
						<div class="post__header">
							<h1><?php the_title(); ?></h1>

							<div class="meta">
								<div class="meta__date">
									<i class="icon icon__meta icon__meta--date"></i>
									<time>
										<?php the_time('F j, Y'); ?>
									</time>
								</div>
							</div>
						</div>
						<div class="post__content">
							<?php the_content(); // Dynamic Content ?>
						</div>

						<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

					</article>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

					</article>
					<!-- /article -->

				<?php endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>

	</section>

<?php get_footer(); ?>
