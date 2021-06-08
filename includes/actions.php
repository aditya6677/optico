<?php

/**
 * Register widget areas.
 *
 * @since Optico 1.0
 *
 * @return void
 */
if( !function_exists('tste_optico_widgets_init') ){
function tste_optico_widgets_init() {
	
	if( !function_exists('tste_optico_cs_framework_init') ){
		
		register_sidebar( array(
			'name' => esc_attr__( 'Right Sidebar for Blog', 'optico' ),
			'id' => 'sidebar-right-blog',
			'description' => esc_attr__( 'This is right sidebar for blog section', 'optico' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' => esc_attr__( 'Right Sidebar for Pages', 'optico' ),
			'id' => 'sidebar-right-page',
			'description' => esc_attr__( 'This is right sidebar for pages', 'optico' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	
	}
}
}
add_action( 'widgets_init', 'tste_optico_widgets_init' );

/**
 *  Inserting Max Mega Menu theme so user can override it with our design
 */
if( !function_exists('themestek_megamenu_add_theme_optico_settings') ){
function themestek_megamenu_add_theme_optico_settings($themes) {
	$themes["optico_theme_settings"] = array(
		'title' => esc_attr__('Optico Theme Settings', 'optico'),
		'container_background_from' => 'rgba(34, 34, 34, 0)',
		'container_background_to' => 'rgba(34, 34, 34, 0)',
		'arrow_up' => 'disabled',
		'arrow_down' => 'disabled',
		'arrow_left' => 'dash-f341',
		'arrow_right' => 'dash-f345',
		'menu_item_background_hover_from' => 'rgba(255, 255, 255, 0)',
		'menu_item_background_hover_to' => 'rgba(255, 255, 255, 0)',
		'menu_item_link_height' => '100px',
		'menu_item_link_color_hover' => 'rgb(217, 55, 20)',
		'menu_item_link_padding_left' => '15px',
		'menu_item_link_padding_right' => '15px',
		'panel_background_from' => 'rgb(34, 34, 34)',
		'panel_background_to' => 'rgb(34, 34, 34)',
		'panel_header_color' => 'rgb(255, 255, 255)',
		'panel_header_padding_bottom' => '10px',
		'panel_header_border_color' => '#555',
		'panel_padding_left' => '10px',
		'panel_padding_right' => '10px',
		'panel_padding_top' => '10px',
		'panel_padding_bottom' => '10px',
		'panel_font_size' => '14px',
		'panel_font_color' => 'rgb(255, 255, 255)',
		'panel_font_family' => 'inherit',
		'panel_second_level_font_color' => '#555',
		'panel_second_level_font_color_hover' => 'rgb(217, 55, 20)',
		'panel_second_level_text_transform' => 'none',
		'panel_second_level_font' => 'inherit',
		'panel_second_level_font_size' => '14px',
		'panel_second_level_font_weight' => 'inherit',
		'panel_second_level_font_weight_hover' => 'inherit',
		'panel_second_level_text_decoration' => 'none',
		'panel_second_level_text_decoration_hover' => 'none',
		'panel_second_level_padding_left' => '10px',
		'panel_second_level_padding_right' => '10px',
		'panel_second_level_padding_top' => '10px',
		'panel_second_level_padding_bottom' => '10px',
		'panel_second_level_border_color' => '#555',
		'panel_third_level_font_color' => '#666',
		'panel_third_level_font_color_hover' => 'rgb(217, 55, 20)',
		'panel_third_level_font' => 'inherit',
		'panel_third_level_font_size' => '14px',
		'flyout_width' => '250px',
		'flyout_menu_background_from' => 'rgb(34, 34, 34)',
		'flyout_menu_background_to' => 'rgb(34, 34, 34)',
		'flyout_padding_top' => '10px',
		'flyout_padding_bottom' => '10px',
		'flyout_link_padding_left' => '25px',
		'flyout_link_padding_right' => '25px',
		'flyout_link_padding_top' => '10px',
		'flyout_link_padding_bottom' => '10px',
		'flyout_link_height' => '20px',
		'flyout_link_size' => '14px',
		'flyout_link_color' => 'rgb(255, 255, 255)',
		'flyout_link_color_hover' => 'rgb(217, 55, 20)',
		'flyout_link_family' => 'inherit',
		'responsive_breakpoint' => '1200px',
		'line_height' => '2.2',
		'resets' => 'on',
		'toggle_background_from' => '#222',
		'toggle_background_to' => '#222',
		'toggle_font_color' => '#ffffff',
		'mobile_background_from' => '#222',
		'mobile_background_to' => '#222',
		'custom_css' => '#{$wrap} #{$menu} {
	/** Custom styles should be added below this line **/
}
#{$wrap} {
	clear: both;
}',
	);
	return $themes;
}
}
add_filter("megamenu_themes", "themestek_megamenu_add_theme_optico_settings");

/**
 *  Changing default theme to our theme to it will be selected by default
 */
if( !function_exists('themestek_megamenu_override_default_theme') ){
function themestek_megamenu_override_default_theme($value) {
  // change 'themestek-main-menu' to your menu location ID
  if ( !isset($value['themestek-main-menu']['theme']) ) {
    $value['themestek-main-menu']['theme'] = 'optico_theme_settings'; // change my_custom_theme_key to the ID of your exported theme
  }

  return $value;
}
}
add_filter('default_option_megamenu_settings', 'themestek_megamenu_override_default_theme');

/**
 *  Updates Responsive Breakpoint in Max Mega Menu plugin 
 */
if( !function_exists('themestek_mmmenu_breakpoint') ){
function themestek_mmmenu_breakpoint( $options ){
	
	// Getting theme's breakpoint	
	$theme_breakpoint = ( $options['menu_breakpoint'] == 'custom' ) ? trim($options['menu_breakpoint-custom']) . 'px' : trim($options['menu_breakpoint']) . 'px' ;
	
	// Getting Max Mega Menu all themes so we can set breakpoint in all themes
	if( is_multisite() ){
		$megamenu_themes = get_site_option('megamenu_themes');
	} else {
		$megamenu_themes = get_option('megamenu_themes');
	}
	
	// Setting default options
	if( empty($megamenu_themes) ){
		$megamenu_themes = array (
			'optico_theme_settings' => 
				array (
				'title' => 'Optico Theme Settings',
				'arrow_up' => 'dash-f343',
				'arrow_down' => 'dash-f347',
				'arrow_left' => 'dash-f341',
				'arrow_right' => 'dash-f345',
				'line_height' => '2.2',
				'z_index' => '999',
				'shadow_horizontal' => '0px',
				'shadow_vertical' => '0px',
				'shadow_blur' => '5px',
				'shadow_spread' => '0px',
				'shadow_color' => 'rgba(0, 0, 0, 0.1)',
				'resets' => 'on',
				'menu_item_link_height' => '100px',
				'container_background_from' => 'rgba(34, 34, 34, 0)',
				'container_background_to' => 'rgba(34, 34, 34, 0)',
				'container_padding_top' => '0px',
				'container_padding_right' => '0px',
				'container_padding_bottom' => '0px',
				'container_padding_left' => '0px',
				'container_border_radius_top_left' => '0px',
				'container_border_radius_top_right' => '0px',
				'container_border_radius_bottom_right' => '0px',
				'container_border_radius_bottom_left' => '0px',
				'menu_item_align' => 'left',
				'menu_item_background_from' => 'rgba(0,0,0,0)',
				'menu_item_background_to' => 'rgba(0,0,0,0)',
				'menu_item_background_hover_from' => 'rgba(255, 255, 255, 0)',
				'menu_item_background_hover_to' => 'rgba(255, 255, 255, 0)',
				'menu_item_spacing' => '0px',
				'menu_item_link_color' => '#ffffff',
				'menu_item_link_font_size' => '14px',
				'menu_item_link_font' => 'inherit',
				'menu_item_link_text_transform' => 'none',
				'menu_item_link_weight' => 'normal',
				'menu_item_link_text_decoration' => 'none',
				'menu_item_link_text_align' => 'left',
				'menu_item_link_color_hover' => 'rgb(217, 55, 20)',
				'menu_item_link_weight_hover' => 'normal',
				'menu_item_link_text_decoration_hover' => 'none',
				'menu_item_link_padding_top' => '0px',
				'menu_item_link_padding_right' => '15px',
				'menu_item_link_padding_bottom' => '0px',
				'menu_item_link_padding_left' => '15px',
				'menu_item_border_color' => '#fff',
				'menu_item_border_top' => '0px',
				'menu_item_border_right' => '0px',
				'menu_item_border_bottom' => '0px',
				'menu_item_border_left' => '0px',
				'menu_item_border_color_hover' => '#fff',
				'menu_item_link_border_radius_top_left' => '0px',
				'menu_item_link_border_radius_top_right' => '0px',
				'menu_item_link_border_radius_bottom_right' => '0px',
				'menu_item_link_border_radius_bottom_left' => '0px',
				'menu_item_divider_color' => 'rgba(255, 255, 255, 0.1)',
				'menu_item_divider_glow_opacity' => '0.1',
				'panel_background_from' => 'rgb(34, 34, 34)',
				'panel_background_to' => 'rgb(34, 34, 34)',
				'panel_width' => '100%',
				'panel_inner_width' => '100%',
				'panel_padding_top' => '10px',
				'panel_padding_right' => '10px',
				'panel_padding_bottom' => '10px',
				'panel_padding_left' => '10px',
				'panel_border_color' => '#fff',
				'panel_border_top' => '0px',
				'panel_border_right' => '0px',
				'panel_border_bottom' => '0px',
				'panel_border_left' => '0px',
				'panel_border_radius_top_left' => '0px',
				'panel_border_radius_top_right' => '0px',
				'panel_border_radius_bottom_right' => '0px',
				'panel_border_radius_bottom_left' => '0px',
				'panel_widget_padding_top' => '15px',
				'panel_widget_padding_right' => '15px',
				'panel_widget_padding_bottom' => '15px',
				'panel_widget_padding_left' => '15px',
				'panel_header_color' => 'rgb(255, 255, 255)',
				'panel_header_font_size' => '16px',
				'panel_header_font' => 'inherit',
				'panel_header_text_transform' => 'uppercase',
				'panel_header_font_weight' => 'bold',
				'panel_header_text_decoration' => 'none',
				'panel_header_padding_top' => '0px',
				'panel_header_padding_right' => '0px',
				'panel_header_padding_bottom' => '10px',
				'panel_header_padding_left' => '0px',
				'panel_header_margin_top' => '0px',
				'panel_header_margin_right' => '0px',
				'panel_header_margin_bottom' => '0px',
				'panel_header_margin_left' => '0px',
				'panel_header_border_color' => '#555',
				'panel_header_border_top' => '0px',
				'panel_header_border_right' => '0px',
				'panel_header_border_bottom' => '0px',
				'panel_header_border_left' => '0px',
				'panel_font_color' => 'rgb(255, 255, 255)',
				'panel_font_size' => '14px',
				'panel_font_family' => 'inherit',
				'panel_second_level_font_color' => '#555',
				'panel_second_level_font_size' => '14px',
				'panel_second_level_font' => 'inherit',
				'panel_second_level_text_transform' => 'none',
				'panel_second_level_font_weight' => 'inherit',
				'panel_second_level_text_decoration' => 'none',
				'panel_second_level_font_color_hover' => 'rgb(217, 55, 20)',
				'panel_second_level_font_weight_hover' => 'inherit',
				'panel_second_level_text_decoration_hover' => 'none',
				'panel_second_level_background_hover_from' => 'rgba(0,0,0,0)',
				'panel_second_level_background_hover_to' => 'rgba(0,0,0,0)',
				'panel_second_level_padding_top' => '10px',
				'panel_second_level_padding_right' => '10px',
				'panel_second_level_padding_bottom' => '10px',
				'panel_second_level_padding_left' => '10px',
				'panel_second_level_margin_top' => '0px',
				'panel_second_level_margin_right' => '0px',
				'panel_second_level_margin_bottom' => '0px',
				'panel_second_level_margin_left' => '0px',
				'panel_second_level_border_color' => '#555',
				'panel_second_level_border_top' => '0px',
				'panel_second_level_border_right' => '0px',
				'panel_second_level_border_bottom' => '0px',
				'panel_second_level_border_left' => '0px',
				'panel_third_level_font_color' => '#666',
				'panel_third_level_font_size' => '14px',
				'panel_third_level_font' => 'inherit',
				'panel_third_level_text_transform' => 'none',
				'panel_third_level_font_weight' => 'normal',
				'panel_third_level_text_decoration' => 'none',
				'panel_third_level_font_color_hover' => 'rgb(217, 55, 20)',
				'panel_third_level_font_weight_hover' => 'normal',
				'panel_third_level_text_decoration_hover' => 'none',
				'panel_third_level_background_hover_from' => 'rgba(0,0,0,0)',
				'panel_third_level_background_hover_to' => 'rgba(0,0,0,0)',
				'panel_third_level_padding_top' => '0px',
				'panel_third_level_padding_right' => '0px',
				'panel_third_level_padding_bottom' => '0px',
				'panel_third_level_padding_left' => '0px',
				'flyout_menu_background_from' => 'rgb(34, 34, 34)',
				'flyout_menu_background_to' => 'rgb(34, 34, 34)',
				'flyout_width' => '250px',
				'flyout_padding_top' => '10px',
				'flyout_padding_right' => '0px',
				'flyout_padding_bottom' => '10px',
				'flyout_padding_left' => '0px',
				'flyout_border_color' => '#ffffff',
				'flyout_border_top' => '0px',
				'flyout_border_right' => '0px',
				'flyout_border_bottom' => '0px',
				'flyout_border_left' => '0px',
				'flyout_border_radius_top_left' => '0px',
				'flyout_border_radius_top_right' => '0px',
				'flyout_border_radius_bottom_right' => '0px',
				'flyout_border_radius_bottom_left' => '0px',
				'flyout_background_from' => '#f1f1f1',
				'flyout_background_to' => '#f1f1f1',
				'flyout_background_hover_from' => '#dddddd',
				'flyout_background_hover_to' => '#dddddd',
				'flyout_link_height' => '20px',
				'flyout_link_padding_top' => '10px',
				'flyout_link_padding_right' => '25px',
				'flyout_link_padding_bottom' => '10px',
				'flyout_link_padding_left' => '25px',
				'flyout_link_color' => 'rgb(255, 255, 255)',
				'flyout_link_size' => '14px',
				'flyout_link_family' => 'inherit',
				'flyout_link_text_transform' => 'none',
				'flyout_link_weight' => 'normal',
				'flyout_link_text_decoration' => 'none',
				'flyout_link_color_hover' => 'rgb(217, 55, 20)',
				'flyout_link_weight_hover' => 'normal',
				'flyout_link_text_decoration_hover' => 'none',
				'flyout_menu_item_divider_color' => 'rgba(255, 255, 255, 0.1)',
				'responsive_breakpoint' => '1200px',
				'toggle_background_from' => '#222',
				'toggle_background_to' => '#222',
				'toggle_bar_height' => '40px',
				'mobile_columns' => '2',
				'mobile_background_from' => '#222',
				'mobile_background_to' => '#222',
				'mobile_menu_item_height' => '40px',
				'custom_css' => '#{$wrap} #{$menu} {
				/** Custom styles should be added below this line **/
				}
				#{$wrap} {
				clear: both;
				}',
				'shadow' => 'off',
				'transitions' => 'off',
				'menu_item_divider' => 'off',
				'menu_item_highlight_current' => 'off',
				'flyout_menu_item_divider' => 'off',
				'disable_mobile_toggle' => 'off',
			),
			'default' => 
				array (
				'title' => 'Default',
				'arrow_up' => 'dash-f142',
				'arrow_down' => 'dash-f140',
				'arrow_left' => 'dash-f141',
				'arrow_right' => 'dash-f139',
				'line_height' => '1.7',
				'z_index' => '999',
				'shadow_horizontal' => '0px',
				'shadow_vertical' => '0px',
				'shadow_blur' => '5px',
				'shadow_spread' => '0px',
				'shadow_color' => 'rgba(0, 0, 0, 0.1)',
				'menu_item_link_height' => '40px',
				'container_background_from' => '#222',
				'container_background_to' => '#222',
				'container_padding_top' => '0px',
				'container_padding_right' => '0px',
				'container_padding_bottom' => '0px',
				'container_padding_left' => '0px',
				'container_border_radius_top_left' => '0px',
				'container_border_radius_top_right' => '0px',
				'container_border_radius_bottom_right' => '0px',
				'container_border_radius_bottom_left' => '0px',
				'menu_item_align' => 'left',
				'menu_item_background_from' => 'rgba(0,0,0,0)',
				'menu_item_background_to' => 'rgba(0,0,0,0)',
				'menu_item_background_hover_from' => '#333',
				'menu_item_background_hover_to' => '#333',
				'menu_item_spacing' => '0px',
				'menu_item_link_color' => '#ffffff',
				'menu_item_link_font_size' => '14px',
				'menu_item_link_font' => 'inherit',
				'menu_item_link_text_transform' => 'none',
				'menu_item_link_weight' => 'normal',
				'menu_item_link_text_decoration' => 'none',
				'menu_item_link_text_align' => 'left',
				'menu_item_link_color_hover' => '#ffffff',
				'menu_item_link_weight_hover' => 'normal',
				'menu_item_link_text_decoration_hover' => 'none',
				'menu_item_link_padding_top' => '0px',
				'menu_item_link_padding_right' => '10px',
				'menu_item_link_padding_bottom' => '0px',
				'menu_item_link_padding_left' => '10px',
				'menu_item_border_color' => '#fff',
				'menu_item_border_top' => '0px',
				'menu_item_border_right' => '0px',
				'menu_item_border_bottom' => '0px',
				'menu_item_border_left' => '0px',
				'menu_item_border_color_hover' => '#fff',
				'menu_item_link_border_radius_top_left' => '0px',
				'menu_item_link_border_radius_top_right' => '0px',
				'menu_item_link_border_radius_bottom_right' => '0px',
				'menu_item_link_border_radius_bottom_left' => '0px',
				'menu_item_divider_color' => 'rgba(255, 255, 255, 0.1)',
				'menu_item_divider_glow_opacity' => '0.1',
				'panel_background_from' => '#f1f1f1',
				'panel_background_to' => '#f1f1f1',
				'panel_width' => '100%',
				'panel_inner_width' => '100%',
				'panel_padding_top' => '0px',
				'panel_padding_right' => '0px',
				'panel_padding_bottom' => '0px',
				'panel_padding_left' => '0px',
				'panel_border_color' => '#fff',
				'panel_border_top' => '0px',
				'panel_border_right' => '0px',
				'panel_border_bottom' => '0px',
				'panel_border_left' => '0px',
				'panel_border_radius_top_left' => '0px',
				'panel_border_radius_top_right' => '0px',
				'panel_border_radius_bottom_right' => '0px',
				'panel_border_radius_bottom_left' => '0px',
				'panel_widget_padding_top' => '15px',
				'panel_widget_padding_right' => '15px',
				'panel_widget_padding_bottom' => '15px',
				'panel_widget_padding_left' => '15px',
				'panel_header_color' => '#555',
				'panel_header_font_size' => '16px',
				'panel_header_font' => 'inherit',
				'panel_header_text_transform' => 'uppercase',
				'panel_header_font_weight' => 'bold',
				'panel_header_text_decoration' => 'none',
				'panel_header_padding_top' => '0px',
				'panel_header_padding_right' => '0px',
				'panel_header_padding_bottom' => '5px',
				'panel_header_padding_left' => '0px',
				'panel_header_margin_top' => '0px',
				'panel_header_margin_right' => '0px',
				'panel_header_margin_bottom' => '0px',
				'panel_header_margin_left' => '0px',
				'panel_header_border_color' => '#555',
				'panel_header_border_top' => '0px',
				'panel_header_border_right' => '0px',
				'panel_header_border_bottom' => '0px',
				'panel_header_border_left' => '0px',
				'panel_font_color' => '#666',
				'panel_font_size' => '14px',
				'panel_font_family' => 'inherit',
				'panel_second_level_font_color' => '#555',
				'panel_second_level_font_size' => '16px',
				'panel_second_level_font' => 'inherit',
				'panel_second_level_text_transform' => 'uppercase',
				'panel_second_level_font_weight' => 'bold',
				'panel_second_level_text_decoration' => 'none',
				'panel_second_level_font_color_hover' => '#555',
				'panel_second_level_font_weight_hover' => 'bold',
				'panel_second_level_text_decoration_hover' => 'none',
				'panel_second_level_background_hover_from' => 'rgba(0,0,0,0)',
				'panel_second_level_background_hover_to' => 'rgba(0,0,0,0)',
				'panel_second_level_padding_top' => '0px',
				'panel_second_level_padding_right' => '0px',
				'panel_second_level_padding_bottom' => '0px',
				'panel_second_level_padding_left' => '0px',
				'panel_second_level_margin_top' => '0px',
				'panel_second_level_margin_right' => '0px',
				'panel_second_level_margin_bottom' => '0px',
				'panel_second_level_margin_left' => '0px',
				'panel_second_level_border_color' => '#555',
				'panel_second_level_border_top' => '0px',
				'panel_second_level_border_right' => '0px',
				'panel_second_level_border_bottom' => '0px',
				'panel_second_level_border_left' => '0px',
				'panel_third_level_font_color' => '#666',
				'panel_third_level_font_size' => '14px',
				'panel_third_level_font' => 'inherit',
				'panel_third_level_text_transform' => 'none',
				'panel_third_level_font_weight' => 'normal',
				'panel_third_level_text_decoration' => 'none',
				'panel_third_level_font_color_hover' => '#666',
				'panel_third_level_font_weight_hover' => 'normal',
				'panel_third_level_text_decoration_hover' => 'none',
				'panel_third_level_background_hover_from' => 'rgba(0,0,0,0)',
				'panel_third_level_background_hover_to' => 'rgba(0,0,0,0)',
				'panel_third_level_padding_top' => '0px',
				'panel_third_level_padding_right' => '0px',
				'panel_third_level_padding_bottom' => '0px',
				'panel_third_level_padding_left' => '0px',
				'flyout_menu_background_from' => '#f1f1f1',
				'flyout_menu_background_to' => '#f1f1f1',
				'flyout_width' => '150px',
				'flyout_padding_top' => '0px',
				'flyout_padding_right' => '0px',
				'flyout_padding_bottom' => '0px',
				'flyout_padding_left' => '0px',
				'flyout_border_color' => '#ffffff',
				'flyout_border_top' => '0px',
				'flyout_border_right' => '0px',
				'flyout_border_bottom' => '0px',
				'flyout_border_left' => '0px',
				'flyout_border_radius_top_left' => '0px',
				'flyout_border_radius_top_right' => '0px',
				'flyout_border_radius_bottom_right' => '0px',
				'flyout_border_radius_bottom_left' => '0px',
				'flyout_background_from' => '#f1f1f1',
				'flyout_background_to' => '#f1f1f1',
				'flyout_background_hover_from' => '#dddddd',
				'flyout_background_hover_to' => '#dddddd',
				'flyout_link_height' => '35px',
				'flyout_link_padding_top' => '0px',
				'flyout_link_padding_right' => '10px',
				'flyout_link_padding_bottom' => '0px',
				'flyout_link_padding_left' => '10px',
				'flyout_link_color' => '#666',
				'flyout_link_size' => '14px',
				'flyout_link_family' => 'inherit',
				'flyout_link_text_transform' => 'none',
				'flyout_link_weight' => 'normal',
				'flyout_link_text_decoration' => 'none',
				'flyout_link_color_hover' => '#666',
				'flyout_link_weight_hover' => 'normal',
				'flyout_link_text_decoration_hover' => 'none',
				'flyout_menu_item_divider_color' => 'rgba(255, 255, 255, 0.1)',
				'responsive_breakpoint' => '600px',
				'toggle_background_from' => '#222',
				'toggle_background_to' => '#222',
				'toggle_bar_height' => '40px',
				'mobile_columns' => '2',
				'mobile_background_from' => '#222',
				'mobile_background_to' => '#222',
				'mobile_menu_item_height' => '40px',
				'custom_css' => '/** Push menu onto new line **/
				#{$wrap} {
				clear: both;
				}',
				'shadow' => 'off',
				'transitions' => 'off',
				'resets' => 'off',
				'menu_item_divider' => 'off',
				'menu_item_highlight_current' => 'off',
				'flyout_menu_item_divider' => 'off',
				'disable_mobile_toggle' => 'off',
			),
		);
		
	}
	
	// Now changing breakpoint in Max Mega Menu themes if required
	$update_options = false;
	if( array($megamenu_themes) ){
		foreach( $megamenu_themes as $theme_id=>$settings ){
			if( $settings['responsive_breakpoint'] != $theme_breakpoint ){
				$megamenu_themes[$theme_id]['responsive_breakpoint'] = $theme_breakpoint;
				$update_options = true;
			}
			
		}
	}
	
	if( $update_options ){
		if( is_multisite() ){
			update_site_option('megamenu_themes', $megamenu_themes);
		} else {
			update_option('megamenu_themes', $megamenu_themes);
		}
		
		do_action( 'megamenu_after_save_settings' );
		do_action( 'megamenu_delete_cache' );
		
	}
	
	return $options;
	
}
}
add_filter( 'cs_validate_save', 'themestek_mmmenu_breakpoint' ); // On theme options save.. for CodeStar Framework only

