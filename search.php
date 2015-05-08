<?php get_header(); ?>

	<div class="content__main">
		<div class="container">
			<div class="content__left">
				<?php get_template_part('loop'); ?>
				<?php get_template_part('pagination'); ?>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>
