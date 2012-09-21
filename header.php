<!doctype html>
<html lang="en">

<head>

	<meta charset="<? bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<!--<meta name="viewport" content="width=device-width">-->
	<meta name="author" content="Clark/Nikdel/Powell" />
	<meta name="description" content="">

	<title><?
		wp_title('&lsaquo;', true, 'right');
		bloginfo('name');
		if ( is_home() && get_bloginfo('description') ) { print " &rsaquo; "; bloginfo('description'); }
	?></title>

	<link href="<?=WP_THEME_URL?>/styles.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?=WP_THEME_URL?>/print.css" rel="stylesheet" type="text/css" media="print" />
	<link href="<?=WP_THEME_URL?>/favicon.png" rel="icon" />
	<link rel="alternate" type="application/rss+xml" title="<? bloginfo('name'); ?>" href="<? bloginfo('rss2_url'); ?>" />

	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
<? wp_head(); ?>

</head>

<body <? body_class(); ?>>
<div id="whole">

<header>
	
	<h1 id="logo"><a href="/">CLIENT NAME</a></h1>
	
	<?
	wp_nav_menu(array(
		'menu'        => 'Main Menu'
	,	'container'   => 'nav'
	//,	'container_id' => ''
	,	'depth'       => 1
	,	'fallback_cb' => false
	));
	?>
	
</header>

<div id="main">