<?php

/* Options */

$params = array(
	array(
		"type"        => "textfield",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Phone",'optico'),
		"description" => esc_attr__("Write phone number here. Example: (+01) 123 456 7890",'optico'),
		"param_name"  => "phone",
	),
	array(
		"type"        => "textfield",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Email",'optico'),
		"description" => esc_attr__("Write email here. Example: info@example.com",'optico'),
		"param_name"  => "email",
	),
	array(
		"type"        => "textfield",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Website",'optico'),
		"description" => esc_attr__("Write website URL here.",'optico'),
		"param_name"  => "website",
	),
	array(
		"type"        => "textarea",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Address",'optico'),
		"description" => esc_attr__("Write address here. You can write in multi-line too.",'optico'),
		"param_name"  => "address",
	),
	array(
		"type"        => "textarea",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Time",'optico'),
		"description" => esc_attr__("Write time here. You can write in multi-line too.",'optico'),
		"param_name"  => "time",
	),
);

$params    = array_merge( $params, array( vc_map_add_css_animation() ), array( ts_vc_ele_extra_class_option() ), array( ts_vc_ele_css_editor_option() ) );

global $ts_sc_params_contactbox;
$ts_sc_params_contactbox = $params;

vc_map( array(
	"name"     => esc_attr__("ThemeStek Contact Details Box",'optico'),
	"base"     => "ts-contactbox",
	"class"    => "",
	'category' => esc_attr__( 'THEMESTEK', 'optico' ),
	"icon"     => "icon-themestek-vc",
	"params"   => $params
) );