/*
 *  Adding Image sizes
 */

if( !function_exists('themestek_image_sizes') ){
function themestek_image_sizes(){
		
	/* Fixed image sizes */
	
	// 800x800
	add_image_size( 'themestek-img-800x800', '800', '800', true );
	
	// 800x508
	add_image_size( 'themestek-img-800x508', '800', '508', true );
	
	// 800x715
	add_image_size( 'themestek-img-800x715', '800', '715', true );
	
	// 800x740
	add_image_size( 'themestek-img-800x740', '800', '740', true );
	
	// 800x650
	add_image_size( 'themestek-img-800x650', '800', '650', true );
	
	// 600x785
	add_image_size( 'themestek-img-600x785', '600', '785', true );
	
}
}
add_action( 'init', 'themestek_image_sizes' );

/**
 *  Wrap "Read More" link with some div so we can design it
 */
if( !function_exists('themestek_wrap_more_link') ){
function themestek_wrap_more_link($more) {
	return '<span class="more-link-wrapper">'.$more.'</span>';
}
}
add_filter('the_content_more_link','themestek_wrap_more_link');

// Slider Revoluiton Theme integration
add_action( 'init', 'themestek_set_rs_as_theme' );
function themestek_set_rs_as_theme() {
	// Setting options to hide Revoluiton Slider message
	if(get_option('revSliderAsTheme') != 'true'){
		update_option('revSliderAsTheme', 'true');
	}
	if(get_option('revslider-valid-notice') != 'false'){
		update_option('revslider-valid-notice', 'false');
	}
	if( function_exists('set_revslider_as_theme') ){
		set_revslider_as_theme();
	}
}

