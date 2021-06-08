<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

// Get current theme name and vesion
$ts_theme = wp_get_theme();
$ts_theme_name = $ts_theme->get( 'Name' );
$ts_theme_ver  = $ts_theme->get( 'Version' );

// Getting all theme options again if variable is not defined
global $optico_theme_options;
if( empty($optico_theme_options) || !is_array($optico_theme_options) ){
	if( function_exists('themestek_load_default_theme_options') ){
		themestek_load_default_theme_options();
	} else {
		$optico_theme_options = get_option('optico_theme_options');
	}
}

// variables
$team_member_title          = ( !empty($optico_theme_options['team_type_title']) ) ? esc_attr($optico_theme_options['team_type_title']) : esc_attr('Team Members') ;
$team_member_title_singular = ( !empty($optico_theme_options['team_type_title_singular']) ) ? esc_attr($optico_theme_options['team_type_title_singular']) : esc_attr('Team Member') ;
$team_group_title           = ( !empty($optico_theme_options['team_group_title']) ) ? esc_attr($optico_theme_options['team_group_title']) : esc_attr('Team Groups') ;
$team_group_title_singular  = ( !empty($optico_theme_options['team_group_title_singular']) ) ? esc_attr($optico_theme_options['team_group_title_singular']) : esc_attr('Team Group') ;

$pf_title               = ( !empty($optico_theme_options['pf_type_title']) ) ? esc_attr($optico_theme_options['pf_type_title']) : esc_attr('Portfolio') ;
$pf_title_singular      = ( !empty($optico_theme_options['pf_type_title_singular']) ) ? esc_attr($optico_theme_options['pf_type_title_singular']) : esc_attr('Portfolio') ;
$pf_cat_title           = ( !empty($optico_theme_options['pf_cat_title']) ) ? esc_attr($optico_theme_options['pf_cat_title']) : esc_attr('Portfolio Categories') ;
$pf_cat_title_singular  = ( !empty($optico_theme_options['pf_cat_title_singular']) ) ? esc_attr($optico_theme_options['pf_cat_title_singular']) : esc_attr('Portfolio Category') ;

/**
 *  FRAMEWORK SETTINGS
 */
$ts_framework_settings = array(
	'menu_title' 	  => esc_attr__('Optico Options', 'optico'),
	'menu_type'  	  => 'menu',
	'menu_slug'  	  => 'themestek-theme-options',
	'ajax_save'  	  => true,
	'show_reset_all'  => false,
	'framework_title' => esc_attr($ts_theme_name).'  <small>'.esc_attr($ts_theme_ver).'</small>',
	'menu_position'   => 2, // See below comment for proper number
	/*
	Default: bottom of menu structure #Default: bottom of menu structure
	2 – Dashboard
	4 – Separator
	5 – Posts
	10 – Media
	15 – Links
	20 – Pages
	25 – Comments
	59 – Separator
	60 – Appearance
	65 – Plugins
	70 – Users
	75 – Tools
	80 – Settings
	99 – Separator
	For the Network Admin menu, the values are different: #For the Network Admin menu, the values are different:
	2 – Dashboard
	4 – Separator
	5 – Sites
	10 – Users
	15 – Themes
	20 – Plugins
	25 – Settings
	30 – Updates
	99 – Separator
	*/
);

/**
 *  FRAMEWORK OPTIONS
 */
$ts_framework_options = array();

