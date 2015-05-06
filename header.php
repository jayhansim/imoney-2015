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
			  <div class="brand brand--header"><a href="/"><span class="logo">iMoney.my</span>Learning Center</a></div>
			  <div class="header__search">
			    <?php get_template_part('searchform'); ?>
			  </div>
			</div>
		</header>

		<!-- NAVIGATION -->
		<div class="navbar">
      <div class="container">
        <nav role="navigation" data-region="main-navigation">
          <ul class="navbar__list cf">
            <li class="nav__item nav__item--all"><a href="#"><i></i>All Categories</a>
              <div id="nav" class="nav__overlay">
                <div class="nav__overlay__inner">
                  <div class="nav__overlay__top">
                    <h3>All Cetegories</h3><a href="#" class="nav__overlay__close"><i></i>Close</a>
                  </div>
                  <div class="nav__overlay__body">
                    <div class="nav__overlay__col">
                      <div class="nav__overlay__navset">
                        <h6>English</h6>
                        <ul>
                          <li><a href="#">Latest articles</a></li>
                          <li><a href="#">Autos</a></li>
                          <li><a href="#">Cards</a></li>
                          <li><a href="#">Fixed Deposits</a></li>
                          <li><a href="#">Properties</a></li>
                          <li><a href="#">Infographics</a></li>
                          <li><a href="#">Insurance</a></li>
                          <li><a href="#">Investment</a></li>
                          <li><a href="#">Personal Loan</a></li>
                          <li><a href="#">Savings Account</a></li>
                          <li><a href="#">Money Management</a></li>
                          <li><a href="#">Tax</a></li>
                          <li><a href="#">News Updates</a></li>
                        </ul>
                      </div>
                      <div class="nav__overlay__col nav__overlay__col--bm">
                        <div class="nav__overlay__navset">
                          <h6>Malay</h6>
                          <ul>
                            <li><a href="#">Artikel Terkini</a></li>
                            <li><a href="#">Akaun Simpanan</a></li>
                            <li><a href="#">Infografik</a></li>
                            <li><a href="#">Insurans</a></li>
                            <li><a href="#">Kad</a></li>
                            <li><a href="#">Kemashyuran &amp;amp; Kekayaan</a></li>
                            <li><a href="#">Pelaburan</a></li>
                            <li><a href="#">Pengurusan Wang</a></li>
                            <li><a href="#">Pinjaman Kereta</a></li>
                            <li><a href="#">Pinjaman Peribadi</a></li>
                            <li><a href="#">Pinjaman Perumahan</a></li>
                            <li><a href="#">Simpanan Tetap</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav__item"><a href="#">Latest</a></li>
            <li class="nav__item"><a href="#">Money Management</a></li>
            <li class="nav__item"><a href="#">Money Saving</a></li>
            <li class="nav__item"><a href="#">GST</a></li>
            <li class="nav__item"><a href="#">Insurance</a></li>
            <li class="nav__item nav__item--main"><a href="#">Compare Products</a></li>
          </ul>
        </nav>
      </div>
    </div>

    <!-- BEFORE CONTENT -->
    <div class="before-content">
    	<div class="container">
    		<div class="ad ad--leaderboard"><a href="#"><img src="http://placehold.it/728x90"></a>
    	</div>
    </div>

    <main role="main" class="content">
