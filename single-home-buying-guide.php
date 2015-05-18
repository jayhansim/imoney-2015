<?php get_header(); ?>

	<div class="content__main fhg">
		<div class="hbg__header">
			<div class="container">
	      <div class="blurb">Exclusive Guide!</div>
	      <h2 class="hbg__header--title"><a href="/home-buying-guide/buying-first-home/">6 things you should know before buying your first home</a></h2>
	      <h3 class="hbg__header--tagline">The ultimate first-time home buying guide</h3>
		  </div>
		</div>
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
							<?php if(get_field('chapter')) : ?>
								<p class="hbg__chapter"><?php the_field('chapter'); ?></p>
							<?php endif; ?>
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

							<div class="article__nav article__nav--bottom">
								<?php $previous_post = get_next_post(); ?>
								<?php $next_post = get_previous_post(); ?>
							  <?php if (!empty( $previous_post )): ?>
	                <a class="btn-hbg btn-hbg--previous" href="<?php echo get_permalink( $previous_post->ID ); ?>">
	                  &lsaquo; Previous</a>
	              <?php endif; ?>
	              <?php
	              if (!empty( $next_post )): ?>
	                <a class="btn-hbg btn-hbg--next" href="<?php echo get_permalink( $next_post->ID ); ?>">Next<?php echo '<span>: ' . $next_post->post_title . '</span>'; ?> &rsaquo; </a>
	              <?php endif; ?>
							</div>

						</div>
						<div class="post__share--bottom">
							<h4>Share this article</h4>
							<?php get_template_part('inc/share'); ?>
						</div>

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
