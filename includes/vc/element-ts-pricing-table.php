<?php

/******* Each Line (group) Options ********/
// Icon picker
$group_icon = vc_map_integrate_shortcode( 'ts-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	), array(
		'element' => 'list_icon',
		'value' => 'custom',
	)
);

$group_params = array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Label', 'optico' ),
		'param_name' => 'label',
		'description' => esc_attr__( 'Enter text used as title of bar. You can use STRONG tag to bold some texts.', 'optico' ),
		'admin_label' => true,
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Select Icon', 'optico' ),
		'param_name' => 'list_icon',
		'value'      => array(
			esc_attr__( 'No icon', 'optico' )							=> '',
			esc_attr__( 'Show default icon (check icon)', 'optico' )	=> 'default',
			esc_attr__( 'Select custom icon', 'optico' )				=> 'custom',
		),
		'std'         => '',
		'description' => esc_attr__( 'Select icon for this line.', 'optico' ),
	),
);

// Merging icon with other options
$param_group = array_merge( $group_params, $group_icon );

$params_boxstyle =  array(
	array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_attr__( 'Pricing Table Box Style', 'optico' ),
		'description'	=> esc_attr__( 'Select Pricing Table box style.', 'optico' ),
		'param_name'	=> 'boxstyle',
		'std'			=> 'style-1',
		'value'			=> themestek_global_template_list('pricingtable', false),
	),
	array(
		'type'				=> 'dropdown',
		'heading'			=> esc_attr__( 'Featured Column', 'optico' ),
		'param_name'		=> 'featured_col',
		//'std'				=> '',
		'value'				=> array(
			esc_attr__( 'None', 'optico' )		=> '',
			esc_attr__( '1st Column', 'optico' )	=> '1',
			esc_attr__( '2nd Column', 'optico' )	=> '2',
			esc_attr__( '3rd Column', 'optico' )	=> '3',
			esc_attr__( '4th Column', 'optico' )	=> '4',
			esc_attr__( '5th Column', 'optico' )	=> '5',
		),
		'description'		=> esc_attr__( 'Select whith column will be with featured style.', 'optico' ),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Featured Text', 'optico' ),
		'std'			=> esc_attr__( 'Featured', 'optico' ),
		'param_name'	=> 'featured_text',
		'description'	=> esc_attr__( 'Enter text that will be shown for featured column. Example "Featured".', 'optico' ),
		'dependency' => array(
			'element' => 'featured_col',
			'value' => array( '1', '2', '3', '4', '5' ),
		),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
	),

);

/*** Coumn Options ***/
$params_heading =  array(
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Heading', 'optico' ),
		'param_name'	=> 'heading',
		'description'	=> esc_attr__( 'Enter text used as main heading. This will be plan title like "Basic", "Pro" etc.', 'optico' ),
		//'group'			=> esc_attr__( 'Content', 'optico' ),
	)
);

// Main Icon picker
$main_icon = vc_map_integrate_shortcode( 'ts-icon', 'i_', esc_attr__( 'Content', 'optico' ),
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	)
);

$params_price =  array(
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_attr__( 'Price', 'optico' ),
		'param_name'		=> 'price',
		'std'				=> '100',
		'description'		=> esc_attr__( 'Enter Price.', 'optico' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),

	array(
		'type'				=> 'textfield',
		'heading'			=> esc_attr__( 'Currency symbol', 'optico' ),
		'param_name'		=> 'cur_symbol',
		'std'				=> '$',
		'description'		=> esc_attr__( 'Enter currency symbol', 'optico' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'dropdown',
		'heading'			=> esc_attr__( 'Currency Symbol position', 'optico' ),
		'param_name'		=> 'cur_symbol_position',
		'std'				=> 'after',
		'value'				=> array(
			esc_attr__( 'Before price', 'optico' )	=> 'before',
			esc_attr__( 'After price', 'optico' )	=> 'after',
		),
		'description'		=> esc_attr__( 'Select currency position.', 'optico' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_attr__( 'Price Frequency', 'optico' ),
		'param_name'		=> 'price_frequency',
		'std'				=> esc_attr__( 'Monthly', 'optico' ),
		'description'		=> esc_attr__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'optico' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
);

$params_btn = array(
	array(
		'type'       		=> 'textfield',
		'heading'    		=> esc_attr__( 'Button Text', 'optico' ),
		'param_name' 		=> 'btn_title',
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'vc_link',
		'heading'			=> esc_attr__( 'Button URL (Link)', 'optico' ),
		'param_name'		=> 'btn_link',
		'description'		=> esc_attr__( 'Add link to button.', 'optico' ),
		'edit_field_class'	=> 'vc_col-sm-9 vc_column',
	),
);

$params_lines =  array(
	array(
		'type'			=> 'param_group',
		'heading'		=> esc_attr__( 'Each Line (Features)', 'optico' ),
		'param_name'	=> 'values',
		'description'	=> esc_attr__( 'Enter values for graph - value, title and color.', 'optico' ),
		'value'			=> urlencode( json_encode( array(
			array(
				'label'		=> esc_attr__( 'This is label one', 'optico' ),
				'value'		=> '90',
			),
			array(
				'label'		=> esc_attr__( 'This is label two', 'optico' ),
				'value'		=> '80',
			),
			array(
				'label'		=> esc_attr__( 'This is label three', 'optico' ),
				'value'		=> '70',
			),
		) ) ),
		'params'		=> $param_group,
	),

);

// CSS Animation
$css_animation = vc_map_add_css_animation();
$css_animation['group'] = esc_attr__( 'Animation', 'optico' );

// Extra Class
$extra_class = ts_vc_ele_extra_class_option();
$extra_class['group'] = esc_attr__( 'Animation', 'optico' );

$params_all = array_merge(
	//$params_boxstyle,
	$params_heading,
	$main_icon,
	$params_price,
	$params_btn,
	$params_lines
);

/**** Multiple Columns for pricing table ****/
$params = array();

for( $i=1; $i<=5; $i++ ){  // 3 column

	$tab_title = esc_attr__('First Column','optico');
	switch( $i ){
		case 2:
			$tab_title = esc_attr__('Second Column','optico');
			break;
		case 3:
			$tab_title = esc_attr__('Third Column','optico');
			break;
		case 4:
			$tab_title = esc_attr__('Fourth Column','optico');
			break;
		case 5:
			$tab_title = esc_attr__('Fifth Column','optico');
			break;
	}

	foreach( $params_all as $param ){

		if( !empty($param['param_name']) ){
			$param['param_name'] = 'col'.$i.'_'.$param['param_name'];
		}
		$param['group']      = $tab_title;

		if( !empty($param['dependency']) && !empty($param['dependency']["element"]) ){
			$param['dependency']["element"] = 'col'.$i.'_'.$param['dependency']["element"];
		}

		$params[] = $param;

	}

} // for

$params = array_merge(
	$params_boxstyle,
	$params,
	array($css_animation),
	array($extra_class),
	array( ts_vc_ele_css_editor_option() )
);

global $ts_sc_params_pricingtable;
$ts_sc_params_pricingtable = $params;

vc_map( array(
	'name'		=> esc_attr__( 'ThemeStek Pricing Table', 'optico' ),
	'base'		=> 'ts-pricing-table',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_attr__( 'THEMESTEK', 'optico' ),
	'params'	=> $params
) );