// Layout Settings
$ts_framework_options[] = array(
	'name'   => 'layout_settings', // like ID
	'title'  => esc_attr__('Layout Settings', 'optico'),
	'icon'   => 'fa fa-gear',
	
	'sections' => array(
	
		// Layout Settings - General Settings
		array(
			'name'   => 'general_settings', // like ID
			'icon'   => 'fa fa-gear',
			'title'  => esc_attr__('General Settings', 'optico'),
			'fields' => array( // begin: fields
				array(
					'type'    	=> 'heading',
					'content'	=> esc_attr__('General settings like logo, header, skincolor etc.', 'optico'),
				),
				array(
					'id'    => 'ts_one_click_demo_setup',
					'type'  => 'themestek_one_click_demo_import',
					'title' => esc_attr__('Demo Content Importer', 'optico'),
					'after' => '<br><div class="cs-text-muted cs-text-desc">'.esc_attr__('Demo content setup. This will add demo data same as our demo site (excluding images because they are copyright)', 'optico').'</div>',
				),
				array(
					'id'      => 'skincolor',
					'type'    => 'themestek_skin_color',
					'title'   => esc_attr__( 'Select Skin Color', 'optico' ),
					'after'   	=> '<br><div class="cs-text-muted cs-text-desc">'.esc_attr__('Select the main color. This color will be used globally.', 'optico').'</div>',
					'default' => '#7fc540',
					'options' => array(
						'Rio Grande'		=> '#7fc540', /* Default skin color */
						'Science Blue'		=> '#0073cc',
						'Red Orange'		=> '#ff4229',
						'Vivid Violet'		=> '#af33bb',
						'Tan Hide'			=> '#f9a861',
						'Selective Yellow'	=> '#ffb901',
						'Red'				=> '#ff0b09',
						'Purple Heart'		=> '#6c33bb',
						'Azure Radiance'	=> '#0095eb',
						'Mountain Meadow'	=> '#18c47c',
						
					),
					'rgba'    => false,
				),
				
				array(
					'id'		=> 'layout',
					'type'		=> 'image_select',//themestek_pre_color_packages
					'title'		=> esc_attr__('Pages Layout', 'optico'), 
					'options'	=> array(
						'wide'		=> get_template_directory_uri() . '/includes/images/layout-wide.png',
						'boxed'		=> get_template_directory_uri() . '/includes/images/layout-box.png',
						'framed'	=> get_template_directory_uri() . '/includes/images/layout-frame.png',
						'rounded'	=> get_template_directory_uri() . '/includes/images/layout-rounded.png',
						'fullwide'	=> get_template_directory_uri() . '/includes/images/layout-fullwide.png',
					),
					'default'	=> 'wide',
					'after'		=> '<br><div class="cs-text-muted cs-text-desc">'.esc_attr__('Specify the layout for the pages', 'optico').'</div>',
					'radio'		=> true,
				),
				
				array(
					'id'        => 'full_wide_elements',
					'type'      => 'checkbox',
					'title'     => esc_attr__('Select Elements for Full Wide View (in above option)', 'optico'),
					'options'   => array(
						'floatingbar' => esc_attr__('Floatbar', 'optico'),
						'topbar'      => esc_attr__('Pre Header', 'optico'),
						'header'      => esc_attr__('Header', 'optico'),
						'content'     => esc_attr__('Content Area', 'optico'),
						'footer'      => esc_attr__('Footer', 'optico'),
					),
					'default'    => array( 'header', 'footer' ),
					'after'    	 => '<small>'.esc_attr__('Select elements that you want to show in full-wide view', 'optico').'</small>',
					'dependency' => array( 'layout_fullwide', '==', 'true' ),
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Logo', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Select or upload your logo. You can also show text logo from here.', 'optico').'<br /> <span class="ts-toptions-head-highlight">'.esc_attr__('You can go to "Header Settings" tab from the left menu for more options.', 'optico') . '</span></small>',
				),
				array(
				  'id'      	 	 => 'logotype',
				  'type'     		 => 'radio',
				  'title'    		 => esc_attr__('Logo type', 'optico'), 
				  'options' 		 => array( 
						'text'			=> esc_attr__('Logo as Text', 'optico'), 
						'image'			=> esc_attr__('Logo as Image', 'optico') 
					),
				  'default'  		 => 'image',
				  'after'  			 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Specify the type of logo. It can Text or Image', 'optico').'</div>',
				),
				array(
					'id'     		 => 'logotext',
					'type'    		 => 'text',
					'title'   		 => esc_attr__('Logo Text', 'optico'),
					'default' 		 => esc_attr('Optico'),
					'dependency'  	 => array( 'logotype_text', '==', 'true' ),
					'after'  			 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Enter the text to be used instead of the logo image', 'optico').'</div>',
				),
				array(
					'id'             => 'logo_font',
					'type'           => 'themestek_typography', 
					'title'          => esc_attr__('Logo Font', 'optico'),
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
					'output'         => '.headerlogo a.home-link', // An array of CSS selectors to apply this font style to dynamically
					'default'        => array(
						'family'		 => 'Arimo',
						'backup-family'	 => 'Arial, Helvetica, sans-serif',
						'variant'		 => 'regular',
						'font-size'		 => '26',
						'line-height'	 => '27',
						'letter-spacing' => '0',
						'color'			 => '#202020',
						'font'			 => 'google',
					),
					'dependency'  	=> array( 'logotype_text', '==', 'true' ),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This will be applied to logo text only. Select Logo font-style and size', 'optico').'</div>',
				),
				array(
					'id'       		 => 'logoimg',
					'type'     		 => 'themestek_image',
					'title'    		 => esc_attr__('Logo Image', 'optico'),
					'dependency'  	 => array( 'logotype_image', '==', 'true' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Upload image that will be used as logo for the site ', 'optico') . sprintf(esc_attr__('%1$sNOTE:%2$s Upload image that will be used as logo for the site', 'optico'),'<strong>', '</strong>').'</div>',
					'add_title'		 => esc_attr__('Upload Site Logo','optico'),
					'default'		 => array(
						'thumb-url'	=> get_template_directory_uri() . '/images/logo.png',
						'full-url'	=> get_template_directory_uri() . '/images/logo.png',
					),
				),
				array(
					'id'       		 => 'logoimg_sticky',
					'type'     		 => 'themestek_image',
					'title'    		 => esc_attr__('Logo Image for Sticky Header (optional)', 'optico'),
					'dependency'  	 => array( 'sticky_header|logotype_image', '==|==', 'true|true' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('This logo will appear only on sticky header only.', 'optico') . '</div>',
					'add_title'		 => esc_attr__('Upload Sticky Logo','optico'),
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Header Style', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Options to change header style.', 'optico'). '<br /> <span class="ts-toptions-head-highlight">'.esc_attr__('You can go to "Header Settings" tab from the left menu for more options.', 'optico') . '</span></small>',
				),
				array(
					'id'			=> 'headerstyle',
					'type' 			=> 'image_select',
					'title'			=> esc_attr__('Select Header Style', 'optico'),
					'desc'     		=> esc_attr__('Please select header style', 'optico'),
					'wrap_class'    => 'ts-header-style',
					'options'      	=> array(
						'classic'			=> get_template_directory_uri() . '/includes/images/header-classic.png',
						'infostack'			=> get_template_directory_uri() . '/includes/images/header-infostack.png', // demo1
						'classic-overlay'	=> get_template_directory_uri() . '/includes/images/header-classic-overlay.png', // demo2
					),
					'default'		=> 'classic',
					'attributes' 	=> array(
						'data-depend-id' => 'header_style'
					),
					'radio' 		=> true,
				),
				array(
					'type'    		=> 'heading',
					'content'		=> esc_attr__('Options for selected header', 'optico'),
					'dependency'	=> array( 'header_style', 'any', 'classic,classic-overlay,infostack' ),
					'after'  	  	 => '<small>'.esc_attr__('These options will appear for selected header style only.', 'optico').'</small>',
				),
				
				// Group - Header Button
				array(
					'id'		=> 'header_btn',
					'type'		=> 'fieldset',
					'title'		=> esc_attr__('Header Button', 'optico'),
					'after'			=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('You can set header button from here. This button will apppear after menu in header.', 'optico').'</div>',
					'fields'	=> array(
						array(
							'id'     		=> 'header_btn_text',
							'type'    		=> 'text',
							'title'   		=> esc_attr__('Header Button Text', 'optico'),
							'default' 		=> '',
							'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Header Button text', 'optico') . '</div>',
						),
						array(
							'id'     		=> 'header_btn_link',
							'type'    		=> 'text',
							'title'   		=> esc_attr__('Header Button Link', 'optico'),
							'default' 		=> '',
							'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Header Button link', 'optico') . '</div>',
						),

					),
					'dependency'	=> array( 'header_style', 'any', 'classic,classic-overlay,infostack' ),
				),
				
				array(
					'id'			=> 'header_text',
					'type'			=> 'textarea',
					'title'			=>  esc_attr__('Header Text Area', 'optico'),
					'shortcode'		=> true,
					'dependency'	=> array( 'header_style', 'any', 'classic,classic-overlay' ),
					'after'			=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This content will appear before Search/Cart icon in header area. This option will work for currently selected header style only', 'optico').'</div>',
					'default'		=> '',
				),
				array(
					'id'            => 'header_menu_position',
					'type'          => 'select',
					'title'         =>  esc_attr__('Header Menu Position', 'optico'),
					'options'  		=> array(
						'left'			=> esc_attr__('Left Align', 'optico'),
						'right'			=> esc_attr__('Right Align', 'optico'),
						'center'		=> esc_attr__('Center Align', 'optico'),
					),
					'default'       => 'right',
					'dependency'  	=> array( 'header_style', 'any', 'classic,classic-overlay' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select Menu Position. This option will work for currently selected header style only ', 'optico').'</div>',
				),
				array(
					'id'       		 => 'infostack_left_text',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_attr__('InfoStack First Box Content', 'optico'),
					'shortcode'		 => true,
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This content will appear on Left side of logo', 'optico').'</div>',
					'default'        => themestek_wp_kses('<div class="media-left"><div class="icon"> <i class="ts-optico-icon-mail"></i></div></div><div class="media-right"><h6>Email us </h6><h3>info@optico.com </h3> </div>'),
					'dependency'  	 => array( 'header_style', 'any', 'infostack' ),
				),
				array(
					'id'       		 => 'infostack_right_text',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_attr__('InfoStack Second Box Content', 'optico'),
					'shortcode'		 => true,
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This content will appear on Right side of logo', 'optico').'</div>',
					'default'        => themestek_wp_kses('<div class="media-left"><div class="icon"> <i class="ts-optico-icon-headphone-alt"></i></div></div><div class="media-right"><h6>Call us now </h6><h3>123456789 </h3> </div>'),
					'dependency'  	 => array( 'header_style', 'any', 'infostack' ),
				),
				array(
					'id'       		 => 'infostack_phone_text',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_attr__('InfoStack Third Box Content', 'optico'),
					'shortcode'		 => true,
					'desc'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This content will appear after menu. This will appear only on InfoStack header only.', 'optico').'</div>',
					'default'        => '[ts-btn title="APPOINTMENT" style="outline"  shape="rounded" font_weight="yes" link="url:%23|||"]',
					'dependency'  	 => array( 'header_style', 'any', 'infostack' ),
				),
				
				array(
					'type'    		=> 'notice',
					'class'   		=> 'info',
					'content'		=> '<p><strong>' . esc_attr__('Change widget content of the header', 'optico') . '</strong> <br> ' . esc_attr__('You can change widgets content in the header area from Widgets section. Just go to "Appearance > Widgets" and modify widgets under "InfoStack header widgets" position.', 'optico') . '</p>',
					'dependency'  	 => array( 'header_style', 'any', 'infostack' ),
				),
				array(
					'id'     		 => 'header_menuarea_height',
					'type'    		 => 'number',
					'title'   		 => esc_attr__('Menu area height', 'optico'),
					'default' 		 => '60',
					'after'          => esc_attr(' px'),
					'attributes'     => array(
						'min'       	 => 40,
					),
					'subtitle'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Height for menu area only', 'optico').'</div>',
					'dependency'     => array( 'header_style', 'any', 'infostack' ),
				),
				array(
					'id'            => 'header_menu_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Header Menu Background Color', 'optico'),
					'options'  		=> array(
						'darkgrey'		=> esc_attr__('Dark grey', 'optico'),
						'grey'			=> esc_attr__('Grey', 'optico'),
						'white'			=> esc_attr__('White', 'optico'),
						'skincolor'		=> esc_attr__('Skincolor', 'optico'),
						'custom'		=> esc_attr__('Custom Color', 'optico'),
					),
					'default'       => 'darkgrey',
					'dependency'	=> array( 'header_style', 'any', 'infostack' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined background color for Menu area in header', 'optico').'</div>',
				),
				array(
					'id'     		 => 'header_menu_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Header Menu Background Custom Background Color', 'optico' ),
					'default'		 => 'rgba(0,0,0,0.31)',
					'dependency'  	 => array( 'header_menu_bg_color|header_style', '==|any', 'custom|infostack' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Header Menu area', 'optico').'</div>',
				),
				array(
					'id'            => 'sticky_header_menu_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Sticky Header Menu Background Color', 'optico'),
					'options'  		=> array(
						'darkgrey'   => esc_attr__('Dark grey', 'optico'),
						'grey'       => esc_attr__('Grey', 'optico'),
						'white'      => esc_attr__('White', 'optico'),
						'skincolor'  => esc_attr__('Skincolor', 'optico'),
						'custom'     => esc_attr__('Custom Color', 'optico'),
					),
					'default'       => 'darkgrey',
					'dependency'	=> array( 'header_style', 'any', 'infostack' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined background color for Menu area in header when header is sticky', 'optico').'</div>',
				),
				array(
					'id'     		 => 'sticky_header_menu_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Sticky Header Menu Background Custom Background Color', 'optico' ),
					'default'		 => '#ffffff',
					'dependency'  	 => array( 'sticky_header_menu_bg_color|header_style', '==|any', 'custom|infostack' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Header Menu area when header is sticky', 'optico').'</div>',
				),
				
				array(
					'type'      	=> 'heading',
					'content'     	=> esc_attr__('Background Settings', 'optico'),
					'after'  		=> '<small>'.esc_attr__('Set below background options. Background settings will be applied to Boxed layout only', 'optico').'</small>',
				),
				array(
					'id'     		=> 'global_background',
					'type'   		=> 'themestek_background',
					'title' 		=> esc_attr__('Body Background Properties', 'optico'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for main body. This is for main outer body background. For "Boxed" layout only.', 'optico').'</div>',
					'default'		=> array(
						'color'			=> '#ffffff',
					),
					'output'        => 'body',
				),
				array(
					'id'     		=> 'inner_background',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Content Area Background Properties', 'optico'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for content area', 'optico').'</div>',
					'default' 	=> array(
						'color' 		=> '#ffffff',
					),
					'output'        => 'body #main',
				),
				
				array(
					'type'		=> 'heading',
					'content'	=> esc_attr__('Pre-loader Image', 'optico'),
					'after'		=> '<small>'.esc_attr__('Select pre-loader image for the site. This will work on desktop, mobile and tablet devices', 'optico').'</small>',
				),
				array(
					'id'     		=> 'preloader_show',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Pre-loader animation', 'optico'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Show or hide pre-loader animation.', 'optico') . '</div>',
				),
				array(
					'id'		=> 'loaderimg',
					'type'		=> 'image_select',
					'title'		=> esc_attr__('Pre-loader Image', 'optico'), 
					'options'	=> array(
						'1'   		=> get_template_directory_uri() . '/images/loader1.svg',
						'2'   		=> get_template_directory_uri() . '/images/loader2.svg',
						'3'   		=> get_template_directory_uri() . '/images/loader3.svg',
						'4'   		=> get_template_directory_uri() . '/images/loader4.svg',
						'5'   		=> get_template_directory_uri() . '/images/loader5.svg',
						'6'   		=> get_template_directory_uri() . '/images/loader6.svg',
						'7'   		=> get_template_directory_uri() . '/images/loader7.svg',
						'8'   		=> get_template_directory_uri() . '/images/loader8.svg',
						'9'   		=> get_template_directory_uri() . '/images/loader9.svg',
						'10'   		=> get_template_directory_uri() . '/images/loader10.svg',
						'custom'	=> get_template_directory_uri() . '/images/loader-custom.gif',
					),
					'radio'		=> true,
					'default'	=> '1',
					'after'		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Please select pre-loader image.', 'optico') . '</div>',
					'dependency' => array( 'preloader_show', '==', 'true' ),
				),
				array(
					'id'       		=> 'loaderimage_custom',
					'type'      	=> 'image',
					'title'    		=> esc_attr__('Upload Page-loader Image', 'optico'),
					'add_title' 	=> 'Select/Upload Page-loader image',
					'after'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Custom page-loader image that you want to show. You can create animated GIF image from your logo from Animizer website.', 'optico') . ' <a href="'. esc_url('http://animizer.net/en/animate-static-image') .'" target="_blank">' . esc_attr__('Click here to go to Anmizer website.', 'optico') . '</a></div>',
					'dependency'    => array( 'loaderimg_custom|preloader_show', '==|==', 'true|true' ),
				),
				array(
					'type'		=> 'heading',
					'content'	=> esc_html__('Totop Button', 'moversco'),
					'after'		=> '<small>'.esc_html__('Show or hide Totop Button', 'moversco').'</small>',
				),
				array(
					'id'     		=> 'hide_totop_button',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Hide Totop Button', 'moversco'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_html__('Show or hide Totop Button.', 'moversco') . '</div>',
				),
			),
		),
		
		// Layout Settings - Floatbar Settings
		array(
			'name'   => 'floatingbar_settings', // like ID
			'title'  => esc_attr__('Floatbar Settings', 'optico'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'    		=> 'heading',
					'content'		=> esc_attr__('Floatbar Settings', 'optico'),
				),
				array(
					'id'     		=> 'fbar_show',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Floatbar', 'optico'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Show or hide Floatbar', 'optico').'</div>',
				),
				array(
					'id'      => 'fbar-position',
					'type'    => 'radio',
					'title'   => esc_attr__('Floating bar position', 'optico'),
					'options' => array(
						'default' => esc_attr__('Top','optico'),
						'right'   => esc_attr__('Right', 'optico'),
					),
					'default'    => 'right',
					'after'      => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Position for Floating bar', 'optico').'</div>',
					'dependency' => array( 'fbar_show', '==', 'true' ),
				),
				array(
					'id'            => 'fbar_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Floatbar Background Color', 'optico'),
					'options'  		=> array(
						'darkgrey'    => esc_attr__('Dark grey', 'optico'),
						'grey'        => esc_attr__('Grey', 'optico'),
						'white'       => esc_attr__('White', 'optico'),
						'skincolor'   => esc_attr__('Skincolor', 'optico'),
						'custom'      => esc_attr__('Custom Color', 'optico'),
					),
					'default'       => 'skincolor',
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Floatbar background color', 'optico').'</div>',
				),
				array(
					'id'      		=> 'fbar_background',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Floatbar Background Properties', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for Floating bar. You can set color or image and also set other background related properties', 'optico').'</div>',
					'color'			=> true,
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'default'		=> array(
						'size'				=> 'cover',
						'color'				=> '#7fc540',
					),
					'output' 	        => '.themestek-fbar-box-w',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'fbar_bg_color',   // color dropdown to decide which color
					
				),
				array(
					'id'            => 'fbar_text_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Floatbar Text Color', 'optico'),
					'options' 		=> array(
						'white'			=> esc_attr__('White', 'optico'),
						'darkgrey'		=> esc_attr__('Dark', 'optico'),
						'custom'		=> esc_attr__('Custom color', 'optico'),
									),
					'default'		=> 'white',
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'optico').'</div>',
				),
				array(
					'id'     		 => 'fbar_text_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Floatbar Custom Color for text', 'optico' ),
					'default'		 => '#dd3333',
					'dependency'  	 => array( 'fbar_show|fbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Floatbar', 'optico').'</div>',
				),
				
				array(
					'type'    	 => 'heading',
					'content'	 => esc_attr__('Floatbar Open/Close Button Settings', 'optico'),
					'after'		 => '<small>' . esc_attr__('Settings for Floatbar Open/Close Button', 'optico') . '</small>',
					'dependency' => array( 'fbar_show', '==', 'true' ),
				),
				array(
					'id'      => 'fbar_handler_icon',
					'type'    => 'themestek_iconpicker',
					'title'   => esc_attr__('Open Link Icon', 'optico' ),
					'default' => array(
						'library'				=> 'themify',
						'library_fontawesome'	=> 'fa fa-arrow-down',
						'library_linecons'		=> 'vc_li vc_li-bubble',
						'library_themify'		=> 'themifyicon ti-menu',
					),
					'dependency' => array( 'fbar_show', '==', 'true' ),
				),
				array(
					'id'      => 'fbar_handler_icon_close',
					'type'    => 'themestek_iconpicker',
					'title'   => esc_attr__('Close Link Icon', 'optico' ),
					'default' => array(
						'library'				=> 'themify',
						'library_fontawesome'	=> 'fa fa-arrow-up',
						'library_linecons'		=> 'vc_li vc_li-bubble',
						'library_themify'		=> 'themifyicon ti-close',
					),
					'dependency' => array( 'fbar_show', '==', 'true' ),
				),
				
				array(
					'id'            => 'fbar_icon_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Floatbar Open Icon Color', 'optico'),
					'options' 		=> array(
							'dark'       => esc_attr__('Dark grey', 'optico'),
							'grey'       => esc_attr__('Grey', 'optico'),
							'white'      => esc_attr__('White', 'optico'),
							'skincolor'  => esc_attr__('Skincolor', 'optico'),
					),
					'default'		=> 'white',
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option.', 'optico').'</div>',
				),
				
				array(
					'id'            => 'fbar_icon_color_close',
					'type'          => 'select',
					'title'         =>  esc_attr__('Floatbar Close Icon Color', 'optico'),
					'options' 		=> array(
							'dark'       => esc_attr__('Dark grey', 'optico'),
							'grey'       => esc_attr__('Grey', 'optico'),
							'white'      => esc_attr__('White', 'optico'),
							'skincolor'  => esc_attr__('Skincolor', 'optico'),
					),
					'default'		=> 'dark',
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option.', 'optico').'</div>',
				),
				
				array(
					'type'    	 => 'heading',
					'content'	 => esc_attr__('Floatbar Widget Settings', 'optico'),
					'after'		 => '<small>' . esc_attr__('Settings for Floatbar Widgets', 'optico') . '</small>',
					'dependency' => array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
				),
				array(
					'id'			=> 'fbar_widget_column_layout',
					'type' 			=> 'image_select',//themestek_pre_color_packages
					'title'			=> esc_attr__('Floatbar Widget Columns', 'optico'),
					'options'      	=> array(
							'12'      => get_template_directory_uri() . '/includes/images/footer_col_12.png',
							'6_6'     => get_template_directory_uri() . '/includes/images/footer_col_6_6.png',
							'4_4_4'   => get_template_directory_uri() . '/includes/images/footer_col_4_4_4.png',
							'3_3_3_3' => get_template_directory_uri() . '/includes/images/footer_col_3_3_3_3.png',
							'8_4'     => get_template_directory_uri() . '/includes/images/footer_col_8_4.png',
							'4_8'     => get_template_directory_uri() . '/includes/images/footer_col_4_8.png',
							'6_3_3'   => get_template_directory_uri() . '/includes/images/footer_col_6_3_3.png',
							'3_3_6'   => get_template_directory_uri() . '/includes/images/footer_col_3_3_6.png',
							'8_2_2'   => get_template_directory_uri() . '/includes/images/footer_col_8_2_2.png',
							'2_2_8'   => get_template_directory_uri() . '/includes/images/footer_col_2_2_8.png',
							'6_2_2_2' => get_template_directory_uri() . '/includes/images/footer_col_6_2_2_2.png',
							'2_2_2_6' => get_template_directory_uri() . '/includes/images/footer_col_2_2_2_6.png',
					),
					'default'		=> '3_3_3_3',
					'dependency' 	=> array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select Floatbar Column layout View for widgets.', 'optico').'</div>',
					'radio'      	=> true,
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Hide Floatbar in Small Devices', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Hide Floatbar in small devices like mobile, tablet etc.', 'optico').'</small>',
					'dependency'     => array('fbar_show','==','true'),
				),
				array(
					'id'       => 'floatingbar-breakpoint',
					'type'     => 'radio',
					'title'    => esc_attr__('Show/Hide Floatbar in Responsive Mode', 'optico'), 
					'subtitle' => esc_attr__('Change options for responsive behaviour of Floatbar.', 'optico'),
					'options'  => array(
						'all'      => esc_attr__('Show in all devices','optico'),
						'1200'     => esc_attr__('Show only on large devices','optico').' <small>'.esc_attr__('show only on desktops (>1200px)', 'optico').'</small>',
						'992'      => esc_attr__('Show only on medium and large devices','optico').' <small>'.esc_attr__('show only on desktops and Tablets (>992px)', 'optico').'</small>',
						'768'      => esc_attr__('Show on some small, medium and large devices','optico').' <small>'.esc_attr__('show only on mobile and Tablets (>768px)', 'optico').'</small>',
						'custom'   => esc_attr__('Custom (select pixel below)', 'optico'),
					),
					'dependency' => array('fbar_show','==','true'),
					'default'    => '1200'
				),
				array(
					'id'            => 'floatingbar-breakpoint-custom',
					'type'          => 'number',
					'title'         => esc_attr__( 'Custom screen size to hide Floatbar (in pixel)', 'optico' ),
					'subtitle'      => esc_attr__( 'Select after how many pixels the Floatbar will be hidden.', 'optico' ),
					'after'         => esc_attr(' px'),
					'default'       => '1200',
					'dependency' 	=> array( 'fbar_show|floatingbar-breakpoint_custom', '==|==', 'true|true' ),
				),
				
			)
		),
		
		// Layout Settings - Pre Header Settings
		array(
			'name'   => 'preheader_settings', // like ID
			'title'  => esc_attr__('Pre Header Settings', 'optico'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'    		=> 'heading',
					'content'		=> esc_attr__('Pre Header settings', 'optico'),
				),
				array(
					'id'     		=> 'show_topbar',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Pre Header', 'optico'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Show or hide Pre Header', 'optico').'</div>',
				),
				array(
					'id'            => 'topbar_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Pre Header Background Color', 'optico'),
					'options'  		=> array(
						'darkgrey'   => esc_attr__('Dark grey', 'optico'),
						'grey'       => esc_attr__('Grey', 'optico'),
						'white'      => esc_attr__('White', 'optico'),
						'skincolor'  => esc_attr__('Skincolor', 'optico'),
						'custom'     => esc_attr__('Custom Color', 'optico'),
					),
					'default'       => 'skincolor',
					'dependency' 	=> array( 'show_topbar', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Pre Header background color', 'optico').'</div>',
				),
				array(
					'id'     		 => 'topbar_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Pre Header Custom Background Color', 'optico' ),
					'default'		 => '#ffffff',
					'dependency'  	 => array( 'show_topbar|topbar_bg_color', '==|==', 'true|custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Pre Header', 'optico').'</div>',
				),
				array(
					'id'            => 'topbar_text_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Pre Header Text Color', 'optico'),
					'options'  		=> array(
						'white'     	=> esc_attr__('White', 'optico'),
						'dark'      	=> esc_attr__('Dark', 'optico'),
						'skincolor' 	=> esc_attr__('Skin Color', 'optico'),
						'custom'   		=> esc_attr__('Custom color', 'optico'),
					),
					'default'       => 'white',
					'dependency' 	=> array( 'show_topbar', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'optico').'</div>',
				),
				array(
					'id'     		 => 'topbar_text_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Pre Header Custom Color for text', 'optico' ),
					'default'		 => '#000000',
					'dependency'  	 => array( 'show_topbar|topbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom color for Pre Header Text', 'optico').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Pre Header Content Options', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Content for Pre Header', 'optico').'</small>',
					'dependency' 	 => array( 'show_topbar', '==', 'true' ),
				),
				array(
					'id'       		 => 'topbar_left_text',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_attr__('Pre Header Left Content', 'optico'),
					'shortcode'		 => true,
					'dependency' 	 => array( 'show_topbar', '==', 'true' ),
					'desc'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This content will appear on Left side of Pre Header area', 'optico').'</div>',
					'default'        => urldecode('%3Cul+class%3D%22top-contact%22%3E%3Cli%3E%3Ci+class%3D%22ts-optico-icon-location-pin%22%3E%3C%2Fi%3E7501+Carrlton+Cuevas+Rd%2C+Gulfport%2C+MS%2C+395503%3C%2Fli%3E%3C%2Ful%3E'),
				),
				array(
					'id'       		 => 'topbar_right_text',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_attr__('Pre Header Right Content', 'optico'),
					'shortcode'		 => true,
					'dependency' 	 => array( 'show_topbar', '==', 'true' ),
					'desc'  	 	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This content will appear on Right side of Pre Header area', 'optico').'</div>',
					'after'  	 	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('html tags and shortcodes are allowed', 'optico') . sprintf( esc_attr__('%1$s Click here to know more %2$s about shortcode description','optico') , '<a href="'. esc_url('http://optico.themestekthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ).'</div>',
					'default'  => urldecode('%3Cul+class%3D%22top-contact+ts-highlight%22%3E%3Cli%3E%3Ci+class%3D%22ti-time%22%3E%3C%2Fi%3EMon+-+Sat+8.00+-+18.00%3C%2Fli%3E%3C%2Ful%3E%3Cdiv+class%3D%22ts-last-sep-none%22%3E%5Bts-social-links%5D%3C%2Fdiv%3E'),
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Hide Pre Header Bar in Small Devices', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Hide Pre Header Bar in small devices like mobile, tablet etc.', 'optico').'</small>',
					'dependency'     => array('show_topbar','==','true'),
				),
				array(
					'id'       => 'topbar-breakpoint',
					'type'     => 'radio',
					'title'    => esc_attr__('Show/Hide Pre Header Bar in Responsive Mode', 'optico'), 
					'subtitle' => esc_attr__('Change options for responsive behaviour of Pre Header Bar.', 'optico'),
					'options'  => array(
						'all'      => esc_attr__('Show in all devices','optico'),
						'1200'     => esc_attr__('Show only on large devices','optico').' <small>'.esc_attr__('show only on desktops (>1200px)', 'optico').'</small>',
						'992'      => esc_attr__('Show only on medium and large devices','optico').' <small>'.esc_attr__('show only on desktops and Tablets (>992px)', 'optico').'</small>',
						'767'      => esc_attr__('Show on some small, medium and large devices','optico').' <small>'.esc_attr__('show only on mobile and Tablets (>768px)', 'optico').'</small>',
						'custom'   => esc_attr__('Custom (select pixel below)', 'optico'),
					),
					'dependency' => array('show_topbar','==','true'),
					'default'    => '1200'
				),
				array(
					'id'            => 'topbar-breakpoint-custom',
					'type'          => 'number',
					'title'         => esc_attr__( 'Custom screen size to hide Pre Header (in pixel)', 'optico' ),
					'subtitle'      => esc_attr__( 'Select after how many pixels the Pre Header will be hidden.', 'optico' ),
					'after'         => esc_attr(' px'),
					'default'       => '1200',
					'dependency' 	=> array( 'show_topbar|topbar-breakpoint_custom', '==|==', 'true|true' ),
				),
				
			)
		),
		
		// Layout Settings - Header Settings
		array(
			'name'   => 'header_settings', // like ID
			'title'  => esc_attr__('Header Settings', 'optico'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
			
				array(
					'type'    		=> 'heading',
					'content'		=> esc_attr__('Header Settings', 'optico'),
				),
				array(
					'id'     		 => 'header_height',
					'type'   		 => 'number',
					'title'          => esc_attr__('Header Height (in pixel)', 'optico' ),
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('You can set height of header area from here', 'optico').'</div>',
					'default'		 => '100',
				),
				array(
					'id'            => 'header_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Header Background Color', 'optico'),
					'options'		=> array(
						'darkgrey'		=> esc_attr__('Dark grey', 'optico'),
						'grey'			=> esc_attr__('Grey', 'optico'),
						'white'			=> esc_attr__('White', 'optico'),
						'skincolor'		=> esc_attr__('Skincolor', 'optico'),
						'custom'		=> esc_attr__('Custom Color', 'optico'),
					),
					'default'       => 'white',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Header background color', 'optico').'</div>',
				),
				array(
					'id'     		 => 'header_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Header Custom Background Color', 'optico' ),
					'default'		 => 'rgba(0,0,0,0)',
					'dependency'  	 => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Header', 'optico').'</div>',
				),
				array(
					'id'     		 => 'responsive_header_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Responsive Header Custom Background Color', 'optico' ),
					'default'		 => 'rgba(21,21,21,0.96)',
					'dependency'  	 => array( 'header_bg_color|header_style', '==|any', 'custom|classic-overlay,centerlogo-overlay,toplogo-overlay,classic-box-overlay,classic-box-overlay-rtl,classic-overlay-rtl,infostack-overlay,infostack-overlay-rtl' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Header in responsive mode only. Like Mobile, tablet etc small screen devices.', 'optico').'</div>',
				),
				array(
					'id'            => 'header_responsive_icon_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Header Responsive Icon Color', 'optico'),
					'options'		=> array(
						'dark'			=> esc_attr__('Dark', 'optico'),
						'white'			=> esc_attr__('White', 'optico'),
					),
					'default'       => 'dark',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select color for responsive menu icon, cart icon, search icon. This is becuase PHP code cannot understand if you selected dark or light color as background. Will work in responsive only.', 'optico').'</div>',
					'dependency'    => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
				),
				
				array(
					'id'     		 => 'logo_max_height',
					'type'   		 => 'number',
					'title'          => esc_attr__('Logo Max Height', 'optico' ),
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('If you feel your logo looks small than increase this and adjust it', 'optico').'</div>',
					'default'		 => '55',
					'dependency'  	 => array( 'logotype_image', '==', 'true' ),
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Sticky Header', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Options for sticky header', 'optico').'</small>',
				),
				array(
					'id'     		=> 'sticky_header',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Enable Sticky Header', 'optico'),
					'default' 		=> true,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Select ON if you want the sticky header on page scroll', 'optico').'</div>',
				),
				array(
					'id'     		 => 'header_height_sticky',
					'type'   		 => 'number',
					'title'          => esc_attr__('Sticky Header Height (in pixel)', 'optico' ),
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('You can set height of header area when it becomes sticky', 'optico').'</div>',
					'default'		 => '70',
					'dependency'     => array( 'sticky_header', '==', 'true' ),
				),
				array(
					'id'            => 'sticky_header_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Sticky Header Background Color', 'optico'),
					'options'		=> array(
						'darkgrey'		=> esc_attr__('Dark grey', 'optico'),
						'grey'			=> esc_attr__('Grey', 'optico'),
						'white'			=> esc_attr__('White', 'optico'),
						'skincolor'		=> esc_attr__('Skincolor', 'optico'),
						'custom'		=> esc_attr__('Custom Color', 'optico'),
					),
					'default'       => 'white',
					'dependency'    => array( 'sticky_header', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Sticky Header background color', 'optico').'</div>',
				),
				array(
					'id'     		 => 'sticky_header_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Sticky Header Custom Background Color', 'optico' ),
					'default'		 => '#ffffff',
					'dependency'  	 => array( 'sticky_header_bg_color|sticky_header', '==|==', 'custom|true' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom background color for Sticky Header', 'optico').'</div>',
				),
				
				array(
					'id'     		 => 'logo_max_height_sticky',
					'type'   		 => 'number',
					'title'          => esc_attr__('Logo Max Height when Sticky Header', 'optico' ),
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set logo when the header is sticky', 'optico').'</div>',
					'default'		 => '45',
					'dependency'     => array( 'sticky_header', '==', 'true' ),
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Search Button in Header', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Option to show or hide search button in header area', 'optico').'</small>',
				),
				array(
					'id'     		=> 'header_search',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Search Button', 'optico'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "ON" to show search button in header. The icon will be at the right side (after menu)', 'optico').'</div>',
				),
				array(
					'id'			=> 'search_input',
					'type'			=> 'text',
					'title'			=> esc_attr__('Search Form Input Word', 'optico'),
					'default'		=> esc_attr__('Type Word Then Press Enter', 'optico'),
					'after'			=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Write the search form input word here. <br> Default: "WRITE SEARCH WORD..."', 'optico').'</div>',
					'dependency'	=> array( 'header_search', '==', 'true' ),
				),
				array(
					'id'     		 => 'searchform_title',
					'type'    		 => 'text',
					'title'   		 => esc_attr__('Search Form Title', 'optico'),
					'default' 		 => '',
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Write the title for search form. Default: "Hi, How Can We Help You?"', 'optico').'</div>',
					'dependency'     => array( 'header_search', '==', 'true' ),
				),
				array(
					'id'       		 => 'logoimg_search',
					'type'     		 => 'themestek_image',
					'title'    		 => esc_attr__('Logo on search form', 'optico'),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Upload logo image that will be shown above the search form.', 'optico').'</div>',
					'add_title'		 => esc_attr__('Upload Logo','optico'),
					'default'		 => array(
						'thumb-url'	=> get_template_directory_uri() . '/images/logo-white.png',
						'full-url'	=> get_template_directory_uri() . '/images/logo-white.png',
					),
					'dependency'	=> array( 'header_search', '==', 'true' ),
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Logo SEO', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Options for Logo SEO', 'optico').'</small>',
				),
				array(
					'id'      		=> 'logoseo',
					'type'   		=> 'radio',
					'title'   		=> esc_attr__('Logo Tag for SEO', 'optico'),
					'options' 		=> array(
						'h1homeonly' => esc_attr__('H1 for home, SPAN on other pages', 'optico'),
						'allh1'      => esc_attr__('H1 tag everywhere', 'optico'),
					),
					'default'		=> 'h1homeonly',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select logo tag for SEO purpose', 'optico').'</div>',
				),
			
			)
		),
		
		// Layout Settings - Menu Settings
		array(
			'name'   => 'menu_settings', // like ID
			'title'  => esc_attr__('Menu Settings', 'optico'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Menu Settings', 'optico'),
					'after'  	  	=> '<small>'.esc_attr__('Responsive Menu Breakpoint: Change Options for responsive menu.', 'optico').'</small>',
				),
				array(
					'id'      		=> 'menu_breakpoint',
					'type'   		=> 'radio',
					'title'   		=> esc_attr__('Responsive Menu Breakpoint', 'optico'),
					'options'  		=> array(
						'1200'   => esc_attr__('Large devices','optico').' <small>'.esc_attr__('Desktops (>1200px)', 'optico').'</small>',
						'992'    => esc_attr__('Medium devices','optico').' <small>'.esc_attr__('Desktops and Tablets (>992px)', 'optico').'</small>',
						'768'    => esc_attr__('Small devices','optico').' <small>'.esc_attr__('Mobile and Tablets (>768px)', 'optico').'</small>',
						'custom' => esc_attr__('Custom (select pixel below)', 'optico'),
					),
					'default'		=> '1200',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Change options for responsive menu breakpoint', 'optico').'</div>',
				),
				
				array(
					'id'     		=> 'megamenu-override',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Override Max Mega Menu Style', 'optico'),
					'default' 		=> true,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('We need to override some of the Max mega Menu plugin\'s settings to match with our theme. If you like to use the default vanilla look of Max Mega Menu than turn this option off.', 'optico').'</div>',
				),
				
				array(
					'id'     		 => 'menu_breakpoint-custom',
					'type'   		 => 'number',
					'title'          => esc_attr__('Custom Breakpoint for Menu (in pixel)', 'optico' ),
					'dependency'  	 => array( 'menu_breakpoint_custom', '==', 'true' ),
					'default'		 => '1200',
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select after how many pixels the menu will become responsive', 'optico').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Main Menu Options', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Options for main menu in header', 'optico').'</small>',
				),
				array(
					'id'             => 'mainmenufont',
					'type'           => 'themestek_typography', 
					'title'          => esc_attr__('Main Menu Font', 'optico'),
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
					'output'         => '#site-header-menu #site-navigation div.nav-menu > ul > li > a, .ts-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family'			=> 'Montserrat',
						'backup-family'		=> 'Arial, Helvetica, sans-serif',
						'variant'			=> '700',
						'text-transform'	=> 'uppercase',
						'font-size'			=> '14',
						'line-height'		=> '16',
						'letter-spacing'	=> '1',
						'color'				=> '#313131',
						'font'				=> 'google',
					),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select main menu font, color and size', 'optico').'</div>',
				),
				array(
					'id'     		 => 'stickymainmenufontcolor',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Main Menu Font Color for Sticky Header', 'optico' ),
					'default'		 => '#313131',
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Main menu font color when the header becomes sticky', 'optico').'</div>',
				),
				array(
					'id'           	=> 'mainmenu_active_link_color',
					'type'         	=> 'select',
					'title'        	=>  esc_attr__('Main Menu Active Link Color', 'optico'),
					'options'  		=> array(
						'skin'			=> esc_attr__('Skin color (default)', 'optico'),
						'custom'		=> esc_attr__('Custom color (select below)', 'optico'),
					),
					'default'      	=> 'skin',
					'after'  		=> themestek_wp_kses('<div class="cs-text-muted cs-text-desc"><br>
											<strong>' . esc_attr__('Tips:', 'optico') . '</strong>
											<ul>
												<li>' . esc_attr__('"Skin color (default):" Skin color for active link color.', 'optico') . '</li>
												<li>' . esc_attr__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'optico') . '</li>
											</ul>
										</div>'),
				),
				array(
					'id'     		 => 'mainmenu_active_link_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Main Menu Active Link Custom Color', 'optico' ),
					'default'		 => '#fff',
					'dependency'  	 => array( 'mainmenu_active_link_color', '==', 'custom' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom color for main menu active active link', 'optico').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Drop Down Menu Options', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Options for drop down menu in header', 'optico').'</small>',
				),
				array(
					'id'             => 'dropdownmenufont',
					'type'           => 'themestek_typography', 
					'title'          => esc_attr__('Dropdown Menu Font', 'optico'),
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
					'output'         => 'ul.nav-menu li ul li a, div.nav-menu > ul li ul li a, .ts-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a, .ts-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:hover, .ts-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:focus, .ts-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link, .ts-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:hover, .ts-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:focus, .ts-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family'			=> 'Montserrat',
						'backup-family'		=> 'Arial, Helvetica, sans-serif',
						'variant'			=> '600',
						'text-transform'	=> 'uppercase',
						'font-size'			=> '13',
						'line-height'		=> '16',
						'letter-spacing'	=> '0',
						'color'				=> '#ffffff',
						'font'				=> 'google',
					),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select dropdown menu font, color and size', 'optico').'</div>',
				),
				
				array(
					'id'           	=> 'dropmenu_active_link_color',
					'type'         	=> 'select',
					'title'        	=>  esc_attr__('Dropdown Menu Active Link Color', 'optico'),
					'options'  		=> array(
						'skin'			=> esc_attr__('Skin color (default)', 'optico'),
						'custom'		=> esc_attr__('Custom color (select below)', 'optico'),
					),
					'default'      	=> 'custom',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . '<strong>' . esc_attr__('Tips:', 'optico') . '</strong>' . '<ul><li>' . esc_attr__('"Skin color (default):" Skin color for active link color.', 'optico') . '</li><li>' . esc_attr__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'optico') . '</li></ul></div>',
				),
				array(
					'id'     		=> 'dropmenu_active_link_custom_color',
					'type'   		=> 'color_picker',
					'title'  		=> esc_attr__('Dropdown Menu Active Link Custom Color', 'optico' ),
					'default'		=> '#ffffff',
					'dependency'  	=> array( 'dropmenu_active_link_color', '==', 'custom' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Custom color for dropdown menu active menu text', 'optico').'</div>',
				),
				array(
					'id'      		=> 'dropmenu_background',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Dropdown Menu Background Properties (for all dropdown menus)', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for dropdown menu. This will be applied to all dropdown menus. You can set common style here.', 'optico').'</div>',
					'default'		=> array(
						'image'			=> '',
						'repeat'		=> 'no-repeat',
						'position'		=> 'center top',
						'size'			=> 'cover',
						'color'			=> '#7fc540',
					),
					'output' 	    => '.ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, #site-header-menu #site-navigation div.nav-menu > ul > li ul',
				),
				array(
					'id'      		=> 'dropdown_menu_separator',
					'type'   		=> 'radio',
					'title'   		=> esc_attr__('Separator line between dropdown menu links', 'optico'),
					'options'  		=> array(
						'grey'			=> esc_attr__('Grey color as border color (default)', 'optico'),
						'white'			=> esc_attr__('White color as border color (for dark background color)', 'optico'),
						'no'			=> esc_attr__('No separator border', 'optico'),
					),
					'default'		=> 'white',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br> <strong>' . esc_attr__('Tips:', 'optico') . '</strong>
										<ul>
											<li>' . esc_attr__('"Grey color as border color (default):" This is default border view.', 'optico') . '</li>
											<li>' . esc_attr__('"White color:" Select this option if you are going to select dark background color (for dropdown menu)', 'optico') . '</li>
											<li>' . esc_attr__('"No separator border:" Completely remove border. This will make your menu totally flat', 'optico') . '</li>
										</ul></div>',
				),
				array(
					'id'             => 'megamenu_widget_title',
					'type'           => 'themestek_typography', 
					'title'          => esc_attr__('MegaMenu Widget Title Font', 'optico'),
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
					'output'         => '#site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family'			=> 'Vollkorn',
						'backup-family'		=> 'Arial, Helvetica, sans-serif',
						'variant'			=> '700',
						'font-size'			=> '17',
						'line-height'		=> '16',
						'letter-spacing'	=> '1',
						'color'				=> '#ffffff',
						'font'				=> 'google',
					),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Font settings for mega menu widget title. <br><br> <strong>NOTE: </strong> This will work only if you installed "Max Mega Menu" plugin and also activated in the main (primary) menu', 'optico').'</div>',
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => '',
					'after'  	  	 => '<strong>'.esc_attr__('Individual Drop Down Menu Options', 'optico').'</strong>',
				),
				array(
					'id'      		=> 'dropmenu_background_1',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('First dropdown menu background', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for first dropdown menu.', 'optico') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(1) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(1) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_2',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Second dropdown menu background', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for second dropdown menu.', 'optico') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(2) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(2) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_3',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Third dropdown menu background', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for third dropdown menu.', 'optico') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(3) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(3) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_4',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Fourth dropdown menu background', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for fourth dropdown menu.', 'optico') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(4) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(4) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_5',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Fifth dropdown menu background', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for fifth dropdown menu.', 'optico') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(5) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(5) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_6',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Sixth dropdown menu background', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for sixth dropdown menu.', 'optico') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(6) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(6) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_7',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Seventh dropdown menu background', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for seventh dropdown menu.', 'optico') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(7) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(7) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_8',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Eighth dropdown menu background', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for eighth dropdown menu.', 'optico') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(8) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(8) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_9',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Ninth dropdown menu background', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for ninth dropdown menu.', 'optico') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(9) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(9) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu:before',
				),
				array(
					'id'      		=> 'dropmenu_background_10',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Tenth dropdown menu background', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set background for tenth dropdown menu.', 'optico') . '</div>',
					'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(10) ul, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu',
					'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(10) ul:before, .ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu:before',
				),
				
			)
		),
		
		// Layout Settings - Titlebar Settings
		array(
			'name'   => 'titlebar_settings', // like ID
			'title'  => esc_attr__('Titlebar Settings', 'optico'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Titlebar Background Options', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Background options for Titlebar area', 'optico').'</small>',
				),
				array(
					'id'            => 'titlebar_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Titlebar Background Color', 'optico'),
					'options'  => array(
						'darkgrey'   => esc_attr__('Dark grey', 'optico'),
						'grey'       => esc_attr__('Grey', 'optico'),
						'white'      => esc_attr__('White', 'optico'),
						'skincolor'  => esc_attr__('Skincolor', 'optico'),
						'custom'     => esc_attr__('Custom Color', 'optico'),
					),
					'default'       => 'custom',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'optico').'</div>',
				),
				array(
					'id'      		=> 'titlebar_background',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Titlebar Background Image', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for Title bar. You can set color or image and also set other background related properties', 'optico').'</div>',
					'color'			=> true,
					'default'		=> array(
						'image'			=> get_template_directory_uri() . '/images/titlebar-bg.jpg',
						'repeat'		=> 'no-repeat',
						'position'		=> 'right center',
						'size'			=> 'cover',
						'color'			=> 'rgba(44,30,15,0.69)',
					),
					'output' 	    => 'div.ts-titlebar-wrapper',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'titlebar_bg_color',   // color dropdown to decide which color
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Titlebar Font Settings', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Font Settings for different elements in Titlebar area', 'optico').'</small>',
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
					'default'       => 'white',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'optico').'</div>',
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
					'all-varients'   => true,
					'output'         => '.ts-titlebar h1.entry-title, .ts-titlebar-textcolor-custom .ts-titlebar-main .entry-title', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family'			=> 'Montserrat',
						'backup-family'		=> 'Arial, Helvetica, sans-serif',
						'variant'			=> '700',
						'text-transform'	=> 'uppercase',
						'font-size'			=> '40',
						'line-height'		=> '50',
						'letter-spacing'	=> '1',
						'color'				=> '#dd9933',
						'font'				=> 'google',
						'all-varients'		=> 'on',
					),
					'after'			=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for heading in Titlebar', 'optico').'</div>',
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
					'all-varients'   => true,
					'output'         => '.ts-titlebar .entry-subtitle, .ts-titlebar-textcolor-custom .ts-titlebar-main .entry-subtitle', // An array of CSS selectors to apply this font style to dynamically
					'units'			 => 'px', // Defaults to px
					'default'        => array(
						'family'			=> 'Montserrat',
						'backup-family'		=> 'Arial, Helvetica, sans-serif',
						'variant'			=> 'regular',
						'font-size'			=> '19',
						'line-height'		=> '22',
						'letter-spacing'	=> '1',
						'color'				=> '#dd9933',
						'font'				=> 'google',
						'all-varients'		=> 'on',
					),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for sub-heading in Titlebar', 'optico').'</div>',
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
					'output'         => '.ts-titlebar .breadcrumb-wrapper, .ts-titlebar .breadcrumb-wrapper a', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family'			=> 'Montserrat',
						'backup-family'		=> 'Arial, Helvetica, sans-serif',
						'variant'			=> 'regular',
						'font-size'			=> '14',
						'line-height'		=> '20',
						'letter-spacing'	=> '0',
						'color'				=> '#eeee22',
						'font'				=> 'google',
					),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for breadcrumbs in Titlebar', 'optico').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Titlebar Content Options', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Content options for Titlebar area', 'optico').'</small>',
				),
				array(
					'id'            => 'titlebar_view',
					'type'          => 'select',
					'title'         =>  esc_attr__('Titlebar Text Align', 'optico'),
					'options'       => array(
						'default'  => esc_attr__('All Center (default)', 'optico'),
						'left'     => esc_attr__('Title Left / Breadcrumb Right', 'optico'),
						'right'    => esc_attr__('Title Right / Breadcrumb Left', 'optico'),
						'allleft'  => esc_attr__('All Left', 'optico'),
						'allright' => esc_attr__('All Right', 'optico'),
					),
					'default'       => 'left',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select text align in Titlebar', 'optico').'</div>',
				),
				array(
					'id'     		 => 'titlebar_height',
					'type'   		 => 'number',
					'title'          => esc_attr__( 'Titlebar Height', 'optico' ),
					'after'  	  	 => ' px<br><div class="cs-text-muted cs-text-desc">'.esc_attr__('Set height of the Titlebar. In pixel only', 'optico').'</div>',
					'default'		 => '300',
				),
				array(
					'id'        	=> 'breadcrumb_on_bottom',
					'type'      	=> 'checkbox',
					'title'     	=> esc_attr__('Show Breadcrumb on bottom of Titlebar area', 'optico'),
					'label'     	=> esc_attr__('YES', 'optico'),
					'default'   	=> false,
					'dependency'  	=> array( 'titlebar_view', 'any', 'default,allleft,allright' ),//Multiple dependency
					'after'    		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select this option if you like to show breadcrumbs on bottom of Titlebar area. This option will only work when Titlebar Text Align option above is set to (All Center, All Left or All Right)', 'optico').'</div>',
				),
				array(
					'id'            => 'titlebar_hide_breadcrumb',
					'type'          => 'select',
					'title'         =>  esc_attr__('Hide Breadcrumb', 'optico'),
					'options' 		=> array(
						'no'			=> esc_attr__('NO, show the breadcrumb', 'optico'),
						'yes'			=> esc_attr__('YES, Hide the Breadcrumb', 'optico'),
					),
					'default'       => 'no',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('You can show or hide the breadcrumb', 'optico').'</div>',
				),
				
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Titlebar Extra Options', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Change settings for some extra options in Titlebar', 'optico').'</small>',
				),
				array(
					'id'      => 'adv_tbar_catarc',
					'type'    => 'text',
					'title'   => esc_attr__('Post Category "Category Archives:" Label Text', 'optico'),
					'default' => esc_attr__('Category Archives: ', 'optico'),
				),
				array(
					'id'      => 'adv_tbar_tagarc',
					'type'    => 'text',
					'title'   => esc_attr__('Post Tag "Tag Archives:" Label Text', 'optico'),
					'default' => esc_attr__('Tag Archives: ', 'optico'),
				),
				array(
					'id'      => 'adv_tbar_postclassified',
					'type'    => 'text',
					'title'   => esc_attr__('Post Taxonomy "Posts classified under:" Label Text', 'optico'),
					'default' => esc_attr__('Posts classified under: ', 'optico'),
				),
				array(
					'id'      => 'adv_tbar_authorarc',
					'type'    => 'text',
					'title'   => esc_attr__('Post Author "Author Archives:" Label Text', 'optico'),
					'default' => esc_attr__('Author Archives: ', 'optico'),
				),

			)
		),
		
		// Layout Settings - Footer Settings
		array(
			'name'   => 'footer_settings', // like ID
			'title'  => esc_attr__('Footer Settings', 'optico'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'			=> 'heading',
					'content'    	=> esc_attr__('Sticky Footer', 'optico'),
					'after'  	  	=> '<small>'.esc_attr__('Make footer sticky and visible on scrolling at bottom', 'optico').'</small>',
				),
				array(
					'id'     		=> 'stickyfooter',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Sticky Footer', 'optico'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "ON" to enable sticky footer on scrolling at bottom', 'optico').'</div>',
				),
				
				// Footer common background
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Footer Background (full footer elements)', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('This background property will apply to full footer area. You can add', 'optico').'</small>',
				),
				array(
					'id'            => 'full_footer_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer Background Color (all area)', 'optico'),
					'options'		=> array(
						'transparent' => esc_attr__('Transparent', 'optico'),
						'darkgrey'    => esc_attr__('Dark grey', 'optico'),
						'grey'        => esc_attr__('Grey', 'optico'),
						'white'       => esc_attr__('White', 'optico'),
						'skincolor'   => esc_attr__('Skincolor', 'optico'),
						'custom'      => esc_attr__('Custom Color', 'optico'),
					),
					'default'       => 'grey',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Footer background color', 'optico').'</div>',
				),
				array(
					'id'      		 => 'full_footer_bg_all',
					'type'    		 => 'themestek_background',
					'title'  		 => esc_attr__('Footer Background (all area)', 'optico' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Footer background image', 'optico').'</div>',
					'default'		 => array(
						'repeat'		=> 'no-repeat',
						'position'		=> 'center center',
						'attachment'	=> 'fixed',
						'size'			=> 'cover',
						'color'			=> 'rgba(30,115,190,0.9)',
					),
					'output' 	     => '.footer',
					'output_bglayer' => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'full_footer_bg_color',   // color dropdown to decide which color
				),
				
				// Footer CTA
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Footer Call-To-Action Area', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Modify elements like title, icon, button link, button title etc in footer Call-To-Action area.', 'optico').'</small>',
				),
				array(
					'id'     		=> 'footer_cta',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Footer CTA', 'optico'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "ON" to enable sticky footer on scrolling at bottom', 'optico').'</div>',
				),
				array(
					'id'      => 'footer_cta_icon',
					'type'    => 'themestek_iconpicker',
					'title'   => esc_attr__('Open Link Icon', 'optico' ),
					'default' => array(
						'library'				=> 'themify',
						'library_fontawesome'	=> 'fa fa-arrow-down',
						'library_linecons'		=> 'vc_li vc_li-bubble',
						'library_themify'		=> 'themifyicon ti-headphone-alt',
					),
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_title',
					'type'    		=> 'textarea',
					'title'   		=> esc_attr__('Footer CTA Title', 'optico'),
					'default' 		=> esc_attr__('If you Have Any Questions Schedule an Appointment', 'optico') . ' <br> <strong>' . esc_attr__('With Our Doctor OR Call Us On (010)123-456-7890', 'optico') . '</strong>',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Title for the Footer CTA area', 'optico') . '</div>',
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_subtitle',
					'type'    		=> 'textarea',
					'title'   		=> esc_attr__('Footer CTA Sub-title', 'optico'),
					'default' 		=> '',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Sub-title for the Footer CTA area', 'optico') . '</div>',
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_button_text',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Footer CTA Button Text', 'optico'),
					'default' 		=> esc_attr__('Make an Appointment', 'optico'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Button text for the Footer CTA', 'optico') . '</div>',
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_button_link',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Footer CTA Button Link', 'optico'),
					'default' 		=> esc_attr__('#', 'optico'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Button link for the Footer CTA', 'optico') . '</div>',
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				
				// First Footer
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('First Footer Widget Area', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Options to change settings for footer widget area', 'optico').'</small>',
				),
				array(
					'id'			=> 'first_footer_column_layout',
					'type' 			=> 'image_select',//themestek_pre_color_packages
					'title'			=> esc_attr__('Footer Widget Columns', 'optico'),
					'options'      	=> array(
						'12'      => get_template_directory_uri() . '/includes/images/footer_col_12.png',
						'6_6'     => get_template_directory_uri() . '/includes/images/footer_col_6_6.png',
						'4_4_4'   => get_template_directory_uri() . '/includes/images/footer_col_4_4_4.png',
						'3_3_3_3' => get_template_directory_uri() . '/includes/images/footer_col_3_3_3_3.png',
						'8_4'     => get_template_directory_uri() . '/includes/images/footer_col_8_4.png',
						'4_8'     => get_template_directory_uri() . '/includes/images/footer_col_4_8.png',
						'6_3_3'   => get_template_directory_uri() . '/includes/images/footer_col_6_3_3.png',
						'3_3_6'   => get_template_directory_uri() . '/includes/images/footer_col_3_3_6.png',
						'8_2_2'   => get_template_directory_uri() . '/includes/images/footer_col_8_2_2.png',
						'2_2_8'   => get_template_directory_uri() . '/includes/images/footer_col_2_2_8.png',
						'6_2_2_2' => get_template_directory_uri() . '/includes/images/footer_col_6_2_2_2.png',
						'2_2_2_6' => get_template_directory_uri() . '/includes/images/footer_col_2_2_2_6.png',
					),
					'default'		=> '12',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select Footer Column layout View for widgets.', 'optico').'</div>',
					'radio'      	=> true,
				),
				
				array(
					'id'            => 'first_footer_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer Background Color', 'optico'),
					'options'  => array(
						'transparent' => esc_attr__('Transparent', 'optico'),
						'darkgrey'    => esc_attr__('Dark grey', 'optico'),
						'grey'        => esc_attr__('Grey', 'optico'),
						'white'       => esc_attr__('White', 'optico'),
						'skincolor'   => esc_attr__('Skincolor', 'optico'),
						'custom'      => esc_attr__('Custom Color', 'optico'),
					),
					'default'       => 'skincolor',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Footer background color', 'optico').'</div>',
				),
				array(
					'id'      			=> 'first_footer_bg_all',
					'type'    			=> 'themestek_background',
					'title'  			=> esc_attr__('Footer Background', 'optico' ),
					'after'  			=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Footer background image', 'optico').'</div>',
					'default'			=> array(
						'repeat'			=> 'no-repeat',
						'attachment'		=> 'fixed',
						'color'				=> '#1f1f1f',
					),
					'output'			=> '.first-footer',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'first_footer_bg_color',   // color dropdown to decide which color
				),
				array(
					'id'           	=> 'first_footer_text_color',
					'type'         	=> 'select',
					'title'        	=>  esc_attr__('Text Color', 'optico'),
					'options'  		=> array(
						'white'			=> esc_attr__('White', 'optico'),
						'dark'			=> esc_attr__('Dark', 'optico'),
					),
					'default'      	=> 'dark',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'optico').'</div>',
				),

				// Second Footer Widget Area
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Second Footer Widget Area', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Options to change settings for second footer widget area', 'optico').'</small>',
				),
				array(
					'id'			=> 'second_footer_column_layout',
					'type' 			=> 'image_select',//themestek_pre_color_packages
					'title'			=> esc_attr__('Footer Widget Columns', 'optico'),
					'options'      	=> array(
						'12'      => get_template_directory_uri() . '/includes/images/footer_col_12.png',
						'6_6'     => get_template_directory_uri() . '/includes/images/footer_col_6_6.png',
						'4_4_4'   => get_template_directory_uri() . '/includes/images/footer_col_4_4_4.png',
						'3_3_3_3' => get_template_directory_uri() . '/includes/images/footer_col_3_3_3_3.png',
						'8_4'     => get_template_directory_uri() . '/includes/images/footer_col_8_4.png',
						'4_8'     => get_template_directory_uri() . '/includes/images/footer_col_4_8.png',
						'6_3_3'   => get_template_directory_uri() . '/includes/images/footer_col_6_3_3.png',
						'3_3_6'   => get_template_directory_uri() . '/includes/images/footer_col_3_3_6.png',
						'8_2_2'   => get_template_directory_uri() . '/includes/images/footer_col_8_2_2.png',
						'2_2_8'   => get_template_directory_uri() . '/includes/images/footer_col_2_2_8.png',
						'6_2_2_2' => get_template_directory_uri() . '/includes/images/footer_col_6_2_2_2.png',
						'2_2_2_6' => get_template_directory_uri() . '/includes/images/footer_col_2_2_2_6.png',
					),
					'default'		=> '3_3_3_3',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select Footer Column layout View for widgets.', 'optico').'</div>',
					'radio'      	=> true,
				),
				array(
					'id'            => 'second_footer_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer Background Color', 'optico'),
					'options'		=> array(
						'transparent' => esc_attr__('Transparent', 'optico'),
						'darkgrey'    => esc_attr__('Dark grey', 'optico'),
						'grey'        => esc_attr__('Grey', 'optico'),
						'white'       => esc_attr__('White', 'optico'),
						'skincolor'   => esc_attr__('Skincolor', 'optico'),
						'custom'      => esc_attr__('Custom Color', 'optico'),
					),
					'default'       => 'transparent',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Footer background color', 'optico').'</div>',
				),
				array(
					'id'      		=> 'second_footer_bg_all',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Footer Background', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Footer background image', 'optico').'</div>',
					'default'		=> array(
						'color'			=> '#191b1b',
					),
					'output' 	    => '.second-footer',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'second_footer_bg_color',   // color dropdown to decide which color
				),
				array(
					'id'           	=> 'second_footer_text_color',
					'type'         	=> 'select',
					'title'        	=>  esc_attr__('Text Color', 'optico'),
					'options'  		=> array(
						'white'  		=> esc_attr__('White', 'optico'),
						'dark'   		=> esc_attr__('Dark', 'optico'),
					),
					'default'      	=> 'dark',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'optico').'</div>',
				),

				// Footer Text Area
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Footer Text Area', 'optico'),
					'after'  	  	 => '<small>'.esc_attr__('Options to change settings for footer text area. This contains copyright info', 'optico').'</small>',
				),
				array(
					'id'            => 'bottom_footer_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer Background Color', 'optico'),
					'options'  => array(
						'transparent' => esc_attr__('Transparent', 'optico'),
						'darkgrey'    => esc_attr__('Dark grey', 'optico'),
						'grey'        => esc_attr__('Grey', 'optico'),
						'white'       => esc_attr__('White', 'optico'),
						'skincolor'   => esc_attr__('Skincolor', 'optico'),
						'custom'      => esc_attr__('Custom Color', 'optico'),
					),
					'default'       => 'transparent',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select predefined color for Footer background color', 'optico').'</div>',
				),
				array(
					'id'      		=> 'bottom_footer_bg_all',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_attr__('Footer Background', 'optico' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Footer background image', 'optico').'</div>',
					'default'		=> array(
						'repeat'		=> 'no-repeat',
						'position'		=> 'center center',
						'attachment'	=> 'fixed',
						'color'			=> '#060604',
					),
					'output' 	    => '.bottom-footer-text',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'bottom_footer_bg_color',   // color dropdown to decide which color
				),
				array(
					'id'           	=> 'bottom_footer_text_color',
					'type'         	=> 'select',
					'title'        	=>  esc_attr__('Text Color', 'optico'),
					'options'  		=> array(
						'white'			=> esc_attr__('White', 'optico'),
						'dark'			=> esc_attr__('Dark', 'optico'),
					),
					'default'      	=> 'dark',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'optico').'</div>',
				),
				array(
				  'id'				=> 'footer_copyright_left',
				  'type'			=> 'wysiwyg',
				  'title'			=>  esc_attr__('Footer Copyright Text', 'optico'),
				  'after'			=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('You can use the following shortcodes in your footer text:', 'optico')
				  . '<br>   <code>[ts-site-url]</code> <code>[ts-site-title]</code> <code>[ts-site-tagline]</code> <code>[ts-current-year]</code> <code>[ts-footermenu]</code> <br><br> '
				  . sprintf( esc_attr__('%1$s Click here to know more%2$s  about details for each shortcode.','optico') , '<a href="'. esc_url('http://optico.themestekthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
				  'default'         => themestek_wp_kses('Copyright &copy; 2018 <a href="' . site_url() . '">' . get_bloginfo('name') . '</a>. All rights reserved.'),
				),
				
			)
		)
	),
		
);

