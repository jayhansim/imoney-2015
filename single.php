<?php get_header(); ?>

	<div class="content__main">
		<div class="container">
			<div class="content__left">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<!-- article -->
					<?php $classes = array('article', 'article--post'); ?>
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
							<div class="post__share">
							  <div class="share__total">50 shares</div>
						    <div class="share__channels">
						    	<ul>
						    		<li class="share__fb"><a href="#"><i class="icon icon__share icon__share--fb"></i> Share <span>40</span></a></li><!--
						    		--><li class="share__tw"><a href="#"><i class="icon icon__share icon__share--tw"></i> Tweet <span>40</span></a></li><!--
						    		--><li><a href="#"><i class="icon icon__share icon__share--mail"></i> Email</a></li><!--
						    		--><li><a href="#"><i class="icon icon__share icon__share--wa"></i> WhatsApp</a></li>
						    	</ul>
						    </div>
							</div>
						</div>

						<div class="post__content">
							<p class="byline">
								<span class="byline--author">Written by <?php the_author_posts_link(); ?> </span>
								<span class="byline--illustrator">Illustration by Michelle Leong</span>
							</p>
							<?php the_content(); // Dynamic Content ?>
						</div>
						<div class="post__share--bottom">
							<h4>Share this article</h4>
							<div class="post__share">
							  <div class="share__total">50 shares</div>
						    <div class="share__channels">
						    	<ul>
						    		<li class="share__fb"><a href="#"><i class="icon icon__share icon__share--fb"></i> Share <span>40</span></a></li><!--
						    		--><li class="share__tw"><a href="#"><i class="icon icon__share icon__share--tw"></i> Tweet <span>40</span></a></li><!--
						    		--><li><a href="#"><i class="icon icon__share icon__share--mail"></i> Email</a></li><!--
						    		--><li><a href="#"><i class="icon icon__share icon__share--wa"></i> WhatsApp</a></li>
						    	</ul>
						    </div>
							</div>
						</div>


						<?php if ( function_exists( 'echo_ald_crp' ) ) echo_ald_crp(); ?>

						<div class="post__comments">
							<h4>Leave your comment</h4>

							<p class="post__comments--loading"><span></span> Loading comments...</p>

							<div id="comments" class="fb-comments" data-href="<?php get_the_permalink(); ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>

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
