<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="ie ie8 lt-ie9">        <![endif]-->
<!--[if IE 9]>         <html class="ie ie9">               <![endif]-->
<!--[if gt IE 9]><!--> <html>                              <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php wp_title('&lsaquo;', true, 'right'); ?></title>

	<meta name="viewport" content="width=device-width">
	<meta name="author" content="Clark/Nikdel/Powell">
	<meta name="description" content="<?php do_action('cnp_description'); ?>">

	<link href="<?=WP_THEME_URL?>/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?=WP_THEME_URL?>/print.css" rel="stylesheet" type="text/css" media="print" />
	<link href="<?=WP_THEME_URL?>/favicon.png" rel="icon" />
	<link rel="alternate" type="application/rss+xml" title="<? bloginfo('name'); ?>" href="<? bloginfo('rss2_url'); ?>" />

	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
<? wp_head(); ?>

</head>

<body <? body_class(); ?>>

<header class="site">
	
	<h1 id="logo"><a href="/"><?php bloginfo('name'); ?></a></h1>
	
	<?
	wp_nav_menu(array(
		'menu'         => 'Main Menu'
	,	'container'    => 'nav'
	,	'container_id' => 'site'
	,	'depth'        => 1
	,	'fallback_cb'  => false
	));
	?>
	
</header>

<div class="main">
