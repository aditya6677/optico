<?php

// Icon picker
$icons_params = vc_map_integrate_shortcode( 'ts-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	), array(
		'element' => 'add_icon',
		'value' => 'true',
	)
);

// each progress bar options
$param_group = array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Label', 'optico' ),
		'param_name' => 'label',
		'description' => esc_attr__( 'Enter text used as title of bar.', 'optico' ),
		'admin_label' => true,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Value', 'optico' ),
		'param_name' => 'value',
		'description' => esc_attr__( 'Enter value of bar.', 'optico' ),
		'admin_label' => true,
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Color', 'optico' ),
		'param_name' => 'color',
		'value' => array(
				esc_attr__( 'Default', 'optico' ) => '',
			) + array(
				esc_attr__( 'Classic Grey', 'optico' ) => 'bar_grey',
				esc_attr__( 'Classic Blue', 'optico' ) => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'optico' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'optico' ) => 'bar_green',
				esc_attr__( 'Classic Orange', 'optico' ) => 'bar_orange',
				esc_attr__( 'Classic Red', 'optico' ) => 'bar_red',
				esc_attr__( 'Classic Black', 'optico' ) => 'bar_black',
			) + ts_getVcShared( 'colors-dashed' ),
		'description' => esc_attr__( 'Select single bar background color.', 'optico' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),

	// Show / Hide icon
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Show Icon?', 'optico' ),
		'param_name' => 'add_icon',
		'value'      => array(
			esc_attr__( 'Yes', 'optico' ) => 'true',
			esc_attr__( 'No', 'optico' )  => 'false',
		),
		'std'         => 'true',
		'description' => esc_attr__( 'Want to show icon with the progress bar.', 'optico' ),
	)
);

// Merging icon with other options
$param_group = array_merge( $param_group, $icons_params );

$params =  array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Widget title', 'optico' ),
		'param_name' => 'title',
		'description' => esc_attr__( 'Enter text used as widget title (Note: located above content element).', 'optico' ),
	),
	array(
		'type' => 'param_group',
		'heading' => esc_attr__( 'Values', 'optico' ),
		'param_name' => 'values',
		'description' => esc_attr__( 'Enter values for graph - value, title and color.', 'optico' ),
		'value' => urlencode( json_encode( array(
			array(
				'label' => esc_attr__( 'REFRACTIVE SURGERY', 'optico' ),
				'value' => '90',
			),
			array(
				'label' => esc_attr__( 'CATARACT SURGERY', 'optico' ),
				'value' => '80',
			),
			array(
				'label' => esc_attr__( 'GLAUCOMA', 'optico' ),
				'value' => '70',
			),
		) ) ),
		'params' => $param_group,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Units', 'optico' ),
		'param_name' => 'units',
		'description' => esc_attr__( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'optico' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Color', 'optico' ),
		'param_name' => 'bgcolor',
		'std' => 'skincolor',
		'value' => array(
				esc_attr__( 'Classic Grey', 'optico' ) => 'bar_grey',
				esc_attr__( 'Classic Blue', 'optico' ) => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'optico' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'optico' ) => 'bar_green',
				esc_attr__( 'Classic Orange', 'optico' ) => 'bar_orange',
				esc_attr__( 'Classic Red', 'optico' ) => 'bar_red',
				esc_attr__( 'Classic Black', 'optico' ) => 'bar_black',
			) + ts_getVcShared( 'colors-dashed' ),
		'description' => esc_attr__( 'Select bar background color.', 'optico' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),
	array(
		'type' => 'checkbox',
		'heading' => esc_attr__( 'Options', 'optico' ),
		'param_name' => 'options',
		'value' => array(
			esc_attr__( 'Add stripes', 'optico' ) => 'striped',
			esc_attr__( 'Add animation (Note: visible only with striped bar).', 'optico' ) => 'animated',
		),
	),
);

$params = array_merge(
	$params,
	array( vc_map_add_css_animation() ),
	array( ts_vc_ele_extra_class_option() ),
	array( ts_vc_ele_css_editor_option() )
);

global $ts_sc_params_progressbar;
$ts_sc_params_progressbar = $params;

vc_map( array(
	'name'		=> esc_attr__( 'ThemeStek Progress Bar', 'optico' ),
	'base'		=> 'ts-progress-bar',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_attr__( 'THEMESTEK', 'optico' ),
	'params'	=> $params
) );
