<?
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_script('cnp-site', cnp_theme_url('js/site.min.js'), array('jquery'), false, true);
});
