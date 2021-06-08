<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

$optico_theme_options		   = get_option('optico_theme_options');
$pf_cat_title_singular     = ( !empty($optico_theme_options['pf_cat_title_singular']) ) ? esc_attr($optico_theme_options['pf_cat_title_singular']) : esc_attr('Portfolio Category') ;
$team_group_title_singular = ( !empty($optico_theme_options['team_group_title_singular']) ) ? esc_attr($optico_theme_options['team_group_title_singular']) : esc_attr('Team Group') ;

// Taxonomy Options
$ts_taxonomy_options     = array();

// For Portfolio Category
$ts_taxonomy_options[]   = array(
	'id'       => 'ts_taxonomy_options',
	'taxonomy' => 'ts-portfolio-category', // category, post_tag or your custom taxonomy name
	'fields'   => array(
		array(
			'id'            => 'tax_featured_image',
			'type'          => 'upload',
			'title' => esc_attr__('Featured Image URL', 'optico'),
			'after' => '<p>' . sprintf( esc_attr__('Paste featured image URL for this %s. Please upload the image first from media section.', 'optico'), $pf_cat_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_attr__('Upload', 'optico'),
				'frame_title'  => esc_attr__('Select an image', 'optico'),
				'insert_title' => esc_attr__('Use this image', 'optico'),
			),
		),
	),
);

// For Team Group
$ts_taxonomy_options[]   = array(
	'id'       => 'ts_taxonomy_options',
	'taxonomy' => 'ts-team-group', // category, post_tag or your custom taxonomy name
	'fields'   => array(
		array(
			'id'            => 'tax_featured_image',
			'type'          => 'upload',
			'title' => esc_attr__('Featured Image URL', 'optico'),
			'after' => '<p>' . sprintf( esc_attr__('Paste featured image URL for this %s. Please upload the image first from media section.', 'optico'), $pf_cat_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_attr__('Upload', 'optico'),
				'frame_title'  => esc_attr__('Select an image', 'optico'),
				'insert_title' => esc_attr__('Use this image', 'optico'),
			),
		),
	),
);