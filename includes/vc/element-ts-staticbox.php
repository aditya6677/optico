<?php

$heading_element = vc_map_integrate_shortcode( 'ts-heading', '', esc_attr__('Heading','optico'),
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);

$boxParams = ts_box_params('staticbox');

// each staticbox options
$param_group = array(
	array(
		'type' => 'attach_image',
		'heading' => esc_attr__( 'Box Image', 'optico' ),
		'param_name' => 'boximage',
		'description' => esc_attr__( 'Select image.', 'optico' ),
		'admin_label' => true,
		'edit_field_class'	=> 'vc_col-sm-4 vc_column',
	),

	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Box Title', 'optico' ),
		'param_name' => 'label',
		'description' => esc_attr__( 'Enter text used as title of bar.', 'optico' ),
		'admin_label' => true,

	),
	array(
		'type' => 'textarea',
		'heading' => esc_attr__( 'Highlight Text', 'optico' ),
		'param_name' => 'smalltext',
		'description' => esc_attr__( 'Enter small text. This text will appear on image.', 'optico' ),
		'admin_label' => true,
	),
);

$params =  array(
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Box Image size', 'optico' ),
		'param_name'	=> 'img_size',
		'value'			=> 'full',
		'description'	=> '<strong>'.esc_attr__( 'NOTE:', 'optico' ) . '</strong> ' . esc_attr__( 'This is common for all images in all boxes. This will apply to all images in all boxes.', 'optico' ) . '<br>' . esc_attr__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'optico' ),
	),
	array(
		'type' => 'param_group',
		'heading' => esc_attr__( 'Boxes', 'optico' ),
		'param_name' => 'values',
		'description' => esc_attr__( 'Enter values for graph - value, title and color.', 'optico' ),
		'value' => urlencode( json_encode( array(
			array(
				'attach_image'	=> '',
				'label'			=> esc_attr('Surgical Procedures'),
				'smalltext'		=> esc_attr('Doctor Timetable Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.'),
			),
			array(
				'attach_image'	=> '',
				'label'			=> esc_attr('Refractive Nature'),
				'smalltext'		=> esc_attr('Doctor Timetable Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.'),
			),
			array(
				'attach_image'	=> '',
				'label'			=> esc_attr('Transitions Lenses'),
				'smalltext'		=> esc_attr('Doctor Timetable Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.'),
			),
		) ) ),
		'params' => $param_group,
	),

);

$params = array_merge(
	$heading_element,
	$params,
	array( vc_map_add_css_animation() ),
	$boxParams,
	array( ts_vc_ele_extra_class_option() ),
	array( ts_vc_ele_css_editor_option() )
);

global $ts_sc_params_staticbox;
$ts_sc_params_staticbox = $params;

vc_map( array(
	'name'		=> esc_attr__( 'ThemeStek Static Content box', 'optico' ),
	'base'		=> 'ts-staticbox',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_attr__( 'THEMESTEK', 'optico' ),
	'params'	=> $params
) );
