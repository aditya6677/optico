<?php

/**
 *  ThemeStek: Schedule Box
 */

	$params = array_merge(
		ts_vc_heading_params(),
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Extra class name', 'optico' ),
				'param_name'  => 'el_class',
				'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'optico' ),
			),
			array(
			'type'			=> 'param_group',
			'heading'		=> esc_attr__( 'Timelist', 'optico' ),
			'param_name'	=> 'pricelist',
			'group'			=> esc_attr__( 'Timelist', 'optico' ),
			'description'	=> esc_attr__( 'Set Service price', 'optico' ),
			'value'			=> urlencode( json_encode( array(
				array(
					'service_name' => esc_attr__( 'Monday - Friday', 'optico' ),
					'price'        => esc_attr__('8:00am - 7:00pm', 'optico' ),
				),

			))),
			'params' => array(
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Week Days', 'optico' ),
						'param_name'  => 'service_name',
						'description' => esc_attr__( 'Fill Service information here', 'optico' ),
						// 'value'       => '',
						'group'       => esc_attr__( 'Timelist', 'optico' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Timing', 'optico' ),
						'param_name'  => 'price',
						// 'value'       => '',
						'description' => esc_attr__( 'Fill Price details here eg: $30', 'optico' ),
						'group'       => esc_attr__( 'Timelist', 'optico' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

			),
		),

		)
	);

	global $ts_vc_custom_element_pricelistbox;
	$ts_vc_custom_element_pricelistbox = $params;

	vc_map( array(
		'name'        => esc_attr__( 'ThemeStek Timelist Box', 'optico' ),
		'base'        => 'ts-pricelistbox',
		"class"    => "",
		"icon"        => "icon-themestek-vc",
		'category'    => esc_attr__( 'THEMESTEK', 'optico' ),
		'params'      => $params,
	) );
