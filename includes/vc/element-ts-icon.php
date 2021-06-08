<?php

/* Options for ThemeStek Icon */

/*
 * Icon Element
 * @since 4.4
 */

/**
 *  Show selected icon library only
 */
global $optico_theme_options;

// Temporary new list of icon libraries
$icon_library = array( // all icon library list array
	'themify'        => array( esc_attr__( 'Themify icons', 'optico' ),   'themifyicon ti-thumb-up'),
	'linecons'       => array( esc_attr__( 'Linecons', 'optico' ), 'vc_li vc_li-star'),
	//'sgicon'		 => array( esc_attr__( 'Stroke Gap Icons', 'optico' ), 'sgicon sgicon-WorldWide'),
	'tsoptmicon'	=> array( esc_attr__( 'TS Optometrist Icon', 'optico' ),  'tsoptmicon' ),
);

$icon_element_array  = array();
$icon_dropdown_array = array( esc_attr__( 'Font Awesome', 'optico' )    => 'fontawesome' );   // Font Awesome icons

if( is_array($icon_library) && count($icon_library)>0 ){
foreach( $icon_library as $library_id=>$library ){

	$icon_dropdown_array[$library[0]] = $library_id;

	$icon_element_array[]  = array(
		'type'        => 'themestek_iconpicker',
		'heading'     => esc_attr__( 'Icon', 'optico' ),
		'param_name'  => 'icon_'.$library_id,
		'value'       => $library[1], // default value to backend editor admin_label
		'settings'    => array(
			'emptyIcon'    => false, // default true, display an "EMPTY" icon?
			'type'         => $library_id,
		),
		'dependency'  => array(
			'element'   => 'type',
			'value'     => $library_id,
		),
		'description' => esc_attr__( 'Select icon from library.', 'optico' ),
		'edit_field_class' => 'vc_col-sm-9 vc_column',
	);

}
}
/* Select icon library code end here */

// All icon related elements
$icon_elements = array_merge(
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Icon library', 'optico' ),
			'value'       => $icon_dropdown_array,
			'std'         => '',
			'admin_label' => true,
			'param_name'  => 'type',
			'description' => esc_attr__( 'Select icon library.', 'optico' ),
			'edit_field_class' => 'vc_col-sm-3 vc_column',
		)
	),
	array(
		array(  // Font Awesome icons
			'type'       => 'themestek_iconpicker',
			'heading'    => esc_attr__( 'Icon', 'optico' ),
			'param_name' => 'icon_fontawesome',
			'value'      => 'fa fa-thumbs-o-up', // default value to backend editor admin_label
			'settings'   => array(
				'emptyIcon'    => false, // default true, display an "EMPTY" icon?
				'type'         => 'fontawesome',
			),
			'dependency' => array(
				'element'  => 'type',
				'value'    => 'fontawesome',
			),
			'description' => esc_attr__( 'Select icon from library.', 'optico' ),
			'edit_field_class' => 'vc_col-sm-9 vc_column',
		),
	),

	array(
		array(  // Optico special icons
			'type'       => 'themestek_iconpicker',
			'heading'    => esc_attr__( 'Icon', 'optico' ),
			'param_name' => 'icon_ts_optico',
			'value'      => 'flaticon-honey', // default value to backend editor admin_label
			'settings'   => array(
				'emptyIcon'    => false, // default true, display an "EMPTY" icon?
				'type'         => 'ts_optico',
			),
			'dependency' => array(
				'element'  => 'type',
				'value'    => 'ts_optico',
			),
			'description' => esc_attr__( 'Select icon from library.', 'optico' ),
			'edit_field_class' => 'vc_col-sm-9 vc_column',
		)
	),

	$icon_element_array

);

