<?

if (!defined('WP_SITEURL')) { define('WP_SITEURL', get_bloginfo('url')); }

$foldername = substr(strrchr(dirname(__FILE__), '/'), 1);
define('WP_THEME_URL', WP_CONTENT_URL.'/themes/'.$foldername);

/*
===============================================================================

  Modify the admin

===============================================================================
*/

// Hide wordpress upgrade notice
if (!current_user_can('update_core')) :
	add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
endif;

add_action('admin_init', 'CNP_admin_init');
function CNP_admin_init() {

	// Remove unused boxes on the edit screens
	//remove_post_type_support('post', 'author');
	remove_post_type_support('page', 'author');
	//remove_post_type_support('post', 'trackbacks');
	remove_post_type_support('page', 'trackbacks');
	//remove_post_type_support('post', 'comments');
	remove_post_type_support('page', 'comments');

} // CNP_admin_init()

add_action('admin_menu', 'CNP_admin_menu', 999);
function CNP_admin_menu() {
	
	// Remove menu links
	remove_submenu_page('themes.php', 'theme-editor.php');
	remove_submenu_page('plugins.php', 'plugin-editor.php');
	remove_menu_page('link-manager.php');
	
	// Remove unused boxes on the edit screens
	remove_meta_box('postcustom', 'post', 'normal');
	remove_meta_box('postcustom', 'page', 'normal');
	
} //CNP_admin_menu()

// Give editor role ability to edit widgets, menus, etc
$role = get_role( 'editor' );
if (!$role->capabilities['edit_theme_options']) :
	$role->add_cap( 'edit_theme_options' );
endif;

// Remove comments column from page list
add_filter('manage_pages_columns', 'custom_pages_columns');
function custom_pages_columns($defaults) {
  unset($defaults['comments']);
  return $defaults;
} // custom_pages_columns()

// Widen date column
add_action('admin_head', 'custom_columns_styles');
function custom_columns_styles() {
	echo PHP_EOL."<style type='text/css'>.fixed .column-date {width:13%;}</style>".PHP_EOL;
} // custom_columns_styles()

// Modify user profile fields
add_filter('user_contactmethods', 'modify_contact_info');
function modify_contact_info($fields) {
	unset($fields['aim']);
	unset($fields['yim']);
	unset($fields['jabber']);
	$fields['twitter'] = 'Twitter';
	$fields['linkedin'] = 'LinkedIn';
	$fields['googleplus'] = 'Google+';
	$fields['facebook'] = 'Facebook';
	return $fields;
} // modify_contact_info()

// Change admin footer credits
add_filter('admin_footer_text', 'modify_footer_admin');
function modify_footer_admin() {
  print 'Created by <a href="http://clarknikdelpowell.com">Clark Nikdel Powell</a>. Powered by <a href="http://WordPress.org">WordPress</a>.';
  print ' <a href="http://codex.wordpress.org/">Documentation</a> &bull; <a href="/wp-admin/freedoms.php">Freedoms</a> &bull; <a href="http://wordpress.org/support/forum/4">Feedback</a> &bull; <a href="/wp-admin/credits.php">Credits</a>';
} // modify_footer_admin()

// Remove admin bar on front-facing site
add_filter( 'show_admin_bar', '__return_false' );

/*
===============================================================================

  Site's Social Media Info

===============================================================================
*/

add_action('admin_init', 'social_info');
function social_info() {
	
	add_settings_section( 'GENERAL_social', 'Social Media Info', 'GENERAL_social_callback', 'general' );
	
	add_settings_field( 'facebook_url', 'Facebook URL', 'facebook_callback', 'general', 'GENERAL_social' );
	add_settings_field( 'twitter_handle', 'Twitter Handle', 'twitter_callback', 'general', 'GENERAL_social' );
	add_settings_field( 'youtube_url', 'YouTube URL', 'youtube_callback', 'general', 'GENERAL_social' );
	add_settings_field( 'flickr_url', 'Flickr URL', 'flickr_callback', 'general', 'GENERAL_social' );
	add_settings_field( 'rss_url', 'RSS URL', 'rss_callback', 'general', 'GENERAL_social' );
	
	register_setting( 'general', 'facebook_url' );
	register_setting( 'general', 'twitter_handle' );
	register_setting( 'general', 'youtube_url' );
	register_setting( 'general', 'flickr_url' );
	register_setting( 'general', 'rss_url' );
	
} // social_info()

function GENERAL_social_callback() { echo ''; }

