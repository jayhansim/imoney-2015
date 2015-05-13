<div class="content__featured content__featured--focus">
	<div class="focus__header">
		<h4 class="section__title focus__title">
			Featured Topic: GST
		</h4>
		<div class="focus__desc">

		  <p>GST has been implemented on April 1st 2015. Here are GST related articles to prepare you to become a smarter consumer.</p>

		  <div class="focus__cta">
				<a href="<?php echo get_category_link(27); ?>" class="btn btn-outline btn-outline--blue">Read more &raquo;</a>
			</div>


		</div>
	</div>
	<div class="focus__body">
		<?php // WP_Query arguments
			$args = array (
				'category_name'          => 'gst',
				'posts_per_page'         => '3'
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post(); ?>
				<a href="<?php the_permalink(); ?>" class="featured">
					<div class="featured__image" style="background-image: url(<?php the_field('feature_image') ?>);"></div>
					<div class="featured__detail">
						<h3><?php the_title(); ?></h3>
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
			<?php	}
			} else { ?>
				// no posts found
			<?php }

			// Restore original Post Data
			wp_reset_postdata(); ?>
	</div>
</div>