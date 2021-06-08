<?php

/* Options */

$allParams = array(
	array(
		"type"        => "dropdown",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Show Pagination",'optico'),
		"description" => esc_attr__("Show pagination links below Event boxes.",'optico'),
		"param_name"  => "pagination",
		"value"       => array(
			esc_attr__('No','optico')  => 'no',
			esc_attr__('Yes','optico') => 'yes',
		),
		"std"         => "no",
		'dependency'  => array(
			'element'    => 'sortable',
			'value_not_equal_to' => array( 'yes' ),
		),
	),
	array(
		"type"        => "dropdown",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Show Events Item",'optico'),
		"description" => esc_attr__("How many events you want to show.",'optico'),
		"param_name"  => "show",
		"value"       => array(
			esc_attr__('All','optico') => '-1',
			esc_attr__('1','optico')  => '1',
			esc_attr__('2','optico') => '2',
			esc_attr__('3','optico')=>'3',
			esc_attr__('4','optico')=>'4',
			esc_attr__('5','optico')=>'5',
			esc_attr__('6','optico')=>'6',
			esc_attr__('7','optico')=>'7',
			esc_attr__('8','optico')=>'8',
			esc_attr__('9','optico')=>'9',
			esc_attr__('10','optico')=>'10',
			esc_attr__('11','optico')=>'11',
			esc_attr__('12','optico')=>'12',
			esc_attr__('13','optico')=>'13',
			esc_attr__('14','optico')=>'14',
			esc_attr__('15','optico')=>'15',
			esc_attr__('16','optico')=>'16',
			esc_attr__('17','optico')=>'17',
			esc_attr__('18','optico')=>'18',
			esc_attr__('19','optico')=>'19',
			esc_attr__('20','optico')=>'20',
			esc_attr__('21','optico')=>'21',
			esc_attr__('22','optico')=>'22',
			esc_attr__('23','optico')=>'23',
			esc_attr__('24','optico')=>'24',
		),
		"std"  => "3",
	),
	array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Box Style", "optico"),
		"description" => esc_attr__("Select box style.", "optico"),
		"group"       => esc_attr__( "Boxes Appearance", "optico" ),
		"param_name"  => "view",
		"value"       => array(
			esc_attr__("Default Style", "optico")  => "top-image",
			esc_attr__("Detailed Style", "optico") => "top-image-details",
		),
		"std"         => "default",
	),
	array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Box Spacing", "optico"),
		"param_name"  => "box_spacing",
		"description" => esc_attr__("Spacing between each box.", "optico"),
		"value"       => array(
			esc_attr__("Default", "optico")                        => "",
			esc_attr__("0 pixel spacing (joint boxes)", "optico")  => "0px",
			esc_attr__("5 pixel spacing", "optico")                => "5px",
			esc_attr__("10 pixel spacing", "optico")               => "10px",
		),
		"std"  => "",
	),

);

/**
 * Heading Element
 */
$heading_element = vc_map_integrate_shortcode( 'ts-heading', '', '',
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);

$boxParams = ts_box_params();
$params    = array_merge( $heading_element, $allParams, $boxParams );

// Changing default values
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Latest Events';

	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';

	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';

	}
	$i++;
}

global $ts_sc_params_eventsbox;
$ts_sc_params_eventsbox = $params;

vc_map( array(
	"name"     => esc_attr__("ThemeStek Events Box", "optico"),
	"base"     => "ts-eventsbox",
	"icon"     => "icon-themestek-vc",
	'category' => esc_attr__( 'THEMESTEK', 'optico' ),
	"params"   => $params
) );