function facebook_callback($args) {
	echo '<input type="text" id="facebook_url" name="facebook_url" value="'.get_option('facebook_url').'" style="width:70%" />';
}
function twitter_callback($args) {
	echo '@<input type="text" id="twitter_handle" name="twitter_handle" value="'.get_option('twitter_handle').'" style="width:70%" />';
}
function youtube_callback($args) {
	echo '<input type="text" id="youtube_url" name="youtube_url" value="'.get_option('youtube_url').'" style="width:70%" />';
}
function flickr_callback($args) {
	echo '<input type="text" id="flickr_url" name="flickr_url" value="'.get_option('flickr_url').'" style="width:70%" />';
}
function rss_callback($args) {
	echo '<input type="text" id="rss_url" name="rss_url" value="'.get_option('rss_url').'" style="width:70%" /><p class="description">Default &rarr; '.get_bloginfo('rss2_url').'</p>';
}

/*
===============================================================================

  Modify the visual editor

===============================================================================
*/

// Customize tinymce buttons
add_filter("mce_buttons", "mce_buttons_row1", 0);
function mce_buttons_row1($buttons) {return array(
	"bold", "italic", /*"underline",*/ "strikethrough", "separator",
	"bullist", "numlist", "outdent", "indent", "separator",
	"justifyleft", "justifycenter", "justifyright", "separator",
	"link", "unlink", /*"anchor",*/ "separator",
	"formatselect", "separator",
	"help", "wp_adv"
);} // mce_buttons_row1()
add_filter("mce_buttons_2", "mce_buttons_row2", 0);
function mce_buttons_row2($buttons) {return array(
	"undo", "redo", "separator",
	"pastetext", "pasteword", "removeformat", "separator",
	"charmap", "blockquote", "separator",
	"wp_more", "separator"
	/*, "styleselect"*/
);} // mce_buttons_row2()
/*
add_filter('tiny_mce_before_init', 'new_mce_styles');
function new_mce_styles($init) {
	$init['theme_advanced_styles'] = 'Grey Callout Box=greycallout,Blue Callout box=bluecallout';
	return $init;
} // new_mce_styles()
*/

// Custom visual editor styles
add_editor_style('tinymce.css');

/*
===============================================================================

  Clean up wp_head

===============================================================================
*/

remove_action('wp_head', 'feed_links_extra', 3);	// all rss feeds
remove_action('wp_head', 'wp_generator');			// generator meta tag
remove_action('wp_head', 'rsd_link');				// really simple discovery
remove_action('wp_head', 'wlwmanifest_link');		// windows live writer
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// remove_action('wp_print_styles', 'wpcf7_enqueue_styles');	// contact form 7

// smart jquery inclusion
add_action('init', 'google_jquery');
function google_jquery() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, false, true);
		wp_enqueue_script('jquery');
	}
} // google_jquery()

/*
===============================================================================

  Add classes to body_class()

===============================================================================
*/

add_filter('body_class', 'new_body_classes');
function new_body_classes($classes) {

	global $wp_query;
	if (is_single()) :

		$wp_query->post = $wp_query->posts[0];
		setup_postdata($wp_query->post);
		$classes[] = $wp_query->post->post_name;
		foreach((array) get_the_category() as $cat) :
			if (!empty($cat->slug)) :
				$classes[] = sanitize_html_class($cat->slug, $cat->cat_ID);
			endif;
			while ($cat->parent) :
				$cat = &get_category((int) $cat->parent);
				if (!empty($cat->slug))
					$classes[] = sanitize_html_class($cat->slug, $cat->cat_ID);
			endwhile;
		endforeach;
		
	elseif (is_archive()) :
	
		$archive = $wp_query->get_queried_object();
		$classes[] = $archive->slug;
		while ($archive->parent != 0) :
			$archive = get_category($archive->parent);
			$classes[] = $archive->slug;
		endwhile;

	elseif (is_page()) :

		$wp_query->post = $wp_query->posts[0];
		setup_postdata($wp_query->post);
		$classes[] = $wp_query->post->post_name;

	endif;
	return $classes;
} // new_body_classes()

/*
===============================================================================

  highest_ancestor()

===============================================================================
*/