// hide_demo_content_option
$hide_demo_content_option = false;
if( isset($optico_theme_options['hide_demo_content_option']) ){
	$hide_demo_content_option = $optico_theme_options['hide_demo_content_option'];
}

if( $hide_demo_content_option == true ){
	// Removing one click demo setup option
	if( !empty($ts_framework_options[0]["sections"][0]["fields"]) ){
		foreach( $ts_framework_options[0]["sections"][0]["fields"] as $index => $option ){
			if( !empty($option['type']) && $option['type'] == 'themestek_one_click_demo_import' ){
				unset($ts_framework_options[0]["sections"][0]["fields"][$index]);
			}
		}
	}
}

// Typography Settings
$ts_framework_options[] = array(
	'name'   => 'typography_settings', // like ID
	'title'  => esc_attr__('Typography Settings', 'optico'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'    	=> 'heading',
			'content'	=> esc_attr__('Typography Settings', 'optico'),
			'after'  	=> '<small>'.esc_attr__('General Element Fonts/Typography', 'optico').'</small>',
        ),
		array(
			'id'             => 'general_font',
			'type'           => 'themestek_typography', 
			'title'          => esc_attr__('General Font', 'optico'),
			'chosen'         => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'backup-family'  => true, // Select a backup non-google font in addition to a google font
			'font-size'      => true,
			'color'          => true,
			'variant'        => true, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-align'     => false,  // This is still not available
			'text-transform' => true,
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => true,
			'output'         => 'body', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px - Currently not working
			'subtitle'       => esc_attr__('Select font family, size etc. for H2 heading tag.', 'optico'),
			'default'        => array (
				'family'			=> 'Poppins',
				'backup-family'		=> 'Tahoma, Geneva, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '14',
				'line-height'		=> '24',
				'letter-spacing'	=> '0',
				'color'				=> '#42464e',
				'all-varients'		=> 'on',
				'font'				=> 'google',
				
			),
		),
		
		array(
			'id'        => 'link-color',
			'type'      => 'radio',
			'title'     => esc_attr__('Select Link Color', 'optico'), 
			'options'  	=> array(
				'default'   => esc_attr__('Dark color as normal color and Skin color as hover color', 'optico'),
				'darkhover' => esc_attr__('Skin color as normal color and Dark color as hover color', 'optico'),
				'custom'    => esc_attr__('Custom color (select below)', 'optico'),
				
			),
			'default'   => 'darkhover',
			'std'       => 'darkhover',
			'after'   	=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Select normal link color effect. This will change normal text link color and hover color', 'optico') . '</div>',
        ),
		array(
			'id'         => 'link-color-regular',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Links Color Option (Regular)', 'optico' ),
			'default'    => '#000',
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		array(
			'id'         => 'link-color-hover',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Links Color Option (Hover)', 'optico' ),
			'default'    => '#b1c903',
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		
		array(
			'id'             => 'h1_heading_font',
			'type'           => 'themestek_typography', 
			'title'          => esc_attr__('H1 Heading Font', 'optico'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'h1', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Montserrat',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '40',
				'line-height'		=> '45',
				'letter-spacing'	=> '0',
				'color'				=> '#212121',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for H1 heading tag.', 'optico').'</div>',
		),
		array(
			'id'          => 'h2_heading_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('H2 Heading Font', 'optico'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h2', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Montserrat',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '36',
				'line-height'		=> '40',
				'letter-spacing'	=> '0',
				'color'				=> '#42464e',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for H2 heading tag.', 'optico').'</div>',
		),
		array(
			'id'          => 'h3_heading_font',
			'type'        => 'themestek_typography',
			'chosen'      => false,
			'title'       => esc_attr__('H3 Heading Font', 'optico'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'h3', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Montserrat',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '30',
				'line-height'		=> '35',
				'letter-spacing'	=> '0',
				'color'				=> '#42464e',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for H3 heading tag.', 'optico').'</div>',
		),
		array(
			'id'          => 'h4_heading_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('H4 Heading Font', 'optico'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h4', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Montserrat',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '24',
				'line-height'		=> '30',
				'letter-spacing'	=> '0',
				'color'				=> '#42464e',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for H4 heading tag.', 'optico').'</div>',
		),
		array(
			'id'          => 'h5_heading_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('H5 Heading Font', 'optico'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h5', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Montserrat',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '22',
				'line-height'		=> '25',
				'letter-spacing'	=> '0',
				'color'				=> '#42464e',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for H5 heading tag.', 'optico').'</div>',
		),
		
		array(
			'id'          => 'h6_heading_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('H6 Heading Font', 'optico'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h6', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Montserrat',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '18',
				'line-height'		=> '20',
				'letter-spacing'	=> '0',
				'color'				=> '#42464e',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for H6 heading tag.', 'optico').'</div>',
		),
		
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Heading and Subheading Font Settings', 'optico'),
			'after'  	  => '<small>'.esc_attr__('Select font settings for Heading and subheading of different title elements like Blog Box, Portfolio Box etc', 'optico').'</small>',
		),
		
		array(
			'id'          => 'heading_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('Heading Font', 'optico'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => true,
			'output'         => '.ts-element-heading-wrapper .ts-vc_general .ts-vc_cta3_content-container .ts-vc_cta3-content .ts-vc_cta3-content-header h2', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Montserrat',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '300',
				'font-size'			=> '36',
				'line-height'		=> '40',
				'letter-spacing'	=> '0',
				'color'				=> '#42464e',
				'font'				=> 'google',
				'all-varients'		=> 'on',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for heading title', 'optico').'</div>',
		),
		array(
			'id'          => 'subheading_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('Subheading Font', 'optico'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => true,							
			'output'         => '.ts-element-heading-wrapper .ts-vc_general .ts-vc_cta3_content-container .ts-vc_cta3-content .ts-vc_cta3-content-header h4, .ts-vc_general.ts-vc_cta3.ts-vc_cta3-color-transparent.ts-cta3-only .ts-vc_cta3-content .ts-vc_cta3-headers h4', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Montserrat',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'text-transform'	=> '',
				'font-size'			=> '14',
				'line-height'		=> '24',
				'letter-spacing'	=> '1',
				'color'				=> '#7ec53e',
				'font'				=> 'google',
				'all-varients'		=> 'on',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for heading title', 'optico').'</div>',
		),
		array(
			'id'          => 'content_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('Content Font', 'optico'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.ts-element-heading-wrapper .ts-vc_general.ts-vc_cta3 .ts-vc_cta3-content p', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Poppins',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'text-transform'	=> '',
				'font-size'			=> '16',
				'line-height'		=> '28',
				'letter-spacing'	=> '0',
				'color'				=> '#626262',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for content', 'optico').'</div>',
		),
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Specific Element Fonts', 'optico'),
			'after'  	  => '<small>'.esc_attr__('Select Font for specific elements', 'optico').'</small>',
		),
		array(
			'id'          => 'widget_font',
			'type'        => 'themestek_typography', 
			'title'       => esc_attr__('Widget Title Font', 'optico'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'body .widget .widget-title, body .widget .widgettitle, #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title, .portfolio-description h2, .themestek-portfolio-details h2, .themestek-portfolio-related h2', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Montserrat',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'text-transform'	=> 'capitalize',
				'font-size'			=> '22',
				'line-height'		=> '32',
				'letter-spacing'	=> '0',
				'color'				=> '#313131',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select font family, size etc. for widget title', 'optico').'</div>',
		),
		
		array(
			'id'             => 'button_font',
			'type'           => 'themestek_typography', 
			'title'          => esc_attr__('Button Font', 'optico'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'font-size'      => false,
			'line-height'    => false,
			'text-transform' => true,
			'color'          => false,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.woocommerce button.button, .woocommerce-page button.button, input, .ts-vc_btn, .ts-vc_btn3, .woocommerce-page a.button, .button, .wpb_button, button, .woocommerce input.button, .woocommerce-page input.button, .tp-button.big, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .themestek-post-readmore a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Montserrat',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'text-transform'	=> 'capitalize',
				'letter-spacing'	=> '0',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This fonts will be applied to all buttons in this site', 'optico').'</div>',
		),
		array(
			'id'             => 'element_title',
			'type'           => 'themestek_typography', 
			'title'          => esc_attr__('Element Title Font', 'optico'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => false,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => false, // Defaults to false
			'color'          => false,
			'all-varients'   => false,
			'output'         => '.wpb_tabs_nav a.ui-tabs-anchor, body .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a, .vc_progress_bar .vc_label, .vc_tta.vc_general .vc_tta-tab > a, .vc_toggle_title > h4', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Montserrat',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '16',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This fonts will be applied to Tab title, Accordion Title and Progress Bar title text', 'optico').'</div>',
		),
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Typography Advanced Options', 'optico'),
			'after'  	  => '<small>'.esc_attr__('Advanced Options for typography', 'optico').'</small>',
		),
		array(
			'id'     		=> 'typo_latin_extended',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Load Latin Extended Font Language?', 'optico'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('This will load Latin Extended language for the selected Google Fonts. This will work ONLY if the font is supported', 'optico').'</div>',
        ),
		
	)
);

// Blog Settings
$ts_framework_options[] = array(
	'name'   => 'blog_settings', // like ID
	'title'  => esc_attr__('Blog Settings', 'optico'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Settings', 'optico'),
			'after'  		=> '<small>'.esc_attr__('Settings for Blog section', 'optico').'</small>',
		),
		array(
			'id'     		=> 'blog_text_limit',
			'type'   		=> 'number',
			'title'         => esc_attr__('Blog Excerpt Limit (in characters)', 'optico' ),
			'default'		=> '130',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set limit for small description. Select how many characters you like to show.', 'optico') . '<br><strong>' . esc_attr__('TIP:', 'optico') . '</strong> ' . esc_attr__('Select "0" (zero) to show excerpt or content before READ MORE break.', 'optico') . '</div>',
        ),
		array(
			'id'     		=> 'blog_readmore_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('"Read More" Link Text', 'optico'),
			'default' 		=> esc_attr__('Read More', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Text for the Read More link on the Blog page', 'optico').'</div>',
		),
		
		array(
			'id'           	=> 'blog_view',
			'type'         	=> 'image_select',
			'title'        	=>  esc_attr__('Blog view', 'optico'),
			'options'  		=> array(
				'classic'		=> get_template_directory_uri() . '/includes/images/blog-view-style1.png',
				'box'			=> get_template_directory_uri() . '/includes/images/blog-view-style4.png',
				'style-2'		=> get_template_directory_uri() . '/includes/images/blog-view-style-2.png',
			),
			'default'      	=> 'classic',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select blog view. The default view is classic list view. Also we have total three differnt look for classic view. Select them in this option and see your BLOG page. For "Box view", you can select two, three or four columns box view too.', 'optico').'</div>',
			'radio'      	=> true,
			
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blogbox Settings', 'optico'),
			'after'  		=> '<small>'.esc_attr__('Blog box style view settings. This is because you selected "BOX VIEW" in above option.', 'optico').'</small>',
			'dependency'    => array( 'blog_view_classic', '!=', 'true' ),
		),
		array(
			'id'           	=> 'blogbox_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Blog box column', 'optico'),
			'options'  		=> array(
				'one'			=> esc_attr__('One Column View', 'optico'),
				'two'			=> esc_attr__('Two Column view', 'optico'),
				'three'			=> esc_attr__('Three Column view (default)', 'optico'),
				'four'			=> esc_attr__('Four Column view', 'optico'),
			),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select blog view. The default view is classic list view. You can select two, three or four column blog view from here', 'optico').'</div>',
			'dependency'    => array( 'blog_view_classic', '!=', 'true' ),
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Single Settings', 'optico'),
			'after'  		=> '<small>'.esc_attr__('Settings for single view of blog post.', 'optico').'</small>',
		),
		array(
			'id'     		=> 'post_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Social Share Title', 'optico'),
			'default' 		=> esc_attr__('Share this post', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This text will appear in the social share box as title', 'optico').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'post_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Social Share Service', 'optico'),
			'options'   => array(
				'facebook'    => esc_attr__('Facebook', 'optico'),
				'twitter'     => esc_attr__('Twitter', 'optico'),
				'gplus'       => esc_attr__('Google Plus', 'optico'),
				'pinterest'   => esc_attr__('Pinterest', 'optico'),
				'linkedin'    => esc_attr__('LinkedIn', 'optico'),
				'stumbleupon' => esc_attr__('Stumbleupon', 'optico'),
				'tumblr'      => esc_attr__('Tumblr', 'optico'),
				'reddit'      => esc_attr__('Reddit', 'optico'),
				'digg'        => esc_attr__('Digg', 'optico'),
				'whatsapp'    => esc_attr__('WhatsApp', 'optico'),
			),
			'after'    	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('The selected social service icon will be visible on single Post so user can share on social sites.', 'optico').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Classic Meta Settings', 'optico'),
			'after'  		=> '<small>'.esc_attr__('Settings for meta data for Blog classic view.', 'optico').'</small>',
		),
		array(
			'id'      => 'blogclassic_meta_list',
			'type'    => 'sorter',
			'title'   => esc_attr__('Classic Blog - Meta Details','optico'),
			'after'   => '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select which data you like to show in post meta details', 'optico').'</div>',
			'default' => array(
				'enabled' => array(
					'cat'    => esc_attr__('Categories', 'optico'),
					'date'    => esc_attr__('Date', 'optico'),
					'author'  => esc_attr__('Author', 'optico'),
					'tag'    => esc_attr__('Tags', 'optico'),
					
				),
				'disabled' => array(
					'comment' => esc_attr__('Comments', 'optico'),
				),
			),
			'enabled_title'  => esc_attr__('Active Meta Details', 'optico'),
			'disabled_title' => esc_attr__('Hidden Meta Details', 'optico'),
		),
		array(
			'id'     		=> 'blogclassic_meta_dateformat',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Date Meta - format', 'optico'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('By default, this is empty and it will get settings from "Settings > General > Date Format" option. You can write your own custom date format here.', 'optico'). ' <a href="' . esc_url('https://codex.wordpress.org/Formatting_Date_and_Time') . '" target="_blank">' . esc_attr__('Documentation on date and time formatting.', 'optico') . '</a></div>',
		),
		array(
			'id'     		=> 'blogclassic_meta_taglink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Tag list - Add link?', 'optico'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Add link in tags', 'optico').'</div>',
        ),
		array(
			'id'     		=> 'blogclassic_meta_catlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Category list - Add link?', 'optico'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Add link in categories', 'optico').'</div>',
        ),
		array(
			'id'     		=> 'blogclassic_meta_authorlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Author Name - Add link?', 'optico'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Add link in author name', 'optico').'</div>',
        ),
	)
);

