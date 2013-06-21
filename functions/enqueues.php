<?

add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_script('cnp-app', cnp_theme_url('scripts/app.min.js'), array('jquery'), false, true);
	}
);
