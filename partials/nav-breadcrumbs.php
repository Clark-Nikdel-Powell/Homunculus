<?
if ( function_exists('HAG_Breadcrumbs') ) {

	$args = array(
		'prefix'          => '<span class="prefix">You are here:</span> '
	,	'home_show'       => true
	,	'wrapper_element' => 'div'
	,	'wrapper_class'   => 'inside'
	,	'wrapper_id'      => ''
	,	'crumb_element'   => 'span'
	,	'crumb_class'     => 'crumb'
	,	'separator'       => ' <span class="sep">/</span> '
	);

	HAG_Breadcrumbs($args);
}