// Portfolio Settings
$ts_framework_options[] = array(
	'name'   => 'portfolio_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'optico'), $pf_title_singular ),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s Settings', 'optico'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for single %s', 'optico'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_project_details',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('%s Details Box Title', 'optico'), $pf_title_singular ),
			'default' 		=> esc_attr__('PROJECT DETAILS', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Title for the list styled "%1$s Details" area. (For single %1$s only)', 'optico'), $pf_title_singular ) . '</div>',
		),
		
		array(
			'id'           	=> 'portfolio_viewstyle',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('Single %s View Style', 'optico'), $pf_title ),
			'options'       => themestek_global_template_list( 'portfolio-single', true ),
			'default'      	=> 'top',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select view for single %s', 'optico'), $pf_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Related %1$s (on single %2$s) Settings', 'optico'), $pf_title, $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for related %1$s section on single %2$s page.', 'optico'), $pf_title, $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_related',
			'type'   		=> 'switcher',
			'title'   		=> sprintf( esc_attr__('Show Related %s', 'optico'), $pf_title ),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">' . sprintf( esc_attr__('Select ON to show related %1$s on single %2$s page', 'optico'), $pf_title, $pf_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'portfolio_related_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Related %s Title', 'optico'), $pf_title ),
			'default' 		=> esc_attr__('RELATED PROJECTS', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Title for the Releated %1$s area. (For single %2$s only)', 'optico'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
		),
		array(
			'id'           	=> 'portfolio_related_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('Related %s Boxes template', 'optico'), $pf_title ),
			'options'       => themestek_global_template_list( 'portfolio', true ),
			'default'      	=> 'style-2',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select column to show in Related %s area.', 'optico'), $pf_title ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'portfolio_related_column',
			'type'         	=> 'select',
			'title'        	=> esc_attr__('Select column', 'optico'),
			'options'  => array(
					'two'     => esc_attr__('Two column', 'optico'),
					'three'   => esc_attr__('Three column', 'optico'),
					'four'    => esc_attr__('Four column', 'optico'),
					'five'    => esc_attr__('Five column', 'optico'),
					'six'     => esc_attr__('Six column', 'optico'),
				),
			//'class'        	=> 'chosen',
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select column to show in Related %s area.', 'optico'), $pf_title ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'portfolio_related_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('Show %s', 'optico'), $pf_title ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('How many %2$s Boxes you like to show in Related %1$s area.', 'optico'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s List Details Settings', 'optico'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change each line of list details for single %1$s. Here you can select how many lines will be appear in the details of a single %1$s', 'optico'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'              => 'pf_details_line',
			'type'            => 'group',
			'title'           => esc_attr__('Line Details', 'optico'),
			'info'            => sprintf( esc_attr__('This will be added a new line in DETAILS box on single %s view.', 'optico'), $pf_title_singular ),
			'button_title'    => esc_attr__('Add New Line', 'optico'),
			'accordion_title' => esc_attr__('Details for the line', 'optico'),
			
			'default'		 =>   array (
				array (
					'pf_details_line_title' => 'Hospital Name',
					'pf_details_line_icon'	=> array (
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_tsoptmicon'	=> 'tsoptmicon',
						'library_linecons'		=> 'vc_li vc_li-note',
					),
					'data'					=> 'custom',
				),
				array (
					'pf_details_line_title' => 'Doctor',
					'pf_details_line_icon'	=> array (
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_tsoptmicon'	=> 'tsoptmicon',
						'library_linecons'		=> 'vc_li vc_li-tag',
					),
					'data'					=> 'custom',
				),
				array (
					'pf_details_line_title'	=> 'Surgery',
					'pf_details_line_icon'	=> array (
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_tsoptmicon'	=> 'tsoptmicon',
						'library_linecons'		=> 'vc_li vc_li-user',
					),
					'data'					=> 'custom',
				),
				array (
					'pf_details_line_title'	=> 'Date',
					'pf_details_line_icon'	=> array (
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_tsoptmicon'	=> 'tsoptmicon',
						'library_linecons'		=> 'vc_li vc_li-cloud',
					),
					'data'					=> 'date',
				),
				array (
					'pf_details_line_title' => 'Diseases',
					'pf_details_line_icon'	=> array (
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'fa fa-map-marker',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_tsoptmicon'	=> 'tsoptmicon',
						'library_linecons'		=> 'li_star',
					),
					'data'					=> 'custom',
				),
				array (
					'pf_details_line_title' => 'Categories',
					'pf_details_line_icon'	=> array (
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'fa fa-map-marker',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_tsoptmicon'	=> 'tsoptmicon',
						'library_linecons'		=> 'li_star',
					),
					'data'					=> 'custom',
				),
				array (
					'pf_details_line_title' => 'Location',
					'pf_details_line_icon' => 
					array (
						'library' => 'fontawesome',
						'library_fontawesome' => 'empty',
						'library_themify' => 'themifyicon ti-hand-point-right',
						'library_sgicon' => 'sgicon sgicon-WorldWide',
						'library_tsoptmicon' => 'tsoptmicon',
						'library_linecons' => 'vc_li vc_li-bubble',
					),
					'data' => 'custom',
				),
			),
			'fields'          => array(
				array(
					'id'     		=> 'pf_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Line Title', 'optico'),
					'default' 		=> esc_attr__('Line Title will be here', 'optico'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Title for the first line of the details in single %s', 'optico'), $pf_title_singular ) . '<br> ' . esc_attr__('Leave this field empty to remove the line.', 'optico').'</div>',
				),
				array(
					'id'      => 'pf_details_line_icon',
					'type'    => 'themestek_iconpicker',
					'title'  		=> esc_attr__('Line Icon', 'optico' ),
					'default' => array(
						'library'             => 'fontawesome',
						'library_fontawesome' => 'fa fa-map-marker',
					),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select icon for the first Line of the details in single %s', 'optico'), $pf_title_singular ) . '</div>',
				),
				
				array(
					'id'      		=> 'data',
					'type'   		=> 'select',
					'title'   		=> esc_attr__('Line Input Type', 'optico'),
					'options' 		=> array(
							'custom'        => esc_attr__('Custom text (single line)', 'optico'),
							'multiline'     => esc_attr__('Custom text with multiline', 'optico'),
							'date'          => sprintf( esc_attr__('Show date of the %s', 'optico'), $pf_title_singular ),
							'category'      => sprintf( esc_attr__('Show Category (without link) of the %s', 'optico'), $pf_title_singular ),
							'category_link' => sprintf( esc_attr__('Show Category (with link) of the %s', 'optico'), $pf_title_singular ),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select view for single %s', 'optico'), $pf_title_singular ) . '</div>',
				),
			)
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Select social sharing service for single %s', 'optico'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Select social service so site visitors can share the single %s on different social services', 'optico'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_social_share',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Social Share box', 'optico'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Show or hide social share box.', 'optico').'</div>',
        ),
		array(
			'id'     		=> 'portfolio_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Social Share Title', 'optico'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This text will appear in the social share box as title', 'optico').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'portfolio_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Social Share Service', 'optico'),
			'options'   => array(
					'facebook'    => esc_attr__('Facebook', 'optico'),
					'twitter'     => esc_attr__('Twitter', 'optico'),
					'gplus'       => esc_attr__('Google Plus', 'optico'),
					'pinterest'   => esc_attr__('Pinterest', 'optico'),
					'linkedin'    => esc_attr__('LinkedIn', 'optico'),
					'stumbleupon' => esc_attr__('Stumbleupon', 'optico'),
					'tumblr'      => esc_attr__('Tumblr', 'optico'),
					'reddit'      => esc_attr__('Reddit', 'optico'),
					'digg'        => esc_attr__('Digg', 'optico'),
					'whatsapp'    => esc_attr__('WhatsApp', 'optico'),
			),
			'default'    => array( 'facebook', 'twitter', 'gplus', 'pinterest' ),
			'after'    	 => '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('The selected social service icon will be visible on single %s so user can share on social sites.', 'optico'), $pf_title_singular ) . '</div>',
			'dependency' => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'     		=> 'portfolio_single_top_btn_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Button Title', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This button will appear after the social share links.', 'optico').'</div>',
		),
		array(
			'id'     		=> 'portfolio_single_top_btn_link',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Button Link', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This button will appear after the social share links.', 'optico').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'optico'), $pf_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s', 'optico'), $pf_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'pfcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'optico'), $pf_title_singular ),
			'options'       => themestek_global_template_list( 'portfolio', true ),
			'default'      	=> 'style-1',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select %1$s Box view on single %2$s page.', 'optico'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'pfcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'optico'),
			'options'  => array(
				'two'     => esc_attr__('Two column', 'optico'),
				'three'   => esc_attr__('Three column', 'optico'),
				'four'    => esc_attr__('Four column', 'optico'),
				'five'    => esc_attr__('Five column', 'optico'),
				'six'     => esc_attr__('Six column', 'optico'),
			),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select column to show on %s page.', 'optico'), $pf_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'pfcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to show', 'optico' ), $pf_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('How many %1$s you like to show on %2$s page', 'optico'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
        ),
	)
);