$allparams = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Icon color', 'optico' ),
		'param_name'  => 'color',
		'value'       => array_merge( 
			ts_getVcShared( 'colors' ),
			array(
				esc_attr__( 'Classic Grey', 'optico' )      => 'bar_grey',
				esc_attr__( 'Classic Blue', 'optico' )      => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'optico' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'optico' )     => 'bar_green',
				esc_attr__( 'Classic Orange', 'optico' )    => 'bar_orange',
				esc_attr__( 'Classic Red', 'optico' )       => 'bar_red',
				esc_attr__( 'Classic Black', 'optico' )     => 'bar_black',
			),
			array( esc_attr__( 'Custom color', 'optico' ) => 'custom' )
		),
		'std'         => 'skincolor',
		'description' => esc_attr__( 'Select icon color.', 'optico' ),
		'param_holder_class' => 'ts_vc_colored-dropdown',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_attr__( 'Custom color', 'optico' ),
		'param_name'  => 'custom_color',
		'description' => esc_attr__( 'Select custom icon color.', 'optico' ),
		'dependency'  => array(
			'element'   => 'color',
			'value'     => 'custom',
		),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Background shape', 'optico' ),
		'param_name'  => 'background_style',
		'value'       => array(
			esc_attr__( 'None', 'optico' ) => '',
			esc_attr__( 'Circle', 'optico' ) => 'rounded',
			esc_attr__( 'Square', 'optico' ) => 'boxed',
			esc_attr__( 'Rounded', 'optico' ) => 'rounded-less',
			esc_attr__( 'Outline Circle', 'optico' ) => 'rounded-outline',
			esc_attr__( 'Outline Square', 'optico' ) => 'boxed-outline',
			esc_attr__( 'Outline Rounded', 'optico' ) => 'rounded-less-outline',
		),
		'std'         => '',
		'description' => esc_attr__( 'Select background shape and style for icon.', 'optico' ),
		'param_holder_class' => 'ts-simplify-textarea',
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Background color', 'optico' ),
		'param_name'  => 'background_color',
		'value'       => array_merge( array( esc_attr__( 'Transparent', 'optico' ) => 'transparent' ), ts_getVcShared( 'colors' ), array( esc_attr__( 'Custom color', 'optico' ) => 'custom' ) ),
		'std'         => 'grey',
		'description' => esc_attr__( 'Select background color for icon.', 'optico' ),
		'param_holder_class' => 'ts_vc_colored-dropdown',
		'dependency'  => array(
			'element'   => 'background_style',
			'not_empty' => true,
		),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_attr__( 'Custom background color', 'optico' ),
		'param_name'  => 'custom_background_color',
		'description' => esc_attr__( 'Select custom icon background color.', 'optico' ),
		'dependency'  => array(
			'element'   => 'background_color',
			'value'     => 'custom',
		),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Size', 'optico' ),
		'param_name'  => 'size',
		'value'       => array_merge( ts_getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
		'std'         => 'md',
		'description' => esc_attr__( 'Icon size.', 'optico' )
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Icon alignment', 'optico' ),
		'param_name' => 'align',
		'value'      => array(
			esc_attr__( 'Left', 'optico' )   => 'left',
			esc_attr__( 'Right', 'optico' )  => 'right',
			esc_attr__( 'Center', 'optico' ) => 'center',
		),
		'std'         => 'left',
		'description' => esc_attr__( 'Select icon alignment.', 'optico' ),
	),
	array(
		'type'        => 'vc_link',
		'heading'     => esc_attr__( 'URL (Link)', 'optico' ),
		'param_name'  => 'link',
		'description' => esc_attr__( 'Add link to icon.', 'optico' )
	),
	vc_map_add_css_animation(),
	ts_vc_ele_extra_class_option(),
	ts_vc_ele_css_editor_option(),
);

// All params
$params = array_merge( $icon_elements, $allparams );

global $ts_sc_params_icon;
$ts_sc_params_icon = $params;

vc_map( array(
	'name'     => esc_attr__( 'ThemeStek Icon', 'optico' ),
	'base'     => 'ts-icon',
	'icon'     => 'icon-themestek-vc',
	'category' => array( esc_attr__( 'THEMESTEK', 'optico' ) ),
	'admin_enqueue_css' => array(get_template_directory_uri().'/libraries/themify-icons/themify-icons.css', get_template_directory_uri().'/libraries/twemoji-awesome/twemoji-awesome.css' ),
	'params'   => $params,
	'js_view'  => 'VcIconElementView_Backend',
) );
