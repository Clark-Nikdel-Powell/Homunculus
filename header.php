<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="ie ie8 lt-ie9">        <![endif]-->
<!--[if IE 9]>         <html class="ie ie9">               <![endif]-->
<!--[if gt IE 9]><!--> <html>                              <!--<![endif]-->
<head>
	<meta charset="<? bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><? wp_title('&lsaquo;', true, 'right'); ?></title>

	<meta name="viewport"    content="width=device-width,initial-scale=1,maximum-scale=1">
	<meta name="author"      content="Clark/Nikdel/Powell">
	<meta name="description" content="<?= cnp_description(); ?>">

	<link rel="stylesheet" href="<?=cnp_theme_url('css/style.css');?>" media="screen">
	<!--[if IE]><link rel="stylesheet" href="<?=cnp_theme_url('css/ie.css');?>" media="screen"><![endif]-->
	<link rel="stylesheet" href="<?=cnp_theme_url('css/print.css');?>" media="print">

	<link rel="icon" href="<?=cnp_theme_url('images/icons/favicon.png');?>">
	<link rel="alternate" type="application/rss+xml" href="<?= esc_attr(get_option('rss_url', get_bloginfo('rss2_url'))); ?>">

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
