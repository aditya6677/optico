<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// SHORTCODE GENERATOR OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options       = array();

// -----------------------------------------
// Basic Shortcode Examples                -
// -----------------------------------------
$options[]     = array(
  'title'      => 'ThemeStek Special Shortcodes',
  'shortcodes' => array(

	//Site Tagline
	array(
		'name'      => 'ts-site-tagline',
		'title'     => esc_attr__('Site Tagline', 'optico'),
		'fields'    => array(
			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Tagline. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode. ', 'optico'),
			),
      ),
    ),
	// Site Title
	array(
		'name'      => 'ts-site-title',
		'title'     => esc_attr__('Site Title', 'optico'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Title. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'optico'),
			),

      ),
    ),
	// Site URL
	array(
		'name'      => 'ts-site-url',
		'title'     => esc_attr__('Site URL', 'optico'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site URL. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'optico'),
			),

      ),
    ),
	// Site LOGO
	array(
		'name'      => 'ts-logo',
		'title'     => esc_attr__('Site Logo', 'optico'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Logo. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'optico'),
			),

      ),
    ),
	// Current Year
	array(
		'name'      => 'ts-current-year',
		'title'     => esc_attr__('Current Year', 'optico'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Current Year. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'optico'),
			),

      ),
    ),
	// Footer Menu
	array(
		'name'      => 'ts-footermenu',
		'title'     => esc_attr__('Footer Menu', 'optico'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Footer Menu. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'optico'),
			),

      ),
    ),
	// Skin Color
	array(
		'name'      => 'ts-skincolor',
		'title'     => esc_attr__('Skin Color', 'optico'),
		'fields'    => array(

			array(
				'type'   	 => 'content',
				'content'	 => esc_attr__('This shortcode will show the Text in Skin Color', 'optico'),
			),
			 array(
				'id'         => 'content',
				'type'       => 'text',
				'title'      => esc_attr__('Skin Color Text', 'optico'),
				'after'   	 => '<div class="cs-text-muted"><br>'.esc_attr__('The content is this box will be shown in Skin Color', 'optico').'</div>', 
			),

      ),
    ),
	// Dropcaps
	array(
		'name'      => 'ts-dropcap',
		'title'     => esc_attr__('Dropcap', 'optico'),
		'fields'    => array(
			array(
				'type'   	 => 'content',
				'content'	 => esc_attr__('This will show text in dropcap style.', 'optico'),
			),
			array(
				'id'        	=> 'style',
				'title'     	=> esc_attr__('Style', 'optico'),
				'type'      	=> 'image_select',
				'options'    	=> array(
									''        => get_template_directory_uri() .'/includes/images/dropcap1.png',
									'square'  => get_template_directory_uri() .'/includes/images/dropcap2.png',
									'rounded' => get_template_directory_uri() .'/includes/images/dropcap3.png',
									'round'   => get_template_directory_uri() .'/includes/images/dropcap4.png',
								),
				'default'     	=> ''
			),
			array(
				'id'         	=> 'bgcolor',
				'type'       	=> 'select',
				'title'     	=> esc_attr__('Background Color', 'optico'),
				'options'    	=> array(
									'white' 	    => esc_attr__('White', 'optico'),
									'skincolor'     => esc_attr__('Skin Color', 'optico'),
									'grey' 			=> esc_attr__('Grey', 'optico'),
									'dark' 		    => esc_attr__('Dark', 'optico'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			array(
				'id'         	=> 'color',
				'type'       	=> 'select',
				'title'     	=> esc_attr__('Color', 'optico'),
				'options'    	=> array(
									'skincolor'     => esc_attr__('Skin Color', 'optico'),
									'white' 	    => esc_attr__('White', 'optico'),
									'grey' 			=> esc_attr__('Grey', 'optico'),
									'dark' 		    => esc_attr__('Dark', 'optico'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			 array(
				'id'         	=> 'content',
				'type'      	=> 'text',
				'title'     	=> esc_attr__('Text', 'optico'),
				'after'   	 	=> '<div class="cs-text-muted"><br>'.esc_attr__('The Letter in this box will be shown Dropcapped', 'optico').'</div>', 
			),

      ),
    ),

  ),
);

CSFramework_Shortcode_Manager::instance( $options );
