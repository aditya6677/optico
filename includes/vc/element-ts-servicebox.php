<?php

/* Options for ThemeStek Servicebox */
$bgcolor_custom = array();
$bgcolor_custom[esc_attr__( 'Transparent', 'optico' )] = 'transparent';
$bgcolor_custom[esc_attr__( 'Skin color', 'optico' )]  = 'skincolor';
$boxcolor =   array_merge( $bgcolor_custom , ts_getVcShared( 'colors-dashed' ) ) ;

$heading_element = vc_map_integrate_shortcode( 'ts-heading', '', esc_attr__('Content','optico'),
	array(
		'exclude' => array(
			'txt_align',
			'seperator',
			'reverse_heading',
			'el_class',
			'css_animation',
			'css',
		),
	)
);
if ( is_array( $heading_element ) && ! empty( $heading_element ) ) {
	foreach ( $heading_element as $key => $param ) {

		if ( is_array( $param ) && isset( $param['param_name'] ) ){

			if( $param['param_name'] == 'content' ){
				$heading_element[$key]['value'] = esc_attr('Lorem ipsum dolor sit amet,con sec tetur adipisicing elit,sed do.');
				$heading_element[$key]['type'] = 'textarea';

			} else if( $param['param_name'] == 'reverse_heading' ){
				$heading_element[$key]['std'] = 'no';
				$heading_element[$key]['value'] = 'no';

			}

		}
	}
}

$btn_element = vc_map_integrate_shortcode( 'ts-btn', 'btn_', esc_attr__('Button','optico'),
	array(
		'exclude' => array(
			'style',
			'shape',
			'color',
			'size',
			'font_weight',
			'align',
			'i_align',
			'gradient_color_1',
			'gradient_color_2',
			'gradient_custom_color_1',
			'gradient_custom_color_2',
			'gradient_text_color',
			'custom_background',
			'custom_text',
			'outline_custom_color',
			'outline_custom_hover_background',
			'outline_custom_hover_text',
			'button_block',
			'css_animation',
			'css',
		),
	),
	array(
		'element' => 'show_btn',
		'value'   => 'yes',
	)
);

// Extra Class Name
$ts_extra_class = ts_vc_ele_extra_class_option();
$ts_extra_class['group'] = esc_attr__( 'Content', 'optico' );

$params = array_merge(

	array(
		array(
			'type'			=> 'themestek_imgselector',
			'heading'		=> esc_attr__( 'Service Box Style', 'optico' ),
			'description'	=> esc_attr__( 'Select Service box style.', 'optico' ),
			'param_name'	=> 'boxstyle',
			'std'			=> 'style-3',
			'value'			=> themestek_global_template_list('servicebox', false),
			'group'		  => esc_attr__( 'Box Style', 'optico' ),
		),
	),

	// ICON TYPE
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Icon', 'optico' ),
			'description' => esc_attr__( 'Show/hide icon or show text (in place of icon).', 'optico' ),
			'param_name'  => 'icon_type',
			'std'         => 'icon',
			'value'       => array(
				esc_attr__( 'Show icon', 'optico' )	=> 'icon',
				esc_attr__( 'No icon', 'optico' )	=> 'none',
				esc_attr__( 'Show small text in place of icon', 'optico' )	=> 'text',
			),
			'group'		  => esc_attr__( 'Icon', 'optico' ),
			'dependency'  => array(
				'element'			 => 'boxstyle',
				'value_not_equal_to' => array( 'style-2' ),
			)
		),
	),

	// ICON TYPE: ICON
	vc_map_integrate_shortcode( 'ts-icon', 'i_', esc_attr__( 'Icon', 'optico' ),
		array(
			'include_only_regex' => '/^(type|icon_\w*)/',
		),
		array(
			'element' => 'icon_type',
			'value'     => 'icon',
		)
	),

	// ICON TYPE: TEXT
	array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Small text', 'optico' ),
			'param_name'  => 'small_text',
			'value'		  => '01',
			'description' => esc_attr__( 'This text will appear in place of icon. This is useful if you like to show small text like "01" or "Hi" small texts.', 'optico' ),
			'group'		  => esc_attr__( 'Icon', 'optico' ),

			'dependency'  => array(
				'element'	=> 'icon_type',
				'value'		=> array('text'),
			)
		),
	),

	// Heading
	$heading_element,

	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Show button', 'optico' ),
			'description' => esc_attr__( 'Show/hide button', 'optico' ),
			'param_name'  => 'show_btn',
			'std'         => 'no',
			'value'       => array(
				esc_attr__( 'Yes', 'optico' )	=> 'yes',
				esc_attr__( 'No', 'optico' )	=> 'no',
			),
			'group'		  => esc_attr__( 'Content', 'optico' ),
		),
	),

	// Button
	$btn_element,

	array(
		/// cta3
		vc_map_add_css_animation(),
		$ts_extra_class,
	)

);

// Changing modifying, adding extra options
$i = 0;
foreach( $params as $param ){

	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;

	if( $param_name == 'txt_align' ){ // Remove Text Alignment option
		$params[$i]['dependency'] = array(  // This is to hide this option forever
			'element'  => 'btn_style',
			'value'    => array( 'abcdefg' )
		);

	} else if( $param_name == 'h2' ){
		$params[$i]['std']         = esc_attr__( 'This is heading', 'optico' );

	} else if( $param_name == 'btn_title' ){
		$params[$i]['std']         = '';
		$params[$i]['description'] = esc_attr__( 'NOTE: Leave this blank to remove the button.', 'optico' );

	} else if( $param_name == 'btn_add_icon' ){
		$params[$i]['std']   = false;

	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';

	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';

	} else if( $param_name == 'h2_google_fonts' ){
		$params[$i]['std'] = 'font_family:Arimo%3Aregular%2Citalic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal';

	} else if( $param_name == 'h4_google_fonts' ){
		$params[$i]['std'] = 'font_family:Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal';

	} else if( $param_name == 'css_animation' ){
		$params[$i]['group'] = esc_attr__( 'Animations', 'optico' );

	}

	$i++;
} // Foreach

global $ts_sc_params_servicebox;
$ts_sc_params_servicebox = $params;

vc_map( array(
	'name'        => esc_attr__( 'ThemeStek Icon Heading Box', 'optico' ),
	'base'        => 'ts-servicebox',
	"icon"        => "icon-themestek-vc",
	'category'    => esc_attr__( 'THEMESTEK', 'optico' ),
	'params'      => $params,
) );