<?php if (have_posts()): ?>
	<?php $count = 0; ?>
	<?php while (have_posts()) : the_post(); ?>

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

	<?php if ($count == 3): ?>
	<article class="article article--loop article--ad">
		<div class="thumbnail">
			<a href="#">
				<img src="<?php echo get_template_directory_uri() ?>/img/sample-loop-ad.jpg" alt="">
			</a>
		</div>
		<div class="article__excerpt">
			<h3><a href="#">Wait what? 5% cashback with weekend retail spend?</a></h3>
			<div class="article__excerpt--content">
				<p>Up to 5x TreatPoints, zero annual fees and a low interest rate of 8.88% per annum.</p>
			</div>
		</div>
		<div class="meta">
		</div>
	</article>
	<?php endif; ?>
	<!-- /article -->

	<?php $count++; ?>

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article class="article article-error">
		<h3><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h3>
	</article>
	<!-- /article -->

<?php endif; ?>
