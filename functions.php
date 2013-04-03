<?
require_once('functions-general.php');

//  ADD THEME FANCYNESS  ///////////////////////////////////////////////////////

//add_image_size('name', 800, 600, $crop[bool]);

/*
// sidebars
register_sidebar(array(
	'name' => 'Widgets',
	'id'   => 'widgets',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div><!-- widget -->',
	'before_title'  => '<h2 class="title">',
	'after_title'   => '</h2>'
));
*/

//  CUSTOM POST TYPES AND TAXONOMIES  ///////////////////////////////////////////////////////

/*
add_action('init', 'custom_post_types', 0);
function custom_post_types() {

	register_post_type('link', array(
		'labels' => array(
			'name'               => 'Links'
		,	'singular_name'      => 'Link'
		,	'add_new'            => 'Add New Link'
		,	'add_new_item'       => 'Add New Link'
		,	'edit_item'          => 'Edit Link'
		,	'new_item'           => 'New Link'
		,	'all_items'          => 'All Links'
		,	'view_item'          => 'View Link'
		,	'search_items'       => 'Search Links'
		,	'not_found'          => 'No links found'
		,	'not_found_in_trash' => 'No links found in Trash'
		)
	,	'public'          => true
	,	'query_var'       => true
	,	'capability_type' => 'post'
	,	'hierarchical'    => false
	,	'has_archive'     => true
	,	'rewrite'         => true
	,	'supports'        => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes')
	)); // link post type
	
	register_taxonomy('team', 'reading-log', array(
		'labels' => array(
			'name'          => 'Teams'
		,	'singular_name' => 'Team'
		,	'search_items'  => 'Search Teams'
		,	'edit_item'     => 'Edit Team'
		,	'add_new_item'  => 'Add New Team'
		)
	,	'hierarchical' => true
	,	'query_var'    => true
	,	'rewrite'      => false
	)); // sports taxonomy
	
} // custom_post_types()
*/

//  SHORTCODES  ///////////////////////////////////////////////////////

/*
add_shortcode('shortcode_name', 'function_name');
function function_name($atts) {

	$defaults = array(
		'variable1' => true,
		'variable2' => 'text',
		'variable3' => 12345,
	);
	$vars = wp_parse_args($atts, $defaults);
	
	$return = 'this prints to the screen';
	
	return $return;

} // function_name()
*/

//  WIDGETS  ///////////////////////////////////////////////////////

/*
add_action('widgets_init', 'register_theme_widgets');

function register_theme_widgets() {
	register_widget( 'theme_widget_name' );
}

class theme_widget_name extends WP_Widget {

	// constructor
	function theme_widget_name() {
		parent::WP_Widget(
			$id = 'theme_widget_name'
		,	$name = 'Name'
		,	$options = array( 'description' => '' )
		);
	}
	
	// output the content of the widget
	function widget($args, $instance) {		
		extract($args);
		print $before_widget;
		if ($instance['title']) { print $before_title.$instance['title'].$after_title; }
		print $after_widget;
	}
	
	// process widget options to be saved
	function update($new_instance, $old_instance) {
		$instance = wp_parse_args($new_instance, $old_instance);
		return $instance;
	}
	
	// output the options form on admin
	function form($instance) {
		global $wpdb;
		$instance = array_map('esc_attr', $instance);
		?>
		<p>
		<label for="<?=$this->get_field_id('title')?>">Title</label>
		<input class="widefat" id="<?=$this->get_field_id('title')?>" name="<?=$this->get_field_name('title')?>" type="text" value="<?=$instance['title']?>" />
		</p>
		<?
	}
	
} // theme_widget_name
*/

?>
