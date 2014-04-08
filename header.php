<!doctype html>
<!--[if lt IE 9]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>

	<meta charset="<? bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><? wp_title('&lsaquo;', true, 'right'); ?></title>

	<meta name="viewport"    content="width=device-width,initial-scale=1,maximum-scale=1">
	<meta name="author"      content="<? global $post; echo get_the_author_meta('display_name', $post->post_author); ?>">
	<meta name="description" content="<?= cnp_description() ?>">

	<link rel="stylesheet" href="<?= cnp_theme_url('css/styles.css') ?>" media="screen">
	<?/*<!--[if IE]><link rel="stylesheet" href="<?=cnp_theme_url('css/ie.css');?>" media="screen"><![endif]-->
	<link rel="stylesheet" href="<?=cnp_theme_url('css/print.css');?>" media="print">*/?>

	<link rel="icon" href="<?= cnp_theme_url('img/fav.ico') ?>">
	<link rel="alternate" type="application/rss+xml" href="<?= esc_attr(get_option('rss_url', get_bloginfo('rss2_url'))) ?>">

	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

	<? wp_head(); ?>

</head>

<body <? cnp_schema_type('WebPage'); ?> <? body_class(); ?>>

<header class="banner" <? cnp_schema_type('WPHeader'); ?> role="banner">

	<h2 class="logo" <? cnp_schema_type('Organization'); ?>>
		<a itemprop="url" href="<?= home_url() ?>"><? bloginfo('name'); ?></a>
		<meta itemprop="logo" content="<?= cnp_theme_url('img/logo.svg') ?>">
	</h2>

	<? cnp_nav_menu('Main'); ?>

</header>