// Team Member Settings
$ts_framework_options[] = array(
	'name'   => 'team_member_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'optico'), $team_member_title_singular ),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr_x('%s\'s Extra Details Settings', 'Team Member', 'optico'), $team_member_title_singular ),
			'after'  		=> '<small>'.sprintf( esc_attr_x('You can fill this extra details and the details will be available on single %s page only. This will be shown as LIST with title and value design.', 'Team Member', 'optico'), $team_member_title_singular ) . '</small>',
		),
		array(
			'id'              => 'team_extra_details_lines',
			'type'            => 'group',
			'title'           => esc_attr__('Line Details', 'optico'),
			'info'            => sprintf( esc_attr_x('This will be added a new line in DETAILS box on single %s.', 'Team Member', 'optico'), $team_member_title_singular ),
			'button_title'    => esc_attr__('Add New Line', 'optico'),
			'accordion_title' => esc_attr__('Details for the line', 'optico'),
			'fields'          => array(
				array(
					'id'     		=> 'team_extra_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Line Title', 'optico'),
					'default' 		=> esc_attr__('Experience', 'optico'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. sprintf( esc_attr_x('Title for the first line in the DETAILS box in single %s', 'Team Member', 'optico'), $team_member_title_singular ) . '<br> ' . esc_attr__('Leave this field empty to remove the line.', 'optico').'</div>',
				),
				array(
					'id'      => 'team_extra_details_line_icon',
					'type'    => 'themestek_iconpicker',
					'title'   => esc_attr__('Line Icon', 'optico' ),
					'after'   => '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr_x('Select icon for the Line of the details in single %s', 'Team Member', 'optico'), $team_member_title_singular ) . '</div>',
					'default' => array(
						'library'             => 'fontawesome',
						'library_fontawesome' => 'fa fa-bookmark',
					),
				),
				array(
					'id'      		=> 'data',
					'type'   		=> 'radio',
					'title'   		=> esc_attr__('Line Data Type', 'optico'),
					'options' 		=> array(
						'custom'  => esc_attr__('Custom text (add anything)', 'optico'),
						'url'     => esc_attr__('URL link', 'optico'),
						'email'   => esc_attr__('Email address', 'optico'),
						'phone'   => esc_attr__('Phone number', 'optico'),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>'.sprintf( esc_attr_x('Select view for single %s', 'Team Member', 'optico'), $team_member_title_singular ).'</div>',
				),
			),
			'default' =>  array (
				array (
					'team_extra_details_line_title' => 'Occupation:',
					'team_extra_details_line_icon'	=> array (
						'library'						=> 'fontawesome',
						'library_fontawesome'			=> 'empty',
						'library_themify'				=> 'ti-location-pin',
						'library_sgicon'				=> 'sgicon sgicon-WorldWide',
						'library_tsoptmicon'			=> 'tsoptmicon',
						'library_linecons'				=> 'vc_li vc_li-bubble',
					),
					'data'		=> 'custom',
				),
				array (
					'team_extra_details_line_title'	=> 'Experience:',
					'team_extra_details_line_icon'	=> array (
						'library'						=> 'fontawesome',
						'library_fontawesome'			=> 'empty',
						'library_themify'				=> 'ti-location-pin',
						'library_sgicon'				=> 'sgicon sgicon-WorldWide',
						'library_tsoptmicon'			=> 'tsoptmicon',
						'library_linecons'				=> 'vc_li vc_li-bubble',
					),
					'data' 		=> 'custom',
				),
				array (
					'team_extra_details_line_title' => 'Core Skills:',
					'team_extra_details_line_icon'	=> array (
						'library'						=> 'fontawesome',
						'library_fontawesome'			=> 'empty',
						'library_themify'				=> 'ti-location-pin',
						'library_sgicon'				=> 'sgicon sgicon-WorldWide',
						'library_tsoptmicon'			=> 'tsoptmicon',
						'library_linecons'				=> 'vc_li vc_li-bubble',
					),
					'data' 		=> 'custom',
				),
				array (
				'team_extra_details_line_title'	=> 'Certificates:',
				'team_extra_details_line_icon'	=> array (
					'library'						=> 'fontawesome',
					'library_fontawesome'			=> 'empty',
					'library_themify'				=> 'ti-location-pin',
					'library_sgicon'				=> 'sgicon sgicon-WorldWide',
					'library_tsoptmicon'			=> 'tsoptmicon',
					'library_linecons'				=> 'li_star',
				),
				'data' 			=> 'custom',
				),
				array (
					'team_extra_details_line_title' => 'Location:',
					'team_extra_details_line_icon'	=> array (
						'library'						=> 'fontawesome',
						'library_fontawesome'			=> 'empty',
						'library_themify'				=> 'ti-location-pin',
						'library_sgicon'				=> 'sgicon sgicon-WorldWide',
						'library_tsoptmicon'			=> 'tsoptmicon',
						'library_linecons'				=> 'li_star',
					),
					'data' 		=> 'custom',
				),
				array (
					'team_extra_details_line_title'	=> 'EDUCATION:',
					'team_extra_details_line_icon'	=> array (
						'library'						=> 'fontawesome',
						'library_fontawesome'			=> 'fa fa-bookmark',
						'library_themify'				=> 'ti-location-pin',
						'library_sgicon'				=> 'sgicon sgicon-WorldWide',
						'library_tsoptmicon'			=> 'tsoptmicon',
						'library_linecons'				=> 'li_star',
					),
					'data' => 'custom',
				),
			),
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'optico'), $team_group_title_singular),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s page', 'optico'), $team_group_title_singular) . '</small>',
		),
		array(
			'id'           	=> 'teamcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'optico'), $team_member_title_singular ),
			'options'       => themestek_global_template_list( 'team', true ),
			'default'      	=> 'style-1',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select %1$s\'s Box view on %2$s page.', 'optico'), $team_member_title_singular, $team_group_title_singular ) . '</div>',
			'radio'      	=> true,
			
        ),
		array(
			'id'           	=> 'teamcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'optico'),
			'options'  => array(
				'two'   => esc_attr__('Two column', 'optico'),
				'three' => esc_attr__('Three column', 'optico'),
				'four'  => esc_attr__('Four column', 'optico'),
			),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf(esc_attr__('Select column to show %s', 'optico'), $team_member_title ) . '</div>',
        ),
		array(
			'id'     		=> 'teamcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to Show', 'optico' ), $team_member_title  ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('How many %s you like to show on category page', 'optico'), $team_member_title  ) . '</div>',
        ),
		
	)
);

