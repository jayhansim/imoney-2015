<?php get_header(); ?>

	<div class="content__main">
		<?php if (have_posts()): the_post(); ?>
			<?php if(get_field('feature_image') && get_field('big_or_small')) : ?>
				<div class="content__featureimg--big">
					<div class="post__featureimg" style="background-image: url(<?php the_field('feature_image') ?>);">
						<div class="container">
							<div class="post__header">
								<h1><?php the_title(); ?></h1>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php rewind_posts(); ?>

		<div class="container">

			<div class="content__left" id="main">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<!-- article -->
					<?php $classes = array('article', 'article--post'); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
						<?php if(get_field('feature_image') && !get_field('big_or_small')) : ?>
						<div class="post__featureimg">
							<img src="<?php the_field('feature_image') ?>" alt="<?php the_title(); ?>">
						</div>
						<?php endif; ?>
						<div class="post__header">
							<?php if(!get_field('big_or_small')) : ?>
								<h1><?php the_title(); ?></h1>
							<?php endif; ?>

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
						</div>
						<div class="post__share--top">
							<?php get_template_part('inc/share'); ?>
						</div>

						<div class="post__content">
							<p class="byline">
								<span class="byline--author">Written by <?php the_author_posts_link(); ?> </span>
								<?php if(get_field('illustrated_by')): ?>
									<span class="byline--illustrator">Illustration by <?php the_field('illustrated_by'); ?></span>
								<?php endif; ?>
							</p>

							<!-- TLDR -->
							<?php if(get_field('summary')): ?>
							<div class="block block--summary">
								<div class="block__title">Summary</div>
								<p><?php the_field('summary'); ?></p>
							</div>
							<?php endif; ?>
							<?php the_content(); // Dynamic Content ?>

							<!-- Interview Articles Content
							// check if the flexible content field has rows of data -->
							<?php if( have_rows('interview_content') ):
							  // loop through the rows of data
							  while ( have_rows('interview_content') ) : the_row();

					        if( get_row_layout() == 'question_and_answer' ): ?>

					        	<div class="interview interview--qna">
											<div class="interview--qna__q">
												<?php the_sub_field('question'); ?>
											</div>
											<div class="interview--qna__a">
												<?php the_sub_field('answer'); ?>
											</div>
					        	</div>

					        <?php elseif( get_row_layout() == 'text_and_image' ): ?>
										<div class="interview">
							        <?php the_sub_field('editor'); ?>
							      </div>
							    <?php endif;
							  endwhile;
							else :
							    // no layouts found
							endif; ?>
						</div>
						<div class="post__share--bottom">
							<h4>Share this article</h4>
							<?php get_template_part('inc/share'); ?>
						</div>


						<?php if ( function_exists( 'echo_ald_crp' ) ) echo_ald_crp(); ?>

						<div class="post__comments">
							<h4>Leave your comment</h4>

							<p class="post__comments--loading"><span></span> Loading comments...</p>

							<div id="comments">
								<?php echo do_shortcode('[fbcomments width="100%" count="off" num="3"]'); ?>
							</div>

							<!-- <div id="comments" class="fb-comments" data-href="<?php get_the_permalink(); ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div> -->

						</div>

						<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

						<?php //comments_template(); ?>

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
	</div>



<?php get_footer(); ?>