/**
 *  Page or Post: This will override the default "skin color" set in the page directly.
 */
if( !function_exists('themestek_single_skin_color') ){
function themestek_single_skin_color(){
	
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	if( $post_id ){
		//global $post;
		global $optico_theme_options;
		$page_meta = get_post_meta( $post_id, '_themestek_metabox_group', true );
		if( !empty($page_meta['skincolor']) ){
			$optico_theme_options['skincolor'] = esc_attr($page_meta['skincolor']);
		}
	}
}
}
add_action('wp','themestek_single_skin_color');

/**
 *  Override Theme Options value from single page/post/cpt. This is useful for demo purpose and for other users too.
 */
if( !function_exists('themestek_toptions_override') ){
function themestek_toptions_override(){
	
	if( is_singular() ){
		
		$page_meta = get_post_meta( get_the_ID() ); // fetching all post meta
		
		if( !empty($page_meta) && is_array($page_meta) && count($page_meta)>0 ){
			
			foreach( $page_meta as $meta=>$value ){
				
				// Define prefix here
				$prefix = 'ts_themeoptions_';
				
				if( substr($meta, 0, strlen($prefix) ) == $prefix ){
					
					// now process to get all theme options ID 
					if( !isset($all_options) ){
						// getting list of theme options
						if( !isset($ts_framework_options) ){
							include( get_template_directory() . '/cs-framework-override/config/framework-options.php' );
						}
						$all_options = array();
						foreach( $ts_framework_options as $key=>$val ){
							if( !empty($val['fields']) ){
								foreach( $val['fields'] as $field ){
									if( !empty($field['id']) ){
										$all_options[] = $field['id'];
									}
								}
							}
						}
					}
					// End now
					
					// Now checking if any value is available and overriding it
					global $optico_theme_options;
					$meta_name = substr( $meta, strlen($prefix) );
					
					if( in_array($meta_name, $all_options) ){
						if( themestek_is_json($value[0]) && !is_numeric($value[0]) ){
							// array
							$final_val    = json_decode($value[0]);
							$final_val    = (array) $final_val;
							$original_val = ( isset($optico_theme_options[$meta_name]) ) ? $optico_theme_options[$meta_name] : array() ;
							$final_val    = array_merge( $original_val, $final_val );
						} else {
							// string
							$final_val = $value[0];
						}
						$optico_theme_options[$meta_name] = $final_val;
					}
					
				}
			}  // foreach
			
		}  // if
		
	}
	
}
}
add_action('wp','themestek_toptions_override');