function highest_ancestor($args=0) {
	
	// merge passed arguments and defaults
	$defaults = array(
		'print'  => 0
	,	'return' => 0
	,	'stopat' => 0
	);
	$vars = wp_parse_args($args, $defaults);
	$posttype = get_post_type();
	
	if ( is_home() ) :
	
		$ancestor = array(
			'id'   => 0
		,	'slug' => 'home'
		,	'name' => 'Home'
		);
		
	elseif ( is_tax() ) :
		
		global $wp_query;
		$tax = $wp_query->get_queried_object();
		$ancestor = array(
			'id'   => $tax->term_id
		,	'slug' => $tax->slug
		,	'name' => $tax->name
		);
		
	elseif ( is_archive() || is_single() ) :
		
		if ( $posttype && $posttype!='post' && $posttype!='page' ) :
			global $wp_query;
			$archive = $wp_query->get_queried_object();
			$ancestor = array(
				'slug'      => $archive->rewrite['slug']
			,	'name'      => $archive->labels->name
			,	'query_var' => $archive->query_var
			);
		else :
			global $post;
			if ($post) :
				$archive = get_the_category($post->ID);
				$archive = $archive[0];
			else :
				global $wp_query;
				$archive = $wp_query->get_queried_object();
			endif;
	
			while ($archive->parent != 0) :
				$archive = get_category($archive->parent);
			endwhile;
			
			$ancestor = array(
				'id'   => $archive->cat_ID
			,	'slug' => $archive->slug
			,	'name' => $archive->name
			,	'count' => $archive->count
			);
		endif;
		
	elseif ( is_search() ) :

		$ancestor = array(
			'id'   => 0
		,	'slug' => 'search'
		,	'name' => 'Search Results'
		);
	
	elseif ( is_page() ) :

		global $post;
		$page = $post;
		
		while ($page->post_parent > 0 && $page->post_parent != $vars['stopat']) :
			$page = get_post($page->post_parent);
		endwhile;
		
		$ancestor = array(
			'id'   => $page->ID
		,	'slug' => $page->post_name
		,	'name' => $page->post_title
		);
	
	elseif ($posttype && $posttype!='post' && $posttype!='page' ) :
		
		$posttype = get_post_type_object($posttype);
		$ancestor = array(
			'slug' => sanitize_html_class(strtolower($posttype->labels->name))
		,	'name' => $posttype->labels->name
		);
		
	else :
	
		$ancestor = array(
			'id'   => 0
		,	'slug' => '404'
		,	'name' => 'Page Not Found'
		);
	
	endif;
	
	if     ($vars['print'])  : print $ancestor[$vars['print']];
	elseif ($vars['return']) : return $ancestor[$vars['return']];
	else : return $ancestor;
	endif;

} // highest_ancestor()

/*
===============================================================================

  Excerpt functions

===============================================================================
*/

// change excerpt length and more text
function new_excerpt_more($more) {return '&hellip;';}
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_length($length) {return 35;}
add_filter('excerpt_length', 'new_excerpt_length');

// add excerpts to pages
function add_page_excerpt_meta_box() {
    add_meta_box( 'postexcerpt', __('Excerpt'), 'post_excerpt_meta_box', 'page', 'normal', 'core' );
}
add_action( 'admin_menu', 'add_page_excerpt_meta_box' );

// custom excerpt function
function get_excerpt($post, $maxwords=0, $truncate=0) {
	
	$maxwords = (!$maxwords) ? new_excerpt_length('') : $maxwords;
	
	if ($post->post_excerpt) :
		$excerpt = $post->post_excerpt;
		if (!$truncate) :
			return $excerpt;
		endif;
	else :
		$excerpt = strip_tags($post->post_content, '<br />, <br>');
	endif;
	
	$words = explode(' ', $excerpt);
	
	if (count($words) > $maxwords) :
		array_splice($words, $maxwords);
		$excerpt = implode(' ', $words).new_excerpt_more('');
	endif;
	
	return $excerpt;
	
} // get_excerpt(), like get_the_excerpt(), but with options

/*
===============================================================================

  Pagination

===============================================================================
*/

function pagination($prev='&larr; Previous', $next='Next &rarr;') {
	
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	$pagination = array(
		'base'      => @add_query_arg('paged','%#%'),
		'format'    => '',
		'total'     => $wp_query->max_num_pages,
		'current'   => $current,
		'prev_text' => __($prev),
		'next_text' => __($next),
		'type'      => 'plain'
	);
	
	if( $wp_rewrite->using_permalinks() ) :
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
	endif;
	
	if ( !empty($wp_query->query_vars['s']) ) :
		$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
	endif;
	
	$links = paginate_links($pagination);
	echo $links
		? '<p id="pagination">'.$links.'</p>'
		: '';
		
} // pagination()

/*
===============================================================================

  Gallery and Media adjustments

===============================================================================
*/

add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));

add_filter('img_caption_shortcode', 'fixcaption', 10, 3);
function fixcaption($x=null, $attr, $content) {

    extract(shortcode_atts(array(
            'id'    => '',
            'align'    => 'alignnone',
            'width'    => '',
            'caption' => ''
        ), $attr));

    if ( 1 > (int) $width || empty($caption) ) {
        return $content;
    }

    if ( $id ) $id = 'id="' . $id . '" ';

	return '<div ' . $id . 'class="wp-caption ' . $align . '" style="width: ' . ((int) $width) . 'px">'
	. $content . '<p class="wp-caption-text">' . $caption . '</p></div>';
	
} // fixcaption()

?>