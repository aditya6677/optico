<?php

/* Options for ThemeStek Blogbox */

$postCatList    = get_categories( array('hide_empty'=>false) );

$catList = array();
foreach($postCatList as $cat){
	$catList[ esc_attr($cat->name) . ' (' . esc_attr($cat->count) . ')' ] = esc_attr($cat->slug);
}

$heading_element = vc_map_integrate_shortcode( 'ts-heading', '', esc_attr__('Headings','optico'),
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);

$boxParams = ts_box_params('blog');

$allParams = array_merge(
	$heading_element,
	array(
		array(
			'type'			=> 'themestek_imgselector',
			'heading'		=> esc_attr__( 'Box View Style', 'optico' ),
			'description'	=> esc_attr__( 'Select box view style.', 'optico' ),
			'param_name'	=> 'boxstyle',
			'std'			=> 'style-1',
			'value'			=> themestek_global_template_list('blog', false),
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
			"std"  => "",
			'group'		  => esc_attr__( 'Box Style', 'optico' ),
		)
	),
	array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Sortable Category Links",'optico'),
			"description" => esc_attr__("Show sortable category links above Blog boxes so user can sort by category by just single click.",'optico'),
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
			'group'		  => esc_attr__( 'Box Options', 'optico' ),
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
			'group'		  => esc_attr__( 'Box Options', 'optico' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Pagination",'optico'),
			"description" => esc_attr__("Show pagination links below blog boxes.",'optico'),
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
			'group'		  => esc_attr__( 'Box Options', 'optico' ),
		),
		array(
			"type"        => "checkbox",
			"heading"     => esc_attr__("Set Post Link On Feature Image", "optico"),
			"param_name"  => "postlink_onimage",
			"description" => esc_attr__("If you like to set post link on feature image than check here.", "optico"),
			'group'		  => esc_attr__( 'Box Options', 'optico' ),
		),
		array(
			"type"        => "checkbox",
			"heading"     => esc_attr__("From Category", "optico"),
			"description" => esc_attr__("If you like to show posts from selected category than select the category here.", "optico") . esc_attr__("The brecket number shows how many posts there in the category.", "optico"),
			"param_name"  => "category",
			"value"       => $catList,
			'group'		  => esc_attr__( 'Box Options', 'optico' ),
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
			'group'		  => esc_attr__( 'Box Options', 'optico' ),
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
			'group'		  => esc_attr__( 'Box Options', 'optico' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Posts",'optico'),
			"description" => esc_attr__("How many post you want to show.",'optico'),
			"param_name"  => "show",
			"value"       => array(
				esc_attr__('1','optico')=>'1',
				esc_attr__('2','optico')=>'2',
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
			'group'		  => esc_attr__( 'Box Options', 'optico' ),
		),

		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__('Show "Read More" Link','optico'),
			"description" => esc_attr__('Show "Read More" Link with each post','optico'),
			"param_name"  => "readmore",
			"value"       => array(
				esc_attr__('No','optico')	=> '',
				esc_attr__('Yes','optico')	=> 'yes',
			),
			"std"  => "3",
			'group'		  => esc_attr__( 'Box Options', 'optico' ),
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
		$params[$i]['std'] = 'Blog';

	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';

	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';

	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';

	}
	$i++;
}

global $ts_sc_params_blogbox;
$ts_sc_params_blogbox = $params;

vc_map( array(
	"name"     => esc_attr__('ThemeStek Blog Box','optico'),
	"base"     => "ts-blogbox",
	"class"    => "",
	'category' => esc_attr__( 'THEMESTEK', 'optico' ),
	"icon"     => 'icon-themestek-vc',
	"params"   => $params,
) );