/**
 *  Checking if Json code in the string
 */
if( !function_exists('themestek_is_json') ){
function themestek_is_json($string='') {
	json_decode($string);
	return (json_last_error() == JSON_ERROR_NONE);
}
}

/**
 *  Custom Google Analytics code in footer
 */
add_action( 'wp_footer', 'themestek_analytics_code' );
if( !function_exists('themestek_analytics_code') ){
function themestek_analytics_code(){
	
	// Custom JS code
	$custom_js_code = themestek_get_option('custom_js_code');
	
	// Google Analytics code
	$customhtml_bodyend = themestek_get_option('customhtml_bodyend');
	
	// Output
	if( !empty($custom_js_code) ){
		echo trim('<script> "use strict"; ' . $custom_js_code . '</script>');
	}
	if( !empty($customhtml_bodyend) ){
		echo trim($customhtml_bodyend);
	}
	
}
}

/**
 *  Custom Google Analytics code in footer
 */
add_action( 'wp_head', 'themestek_inline_css_header_code' );
if( !function_exists('themestek_inline_css_header_code') ){
function themestek_inline_css_header_code(){
	
	global $themestek_inline_css;
	
	// For Widget BG color and image
	global $wp_registered_sidebars;
	ob_start();
	foreach( $wp_registered_sidebars as $sidebar_id=>$sidebar_details ){
		dynamic_sidebar($sidebar_id);
	}
	ob_get_clean();

	global $post;
	if( !empty($post->post_content) ){
		$content = $post->post_content;
		if( shortcode_exists('wpdm_reg_form') ){
			$content = str_replace( '[wpdm_reg_form]', '', $content);
		}
		do_shortcode( $content );
	}
	
	echo '<!-- Inline CSS Start -->';
	if( !empty($themestek_inline_css) ){
		echo '<style type="text/css">';
		echo trim($themestek_inline_css);
		echo '</style>';
	}
	echo '<!-- Inline CSS End -->';
	
}
}

