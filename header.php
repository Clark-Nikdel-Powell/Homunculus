<!doctype html>
<!--[if lt IE 9]>      <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" <? cnp_schema_type('Product'); ?>> <!--<![endif]-->
<head>

	<meta charset="<? bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><? wp_title('&lsaquo;', true, 'right'); ?></title>

	<meta name="viewport"    content="width=device-width,initial-scale=1,maximum-scale=1">
	<meta name="author"      content="<?php global $post; echo get_the_author_meta('display_name', $post->post_author); ?>">
	<meta name="description" content="<?php cnp_description(); ?>">

	<link rel="icon" href="<?php echo cnp_theme_url('img/fav.ico'); ?>">
	<link rel="alternate" type="application/rss+xml" href="<?php esc_attr(get_option('rss_url', get_bloginfo('rss2_url'))); ?>">

	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

	<?php wp_head(); ?>

</head>

<body <?php cnp_schema_type('WebPage'); ?> <?php body_class(); ?>>

<header class="masthead" <?php cnp_schema_type('WPHeader'); ?> role="banner">

	<h2 class="logo" <?php cnp_schema_type('Organization'); ?>>
		<a itemprop="url" href="<?= home_url() ?>"><?php bloginfo('name'); ?></a>
		<meta itemprop="logo" content="<?php echo cnp_theme_url('img/logo.svg'); ?>">
	</h2>

	<?php cnp_nav_menu('Main'); ?>

</header>

<?php
if (is_front_page()) {
	get_header('home');
}

else {
	get_header('int');
}
?>
<div class="main">
<div class="content">