// Creating Client Groups array 
$client_groups = array();
if( isset($optico_theme_options['client_groups']) && is_array($optico_theme_options['client_groups']) ){
foreach( $optico_theme_options['client_groups'] as $key => $val ){
	$name = $val['client_group_name'];
	$slug = str_replace(' ', '_', strtolower($name));
	$client_groups[$slug] = $name;
}
}

// Error 404 Page Settings
$ts_framework_options[] = array(
	'name'   => 'error404_page_settings', // like ID
	'title'  => esc_attr__('Error 404 Page Settings', 'optico'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Error 404 Page Settings', 'optico'),
			'after'  		=> '<small>'.esc_attr__('Settings that determine how the error page will be looking', 'optico').'</small>',
		),
		array(
			'id'      		=> '404_background',
			'type'    		=> 'themestek_background',
			'title'  		=> esc_attr__('Content area background for 404 page only', 'optico' ),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for 404 page content area only.', 'optico').'</div>',
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/404-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'size'			=> 'cover',
				'color'			=> 'rgba(23,23,23,0.80)',
			),
			'output' 	    => '.error404 .site-content-wrapper',
		),
		array(
			'id'      => 'error404_big_icon',
			'type'    => 'themestek_iconpicker',
			'title'  		=> esc_attr__('Big icon', 'optico' ),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select icon that appear in top with big size', 'optico').'</div>',
			'default' =>  array (
				'library'			  => 'fontawesome',
				'library_fontawesome' => 'fa fa-thumbs-o-down',
				'library_linecons'	  => '',
				'library_themify'	  => 'ti-location-pin',
			),
		),
		array(
			'id'     		=> 'error404_big_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Big heading text', 'optico'),
			'default' 		=> esc_attr__('PAGE NOT FOUND', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This text will be shown with big font size below icon', 'optico').'</div>',
		),
		array(
			'id'     		=> 'error404_medium_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Description text', 'optico'),
			'default' 		=> esc_attr__('Sorry, but the page you are looking for does not exist or removed. Please use search given below to find what you are looking or use the main menu.', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This file may have been moved or deleted. Be sure to check your spelling', 'optico').'</div>',
		),
		array(
			'id'     		=> 'error404_search',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Search Form', 'optico'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "YES" to show search form on the 404 page', 'optico').'</div>',
        ),
		
	)
);

