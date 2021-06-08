<?php
global $optico_theme_options;

$search_input     = ( !empty($optico_theme_options['search_input']) ) ? esc_attr($optico_theme_options['search_input']) :  esc_attr_x("WRITE SEARCH WORD...", 'Search placeholder word', 'optico');
$searchform_title = ( isset($optico_theme_options['searchform_title']) ) ? esc_attr($optico_theme_options['searchform_title']) :  esc_attr_x("Hi, How Can We Help You?", 'Search form title word', 'optico');
$search_logo = ( isset($optico_theme_options['logoimg_search']['full-url']) ) ? '<div class="ts-search-logo"><img src="' . esc_url($optico_theme_options['logoimg_search']['full-url']) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></div>' : do_shortcode('[ts-logo]') ;
if( !empty($searchform_title) ){
	$searchform_title = '<div class="ts-form-title">' . $searchform_title . '</div>';
}

if( !empty( $optico_theme_options['header_search'] ) && $optico_theme_options['header_search'] == true ){
	?>

<div class="ts-search-overlay">
	<div class="ts-search-outer">
		<?php echo themestek_wp_kses($searchform_title); ?>
		<?php echo themestek_wp_kses($search_logo); ?>

		<div class="ts-icon-close"></div>

		<form method="get" class="ts-site-searchform" action="<?php echo esc_url( home_url() ); ?>">
			<input type="search" class="field searchform-s" name="s" placeholder="<?php echo esc_attr($search_input); ?>" />
			<button type="submit"><span class="ts-optico-icon-search"></span></button>
		</form>
	</div>
</div>
<?php } ?>