<?php get_header(); ?>

	<section class="content__main">
		<div class="container">
			<div class="content__full content--404">
				<!-- article -->
				<article class="article article--404 post">
					<div class="post__header">
						<h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>
						<h2>
							<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
						</h2>
					</div>
				</article>
				<!-- /article -->
			</div>
		</div>
	</section>

<?php get_footer(); ?>