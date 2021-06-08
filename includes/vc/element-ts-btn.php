<?php

/* Options for ThemeStek Button */

global $ts_pixel_icons;
$icons_params = vc_map_integrate_shortcode( 'ts-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	), array(
		'element' => 'add_icon',
		'value' => 'true',
	)
);
// populate integrated ts-icons params.
if ( is_array( $icons_params ) && ! empty( $icons_params ) ) {
	foreach ( $icons_params as $key => $param ) {
		if ( is_array( $param ) && ! empty( $param ) ) {
			if ( 'i_type' === $param['param_name'] ) {
				// Do nothing
			}
			if ( isset( $param['admin_label'] ) ) {
				// remove admin label
				unset( $icons_params[ $key ]['admin_label'] );
			}

		}
	}
}
$params = array_merge(
	array(
		array(
			'type'       => 'textfield',
			'heading'    => esc_attr__( 'Text', 'optico' ),
			'param_name' => 'title',
			'value'      => esc_attr__( 'Text on the button', 'optico' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => esc_attr__( 'URL (Link)', 'optico' ),
			'param_name' => 'link',
			'description' => esc_attr__( 'Add link to button.', 'optico' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Style', 'optico' ),
			'description' => esc_attr__( 'Select button display style.', 'optico' ),
			'param_name' => 'style',
			'std'		 => 'flat',
			'value' => array(
				esc_attr__( 'Flat', 'optico' ) => 'flat',
				esc_attr__( 'Modern', 'optico' ) => 'modern',
				esc_attr__( 'Classic', 'optico' ) => 'classic',
				esc_attr__( 'Outline', 'optico' ) => 'outline',
				esc_attr__( '3d', 'optico' ) => '3d',
				esc_attr__( 'Simple Text', 'optico' ) => 'text',
				esc_attr__( 'Custom', 'optico' ) => 'custom',
				esc_attr__( 'Outline custom', 'optico' ) => 'outline-custom',
				esc_attr__( 'Gradient', 'optico' ) => 'gradient',
				esc_attr__( 'Gradient Custom', 'optico' ) => 'gradient-custom',
			),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Gradient Color 1', 'optico' ),
			'param_name' => 'gradient_color_1',
			'description' => esc_attr__( 'Select first color for gradient.', 'optico' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => ( ( function_exists('vc_get_shared') ) ? vc_get_shared( 'colors-dashed' ) : getVcShared( 'colors-dashed' ) ),
			'std' => 'turquoise',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Gradient Color 2', 'optico' ),
			'param_name' => 'gradient_color_2',
			'description' => esc_attr__( 'Select second color for gradient.', 'optico' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => ( ( function_exists('vc_get_shared') ) ? vc_get_shared( 'colors-dashed' ) : getVcShared( 'colors-dashed' ) ),
			'std' => 'blue',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Gradient Color 1', 'optico' ),
			'param_name' => 'gradient_custom_color_1',
			'description' => esc_attr__( 'Select first color for gradient.', 'optico' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#dd3333',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Gradient Color 2', 'optico' ),
			'param_name' => 'gradient_custom_color_2',
			'description' => esc_attr__( 'Select second color for gradient.', 'optico' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#eeee22',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Button Text Color', 'optico' ),
			'param_name' => 'gradient_text_color',
			'description' => esc_attr__( 'Select button text color.', 'optico' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#ffffff',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),

		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Background', 'optico' ),
			'param_name' => 'custom_background',
			'description' => esc_attr__( 'Select custom background color for your element.', 'optico' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'custom' )
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std' => '#ededed',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Text', 'optico' ),
			'param_name' => 'custom_text',
			'description' => esc_attr__( 'Select custom text color for your element.', 'optico' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'custom' )
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Outline and Text', 'optico' ),
			'param_name' => 'outline_custom_color',
			'description' => esc_attr__( 'Select outline and text color for your element.', 'optico' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Hover background', 'optico' ),
			'param_name' => 'outline_custom_hover_background',
			'description' => esc_attr__( 'Select hover background color for your element.', 'optico' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Hover text', 'optico' ),
			'param_name' => 'outline_custom_hover_text',
			'description' => esc_attr__( 'Select hover text color for your element.', 'optico' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#fff',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Shape', 'optico' ),
			'description' => esc_attr__( 'Select button shape.', 'optico' ),
			'param_name'  => 'shape',
			'std'		  => 'rounded',
			'value'       => array(
				esc_attr__( 'Square', 'optico' ) => 'square',
				esc_attr__( 'Rounded', 'optico' ) => 'rounded',
				esc_attr__( 'Round', 'optico' ) => 'round',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Color', 'optico' ),
			'param_name' => 'color',
			'description' => esc_attr__( 'Select button color.', 'optico' ),
			'param_holder_class' => 'ts_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => array(
							esc_attr__( '[Skin Color]', 'optico' ) => 'skincolor',
							esc_attr__( 'Classic Grey', 'optico' ) => 'default',
							esc_attr__( 'Classic Blue', 'optico' ) => 'primary',
							esc_attr__( 'Classic Turquoise', 'optico' ) => 'info',
							esc_attr__( 'Classic Green', 'optico' ) => 'success',
							esc_attr__( 'Classic Orange', 'optico' ) => 'warning',
							esc_attr__( 'Classic Red', 'optico' ) => 'danger',
							esc_attr__( 'Classic Black', 'optico' ) => 'inverse'
					   ) + ts_getVcShared( 'colors-dashed' ),
			'std' => 'skincolor',
			'dependency' => array(
				'element' => 'style',
				'value_not_equal_to' => array( 'custom', 'outline-custom' )
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Button Size', 'optico' ),
			'param_name' => 'size',
			'description' => esc_attr__( 'Select button display size.', 'optico' ),
			'std' => 'md',
			'value' => ts_getVcShared( 'sizes' ),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Button Text Bold?', 'optico' ),
			'param_name'  => 'font_weight',
			'description' => esc_attr__( 'Select YES if you like to bold the font text.', 'optico' ),
			'std'         => 'yes',
			'value'       => array(
				esc_attr__( 'Yes', 'optico' ) => 'yes',
				esc_attr__( 'No', 'optico' )  => 'no',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Alignment', 'optico' ),
			'param_name' => 'align',
			'description' => esc_attr__( 'Select button alignment.', 'optico' ),
			'value' => array(
				esc_attr__( 'Inline', 'optico' ) => 'inline',
				esc_attr__( 'Left', 'optico' ) => 'left',
				esc_attr__( 'Right', 'optico' ) => 'right',
				esc_attr__( 'Center', 'optico' ) => 'center'
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Set full width button?', 'optico' ),
			'param_name' => 'button_block',
			'dependency' => array(
				'element'            => 'align',
				'value_not_equal_to' => 'inline',
			),
			'value'      => array(
				esc_attr__( 'No', 'optico' )  => 'false',
				esc_attr__( 'Yes', 'optico' ) => 'true',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Add icon?', 'optico' ),
			'param_name' => 'add_icon',
			'value'      => array(
				esc_attr__( 'No',  'optico' ) => '',
				esc_attr__( 'Yes', 'optico' ) => 'true',
			),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Icon Alignment', 'optico' ),
			'description' => esc_attr__( 'Select icon alignment.', 'optico' ),
			'param_name' => 'i_align',
			'value' => array(
				esc_attr__( 'Left', 'optico' ) => 'left',
				// default as well
				esc_attr__( 'Right', 'optico' ) => 'right',
			),
			'dependency' => array(
				'element' => 'add_icon',
				'value' => 'true',
			),
		),
	),

	$icons_params,

	array(
		vc_map_add_css_animation(),
		ts_vc_ele_extra_class_option(),
		ts_vc_ele_css_editor_option(),
	)
);

// Changing modifying, adding extra options
$i = 0;
foreach( $params as $param ){

	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;

	// Button Icon
	if( $param_name == 'i_align' ){
		$params[$i]['std'] = 'right';

	} else if( $param_name == 'i_type' ){
		$params[$i]['std'] = 'themify';

	} else if( $param_name == 'i_icon_themify' ){
		$params[$i]['std']   = 'themifyicon ti-arrow-right';
		$params[$i]['value'] = 'themifyicon ti-arrow-right';

	}

	$i++;
} // Foreach

global $ts_sc_params_btn;
$ts_sc_params_btn = $params;

vc_map( array(
	'name'     => esc_attr__( 'ThemeStek Button', 'optico' ),
	'base'     => 'ts-btn',
	'icon'     => 'icon-themestek-vc',
	'category' => array( esc_attr__( 'THEMESTEK', 'optico' ) ),
	'params'   => $params,
	'js_view'  => 'VcButton3View',
	'custom_markup' => '{{title}}<div class="vc_btn3-container"><button class="vc_general vc_btn3 vc_btn3-size-sm vc_btn3-shape-{{ params.shape }} vc_btn3-style-{{ params.style }} vc_btn3-color-{{ params.color }}">{{{ params.title }}}</button></div>',
) );