// Search Page Settings
$ts_framework_options[] = array(
	'name'   => 'search_page_settings', // like ID
	'title'  => esc_attr__('Search Page Settings', 'optico'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Search Page Settings', 'optico'),
		),
		array(
			'id'       		 => 'searchnoresult',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Content of the search page if no results found', 'optico'),
			'shortcode'		 => true,
			'after'  	     => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Specify the content of the page that will be displayed if while search no results found', 'optico') . '<br> ' . esc_attr__('html tags and shortcodes are allowed', 'optico').'</div>',
			'default'  		 => themestek_wp_kses( urldecode('%3Ch3%3ENothing+found%3C%2Fh3%3E%3Cp%3ESorry%2C+but+nothing+matched+your+search+terms.+Please+try+again+with+some+different+keywords.%3C%2Fp%3E') ),
        ),
		
	)
);

// Sidebar Settings
$ts_framework_options[] = array(
	'name'   => 'sidebar_settings', // like ID
	'title'  => esc_attr__('Sidebar Settings', 'optico'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Sidebar Settings', 'optico'),
		),
		array(
			'id'              => 'custom_sidebars',
			'type'            => 'group',
			'title'           => esc_attr__('Custom Sidebars', 'optico'),
			'info'            => esc_attr__('Specify the custom sidebars that can be used in the pages for a widgets', 'optico'),
			'button_title'    => esc_attr__('Add New Sidebar', 'optico'),
			'accordion_title' => esc_attr__('Custom Sidebar Properties', 'optico'),
			'fields'          => array(
				array(
					'id'     		=> 'custom_sidebar',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Custom Sidebar Name', 'optico'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Write custom sidebar name here', 'optico').'</div>',
				),
			)
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Sidebar Position', 'optico'),
			'after'  		=> '<small>'.esc_attr__('Select sidebar position for different sections', 'optico').'</small>',
		),
		array(
			'id'           	=> 'sidebar_post',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Blog Post/Category Sidebar', 'optico'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select one of layouts for blog post. Also for Category, Tag and Archive view too. Technically, related to all blog post view.', 'optico').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_page',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Standard Pages Sidebar', 'optico'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select one of layouts for standard pages', 'optico').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Team member Sidebar', 'optico'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select one of layouts for Team Member single and Team Member Group.', 'optico').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member_group',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Team member Group Sidebar', 'optico'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select one of layouts for Team Member single and Team Member Group.', 'optico').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'optico'), $pf_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select one of layouts for %s single pages.', 'optico'), $pf_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'optico'), $pf_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select one of layouts for %s view.', 'optico'), $pf_cat_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_search',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Search Page Sidebar', 'optico'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select one of layouts for search page', 'optico').'</div>',
		),
		array(
			'id'           	=> 'sidebar_woocommerce',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('WooCommerce Sidebar', 'optico'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select sidebar position for WooCommerce Shop page', 'optico').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_woocommerce_single',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('WooCommerce Sidebar for Single Product page', 'optico'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select sidebar position for WooCommerce Single product view page', 'optico').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_bbpress',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('BBPress Sidebar', 'optico'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select sidebar position for BBPress pages', 'optico').'</div>',
        ),
	)
);

// Getting social list
$global_social_list = ts_shared_social_list();
	
// social service list
$sociallist = array_merge(
	$global_social_list,
	array('rss'     => 'Rss Feed')
);

// Social Links
$ts_framework_options[] = array(
	'name'   => 'social_links', // like ID
	'title'  => esc_attr__('Social Links', 'optico'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Social Links', 'optico'),
			'after'			=> '<small>' . sprintf(__('You can use %1$s[ts-social-links]%2$s shortcode to show social links.', 'optico'), '<code>' , '</code>' ) . '</small>',
		),
		array(
			'id'              => 'social_icons_list',
			'type'            => 'group',
			'title'           => esc_attr__('Social Links', 'optico'),
			'info'            => esc_attr__('Add your social services here. Also you can reorder the Social Links as per your choice. Just drag and drop items to reorder as per your choice', 'optico'),
			'button_title'    => esc_attr__('Add New Social Service', 'optico'),
			'accordion_title' => esc_attr__('Social Service Properties', 'optico'),
			'fields'          => array(
					array(
						'id'            => 'social_service_name',
						'type'          => 'select',
						'title'         =>  esc_attr__('Social Service', 'optico'),
						'options'  		=> $sociallist,
						'default'       => 'twitter',
						'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Select Social icon from here', 'optico').'</div>',
					),
					array(
						'id'     		=> 'social_service_link',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Link to Social icon selected above', 'optico'),
						'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Paste URL only', 'optico').'</div>',
						'dependency' 	=> array( 'social_service_name', '!=', 'rss' ),
					),

			),
			'default' => array (
				
				array (
					'social_service_name' => 'facebook',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'twitter',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'flickr',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'linkedin',
					'social_service_link' => '',
				),
				
			),
        ),
	),
);

