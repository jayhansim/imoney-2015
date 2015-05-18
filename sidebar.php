<!-- sidebar -->
<aside role="complementary" class="content__side">
	<?php if(is_singular('home-buying-guide')): ?>
		<?php dynamic_sidebar('home-buying-guide') ?>
	<?php else : ?>
		<?php dynamic_sidebar('sidebar'); ?>
	<?php endif; ?>

</aside>
<!-- /sidebar -->
