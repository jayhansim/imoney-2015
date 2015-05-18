<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

		<!-- Header -->
		<header role="banner" class="header">
			<div class="container">
			  <div class="brand brand--header">
          <a href="/">
            <span class="logo">iMoney.my</span> Learning Center
          </a>
        </div>
			  <div class="header__search">
			    <?php get_template_part('searchform'); ?>
			  </div>
        <a href="#" class="btn-search-toggle">
          <svg width="16" height="16" viewBox="0 0 16 16" xmls="http://www.w3.org/2000/svg">
            <g>
              <path d="M9.477 10.89C8.497 11.59 7.297 12 6 12c-3.314 0-6-2.686-6-6s2.686-6 6-6 6 2.686 6 6c0 1.296-.41 2.495-1.11 3.476l4.795 4.787c.39.39.39 1.024 0 1.414-.39.39-1.024.39-1.414 0L9.478 10.89zM6 10c2.21 0 4-1.79 4-4S8.21 2 6 2 2 3.79 2 6s1.79 4 4 4z"></path>
            </g>
          </svg>
        </a>
			</div>
		</header>

		<!-- NAVIGATION -->
		<div class="navbar">
      <div class="container">
        <nav role="navigation" data-region="main-navigation">
          <ul class="navbar__list cf">
            <li class="nav__item nav__item--all"><a href="#nav"><i></i>All Categories</a>
              <div id="nav" class="nav__overlay">
                <div class="nav__overlay__inner">
                  <div class="nav__overlay__top">
                    <h3>All Categories</h3><a href="#" class="nav__overlay__close"><i></i>Close</a>
                  </div>
                  <div class="nav__overlay__body">
                    <div class="nav__overlay__col nav__overlay__col--en">
                      <div class="nav__overlay__navset">
                        <h6>English</h6>
                        <?php if (has_nav_menu('overlay-menu')) : ?>
                        <?php wp_nav_menu(
                          array(
                            'theme_location' => 'overlay-menu'
                            )
                        ); ?>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="nav__overlay__col nav__overlay__col--bm">
                      <div class="nav__overlay__navset">
                        <h6>Malay</h6>
                        <?php if (has_nav_menu('overlay-menu-bm')) : ?>
                        <?php wp_nav_menu(
                          array(
                            'theme_location' => 'overlay-menu-bm'
                            )
                        ); ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <?php wp_nav_menu(
            	array(
            		'theme_location' => 'header-menu',
            		'items_wrap' => '%3$s'
            		)
            ); ?>
          </ul>
        </nav>
      </div>
    </div>

    <!-- BEFORE CONTENT -->
    <?php if(is_single() && !is_singular('home-buying-guide')) : ?>

      <?php if (have_posts()): the_post(); ?>
        <?php if(!get_field('feature_image') || !get_field('big_or_small')) : ?>
          <div class="before-content">
            <div class="container">
              <?php dynamic_sidebar('leaderboard'); ?>
              <!-- Breadcrumb -->
              <?php if ( function_exists('yoast_breadcrumb') && !is_front_page()) {
                yoast_breadcrumb('<div class="breadcrumb">','</div>');
              } ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
      <?php rewind_posts(); ?>

    <?php elseif (is_singular('home-buying-guide')) : ?>

    <?php else: ?>

      <div class="before-content">
        <div class="container">
          <?php dynamic_sidebar('leaderboard'); ?>

          <!-- Breadcrumb -->
          <?php if ( function_exists('yoast_breadcrumb') && !is_front_page()) {
            yoast_breadcrumb('<div class="breadcrumb">','</div>');
          } ?>

          <!-- Listing page title -->
          <?php $page = get_query_var('paged'); ?>
          <?php if (is_home()): ?>
            <h1 class="page__title">Latest Articles
              <?php if($page != 0): ?>
                <span>Page <?php echo $page; ?></span>
              <?php endif; ?>
            </h1>
          <?php endif; ?>

          <!-- Listing page title -->
          <?php if (is_page_template('page-bm.php')): ?>
            <h1 class="page__title"><?php the_title(); ?>
              <?php if($page != 0): ?>
                <span>Page <?php echo $page; ?></span>
              <?php endif; ?>
            </h1>
          <?php endif; ?>

          <?php if(is_category()): ?>
            <h1 class="page__title"><?php single_cat_title(); ?>
              <?php if($page != 0): ?>
                <span>Page <?php echo $page; ?></span>
              <?php endif; ?>
            </h1>
          <?php endif; ?>

          <?php if(is_author()) : ?>
            <h1 class="page__title">
              <?php _e( 'Articles by ', 'html5blank' ); echo get_the_author(); ?>
              <?php if($page != 0): ?>
                <span>Page <?php echo $page; ?></span>
              <?php endif; ?>
            </h1>
          <?php endif; ?>

          <?php if(is_search()) : ?>
            <h1 class="page__title">
              <?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?>
              <?php if($page != 0): ?>
                <span>Page <?php echo $page; ?></span>
              <?php endif; ?>
            </h1>
          <?php endif; ?>

          <?php if(is_month()) : ?>
            <h1 class="page__title">
              Archives for <?php single_month_title(' '); ?>
              <?php if($page != 0): ?>
                <span>Page <?php echo $page; ?></span>
              <?php endif; ?>
            </h1>
          <?php endif; ?>

          <?php if(is_tag()) : ?>
            <h1 class="page__title">
              Tag archives: <?php single_tag_title(); ?>
              <?php if($page != 0): ?>
                <span>Page <?php echo $page; ?></span>
              <?php endif; ?>
            </h1>
          <?php endif; ?>

        </div>
      </div>
    <?php endif; ?>

    <main role="main" class="content">
