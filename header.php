<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="ie ie8 lt-ie9">        <![endif]-->
<!--[if IE 9]>         <html class="ie ie9">               <![endif]-->
<!--[if gt IE 9]><!--> <html>                              <!--<![endif]-->
<head>
	<meta charset="<? bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><? wp_title('&lsaquo;', true, 'right'); ?></title>

	<meta name="viewport"    content="width=device-width">
	<meta name="author"      content="Clark/Nikdel/Powell">
	<meta name="description" content="<? do_action('cnp_description'); ?>">

	<link rel="stylesheet" href="<?=cnp_theme_url('style.css');?>" media="screen">
	<!--[if IE]><link rel="stylesheet" href="<?=cnp_theme_url('ie.css');?>" media="screen"><![endif]-->
	<link rel="stylesheet" href="<?=cnp_theme_url('print.css');?>" media="print">

	<link rel="icon" href="<?=cnp_theme_url('favicon.png');?>">
	<link rel="alternate" type="application/rss+xml" title="<? bloginfo('name'); ?>" href="<? bloginfo('rss2_url'); ?>">

	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
	<? wp_head(); ?>
</head>
<body <? cnp_schema_type('WebPage'); ?> <? body_class(); ?>>

<header class="site" <? cnp_schema_type('WPHeader'); ?> role="banner">
	
	<h1 class="logo"><a href="<?=home_url()?>"><? bloginfo('name'); ?></a></h1>
	
	<?
	wp_nav_menu(array(
		'menu'            => 'Main Menu'
	,	'container'       => 'nav'
	,	'container_class' => 'site'
	,	'depth'           => 1
	,	'fallback_cb'     => false
	));
	?>
	
</header>

<div class="main" role="main">