/**
 *  Custom code in HEAD tag
 */
add_action( 'wp_head', 'themestek_head_code' );
if( !function_exists('themestek_head_code') ){
function themestek_head_code(){
	
	// Google Analytics code
	$customhtml_head = themestek_get_option('customhtml_head');
	
	// Output
	if( !empty($customhtml_head) ){
		echo trim($customhtml_head);
	}
	
}
}

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Optico 1.1
 */
if( !function_exists('optico_javascript_detection') ){
function optico_javascript_detection() {
	
	$yith_js_code = '';
	$yith_wishlist_page_id = get_option('yith_wcwl_wishlist_page_id');
	
	if( !empty($yith_wishlist_page_id) ){
		$url = get_permalink($yith_wishlist_page_id);
		
		$yith_js_code .= 'var IMAGEURL = "' . get_template_directory_uri() . '/images";';
		
		$yith_js_code .= 'var MGK_ADD_TO_WISHLIST_SUCCESS_TEXT = \'' . esc_attr__('Product successfully added to wishlist.', 'optico') . ' <a href="' . esc_url($url) . '">' . esc_attr__('Browse Wishlist', 'optico') . '</a>\';';
		
		$yith_js_code .= 'var MGK_ADD_TO_WISHLIST_EXISTS_TEXT = \'' . esc_attr__('The product is already in the wishlist!', 'optico') . ' <a href="' . esc_url($url) . '">' . esc_attr__('Browse Wishlist', 'optico') . '</a>\';';
		
		$yith_js_code .= 'var MGK_PRODUCT_PAGE = false;';

	}
	
	echo "<script> 'use strict'; (function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);" . $yith_js_code . "</script>\n";
}
}
add_action( 'wp_head', 'optico_javascript_detection', 0 );

