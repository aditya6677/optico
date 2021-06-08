<?php
/**
 * Enqueue scripts and styles for the ADMIN section.
 *
 * @since Optico 1.0
 *
 * @return void
 */
if( !function_exists('optico_wp_admin_scripts_styles') ){
function optico_wp_admin_scripts_styles() {

	/* Core files of the theme */
	wp_enqueue_style( 'optico-admin-css', get_template_directory_uri() . '/includes/admin.css', false, '1.0.0' );
	wp_enqueue_script( 'optico-admin-js', get_template_directory_uri() . '/includes/admin.js', array( 'jquery' ) );

	/* ThemeStek Icon Picker - JS files */

	// Bootstrap icon picker
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/includes/libraries/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );

	// iconset-tsoptmicon
	wp_enqueue_script( 'iconset-tsoptmicon', get_template_directory_uri() . '/includes/vc/themestek_iconpicker/iconset-tsoptmicon.js', array( 'bootstrap' ) );

	// iconset-fontawesome
	wp_enqueue_script( 'iconset-fontawesome', get_template_directory_uri().'/includes/vc/themestek_iconpicker/iconset-fontawesome.js', array( 'bootstrap' ) );

	// iconset-linecons
	wp_enqueue_script( 'iconset-linecons', get_template_directory_uri().'/includes/vc/themestek_iconpicker/iconset-linecons.js', array( 'bootstrap' ) );

	// iconset-themify
	wp_enqueue_script( 'iconset-themify', get_template_directory_uri().'/includes/vc/themestek_iconpicker/iconset-themify.js', array( 'bootstrap' ) );

	// iconset-sgicon
	wp_enqueue_script( 'iconset-sgicon', get_template_directory_uri().'/includes/vc/themestek_iconpicker/iconset-sgicon.js', array( 'bootstrap' ) );

	// Bootstrap icon picker
	wp_enqueue_script( 'bootstrap-iconpicker', get_template_directory_uri().'/includes/libraries/bootstrap-iconpicker/js/bootstrap-iconpicker.js', array( 'bootstrap', 'iconset-fontawesome', 'iconset-linecons', 'iconset-themify', 'iconset-tsoptmicon' ) );

	/* ThemeStek Icon Picker - CSS files */

	// Bootstrap icon picker - CSS
	wp_enqueue_style( 'bootstrap-iconpicker', get_template_directory_uri() . '/includes/libraries/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css' );

	// iconset-tsoptmicon
	wp_enqueue_style( 'tsoptmicon', get_template_directory_uri().'/libraries/ts-optometrist-icons/font/flaticon.css' );

	// iconset-fontawesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/libraries/font-awesome/css/font-awesome.min.css' );

	// iconset-fontawesome
	wp_enqueue_style( 'vc_linecons', get_template_directory_uri().'/libraries/vc-linecons/vc_linecons_icons.min.css' );

	// iconset-themify
	wp_enqueue_style( 'themify', get_template_directory_uri().'/libraries/themify-icons/themify-icons.css' );

	// iconset-sgicon
	wp_enqueue_style( 'sgicon', get_template_directory_uri().'/libraries/stroke-gap-icons/style.css' );

	// Sticky Kit library
	wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/includes/libraries/sticky-kit/jquery.sticky-kit.min.js', array( 'jquery' ) );

	// Twemoji Awesome
	wp_enqueue_style( 'twemojiawesome' );

	// themify
	wp_enqueue_style( 'themify' );

}
}
add_action( 'admin_enqueue_scripts', 'optico_wp_admin_scripts_styles' );
