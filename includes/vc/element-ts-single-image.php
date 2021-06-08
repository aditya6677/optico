<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$params = array(
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Widget title', 'optico' ),
		'param_name'	=> 'title',
		'description'	=> esc_attr__( 'Enter text used as widget title (Note: located above content element).', 'optico' ),
	),
	array(
		'type'			=> 'themestek_attach_image',
		'heading'		=> esc_attr__( 'Image', 'optico' ),
		'param_name'	=> 'image',
		'value'			=> '',
		'description'	=> esc_attr__( 'Select image from media library.', 'optico' ),
		'admin_label'	=> true,
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Image alignment', 'optico' ),
		'param_name' => 'alignment',
		'value' => array(
			esc_attr__( 'Left', 'optico' ) => 'left',
			esc_attr__( 'Right', 'optico' ) => 'right',
			esc_attr__( 'Center', 'optico' ) => 'center',
		),
		'description' => esc_attr__( 'Select image alignment.', 'optico' ),
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Extra class name', 'optico' ),
		'param_name' => 'el_class',
		'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'optico' ),
	),
	array(
		'type' => 'css_editor',
		'heading' => esc_attr__( 'CSS box', 'optico' ),
		'param_name' => 'css',
		'group' => esc_attr__( 'Design Options', 'optico' ),
	),
);

global $ts_sc_params_single_image;
$ts_sc_params_single_image = $params;

vc_map( array(
	'name'		=> esc_attr__( 'ThemeStek Single Image', 'optico' ),
	'base'		=> 'ts-single-image',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> array( esc_attr__( 'THEMESTEK', 'optico' ) ),
	'params'	=> $params,
) );