/**
 * Flush out the transients used in {@see optico_categorized_blog()}.
 *
 * @since Optico 1.0
 */
if( !function_exists('optico_category_transient_flusher') ){
function optico_category_transient_flusher() {
	delete_transient( 'optico_categories' );
}
}
add_action( 'edit_category', 'optico_category_transient_flusher' );
add_action( 'save_post',     'optico_category_transient_flusher' );

/**
 *  Add inline Dynamic Style code
 */
if( !function_exists('themestek_add_inline_dynamic_css') ){
function themestek_add_inline_dynamic_css(){
	$optico_theme_options = get_option('optico_theme_options');
	$css = '';
	
	// if plugin active so we will add theme-style.php code automatically
	if( !function_exists('tmte_load_dynamic_style') ){
		// Fetching theme-style.php output and store in a variable
		ob_start();
		include get_template_directory().'/css/theme-style.php';
		$css    = ob_get_clean();
	}

	// Singuler of shop page
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	// Topbar custom css stylesheet
	$css .= themestek_topbar_inline_style();
	
	// Titlebar custom css stylesheet
	if( $post_id ){
		$css .= themestek_titlebar_inline_style();
	}
	
	// Minify CSS style
	if( isset( $optico_theme_options['minify'] ) && esc_attr($optico_theme_options['minify'])==true && function_exists('themestek_minify_css') ){
		$css = themestek_minify_css( $css );
	}
	
	// optico main style
	wp_add_inline_style( 'optico-responsive-style', $css );
	
}
}
add_action( 'wp_enqueue_scripts', 'themestek_add_inline_dynamic_css', 20 );

/**
 *  Breakpoint variable in head and ajaxurl
 */
if( !function_exists('themestek_breakpoint_js_vars') ){
function themestek_breakpoint_js_vars() {
	$breakpoint        = themestek_get_option('menu_breakpoint');
	$breakpoint_custom = themestek_get_option('menu_breakpoint-custom');
	$breakpoint        = ( $breakpoint=='custom' ) ? $breakpoint_custom : $breakpoint ;
	
	wp_localize_script( 'optico-script', 'ts_breakpoint',
		esc_attr($breakpoint)
	);
	wp_localize_script( 'optico-script', 'ajaxurl',
		admin_url( 'admin-ajax.php' )
	);
}
}
add_action( 'wp_enqueue_scripts', 'themestek_breakpoint_js_vars', 20 );

add_filter('wp_list_categories', 'themestek_cat_count_span');
if( !function_exists('themestek_cat_count_span') ){
function themestek_cat_count_span($links) {
	$links = str_replace('</a> (', '</a> <span>', $links);
	$links = str_replace(')', '</span>', $links);
	return $links;
}
}

/**
 *  Register Google Fonts for footer
*/
if( !function_exists('themestek_footer_google_fonts_url') ){
function themestek_footer_google_fonts_url() {
	global $ts_global_footer_gfonts;
	$fontline = '';
    $font_url = '';
	
	if( !empty($ts_global_footer_gfonts) ){
		$fontline = array();
		if( is_array($ts_global_footer_gfonts) && count($ts_global_footer_gfonts)>0 ){
			foreach($ts_global_footer_gfonts as $gfonts=>$weight){
				$weight     = implode( ',', $weight );
				if( $weight == 'regular' || $weight == '400' ){
					$weight = '';
				}
				
				if( !empty($weight) ){
					$fontline[] =  $gfonts.':'.$weight;
				} else {
					$fontline[] =  $gfonts;
				}
			}
		}
		$fontline = implode( '|', $fontline );
	}
	
	/***/
	if( !empty($fontline) ){
		$font_url = add_query_arg( 'family', $fontline, "//fonts.googleapis.com/css" );
	}
    return $font_url;
}
}

if( !function_exists('themestek_enqueue_footer_google_fonts') ){
function themestek_enqueue_footer_google_fonts() {
    wp_enqueue_style( 'ts-footer-gfonts', themestek_footer_google_fonts_url(), array(), '1.0.0' );
}
}
// This need to be at footer as the content will add more google fonts.
add_action( 'wp_footer', 'themestek_enqueue_footer_google_fonts' );

/**
 *  Single: Body Background
 */
if( !function_exists('themestek_single_body_background') ){
function themestek_single_body_background(){
	$css = '';
	
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	if( $post_id ){
		$single_meta = get_post_meta( $post_id, '_themestek_metabox_group' , true );
		
		if( isset($single_meta['custom_background_switcher']) && $single_meta['custom_background_switcher']==true && !empty($single_meta['custom_background']) ){
			$css = themestek_get_background_css( 'body', $single_meta['custom_background'], array('output_bglayer') );
			// Add CSS code in page
			wp_add_inline_style( 'optico-responsive-style', $css );
		}
	}
}
}
add_action( 'wp_enqueue_scripts', 'themestek_single_body_background', 18 );

