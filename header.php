<!DOCTYPE html>
<!--[if IE 7]>         <html class="ie ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="ie ie8 lt-ie9">        <![endif]-->
<!--[if IE 9]>         <html class="ie ie9">               <![endif]-->
<!--[if gt IE 9]><!--> <html>                              <!--<![endif]-->
<head>
	<meta charset="<? bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><? wp_title('&lsaquo;', true, 'right'); ?></title>

<<<<<<< HEAD
	<link href="<?=WP_THEME_URL?>/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?=WP_THEME_URL?>/print.css" rel="stylesheet" type="text/css" media="print" />
	<link href="<?=WP_THEME_URL?>/favicon.ico" rel="icon" />
	<link rel="alternate" type="application/rss+xml" title="<? bloginfo('name'); ?>" href="<? bloginfo('rss2_url'); ?>" />

	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->'
	
	<script type="text/javascript">
	var m = document.getElementsByTagName('meta');
	var i;
	if (navigator.userAgent.match(/iPhone/i) || (navigator.userAgent.match(/Android/i))) {
		for (i=0; i<m.length; i++) {
			if (m[i].name == "viewport") {
				m[i].content = "initial-scale=1.0, width=device-width, minimum-scale=1.0, maximum-scale=1.0";
			}
		}
		document.addEventListener("gesturestart", gestureStart, false);
	}
	
	function gestureStart() {
		for (i=0; i<m.length; i++) {
			if (m[i].name == "viewport") {
				m[i].content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";
			}
		}
	}
	</script>	
	
<? wp_head(); ?>
=======
	<meta name="viewport"    content="width=device-width,initial-scale=1,maximum-scale=1">
	<meta name="author"      content="Clark/Nikdel/Powell">
	<meta name="description" content="<?= cnp_description(); ?>">

	<link rel="stylesheet" href="<?=cnp_theme_url('css/style.css');?>" media="screen">
	<!--[if IE]><link rel="stylesheet" href="<?=cnp_theme_url('css/ie.css');?>" media="screen"><![endif]-->
	<link rel="stylesheet" href="<?=cnp_theme_url('css/print.css');?>" media="print">
>>>>>>> dev

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

<<<<<<< HEAD
<div class="main">
=======
<div class="main" role="main">
>>>>>>> dev
