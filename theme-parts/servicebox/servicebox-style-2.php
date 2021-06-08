<?php
	// Getting data of the  Facts in Digits box
	global $ts_global_sbox_element_values;

	if( is_array($ts_global_sbox_element_values) ) :

?>

<div class="ts-servicebox ts-sbox-<?php echo themestek_sanitize_html_classes($ts_global_sbox_element_values['boxstyle']); ?> <?php echo themestek_sanitize_html_classes($ts_global_sbox_element_values['main-class']); ?>">

	<div class="ts-sbox-icon">
		<?php echo themestek_wp_kses($ts_global_sbox_element_values['icon_html'], 'sbox_icon'); ?>
	</div>

	<div class="ts-sbox-contents">
		<?php echo themestek_wp_kses( $ts_global_sbox_element_values['heading_html'] ); ?>
	</div><!-- .ts-sbox-contents -->

</div>

<?php

	endif;

	// Resetting data of the Facts in Digits box
	$ts_global_sbox_element_values = '';
?>