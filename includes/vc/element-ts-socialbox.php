<?php

/* Options */

// Getting social list
$global_social_list = ts_shared_social_list();

$sociallist = array_merge(
	array('' => esc_attr__('Select service','optico')),
	$global_social_list,
	array('rss'     => 'Rss Feed')
);
$sociallist = array_flip($sociallist);

$params = array_merge(
	ts_vc_heading_params(),
	array(
		array(
			'type'        => 'param_group',
			'heading'     => esc_attr__( 'Social Services List', 'optico' ),
			'param_name'  => 'socialservices',
			'description' => esc_attr__( 'Select social service and add URL for it.', 'optico' ).'<br><strong>'.esc_attr__('NOTE:','optico').'</strong> '.esc_attr__("You don't need to add URL if you are selecting 'RSS' in the social service",'optico'),
			'group'       => esc_attr__( 'Social Services', 'optico' ),
			'params'     => array(
				array( // First social service
					'type'        => 'dropdown',
					'heading'     => esc_attr__( 'Select Social Service', 'optico' ),
					'param_name'  => 'servicename',
					'std'         => 'none',
					'value'       => $sociallist,
					'description' => esc_attr__( 'Select social service', 'optico' ),
					'group'       => esc_attr__( 'Social Services', 'optico' ),
					'admin_label' => true,
					'edit_field_class' => 'vc_col-sm-4 vc_column',
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_attr__( 'Social URL', 'optico' ),
					'param_name'  => 'servicelink',
					'dependency'  => array(
						'element'            => 'servicename',
						'value_not_equal_to' => array( 'rss' )
					),
					'value'       => '',
					'description' => esc_attr__( 'Fill social service URL', 'optico' ),
					'group'       => esc_attr__( 'Social Services', 'optico' ),
					'admin_label' => true,
					'edit_field_class' => 'vc_col-sm-8 vc_column',
				),
			),
		),
		array( // First social service
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Select column', 'optico' ),
			'param_name'  => 'column',
			'value'       => array(
				esc_attr__('One column','optico')   => 'one',
				esc_attr__('Two column','optico')   => 'two',
				esc_attr__('Three column','optico') => 'three',
				esc_attr__('Four column','optico')  => 'four',
				esc_attr__('Five column','optico')  => 'five',
				esc_attr__('Six column','optico')   => 'six',
			),
			'std'         => 'six',
			'description' => esc_attr__( 'Select how many column will show the social icons', 'optico' ),
			'group'       => esc_attr__( 'Social Services', 'optico' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array( // First social service
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Social icon size', 'optico' ),
			'param_name'  => 'iconsize',
			'std'         => 'large',
			'value'       => array(
				esc_attr__('Small icon','optico')  => 'small',
				esc_attr__('Medium icon','optico') => 'medium',
				esc_attr__('Large icon','optico')  => 'large',
			),
			'description' => esc_attr__( 'Select social icon size', 'optico' ),
			'group'       => esc_attr__( 'Social Services', 'optico' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
	),

	array( vc_map_add_css_animation() ),
	array( ts_vc_ele_extra_class_option() ),
	array( ts_vc_ele_css_editor_option() )

);

global $ts_sc_params_socialbox;
$ts_sc_params_socialbox = $params;

vc_map( array(
	'name'        => esc_attr__( 'ThemeStek Social Box', 'optico' ),
	'base'        => 'ts-socialbox',
	"icon"        => "icon-themestek-vc",
	'category'    => esc_attr__( 'THEMESTEK', 'optico' ),
	'params'      => $params,
) );