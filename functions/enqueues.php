<?
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('cnp-css-screen', cnp_theme_url('css/styles.css'), false, date('ynd'), 'screen');
	wp_enqueue_style('cnp-css-print', cnp_theme_url('css/print.css'), false, date('ynd'), 'print');

	wp_enqueue_script('cnp-site', cnp_theme_url('js/site.min.js'), array('jquery'), false, true);
});
