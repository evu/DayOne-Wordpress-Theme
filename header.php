<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie10 lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie10 lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<title></title>

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="format-detection" content="telephone=no">
	
	<?php if (is_search()) { ?>

	<meta name="robots" content="noindex, nofollow" /> 
	
	<?php } ?>

	<meta name="description" content="">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
	
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/main.css">

	<!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>extremely outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience on the web.</p><![endif]-->

	<header role="banner" class="page-header grid">

		
		<h1 class="logo"><a href="/"><?php bloginfo('name'); ?></a></h1>


		<nav class="main-nav">
			<?php
				$args = array(
					'menu'            => 'Main Navigation',
					'container'       => false,
					'menu_class'      => 'menu',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0
				);

				wp_nav_menu( $args );
			?>
		</nav>

	</header>