<div class="widget widget-interview">
	<div class="interview__header">
		<h5><span>Exclusive Interviews</span></h5>
	</div>
	<div class="interview__body">
		<div class="interview__slides">
			<?php // WP_Query arguments
			$args = array (
				'category_name'          => 'interview',
				'posts_per_page'         => '3',
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post(); ?>
					<div class="interview-slide">
						<a href="<?php the_permalink()?>">
							<img src="<?php the_field('portrait') ?>" alt="<?php the_title(); ?>" class="interview__portrait">
							<h4 class="h6"><?php the_title(); ?></h4>
						</a>
					</div>
			<?php	}
			} else { ?>
				// no posts found
			<?php }

			// Restore original Post Data
			wp_reset_postdata(); ?>

		</div>

	</div>
</div>