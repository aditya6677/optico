<?php

/* Options */

$icons_params = vc_map_integrate_shortcode( 'ts-icon', 'i_', esc_attr__('Icon','optico'), array(
	'include_only_regex' => '/^(type|icon_\w*)/',
	// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
), array(
	'element' => 'boxstyle',
	'value' => array('top-rounded-icon','left-icon','top-big-icon'),
) );

$icons_params_new = array();

/* Adding class for two column */
foreach( $icons_params as $param ){
	$icons_params_new[] = $param;
}

$allParams = array(

	array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_attr__( 'Fact In Digits box Style', 'optico' ),
		'description'	=> esc_attr__( 'Select box style for Facts in Digits box. This will show rotating number with icon and heading.', 'optico' ),
		'param_name'	=> 'boxstyle',
		'std'			=> 'style-1',
		'value'			=> themestek_global_template_list('fidbox', false),
		'group'  	    => esc_attr__( 'Box Style', 'optico' ),
	),
	array(
		'type'			=> 'textfield',
		'holder'		=> 'div',
		'class'			=> '',
		'heading'		=> esc_attr__('Heading Text', 'optico'),
		'param_name'	=> 'title',
		'std'			=> esc_attr__('Title Text', 'optico'),
		'description'	=> esc_attr__('Enter text for the title. Leave blank if no title is needed.', 'optico'),
		'group'		    => esc_attr__( 'Content', 'optico' ),
	),
	array(
		'type'				=> 'textfield',
		'holder'			=> 'div',
		'class'				=> '',
		'heading'			=> esc_attr__('Rotating Number', 'optico'),
		'param_name'		=> 'digit',
		'std'				=> '85',
		'description'		=> esc_attr__('Enter rotating number digit here.', 'optico'),
		'group'		    => esc_attr__( 'Content', 'optico' ),
	),
	array(
		'type'				=> 'colorpicker',
		'heading'			=> esc_attr__('Data Fill Color', 'optico'),
		'description'		=> esc_attr__('(Optional) Select color for fill color or the border. This will work with round FID style only.', 'optico'),
		'param_name'		=> 'data_fill',
		'group'				=> esc_attr__( 'Content', 'optico' ),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
	),
	array(
		'type'				=> 'colorpicker',
		'heading'			=> esc_attr__('Data Emptyfill Color', 'optico'),
		'description'		=> esc_attr__('(Optional) Select color for emptyfill color or the border. This will work with round FID style only.', 'optico'),
		'param_name'		=> 'data_emptyfill',
		'group'				=> esc_attr__( 'Content', 'optico' ),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
	),
	array(
		'type'				=> 'textfield',
		'holder'			=> 'div',
		'heading'			=> esc_attr__('Text Before Number', 'optico'),
		'param_name'		=> 'before',
		'description'		=> esc_attr__('Enter text which appear just before the rotating numbers.', 'optico'),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'group'				=> esc_attr__( 'Content', 'optico' ),
	),
	array(
		"type"			=> "dropdown",
		"holder"		=> "div",
		"heading"		=> esc_attr__("Text Style",'optico'),
		"param_name"	=> "beforetextstyle",
		"description"	=> esc_attr__('Select text style for the text.', 'optico') . '<br>' . esc_attr__('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','optico') . '<br>' . esc_attr__('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','optico'),
		'value' => array(
			esc_attr__( 'Superscript', 'optico' ) => 'sup',
			esc_attr__( 'Subscript', 'optico' )   => 'sub',
			esc_attr__( 'Normal', 'optico' )      => 'span',
		),
		'std' => 'sup',
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'group'		    => esc_attr__( 'Content', 'optico' ),
	),
	array(
		'type'				=> 'textfield',
		'holder'			=> 'div',
		'class'				=> '',
		'heading'			=> esc_attr__('Text After Number', 'optico'),
		'param_name'		=> 'after',
		'description'		=> esc_attr__('Enter text which appear just after the rotating numbers.', 'optico'),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'group'		    => esc_attr__( 'Content', 'optico' ),
	),
	array(
		"type"			=> "dropdown",
		"holder"		=> "div",
		"class"			=> "",
		"heading"		=> esc_attr__("Text Style",'optico'),
		"param_name"	=> "aftertextstyle",
		"description"	=> esc_attr__('Select text style for the text.', 'optico') . '<br>' . esc_attr__('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','optico') . '<br>' . esc_attr__('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','optico'),
		'value' => array(
			esc_attr__( 'Superscript', 'optico' ) => 'sup',
			esc_attr__( 'Subscript', 'optico' )   => 'sub',
			esc_attr__( 'Normal', 'optico' )      => 'span',
		),
		'std' => 'sub',
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'group'		    => esc_attr__( 'Content', 'optico' ),
	),
	array(
		'type'			=> 'textfield',
		'holder'		=> 'div',
		'class'			=> '',
		'heading'		=> esc_attr__('Rotating digit Interval', 'optico'),
		'param_name'	=> 'interval',
		'std'			=> '5',
		'description'	=> esc_attr__('Enter rotating interval number here.', 'optico'),
		'group'		    => esc_attr__( 'Content', 'optico' ),
	)
);

$extra_class = ts_vc_ele_extra_class_option();
$extra_class['group'] = esc_attr__( 'Content', 'optico' );

$css_animation = vc_map_add_css_animation();
$css_animation['group'] = esc_attr__( 'Content', 'optico' );

// merging all options
$params = array_merge( $allParams, $icons_params_new );

// merging extra options like css animation, css options etc
$params = array_merge(
	$params,
	array( $css_animation ),
	array( $extra_class ),
	array( ts_vc_ele_css_editor_option() )
);

global $ts_sc_params_facts_in_digits;
$ts_sc_params_facts_in_digits = $params;

vc_map( array(
	'name'		=> esc_attr__( 'ThemeStek Facts in digits', 'optico' ),
	'base'		=> 'ts-facts-in-digits',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_attr__( 'THEMESTEK', 'optico' ),
	'params'	=> $params
) );