if ( ! function_exists( 'optico_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @since Optico 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function optico_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( esc_attr__( 'Continue reading %s', 'optico' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'optico_excerpt_more' );
endif;

/*
 * Add some special classes on <body> tag.
 */
if( !function_exists('themestek_body_classes') ){
function themestek_body_classes($bodyClass){
	global $optico_theme_options;
	$hClass = '';
	
	// All ROW to 20px 
	if( is_singular() ){
		$singular_meta = get_post_meta( get_the_ID(), 'themestek_page_row_settings', true );
		if( isset($singular_meta['row_lower_padding']) && $singular_meta['row_lower_padding']==true ){
			$bodyClass[] = 'ts-all-row-20px';
		}
	}
	
	// Breadcrumb position in Titlebar
	if( isset($optico_theme_options['titlebar_view']) && 
		($optico_theme_options['titlebar_view'] == 'default' || $optico_theme_options['titlebar_view'] == 'allleft' || $optico_theme_options['titlebar_view'] == 'allright' ) &&
		isset($optico_theme_options['breadcrumb_on_bottom']) &&
		$optico_theme_options['breadcrumb_on_bottom'] == true
	){
		$bodyClass[] = 'ts-titlebar-bcrumb-bottom';
	}
	
	// check if dark background set for container.
	if( !empty($optico_theme_options['headerstyle']) ){
		$bodyClass[] = 'ts-headerstyle-'.esc_attr($optico_theme_options['headerstyle']);
	}
	
	// check if dark background set for container.
	if( isset($optico_theme_options['inner_background']['background-color']) && trim($optico_theme_options['inner_background']['background-color'])!='' && ts_check_dark_color(esc_attr($optico_theme_options['inner_background']['background-color'])) ){
		$bodyClass[] = 'ts-dark-layout';
	}
	
	// show/hide separator line between links in dropdown menu
	if( isset($optico_theme_options['dropdown_menu_separator']) && trim($optico_theme_options['dropdown_menu_separator'])=='0' ){
		$bodyClass[] = 'ts-dropmenu-hide-sepline';
	}
	
	// Sticky Fotoer ON/OFF
	if( isset($optico_theme_options['stickyfooter']) && $optico_theme_options['stickyfooter']==true ){
		$bodyClass[] = 'themestek-sticky-footer';
	}
	
	// Single Portfolio
	if( is_singular('portfolio') ){
		$portfolioView        = esc_attr($optico_theme_options['portfolio_viewstyle']); // Global view
		$portfolioView_single = esc_attr(get_post_meta( get_the_ID(), '_themestek_portfolio_view_viewstyle', true)); // Single portfolio view
		if( is_array($portfolioView_single) ){ $portfolioView_single = $portfolioView_single[0]; }
		if( trim($portfolioView_single)!='' && trim($portfolioView_single)!='global' ){
			$portfolioView = $portfolioView_single;
		}
		$bodyClass[] = sanitize_html_class('themestek-portfolio-view-'.$portfolioView);
	}
	
	// Boxed / Wide
	if( isset($optico_theme_options['layout']) && trim($optico_theme_options['layout'])!='' ){
		if( $optico_theme_options['layout']=='boxed' || $optico_theme_options['layout']=='framed' || $optico_theme_options['layout']=='rounded' ){
			$bodyClass[] = 'themestek-boxed';
		}
		if( $optico_theme_options['layout']=='framed' || $optico_theme_options['layout']=='rounded' ){
			$bodyClass[] = 'themestek-boxed-'.sanitize_html_class($optico_theme_options['layout']);
		}
		
		$bodyClass[] = sanitize_html_class( 'themestek-'.trim($optico_theme_options['layout']));
		if( $optico_theme_options['layout']=='fullwide' ){
			if( isset($optico_theme_options['full_wide_elements']['content']) && $optico_theme_options['full_wide_elements']['content']=='1' ){
				$bodyClass[] = 'ts-layout-container-full';
			}
		}
		
	} else {
		$bodyClass[] = 'themestek-wide';
	}
	
	$themestek_retina_logo = 'off';
	if( isset($optico_theme_options['logoimg_retina']['url']) && $optico_theme_options['logoimg_retina']['url']!=''){
		$themestek_retina_logo = 'on';
	}

	// Header Style
	$headerstyle        = '';
	$headerstyle_global = '';
	$headerstyle_page   = '';
	if( isset($optico_theme_options['headerstyle']) && trim($optico_theme_options['headerstyle'])!='' ){
		$headerstyle_global = sanitize_html_class($optico_theme_options['headerstyle']);
	}
	if( is_page() ){
		$headerstyle_page = trim(get_post_meta(get_the_ID(), 'headerstyle', true));
	}
	if( $headerstyle_page!='' ){
		$headerstyle = $headerstyle_page;
	} else {
		$headerstyle = $headerstyle_global;
	}
	
	if($headerstyle == 'classic-vertical' ){
		$bodyClass[] = 'header-' . $headerstyle;
	}
	
	switch( $headerstyle ){
		case '1':
		case '2':
		case '3':
		case '9':
			if( $headerstyle=='9' ){ $headerstyle='1 ts-header-invert'; }
			$hClass = 'themestek-header-style-'.trim($headerstyle);
			break;
		case '4':
		case '10':
			$overlayClass = ' ts-header-overlay';
			if( $headerstyle=='10' ){ $overlayClass.=' ts-header-invert'; }
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_themestek_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_themestek_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'themestek-header-style-1' . $overlayClass;
			break;
		case '5':
			$overlayClass = ' ts-header-overlay';
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_themestek_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_themestek_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'themestek-header-style-2' . $overlayClass;
			break;
		case '6':
			$overlayClass = ' ts-header-overlay';
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_themestek_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_themestek_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'themestek-header-style-3' . $overlayClass;
			break;
		case '7':
		case '8':
			$overlayClass = ' ts-header-overlay';
			if( $headerstyle=='8' ){ $overlayClass.=' ts-header-invert'; }
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_themestek_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_themestek_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'themestek-header-style-4' . $overlayClass;
			break;
	}
	
	if( !empty($hClass) ){
		$bodyClass[] = $hClass;
	}
	
	// Sidebar classes
	$sidebar = themestek_get_sidebar_info();
	if( $sidebar=='' || $sidebar=='no' ){
		// The page is full width
		$bodyClass[] = 'themestek-page-full-width';
	} else {
		// Sidebar class for border
		$bodyClass[] = sanitize_html_class( 'themestek-sidebar-true' );
		$bodyClass[] = sanitize_html_class( 'themestek-sidebar-'.$sidebar );
	}
	
	// Check if empty sidebar.. so we can add class in body to make the content area center and cover the sidebar area.
	$themestek_check_empty_sidebar = themestek_get_sidebar_info( 'count_widgets' );
	if( empty($themestek_check_empty_sidebar) ){
		$bodyClass[] = 'ts-empty-sidebar';
	}
	
	// Check if "Max Mega Menu" plugin is active
	if ( class_exists( 'Mega_Menu' ) ) {
		// plugin is activated
		$bodyClass[] = 'themestek-maxmegamenu-active';
	}
	
	// One Page website
	if( isset($optico_theme_options['one_page_site']) && $optico_theme_options['one_page_site']==true ){
		$bodyClass[] = 'themestek-one-page-site';
	}
	
	return $bodyClass;
}
}
add_filter('body_class', 'themestek_body_classes');

/*
 *  This is under construction message code
 */
if( !function_exists('themestek_uconstruction') ){
function themestek_uconstruction(){
	
	$uconstruction = themestek_get_option('uconstruction');
	
	if (!is_user_logged_in() && !is_admin() && isset($uconstruction) && esc_attr($uconstruction) == true ){
		
		// We are not sanitizing this as we are expecting any (html, CSS, JS) code here
		$uconstruction_html     = do_shortcode( themestek_get_option('uconstruction_html') );
		$uconstruction_title    = do_shortcode( themestek_get_option('uconstruction_title') );
		$uconstruction_css_code = themestek_get_option('uconstruction_css_code');
		$uconstruction_head     = '';
		
		if( !empty($uconstruction_title) ){
			$title_tag = 'title';
			$uconstruction_head .= '<' . $title_tag . '>' . $uconstruction_title . '</' . $title_tag . '>' . "\r\n";
		}
		
		// Background CSS
		$value = themestek_get_option('uconstruction_background'); // not escaping as value is array
		$css   = '';
		if ( ! empty( $value ) && is_array( $value ) ) {
			foreach ( $value as $key => $value ) {
				if ( ! empty( $value ) && $key != "media" ) {
					if ( $key == "image" ) {
						$css .= "background-image:url('" . esc_url($value) . "');";
					} else if ( $key == "color" ) {
						$css .= "background-color:" . esc_attr($value) . ";";
					} else if ( $key == "size" ) {
						$css .= "background-size:" . esc_attr($value) . ";";
					} else {
						if( $key!='imageid' ){
							$css .= 'background-' . esc_attr($key) . ":" . esc_attr($value) . ";";
						}
					}
				}
			}
		}
		if( $css!='' ){
			$css .= 'text-align:center;';
			$uconstruction_head .= '<style> body{'.$css.'} .stickylogo{display:none;} ' . $uconstruction_css_code . ' </style>';
		}
		
		$html_tag = 'html';
		$head_tag = 'head';
		$body_tag = 'body';
		
		// Final output
		$uconstruction_html_output = '
		<' . $html_tag . '>
			<' . $head_tag . '>
				' . $uconstruction_head . '
			</' . $head_tag . '>
			
			<' . $body_tag . '>
				' . $uconstruction_html . '
			</' . $body_tag . '>
			
		</' . $html_tag . '>
		';
		
		echo trim( $uconstruction_html_output );
		die();
		
	}
}
}
add_action('template_redirect', 'themestek_uconstruction');

/**
 * Setting limit to show number of Portfolios on Portfolio Category page
 */
if( !function_exists('themestek_number_of_posts_on_pcat') ){
function themestek_number_of_posts_on_pcat( $query ){
	$pfcat_show = themestek_get_option('pfcat_show');
	$pfcat_show = ( !empty($pfcat_show) ) ? esc_attr( $pfcat_show ) : '9' ;

	if( is_tax( 'ts-portfolio-category' ) && $query->is_main_query() ){
		$query->set('posts_per_page', $pfcat_show);
	}
	return $query;
}
}
add_filter('pre_get_posts', 'themestek_number_of_posts_on_pcat');

/**
 * Setting limit to show number of Portfolios on Portfolio Category page
 */
if( !function_exists('themestek_number_of_posts_on_teamgroup') ){
function themestek_number_of_posts_on_teamgroup( $query ){
	$teamcat_show = themestek_get_option('teamcat_show');
	$teamcat_show = ( !empty($teamcat_show) ) ? esc_attr( $teamcat_show ) : '9' ;
	
	if( is_tax( 'ts-team-group' ) && $query->is_main_query() ){
		$query->set('posts_per_page', $teamcat_show);
	}
	return $query;
}
}
add_filter('pre_get_posts', 'themestek_number_of_posts_on_teamgroup');

/**
 *  Search results page setup
 */
if( !function_exists('themestek_search_filter') ){
function themestek_search_filter( $query ) {
	
	if ( is_search() && !is_admin() && $query->is_main_query() && $query->is_search ){
		
		// by default we will show 10 posts
		$query->set( 'posts_per_page', get_option('posts_per_page') );
		
		$post_type = get_query_var('post_type');
		
		if ( empty($_GET['post_type']) ) {
			$query->set( 'post_type', 'post' );
			$post_type = 'post';
			
		} else if ( isset($_GET['post_type']) && $_GET['post_type']=='page' ) {
			$query->set( 'post_type', 'page' );
			$post_type = 'page';
			
		}
		
		if( !empty( $post_type ) ){
			
			switch( $post_type ){
				case 'ts-portfolio':
				case 'ts-team-member':
				case 'product':
				case 'tribe_events':
					$query->set( 'posts_per_page', 9 );
					break;
				case 'page':
					$query->set( 'posts_per_page', 20 );
					break;
			}
		}
	}
}
}
add_filter('pre_get_posts','themestek_search_filter');

/** Post Like ajax **/
add_action('wp_ajax_themestek-portfolio-likes', 'themestek_ajax_callback' );
add_action('wp_ajax_nopriv_themestek-portfolio-likes', 'themestek_ajax_callback' );

function themestek_ajax_callback(){
	if(isset($_POST['likes_id'])){
		$post_id = str_replace('pid-', '', $_POST['likes_id']);
		echo themestek_update_like( $post_id );
	}
	exit;
}

/**
 *  Reset LIKE counter
 */
function ts_pf_reset_like(){
    $screen = get_current_screen();
    if ( $screen->post_type == 'ts-portfolio' && isset($_GET['action']) && $_GET['action']=='edit' && !isset($_GET['taxonomy']) ){
        global $post;
        $postID = $_GET['post'];
        $resetVal = get_post_meta($postID, 'themestek_portfolio_like' ,true );

        if( $resetVal==true ){
            // Do reset processs now
            update_post_meta($postID, 'themestek_likes' , '0' ); // Setting ZERO
            update_post_meta($postID, 'themestek_portfolio_like' ,'' ); // Removing checkbox
        }
    }
    
}
add_action('current_screen', 'ts_pf_reset_like');

function themestek_update_like( $post_id ){
	if(!is_numeric($post_id)) return;

	$return = '';
	$likes = get_post_meta($post_id, 'themestek_likes', true);
	if(!$likes){ $likes = 0; }
	$likes++;
	update_post_meta($post_id, 'themestek_likes', $likes);
	setcookie('themestek_likes_'.esc_attr($post_id), esc_attr($post_id), time()*20, '/');
	return '<i class="tsicon-fa-heart"></i> ' . esc_attr($likes) . '</i>';
	
}

// WooCommerce: Ensure cart contents update when products are added to the cart via AJAX
add_filter('woocommerce_add_to_cart_fragments', 'themestek_wc_header_add_to_cart_fragment');
if (!function_exists('themestek_wc_header_add_to_cart_fragment')) {
function themestek_wc_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?><span class="number-cart"><?php echo esc_attr($woocommerce->cart->cart_contents_count); ?></span><?php
	$fragments['span.number-cart'] = ob_get_clean();
	return $fragments;
}
}