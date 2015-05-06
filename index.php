<?php get_header(); ?>


		<!-- section -->
		<section class="content--home content__main">
			<div class="container">
				<div class="content__left">
					<?php get_template_part('loop'); ?>
					<?php get_template_part('pagination'); ?>
				</div>

				<?php get_sidebar(); ?>
			</div>





		</section>
		<!-- /section -->




<?php get_footer(); ?>