// WooCommerce Settings
if( function_exists('is_woocommerce') ){
$ts_framework_options[] = array(
	'name'   => 'woocommerce_settings', // like ID
	'title'  => esc_html__('WooCommerce Settings', 'optico'),
	'icon'   => 'fa fa-shopping-cart',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('WooCommerce Settings', 'optico'),
			'after'  		=> '<small>'. esc_html__('Setup for WooCommerce shop section. Please make sure you installed WooCommerce plugin', 'optico').'</small>',
		),
		array(
			'id'     		=> 'wc-header-icon',
			'type'   		=> 'switcher',
			'title'   		=> esc_html__('Show Cart Icon in Header', 'optico'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_html__('Select "On" to show the cart icon in header. Select "OFF" to hide the cart icon.', 'optico') . ' <br><br> ' . '<strong>' . esc_html__('NOTE:','optico') . '</strong> ' . esc_html__('Please note that if you haven\'t installed "WooCommerce" plugin than the icon will not appear even if you selected "ON" in this option.', 'optico').'</div>',
        ),
		array(
			'id'     		=> 'woocommerce-column', 
			'type'   		=> 'radio',
			'title'  		=> esc_html__('WooCommerce Product List Column', 'optico'),
			'options'  		=> array(
				'1'				=> esc_html__('One Column', 'optico'),
				'2'				=> esc_html__('Two Columns', 'optico'),
				'3'				=> esc_html__('Three Columns', 'optico'),
				'4'				=> esc_html__('Four Columns', 'optico'),
			),
			'default'  		 => '3',
			'after'   		 => '<div class="cs-text-muted">'.esc_html__('Select how many column you want to show for product list view', 'optico').'</div>',
        ),
		array(
			'id'     		=> 'woocommerce-product-per-page',
			'type'   		=> 'number',
			'title'         => esc_html__('Products Per Page', 'optico' ),
			'default'		=> '12',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_html__('Select how many product you want to show on SHOP page', 'optico').'</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Single Product Page Settings', 'optico'),
			'after'  		=> '<small>'. esc_html__('Options for Single product page', 'optico').'</small>',
		),
		array(
			'id'     		=> 'wc-single-show-related',
			'type'   		=> 'switcher',
			'title'   		=> esc_html__('Show Related Products', 'optico'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_html__('Select "ON" to show Related Products below the product description on single page', 'optico').'</div>',
        ),
		array(
			'id'     		=> 'wc-single-related-column', 
			'type'   		=> 'radio',
			'title'  		=> esc_html__('Column for Related Products', 'optico'),
			'options'  		=> array(
				'1'				=> esc_html__('One Column', 'optico'),
				'2'				=> esc_html__('Two Columns', 'optico'),
				'3'				=> esc_html__('Three Columns', 'optico'),
				'4'				=> esc_html__('Four Columns', 'optico'),
			),
			'default'  		 => '3',
			'after'   		 => '<div class="cs-text-muted">'.esc_html__('Select how many column you want to show for product list of related products', 'optico').'</div>',
			'dependency'     => array( 'wc-single-show-related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'wc-single-related-count',
			'type'   		=> 'number',
			'title'         => esc_html__('Related Products Show', 'optico' ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_html__('Select how many products you want to show in the Related prodcuts area on single product page', 'optico').'</div>',
			'dependency'    => array( 'wc-single-show-related', '==', 'true' ),
        ),
	)
);
}

// Under Construction
$ts_framework_options[] = array(
	'name'   => 'under_construction', // like ID
	'title'  => esc_attr__('Under Construction', 'optico'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Under Construction', 'optico'),
			'after'  		=> '<small>'. esc_attr__('You can set your site in Under Construciton mode during development of your site. Please note that only logged in users like admin can view the site when this mode is activated', 'optico').'</small>',
		),
		array(
			'id'     		=> 'uconstruction',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Under Construciton Message', 'optico'),
			'default' 		=> false,
			'label'  		=> esc_attr__('You can acitvate this during development of your site. So site visitor will see Under Construction message.', 'optico'). '<br>' . esc_attr__('Please note that admin (when logged in) can view live site and not Under Construction message.', 'optico'),
        ),
		array(
			'id'     		=> 'uconstruction_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Title for Under Construction page', 'optico'),
			'default'  		=> esc_attr__('This site is Under Construction', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Write TITLE for the Under Construction page', 'optico').'</div>',
			'dependency'	=> array('uconstruction','==','true'),
		),
		array(
			'id'       		 => 'uconstruction_html',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Page Content', 'optico'),
			'shortcode'		 => true,
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => themestek_wp_kses( urldecode('%3Cdiv+class%3D%22un-main-page-content%22%3E%0D%0A%3Cdiv+class%3D%22un-page-content%22%3E%0D%0A%3Cdiv%3E%5Bts-logo%5D%3C%2Fdiv%3E%0D%0A%3Cdiv+class%3D%22sepline%22%3E%3C%2Fdiv%3E%0D%0A%3Ch1+class%3D%22heading%22%3EUNDER+CONSTRUCTION%3C%2Fh1%3E%0D%0A%3Ch4+class%3D%22subheading%22%3ESomething+awesome+this+way+comes.+Stay+tuned%21%3C%2Fh4%3E%0D%0A%3C%2Fdiv%3E%0D%0A%3C%2Fdiv%3E') ),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Write your html code for Under Construction page body content', 'optico').'</div>',
        ),
		array(
			'id'      		=> 'uconstruction_background',
			'type'    		=> 'themestek_background',
			'title'  		=> esc_attr__('Background Properties', 'optico' ),
			'dependency'	 => array('uconstruction','==','true'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background options. This is for main body background', 'optico').'</div>',
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/uconstruction-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'attachment'	=> 'fixed',
				'size'			=> 'cover',
				'color'			=> '#222222',
			),
			'output'      	=> '.uconstruction_background',
        ),
		array(
			'id'       		 => 'uconstruction_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code for Under Construction page', 'optico'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Write your custom CSS code here', 'optico').'</div>',
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => '',
        ),
		
	)
);

// One page website
$ts_framework_options[] = array(
	'name'   => 'one_page_site', // like ID
	'title'  => esc_attr__('One Page Site option', 'optico'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'      => 'heading',
			'content'   => esc_attr__('One Page Website', 'optico'),
			'after'  	=> '<small>'.esc_attr__('Options for One Page website', 'optico').'</small>',
		),
		array(
			'type'    		=> 'notice',
			'class'   		=> 'info',
			'content'		=> '<p><strong>' . esc_attr__('More information about how to set one page site', 'optico') . '</strong> <br> <a href="#" target="_blank"> ' . esc_attr__('Please read our documentation for how to set one-page website by clicking here.', 'optico') . '</a> </p>',
		),
		array(
			'id'      	=> 'one_page_site',
			'type'    	=> 'switcher',
			'title'   	=> esc_attr__('One Page Site', 'optico'),
			'default' 	=> false,
			'label'   	=> '<br><div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "ON" if your site is one page website', 'optico').' <a target="_blank" href="#">'.esc_attr__('Click here to know more about how to setup one-page site.', 'optico').'</a></div>',
		),
	)
);

// Seperator
$ts_framework_options[] = array(
	'name'   => 'ts_seperator_1',
	'title'  => esc_attr__('Advanced', 'optico'),
	'icon'   => 'fa fa-gear',
);

$cssfile = (is_multisite()) ? 'php' : 'css' ;

// Advanced Settings
$ts_framework_options[] = array(
	'name'   => 'advanced_settings', // like ID
	'title'  => esc_attr__('Advanced Settings', 'optico'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Portfolio) Settings', 'optico'), $pf_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Portfolio custom post type', 'optico').'</small>',
		),
		array(
			'id'     		=> 'pf_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Portfolio) Post Type', 'optico'), $pf_title_singular ),
			'default'  		=> esc_attr__('Optometrist Services', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the Title for Portfolio post type section', 'optico').'</div>',
		),
		array(
			'id'     		=> 'pf_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Portfolio) Post Type', 'optico'), $pf_title_singular ),
			'default'  		=> esc_attr__('Optometrist Service', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the Title for Portfolio post type section. Only for singular title.', 'optico').'</div>',
		),
		array(
			'id'     		=> 'pf_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Portfolio) Post Type', 'optico'), $pf_title_singular ),
			'default'  		=> esc_attr('optometrist-service'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the URL slug for Portfolio post type section', 'optico').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Portfolio Category) List', 'optico'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Optometrist Service Categories', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'optico').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Portfolio Category) List', 'optico'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Optometrist Service Category', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'optico').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Portfolio Category) Link', 'optico'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('optometrist-service-category', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the URL slug for Portfolio Category link', 'optico').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Team member) Settings', 'optico'), $team_member_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Team Member custom post type', 'optico').'</small>',
		),
		array(
			'id'     		=> 'team_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Team Member) Post Type', 'optico'), $team_member_title_singular ),
			'default'  		=> esc_attr__('Doctors', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the Title for Team Member post type section', 'optico').'</div>',
		),
		array(
			'id'     		=> 'team_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Team Member) Post Type', 'optico'), $team_member_title_singular ),
			'default'  		=> esc_attr__('Doctor', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the Title for Team Member post type section. Only for singular title.', 'optico').'</div>',
		),
		array(
			'id'     		=> 'team_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Team Member) Post Type', 'optico'), $team_member_title_singular ),
			'default'  		=> esc_attr__('doctor', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the URL slug for Team Member post type section', 'optico').'</div>',
		),
		array(
			'id'     		=> 'team_group_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Team Group) List', 'optico'), $team_group_title_singular ),
			'default'  		=> esc_attr__('Doctor Groups', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Title for Team Group list for group page. This will appear at left sidebar', 'optico').'</div>',
		),
		array(
			'id'     		=> 'team_group_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Team Group) List', 'optico'), $team_group_title_singular ),
			'default'  		=> esc_attr__('Doctor Group', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Title for Team Group list for group page. This will appear at left sidebar', 'optico').'</div>',
		),
		array(
			'id'     		=> 'team_group_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Team Group) Link', 'optico'), $team_group_title_singular ),
			'default'  		=> esc_attr__('doctor-group', 'optico'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will change the URL slug for Team Group link', 'optico').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Minify Options', 'optico'),
			'after'  		=> '<small>'. esc_attr__('Options to minify html/JS/CSS files', 'optico').'</small>',
		),
		array(
			'id'     		=> 'minify',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Minify JS and CSS files', 'optico'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This will generate MIN version of all CSS and JS files. This will help you to lower the page load time. You can use this if the Theme Options are not working', 'optico').'</div>',
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Show or hide Demo Content Setup option', 'optico'),
			'after'  		=> '<small>'. esc_attr__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'optico').'</small>',
		),
		array(
			'id'     		=> 'hide_demo_content_option',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Hide "Demo Content Setup" option', 'optico'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'optico').'</div>',
        ),
		
	)
);

// CSS/JS Code
$ts_framework_options[] = array(
	'name'   => 'custom_code', // like ID
	'title'  => esc_attr__('CSS/JS Code', 'optico'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		
		// Custom Code
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom CSS or JS Code', 'optico'),
			'after'  		=> '<small>'. esc_attr__('Add custom JS and CSS code', 'optico').'</small>',
		),
		array(
			'id'       		 => 'custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code', 'optico'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Add custom CSS code here. This code will be appear at bottom of the dynamic css file so you can override any existing style', 'optico').'</div>',
        ),
		array(
			'id'       => 'custom_js_code',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('JS Code', 'optico'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Paste your JS code here', 'optico').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom html Code', 'optico'),
			'after'  		=> '<small>'. sprintf(__('Custom html Code for different areas. You can paste <strong>Google Analytics</strong> or any tracking code here', 'optico'),'<strong>', '</strong>').'</small>',
		),
		array(
			'id'       => 'customhtml_head',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code for &lt;head&gt; tag', 'optico'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This code will appear in &lt;head&gt; tag. You can add your custom tracking code here', 'optico').'</div>',
		),
		array(
			'id'       => 'customhtml_bodystart',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code after &lt;body&gt; tag', 'optico'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This code will appear after &lt;body&gt; tag. You can add your custom tracking code here', 'optico').'</div>',
		),
		array(
			'id'       => 'customhtml_bodyend',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code before &lt;/body&gt; tag', 'optico'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('This code will appear before &lt;/body&gt; tag. You can add your custom tracking code here', 'optico').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom Code for Login page', 'optico'),
			'after'  		=> '<small>'. esc_attr__('Custom Code for Login pLogin page only. This will effect only login page and not effect any other pages or admin section', 'optico').'</small>',
		),
		array(
			'id'       		 => 'login_custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code for Login Page', 'optico'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Write your custom CSS code here', 'optico').'</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Advanced Custom CSS Code Option', 'optico'),
		),
		array(
			'id'       		 => 'custom_css_code_top',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code (at top of the file)', 'optico'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_attr__('Add custom CSS code here. This code will be appear at top of the css code. specially for "@import" style tag.', 'optico').'</div>',
        ),
		
	)
);

// Backup
$ts_framework_options[]   = array(
	'name'     => 'backup_section',
	'title'    => esc_attr__('Backup / Restore', 'optico'),
	'icon'   => 'fa fa-gear',
	'fields'   => array(
		array(
			'type'    => 'notice',
			'class'   => 'warning',
			'content' => esc_attr__('You can save your current options. Download a Backup and Import', 'optico'),
		),
		array(
			'type'    => 'backup',
		),
	)
);
