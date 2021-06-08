<?php

/* Options */

$allParams = array(
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_attr__("Twitter handle (Twitter Username)",'optico'),
			"param_name"	=> "username",
			"description"	=> esc_attr__('Twitter user name. Example "envato".','optico')
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_attr__('"Follow us" text after big icon','optico'),
			"param_name"	=> "followustext",
			"description"	=> esc_attr__('(optional) Follow us text after the big Twitter icon so user can click on it and go to Twitter profile page.','optico')
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_attr__("Show Tweets",'optico'),
			"param_name"	=> "show",
			"description"	=> esc_attr__('How many Tweets you like to show.','optico'),
			'value' => array(
				esc_attr__( '1', 'optico' ) => '1',
				esc_attr__( '2', 'optico' ) => '2',
				esc_attr__( '3', 'optico' ) => '3',
				esc_attr__( '4', 'optico' ) => '4',
				esc_attr__( '5', 'optico' ) => '5',
				esc_attr__( '6', 'optico' ) => '6',
				esc_attr__( '7', 'optico' ) => '7',
				esc_attr__( '8', 'optico' ) => '8',
				esc_attr__( '9', 'optico' ) => '9',
				esc_attr__( '10', 'optico' ) => '10',
			),
			'std' => '3',
		),

	);

$boxParams  = ts_box_params();
$css_editor = array( ts_vc_ele_css_editor_option() );

$params = array_merge( $allParams, $boxParams, $css_editor );

// Changing default values
$i = 0;
foreach( $params as $param ){

	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;

	if( $param_name == 'column' ){
		$params[$i]['std'] = 'one';

	} else if( $param_name == 'view' ){
		$params[$i]['std'] = 'carousel';

	} else if( $param_name == 'carousel_dots' ){
		$params[$i]['std'] = 'true';

	} else if( $param_name == 'carousel_nav' ){ // Removing "About Carousel" option as it's not used here.
		unset( $params[$i]['value']["Above Carousel"] );

	}

	$i++;
}

global $ts_sc_params_twitterbox;
$ts_sc_params_twitterbox = $params;

vc_map( array(
	"name"        => esc_attr__("ThemeStek Twitter Box",'optico'),
	"base"        => "ts-twitterbox",
	"class"       => "",
	'category' => esc_attr__( 'THEMESTEK', 'optico' ),
	"icon"        => "icon-themestek-vc",
	"params"      => $params,
) );