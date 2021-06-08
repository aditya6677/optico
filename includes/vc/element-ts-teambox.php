<?php

/* Options for ThemeStek Blogbox */

// Team Group
$teamGroupList = array();
if( taxonomy_exists('ts-team-group') ){
	$teamGroups    = get_terms( 'ts-team-group', array( 'hide_empty' => false ) );
	$teamGroupList = array();
	foreach($teamGroups as $teamGroup){
		$name                   = $teamGroup->name.' ('.$teamGroup->count.')';
		$teamGroupList[ $name ] = $teamGroup->slug;
	}
}

// Getting Options
$optico_theme_options      = get_option('optico_theme_options');
$team_type_title           = ( !empty($optico_theme_options['team_type_title']) ) ? $optico_theme_options['team_type_title'] : 'Team Members' ;
$team_type_title_singular  = ( !empty($optico_theme_options['team_type_title_singular']) ) ? $optico_theme_options['team_type_title_singular'] : 'Team Member' ;
$team_group_title          = ( !empty($optico_theme_options['team_group_title']) ) ? $optico_theme_options['team_group_title'] : 'Team Groups' ;
$team_group_title_singular = ( !empty($optico_theme_options['team_group_title_singular']) ) ? $optico_theme_options['team_group_title_singular'] : 'Team Group' ;

/**
 * Heading Element
 */
$heading_element = vc_map_integrate_shortcode( 'ts-heading', '', esc_attr__('Headings','optico'),
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);

$boxParams = ts_box_params();

$allParams = array_merge(
	$heading_element,
	array(
		array(
			'type'			=> 'themestek_imgselector',
			'heading'		=> esc_attr__( 'Box View Style', 'optico' ),
			'description'	=> esc_attr__( 'Select box view style.', 'optico' ),
			'param_name'	=> 'boxstyle',
			'std'			=> 'style-2',

			'value'			=> themestek_global_template_list('team', false),

			'group'		  => esc_attr__( 'Box Style', 'optico' ),
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
			"std"         => "",
			'group'		  => esc_attr__( 'Box Style', 'optico' ),
		),

	),
	array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => sprintf( esc_attr__("Show Sortable %s Links",'optico'), $team_group_title ),
			"description" => sprintf( esc_attr__("Show sortable %s links above box items so user can sort by just single click.",'optico'), $team_group_title ),
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
			'description' => esc_attr__( 'Replace ALL word in sortable group links. Default is ALL word.', 'optico' ),
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
			"description" => sprintf( esc_attr__("Show pagination links below %s boxes.",'optico'), $team_type_title_singular ),
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
			"heading"     => sprintf( esc_attr__("From %s", "optico"), $team_group_title_singular ),
			"param_name"  => "category",
			"description" => sprintf( esc_attr__('If you like to show %1$s from selected %2$s than select the category here.', 'optico'), $team_type_title, $team_group_title ),
			"value"       => $teamGroupList,
			'group'		  => esc_attr__('Box Options','optico'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Order by",'optico'),
			"description" => sprintf( esc_attr__("Sort retrieved %s by parameter.",'optico'), $team_type_title_singular ),
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
			'group'			   => esc_attr__('Box Options','optico'),
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
			"description" => sprintf( esc_attr__("How many %s item you want to show.", "optico"), $team_type_title ),
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
			),
			"std"  => "4",
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
	if( $param_name == 'column' ){
		$params[$i]['std'] = 'three';

	} else if( $param_name == 'show' ){
		$params[$i]['std'] = '3';

	} else if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Our Team';

	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';

	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';

	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';

	}

	$i++;
}

global $ts_sc_params_teambox;
$ts_sc_params_teambox = $params;

vc_map( array(
	"name"     => sprintf( esc_attr__("ThemeStek %s Box", "optico"), $team_type_title_singular ),
	"base"     => "ts-teambox",
	"icon"     => "icon-themestek-vc",
	'category' => esc_attr__( 'THEMESTEK', 'optico' ),
	"params"   => $params,
) );