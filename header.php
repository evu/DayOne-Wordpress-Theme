<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie10 lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie10 lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<!-- Force latest IE & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
	
	<!-- CSS: screen, mobile & print are all in the same file -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<!--[if lt IE 9]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script><![endif]-->

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	<!--[if lt IE 8]><p class="chromeframe">You are using an <strong>extremely outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience on the web.</p><![endif]-->
	<section class="header-wrap">
		<header role="banner" class="page-header grid">
			<?php if (is_front_page()) { ?>
				<h1 class="logo desk-1-3"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<?php } else { ?>
				<h2 class="logo desk-1-3"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h2>
			<?php } ?>

			<nav class="main-nav desk-2-3">
				<?php
					$menu_options = array(
						'theme_location'  => 'primary',
						'menu'            => 'Main Navigation', 
						'container'       => false, 
						'echo'            => false,
						'fallback_cb'     => 'wp_page_menu',
						'items_wrap'      => '%3$s',
						'depth'           => 0
					);
					echo strip_tags(wp_nav_menu($menu_options), '<a>');
				?>
			</nav>

		</header>
	</section>