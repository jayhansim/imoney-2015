<?php get_header(); ?>

	<section class="content__main">
		<div class="container">
			<div class="content__left">
				<?php if (have_posts()): the_post(); ?>
					<?php if ( get_the_author_meta('description')) : ?>
					<div class="block__author">
						<div class="author__image">
							<?php echo get_avatar(get_the_author_meta('user_email')); ?>
						</div>
						<div class="author__info">
							<h2><?php echo get_the_author() ; ?></h2>
							<?php echo wpautop( get_the_author_meta('description') ); ?>
						</div>

					</div>
					<?php endif; ?>
				<?php endif; ?>

				<?php rewind_posts(); ?>
				<?php get_template_part('loop'); ?>
				<?php get_template_part('pagination'); ?>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</section>



<?php get_footer(); ?>
