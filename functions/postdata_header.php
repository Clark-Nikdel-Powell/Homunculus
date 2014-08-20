<?php

function cnp_postdata_header($post) {

	// Use this function to standardize markup across search,
	// archive and singular views, as well as any others that may be necessary.
	// You could also make modifications by post_type or post-format.

	// Variables Setup
	$id = $post->ID;

	////////////////////////////////////////////////////////////////////////////////
	// CONTENT HEADER  ////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////

	/*//////////////////////////////////////////////////////
	//  Category Bar  /////////////////////////////////////
	////////////////////////////////////////////////////*/

	$cat_bar = '';
	if (is_singular()) {

	$category = get_the_terms( $post, 'news-category' );
	$cat_bar = '';
	if (!empty($category)) {

		$category = array_shift($category);
		$cat_name = $category->name;

		// Set up the previous/next post links
		$prev_cat_article = get_adjacent_post( true, '', true, 'news-category' );
		$next_cat_article = get_adjacent_post( true, '', false, 'news-category' );
		$cat_nav = '';
		if (!empty($prev_cat_article) || !empty($next_cat_article)) {
			$cat_nav .= '<div class="more"><label class="hide-on-tbsm">More '. $cat_name . (strrchr($cat_name,' ') != " News" ? ' News' : '' ) .':</label> <nav>';
			if (!empty($prev_cat_article)) {$cat_nav .= '<a class="prev" href="'. get_permalink($prev_cat_article->ID) .'" title="'. $prev_cat_article->post_title .'"><i class="fa fa-chevron-left"></i></a>';}
			if (!empty($next_cat_article)) {$cat_nav .= '<a class="next" href="'. get_permalink($next_cat_article->ID) .'" title="'. $next_cat_article->post_title .'"><i class="fa fa-chevron-right"></i></a>';}
			$cat_nav .= '</nav>';
		}

		$cat_bar = '<header class="category"><a class="block-title" href="'. get_term_link($category) .'">'. $cat_name .'</a> '. $cat_nav .'</header>';
	}

	}


	////////////////////////////////////////////////////////
	// Title  /////////////////////////////////////////////
	//////////////////////////////////////////////////////

	if ( !is_singular() ) {
		$title = '<h3 class="title"><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h3>';
	}
	else {
		$title = '<h1 class="title">'. get_the_title() .'</h1>';
	}


	////////////////////////////////////////////////////////
	//  Meta Bar  /////////////////////////////////////////
	//////////////////////////////////////////////////////

	$meta_bar = '';
	if ( is_singular('news') ) {

	$author  = '<div class="author"><span class="image">'. get_wp_user_avatar() .'</span><span class="name">'. get_the_author() .'</span></div>';
	$date    = '<div class="date"><i class="fa fa-clock-o"></i><span class="time">'. get_the_date('g:i a T') .'&nbsp;&nbsp;</span><span class="calendar-date">'. get_the_date('F j, Y') .'</span></div>';

	$actions_arr = array(
		'<a class="print" href="#" onclick="window.print();">Print <i class="fa fa-print"></i></a>'
	,	'<a class="email" href="'. LEPI_email_link() .'" target="_blank">Email <i class="fa fa-envelope"></i></a>'
	);
	$actions = '<nav class="actions right">'. implode('', $actions_arr) .'</nav>';

	$meta_bar = '<footer class="meta"><div class="left">'. $author . $date .'</div> '. $actions .'</footer>';

	}


	////////////////////////////////////////////////////////
	// Post Excerpt  //////////////////////////////////////
	//////////////////////////////////////////////////////

	$excerpt = '';
	(is_search() ? $excerpt = '<p class="summary">'. get_search_excerpt() .'</p>' : $excerpt = '');
	if ( has_excerpt() && is_singular() ) {
		$excerpt = '<p class="summary">'. get_the_excerpt() .'</p>';
	}


	////////////////////////////////////////////////////////
	// Post Thumbnail  ////////////////////////////////////
	//////////////////////////////////////////////////////

	$thumbnail = '';
	if ( has_post_thumbnail() && is_singular() ) {

		$post_thumbnail = get_post(get_post_thumbnail_id($id));
		$img = get_the_post_thumbnail( $id, 'medium-cropped' );
		$caption = '';
		if (!empty($post_thumbnail->post_excerpt) && is_singular()) {$caption = '<p class="wp-caption-text">'. $post_thumbnail->post_excerpt .'</p>';}
		$thumbnail = '<div class="post-thumbnail"><div class="inside">'. $img . $caption .'</div></div>';
	}

	////////////////////////////////////////////////////////
	// Output  ////////////////////////////////////////////
	//////////////////////////////////////////////////////

	$header = '<div class="postdata">'. $cat_bar .'<div class="inside">'. $date . $title . $meta_bar . $video_embed . $excerpt .'</div>'. $thumbnail .'</div>';

	echo $header;
}