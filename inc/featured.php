<div class="content--home content__featured">
	<div class="container">
		<?php // WP_Query arguments
			$args = array (
				'tag'          => 'featured',
				'posts_per_page'         => '3'
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				$count = 1;
				while ( $query->have_posts() ) {
					$query->the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="featured">
						<div class="featured__image" style="background-image: url(<?php the_field('feature_image') ?>);">

						</div>
						<div class="featured__detail">
							<?php if($count == 1 ): ?>
								<strong class="featured__label">Featured</strong>
								<h1><?php the_title(); ?></h1>
							<?php else: ?>
								<h2><?php the_title(); ?></h2>
							<?php endif; ?>
							<?php if ( function_exists ( 'echo_tptn_post_count' ) ) : ?>
							<div class="meta">
								<div class="meta__views">
									<i class="icon icon__meta icon__meta--views"></i>
									 <?php echo_tptn_post_count(); ?>
								</div>
							</div>

							<?php endif; ?>

						</div>
					</a>
					<?php $count++ ?>
			<?php	}
			} else { ?>
				// no posts found
			<?php }

			// Restore original Post Data
			wp_reset_postdata(); ?>
	</div>
</div>