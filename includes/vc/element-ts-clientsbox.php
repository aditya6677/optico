<?php

/* Options */

$clientsGroupList = array();
if( taxonomy_exists('ts-client-group') ){
	$clientsGroupList_data = get_terms( 'ts-client-group', array( 'hide_empty' => false ) );
	$clientsGroupList      = array();
	foreach($clientsGroupList_data as $cat){
		$clientsGroupList[ esc_attr($cat->name) . ' (' . esc_attr($cat->count) . ')' ] = esc_attr($cat->slug);
	}
}

/**
 * Heading Element
 */
$heading_element = vc_map_integrate_shortcode( 'ts-heading', '', esc_attr__('Main Heading','optico'),
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);

/**
 * Boxes Appearance options
 */
$boxParams = ts_box_params();

$allParams = array_merge(

	$heading_element,

	array(
		array(
			'type'			=> 'themestek_imgselector',
			'heading'		=> esc_attr__( 'Box View Style', 'optico' ),
			'description'	=> esc_attr__( 'Select box view style.', 'optico' ),
			'param_name'	=> 'boxstyle',
			'std'			=> 'style-1',
			'value'			=> themestek_global_template_list('clients', false),
			'group'		  => esc_attr__( 'Box Style', 'optico' ),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__("Show HOVER image?",'optico'),
			"description" => esc_attr__("Show HOVER image too. This will work only if you set hover image for each client logo.",'optico'),
			"param_name"  => "show_hover",
			"value"       => array(
				esc_attr__('Yes','optico') => 'yes',
				esc_attr__('No','optico')  => 'no',
			),
			"std"         => "yes",
			'group'		  => esc_attr__( 'Box Style', 'optico' ),
			'edit_field_class' => 'vc_col-sm-8 vc_column',
		),
	),

	array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Sortable GROUP Links",'optico'),
			"description" => esc_attr__("Show sortable GROUP links above logos so user can sort by just single click.",'optico'),
			"param_name"  => "sortable",
			"value"       => array(
				esc_attr__('No','optico')  => 'no',
				esc_attr__('Yes','optico') => 'yes',
			),
			"std"         => "no",
			'dependency'  => array(
				'element'            => 'boxview',
				'value_not_equal_to' => array( 'carousel' ),
			),
			'group'		  => esc_attr__('Box Options','optico'),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Replace ALL word', 'optico' ),
			'param_name'  => 'allword',
			'description' => esc_attr__( 'Replace ALL word in sortable category links. Default is ALL word.', 'optico' ),
			"std"         => "All",
			'dependency'  => array(
				'element'   => 'sortable',
				'value'     => array( 'yes' ),
			),
			'group'		  => esc_attr__('Box Options','optico'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Pagination",'optico'),
			"description" => esc_attr__("Show pagination links below each logo boxes.",'optico'),
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
			'group'		  => esc_attr__('Box Options','optico'),
		),

		array(
			"type"        => "checkbox",
			"heading"     => esc_attr__("From Group", "optico"),
			"param_name"  => "category",
			"description" => esc_attr__("Select group so it will show client logo from selected group only.", "optico"),
			"value"       => $clientsGroupList,
			"std"         => "",
			'group'		  => esc_attr__('Box Options','optico'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Order by",'optico'),
			"description" => esc_attr__("Sort retrieved portfolio by parameter.",'optico'),
			"param_name"  => "orderby",
			"value"       => array(
				esc_attr__('No order (none)','optico')           => 'none',
				esc_attr__('Order by post id (ID)','optico')     => 'ID',
				esc_attr__('Order by author (author)','optico')  => 'author',
				esc_attr__('Order by title (title)','optico')    => 'title',
				esc_attr__('Order by slug (name)','optico')      => 'name',
				esc_attr__('Order by date (date)','optico')      => 'date',
				esc_attr__('Order by last modified date (modified)','optico') => 'modified',
				esc_attr__('Random order (rand)','optico')       => 'rand',
				esc_attr__('Order by number of comments (comment_count)','optico') => 'comment_count',

			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			"std"              => "date",
			'group'		  => esc_attr__('Box Options','optico'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Order",'optico'),
			"description" => esc_attr__("Designates the ascending or descending order of the 'orderby' parameter.",'optico'),
			"param_name"  => "order",
			"value"       => array(
				esc_attr__('Ascending (1, 2, 3; a, b, c)','optico')  => 'ASC',
				esc_attr__('Descending (3, 2, 1; c, b, a)','optico') => 'DESC',
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			"std"              => "DESC",
			'group'		  => esc_attr__('Box Options','optico'),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__("Show", "optico"),
			"param_name"  => "show",
			"description" => esc_attr__("Total Clients Logos you want to show.", "optico"),
			"value"       => array(
				esc_attr__("All", "optico") => "-1",
				esc_attr__("1", "optico")  => "1",
				esc_attr__("2", "optico") => "2",
				esc_attr__("3", "optico") => "3",
				esc_attr__("4", "optico") => "4",
				esc_attr__("5", "optico") => "5",
				esc_attr__("6", "optico") => "6",
				esc_attr__("7", "optico") => "7",
				esc_attr__("8", "optico") => "8",
				esc_attr__("9", "optico") => "9",
				esc_attr__("10", "optico") => "10",
				esc_attr__("11", "optico") => "11",
				esc_attr__("12", "optico") => "12",
				esc_attr__("13", "optico") => "13",
				esc_attr__("14", "optico") => "14",
				esc_attr__("15", "optico") => "15",
				esc_attr__("16", "optico") => "16",
				esc_attr__("17", "optico") => "17",
				esc_attr__("18", "optico") => "18",
				esc_attr__("19", "optico") => "19",
				esc_attr__("20", "optico") => "20",
			),
			"std"  => "10",
			'group'		  => esc_attr__('Box Options','optico'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Tooltip on Logo?",'optico'),
			"description" => esc_attr__("Select YES to show Tooltip on the logo.",'optico'),
			"param_name"  => "show_tooltip",
			"value"       => array(
				esc_attr__("Yes", "optico") => "yes",
				esc_attr__("No", "optico")  => "no",
			),
			"std"         => "yes",
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'group'		  => esc_attr__('Box Options','optico'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Add link to all logos?",'optico'),
			"description" => esc_attr__("Select YES to add link to all logos. Please note that link should be added to each client logo. If no link found than the logo will appear without link.",'optico'),
			"param_name"  => "add_link",
			"value"       => array(
				esc_attr__("Yes", "optico") => "yes",
				esc_attr__("No", "optico")  => "no",
			),
			"std"         => "yes",
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'group'		  => esc_attr__('Box Options','optico'),
		),

	),

	$boxParams,

	array(
		ts_vc_ele_css_editor_option(),
	)
);

$params = $allParams;

// Changing default values
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Our Clients';

	} else if( $param_name == 'column' ){
		$params[$i]['std'] = 'five';

	} else if( $param_name == 'boxview' ){
		$params[$i]['std'] = 'carousel';

	} else if( $param_name == 'content' ){
		$params[$i]['std'] = '';

	} else if( $param_name == 'carousel_loop' ){
		$params[$i]['std'] = '1';

	} else if( $param_name == 'carousel_dots' ){
		$params[$i]['std'] = 'true';

	} else if( $param_name == 'carousel_nav' ){
		$params[$i]['std'] = '0';

	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';

	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';

	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';

	}

	$i++;
}

global $ts_sc_params_clients;
$ts_sc_params_clients = $params;

vc_map( array(
	"name"     => esc_attr__("ThemeStek Client Logo Box", "optico"),
	"base"     => "ts-clientsbox",
	"icon"     => "icon-themestek-vc",
	'category' => esc_attr__( 'THEMESTEK', 'optico' ),
	"params"   => $params,
) );