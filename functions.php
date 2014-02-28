<?
/*
** No PHP here
** Only all require_once() calls
** to files in /functions
*/

if (!function_exists('cnp_theme_path'))
	return false;

require_once cnp_theme_path('functions/enqueues.php');
