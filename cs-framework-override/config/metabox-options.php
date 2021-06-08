<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 *  Meta Boxes
 */
$ts_metabox_options = array();

// Slier Area metabox options array
$slider_list_array = array();
$slider_list_array[''] = esc_attr__('No Slider', 'optico');
if ( class_exists( 'RevSlider' ) )    { $slider_list_array['revslider']   = esc_attr__('Slider Revolution', 'optico'); }
if ( function_exists('layerslider') ) { $slider_list_array['layerslider'] = esc_attr__('Layer Slider', 'optico'); }
$slider_list_array['custom']   = esc_attr__('Custom Slider', 'optico');

$ts_metabox_slider_area = array(
	array(
		'id'      	=> 'slidertype',
		'type'   	=> 'radio',
		'title'		=> esc_attr__('Select Slider Type', 'optico'),
		'desc'    	=> '<div class="cs-text-muted">'.esc_attr__('Select slider which you want to show on this page. The slider will appear in header area.', 'optico').'</div>',
		'options'	=> $slider_list_array,
		'default' 	 => '',
	)
);
$ts_metabox_slider_area[] = array(
	'id'      	 => 'revslider',
	'type'   	 => 'select',
	'title'		 => esc_attr__('Select Slider', 'optico'),
	'after'    	 => ( themestek_revslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="ts-no-slider-message">'.esc_attr__('No slider found. Plesae create slider from Slider Revolution section.', 'optico') . '<br><a href="'. admin_url( 'admin.php?page=revslider' ) .'">' . esc_attr__('Click here to go to Slider Revolution section and create your first slider or import demo slider.', 'optico') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_attr__('Select slider created in Revolution Slider. The slider will appear in header area.', 'optico').'</div>',
	'options' 	 => themestek_revslider_array(),
	'dependency' => array( 'slidertype_revslider', '==', 'true' ),
);
$ts_metabox_slider_area[] = array(
	'id'      	 => 'layerslider',
	'type'   	 => 'select',
	'title'		 => esc_attr__('Select Slider', 'optico'),
	'after'    	 => ( themestek_layerslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="ts-no-slider-message">'.esc_attr__('No slider found. Plesae create slider from Layer Slider section.', 'optico') . '<br><a href="'. admin_url( 'admin.php?page=layerslider' ) .'">' . esc_attr__('Click here to go to Layer Slider section and create your first slider or import demo slider.', 'optico') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_attr__('Select slider created in Layer Slider. The slider will appear in header area.', 'optico').'</div>',
	'options' 	 => themestek_layerslider_array(),
	'dependency' => array( 'slidertype_layerslider', '==', 'true' ),
);
$ts_metabox_slider_area[] = array(
	'id'       	 => 'customslider',
	'type'     	 => 'textarea',
	'title'    	 => esc_attr__('Custom Slider code', 'optico'),
	'shortcode'	 => true,
	'after'  	 => '<div class="cs-text-muted">'.esc_attr__('You can paste custom slider shortcode or html code here. The output code will appear in header area.', 'optico').'</div>',
	'dependency' => array( 'slidertype_custom', '==', 'true' ),// Multiple dependency
);
$ts_metabox_slider_area[] = array(
	'id'         => 'slider_width',
	'type'       => 'select',
	'title'      => esc_attr__('Boxed or Wide Slider', 'optico'),
	'info'       => esc_attr__('Select slider width.', 'optico'),
	'options'    => array(
		'wide'      => esc_attr__('Wide Slider', 'optico'),
		'boxed'     => esc_attr__('Boxed Slider', 'optico'),
	),
	'default'    => 'wide',
	'dependency' => array( 'slidertype_', '!=', 'true' ),// Multiple dependency
);

// Background metabox options array
$ts_metabox_background = array(
	array(
		'id'      => 'custom_background_switcher',
		'title'   => esc_attr__('Custom Background', 'optico'),
		'type'    => 'switcher',
		'default' => false,
		'label'   => '<div class="cs-text-muted">'.esc_attr__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'optico').'</div>',
	),
	array(
		'id'		 => 'custom_background',
		'type'		 => 'themestek_background',
		'title'		 => esc_attr__('Body Background Properties', 'optico'),
		'after'		 => '<div class="cs-text-muted">'.esc_attr__('Set background for main body. This is for main outer body background. For "Boxed" layout only', 'optico').'</div>',
		'dependency' => array( 'custom_background_switcher', '==', 'true' ),// Multiple dependency
	),
);

// Pre Header metabox options array
$ts_metabox_topbar = array(
	array(
		'id'      => 'show_topbar',
		'type'    => 'select',
		'title'   => esc_attr__('Show Pre Header', 'optico'),
		'info'    => esc_attr__('For this page only.', 'optico'),
		'options' => array(
			''      => esc_attr__('Global', 'optico'),
			'yes'   => esc_attr__('Yes, show Pre Header', 'optico'),
			'no'    => esc_attr__('No, hide Pre Header', 'optico'),
		),
		'default' => '',
	),
	array(
		'id'     	 => 'topbar_bg_color',
		'type'   	 => 'select',
		'title'  	 => esc_attr__('Background Color', 'optico'),
		'info'   	 => esc_attr__('Please select color for background', 'optico'),
		'options' 	 => array(
			''           => esc_attr__('Global', 'optico'),
			'darkgrey'   => esc_attr__('Dark grey', 'optico'),
			'grey'       => esc_attr__('Grey', 'optico'),
			'white'      => esc_attr__('White', 'optico'),
			'skincolor'  => esc_attr__('Skincolor', 'optico'),
			'custom'     => esc_attr__('Custom Color', 'optico'),
		),
		'default'	 => '',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'		 => 'topbar_bg_custom_color',
		'type'		 => 'color_picker',
		'title'		 => esc_attr__('Select Background Color', 'optico'),
		'default'	 => '#dd3333',
		'dependency' => array( 'show_topbar|topbar_bg_color', '!=|==', 'no|custom' ),
	),
	array(
		'id'		 => 'topbar_text_color',
		'type'		 => 'select',
		'title'		 => esc_attr__('Text Color', 'optico'),
		'info'		 => esc_attr__('Select <code>Dark</code> color if you are going to select light color in above option.', 'optico'),
		'options'	 => array(
			''          => esc_attr__('Global', 'optico'),
			'white'     => esc_attr__('White', 'optico'),
			'dark'      => esc_attr__('Dark', 'optico'),
			'skincolor' => esc_attr__('Skin Color', 'optico'),
			'custom'    => esc_attr__('Custom color', 'optico'),
		),
		'default' 	 => esc_attr__('Global', 'optico'),
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_text_custom_color',
		'type'       => 'color_picker',
		'title'      => esc_attr__('Custom Text Color', 'optico' ),
		'default'    => 'rgba(0, 0, 255, 0.25)',
		'dependency' => array( 'show_topbar|topbar_text_color', '!=|==', 'no|custom' ),//Multiple dependency
		'after'      => '<div class="cs-text-muted">'.esc_attr__('Please select custom color for text', 'optico').'</div>',
	),
	array(
		'id'       	 => 'topbar_left_text',
		'type'     	 => 'textarea',
		'title'    	 =>  esc_attr__('Pre Header Left Content (overwrite default text)', 'optico'),
		'shortcode'	 => true,
		'after'  	 => '<div class="cs-text-muted">'.esc_attr__('Add content for Pre Header text for left area. This will overwrite default text set in Theme Options', 'optico').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_right_text',
		'type'       => 'textarea',
		'title'      =>  esc_attr__('Pre Header Right Content (overwrite default text)', 'optico'),
		'shortcode'  => true,
		'after'      => '<div class="cs-text-muted">'.esc_attr__('Add content for Pre Header text for right area. This will overwrite default text set in Theme Options', 'optico').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
);

// Titlebar metabox options array
$ts_metabox_titlebar = array(
	array(
		'id'       			=> 'hide_titlebar',
		'type'      		=> 'checkbox',
		'title'         	=> esc_attr__('Hide Titlebar', 'optico'),
		'label'		        =>  esc_attr__( 'YES, Hide the Titlebar', 'optico' ),
		'after'   			=> '<div class="cs-text-muted">'.esc_attr__('If you want to hide Titlebar than check this option', 'optico').'</div>',
	),
	array(
		'id'		   		=> 'title',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_attr__('Page Title', 'optico'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Replace current page title with this title. So Search results will show the original page title and the page will show this title', 'optico').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		   		=> 'subtitle',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_attr__('Page Subtitle', 'optico'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Please fill page subtitle', 'optico').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Background Options', 'optico'),
		'after'  	  	 => '<small>'.esc_attr__('Background options for Titlebar area', 'optico').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		 => 'titlebar_bg_custom_options',
		'type'		 => 'select',
		'title'		 =>  esc_attr__('Titlebar Background Options', 'optico'),
		'options'	 => array(
			''       	=> esc_attr__('Use global settings', 'optico'),
			'custom' 	=> esc_attr__('Set custom settings', 'optico'),
		),
		'default'	 => '',
		'after'		 => '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'optico').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_bg_color',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Background Color', 'optico'),
		'options'  => array(
			''           => esc_attr__('Global', 'optico'),
			'darkgrey'   => esc_attr__('Dark grey', 'optico'),
			'grey'       => esc_attr__('Grey', 'optico'),
			'white'      => esc_attr__('White', 'optico'),
			'skincolor'  => esc_attr__('Skincolor', 'optico'),
			'custom'     => esc_attr__('Custom Color', 'optico'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'optico').'</div>',
		'dependency'    => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),//Multiple dependency
	),
	array(
		'id'      		=> 'titlebar_background',
		'type'    		=> 'themestek_background',
		'title'  		=> esc_attr__('Titlebar Background Properties', 'optico' ),
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Title bar. You can set color or image and also set other background related properties', 'optico').'</div>',
		'color'			=> true,
		'dependency'   => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),

	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Font Settings', 'optico'),
		'after'  	  	 => '<small>'.esc_attr__('Font Settings for different elements in Titlebar area', 'optico').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),// Multiple dependency
	),
	array(
		'id'            => 'titlebar_font_custom_options',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Font Options', 'optico'),
		'options'  => array(
						''       => esc_attr__('Use global settings', 'optico'),
						'custom' => esc_attr__('Set custom settings', 'optico'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Ude global settings" to load global font settings.', 'optico').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),// Multiple dependency
	),
	array(
		'id'            => 'titlebar_text_color',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Text Color', 'optico'),
		'options'  => array(
						'white'  => esc_attr__('White', 'optico'),
						'dark'   => esc_attr__('Dark', 'optico'),
						'custom' => esc_attr__('Custom Color', 'optico'),
					),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select <code>Dark</code> color if you are going to select light color in above option', 'optico').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	array(
		'id'             => 'titlebar_heading_font',
		'type'           => 'themestek_typography', 
		'title'          => esc_attr__('Heading Font', 'optico'),
		'chosen'         => false,
		'text-align'     => false,
		'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
		'font-backup'    => true, // Select a backup non-google font in addition to a google font
		'subsets'        => false, // Only appears if google is true and subsets not set to false
		'line-height'    => true,
		'text-transform' => true,
		'word-spacing'   => false, // Defaults to false
		'letter-spacing' => true, // Defaults to false
		'color'          => true,
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading in Titlebar', 'optico').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	array(
		'id'             => 'titlebar_subheading_font',
		'type'           => 'themestek_typography', 
		'title'          => esc_attr__('Sub-heading Font', 'optico'),
		'chosen'         => false,
		'text-align'     => false,
		'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
		'font-backup'    => true, // Select a backup non-google font in addition to a google font
		'subsets'        => false, // Only appears if google is true and subsets not set to false
		'line-height'    => true,
		'text-transform' => true,
		'word-spacing'   => false, // Defaults to false
		'letter-spacing' => true, // Defaults to false
		'color'          => true,
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for sub-heading in Titlebar', 'optico').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	array(
		'id'             => 'titlebar_breadcrumb_font',
		'type'           => 'themestek_typography', 
		'title'          => esc_attr__('Breadcrumb Font', 'optico'),
		'chosen'         => false,
		'text-align'     => false,
		'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
		'font-backup'    => true, // Select a backup non-google font in addition to a google font
		'subsets'        => false, // Only appears if google is true and subsets not set to false
		'line-height'    => true,
		'text-transform' => true,
		'word-spacing'   => false, // Defaults to false
		'letter-spacing' => true, // Defaults to false
		'color'          => true,
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for breadcrumbs in Titlebar', 'optico').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),

	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Content Options', 'optico'),
		'after'  	  	 => '<small>'.esc_attr__('Content options for Titlebar area', 'optico').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            	=> 'titlebar_view',
		'type'          	=> 'select',
		'title'         	=>  esc_attr__('Titlebar Text Align', 'optico'),
		'options'       	=> array (
						''         => esc_attr__('Global', 'optico'),
						'default'  => esc_attr__('All Center', 'optico'),
						'left'     => esc_attr__('Title Left / Breadcrumb Right', 'optico'),
						'right'    => esc_attr__('Title Right / Breadcrumb Left', 	'optico'),
						'allleft'  => esc_attr__('All Left', 'optico'),
						'allright' => esc_attr__('All Right', 'optico'),
		),
		'default'	 => '',
		'after'  			=> '<div class="cs-text-muted">'.esc_attr__('Select text align in Titlebar', 'optico').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'     		 => 'titlebar_height',
		'type'   		 => 'number',
		'title'          => esc_attr__( 'Titlebar Height', 'optico' ),
		'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Set height of the Titlebar. In pixel only', 'optico').'</div>',
		'default'		 => '',
		'after'   		 => ' px',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_hide_breadcrumb',
		'type'          => 'select',
		'title'         =>  esc_attr__('Hide Breadcrumb', 'optico'),
		'options'  => array(
						''     => esc_attr__('Global', 'optico'),
						'no'   => esc_attr__('NO, show the breadcrumb', 'optico'),
						'yes'  => esc_attr__('YES, Hide the Breadcrumb', 'optico'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('You can show or hide the breadcrumb', 'optico').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),

);

// Other Options
$ts_other_options =  array(
	array(
		'id'     		 	=> 'skincolor',
		'type'   		 	=> 'color_picker',
		'title'  		 	=> esc_attr__('Skin Color', 'optico' ),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('Select Skin Color for this page only. This will override Skin color set under "Theme Options" section. ', 'optico').'<br><br> <strong>' . esc_attr__( 'NOTE: ' ,'optico') . '</strong> ' . esc_attr__( 'Leave this empty to use "Skin Color" set in the "Theme Options" directly. ' ,'optico') . '</div>',
	),
);

/**** Metabox options - Sidebar ****/

// Getting custom sidebars 
$all_sidebars = themestek_get_all_registered_sidebars();

$ts_metabox_sidebar = array(
	array(
		'id'       => 'sidebar',
		'title'    => esc_attr__('Select Sidebar Position', 'optico'),
		'type'     => 'image_select',
		'options'  => array(
			''          => get_template_directory_uri() . '/includes/images/layout_default.png',
			'no'        => get_template_directory_uri() . '/includes/images/layout_no_side.png',
			'left'      => get_template_directory_uri() . '/includes/images/layout_left.png',
			'right'     => get_template_directory_uri() . '/includes/images/layout_right.png',
			'both'      => get_template_directory_uri() . '/includes/images/layout_both.png',
			'bothleft'  => get_template_directory_uri() . '/includes/images/layout_left_both.png',
			'bothright' => get_template_directory_uri() . '/includes/images/layout_right_both.png',
		),
		'default'  => '',
	),
	array(
		'id'      => 'left_sidebar',
		'type'    => 'select',
		'title'   => esc_attr__('Select Left Sidebar', 'optico'),
		'options' => $all_sidebars,
		'default' => '',
	),
	array(
		'id'      => 'right_sidebar',
		'type'    => 'select',
		'title'   => esc_attr__('Select Right Sidebar', 'optico'),
		'options' => $all_sidebars,
		'default' => '',
	),
);

// Getting name of CPT from Theme Options
$optico_theme_options		  = get_option('optico_theme_options');
$pf_type_title_singular   = ( !empty($optico_theme_options['pf_type_title_singular']) ) ? $optico_theme_options['pf_type_title_singular'] : 'Portfolio' ;
$team_type_title_singular = ( !empty($optico_theme_options['team_type_title_singular']) ) ? $optico_theme_options['team_type_title_singular'] : 'Team Member' ;

// CPT list
$ts_cpt_list = array(
	'page'           => esc_attr__('Page', 'optico'),
	'post'           => esc_attr__('Post', 'optico'),
	'ts-portfolio'   => esc_attr($pf_type_title_singular),
	'ts-team-member' => esc_attr($team_type_title_singular),
	'ts-testimonial' => esc_attr__('Testimonials', 'optico'),
);

// Foreach loop
foreach( $ts_cpt_list as $cpt_id=>$cpt_name ){

	$ts_metabox_options[] = array(
		'id'        => '_themestek_metabox_group',
		'title'     => sprintf( esc_attr__('Optico - %s Single view Elements Options', 'optico'), $cpt_name ),
		'post_type' => $cpt_id,
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(

			array(
				'name'   => '_themestek_slider_area_options',
				'title'  => esc_attr__('Header Slider Options', 'optico'),
				'icon'   => 'fa fa-picture-o',
				'fields' => $ts_metabox_slider_area,
			),

			array(
				'name'   => '_themestek_background_options',
				'title'  => esc_attr__(' Background Options', 'optico'),
				'icon'   => 'fa fa-paint-brush',
				'fields' => $ts_metabox_background,
			),

			array(
				'name'   => '_themestek_page_topbar_options',
				'title'  => esc_attr__('Pre Header Options', 'optico'),
				'icon'   => 'fa fa-tasks',
				'fields' => $ts_metabox_topbar,
			),

			array(
				'name'   => '_themestek_titlebar_options',
				'title'  => esc_attr__('Titlebar Options', 'optico'),
				'icon'   => 'fa fa-align-justify',
				'fields' => $ts_metabox_titlebar,
			),

			array(
				'name'   => '_themestek_page_customize',
				'title'  => esc_attr__('Other Options', 'optico'),
				'icon'   => 'fa fa-cog',
				'fields' => $ts_other_options,
			),

		),
	);

	/**
	 *  CPT - Sidebar
	 */
	$ts_metabox_options[]    = array(
		'id'        => '_themestek_metabox_sidebar',
		'title'     => esc_attr__('Optico - Sidebar Options', 'optico'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'ts_sidebar_options',
				'fields' => $ts_metabox_sidebar,
			),
		),
	);

	$ts_metabox_options[]    = array(
		'id'        => 'themestek_page_row_settings',
		'title'     => esc_attr__('Optico - Content ROW settings', 'optico'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'ts_content_row_settings',
				'fields' => array(
					array(
						'id'      => 'row_lower_padding',
						'title'   => esc_attr__('Lower ROW Spacing', 'optico'),
						'type'    => 'switcher',
						'default' => false,
						'label'   => '<div class="cs-text-muted">'.esc_attr__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'optico').'</div>',
					)
				)
			)
		)
	);

} // foreach

/* Blog Post Format - Gallery meta box */
$ts_metabox_options[] = array(
	'id'        => '_themestek_metabox_gallery',
	'title'     => esc_attr__('Optico - Gallery Images', 'optico'),
	'post_type' => 'post',
	'context'   => 'normal',
	'priority'  => 'default',
	'sections'  => array(
		array(
			'name'   => 'themestek_metabox_gallery_sections',
			'fields' => array(
				array(
					'id'          => 'gallery_images',
					//'debug'       => true,
					'type'        => 'gallery',
					'title'       => esc_attr__('Slider Images', 'optico'),
					'add_title'   => esc_attr__('Add Images', 'optico'),
					'edit_title'  => esc_attr__('Edit Gallery', 'optico'),
					'clear_title' => esc_attr__('Remove Gallery', 'optico'),
					'after'       => '<br><div class="cs-text-muted">'.esc_attr__('Select images for gallery. Click on "Edit Gallery" button to add images, order images or remove images in gallery.', 'optico').'</div>',
				),
			)
		)
	),
);
