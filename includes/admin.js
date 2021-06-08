/**
 *  Admin custom JS file
 */

"use strict";
 
// Header Style - Change options based on selected header style on click 
function ts_header_style_change_triggers(){
	
	"use strict";
	
	// Default value
	var topbar_bg_color					= 'skincolor';
	var mainmenufont_color				= '#313131';
	var mainmenu_active_link_color		= 'skin';
	var header_search					= false;
	var header_text						= '';
	
	var header_btn_text						= '';
	var header_btn_link						= '';
	
	var sticky_header_bg_color			= 'white';
	var stickymainmenufontcolor_color	= '#313131';
	var topbar_text_color				= 'white';
	var header_bg_color					= 'white';
	var titlebar_height					= '300';
	var titlebar_bg_color				= 'grey';

	jQuery('input[name="optico_theme_options[headerstyle]"]').change(function() {
		if (this.value == 'classic') {
			jQuery('input[name="optico_theme_options[show_topbar]"]').prop('checked', true);  // Show topbar
			jQuery('select[name="optico_theme_options[topbar_bg_color]"]').val(topbar_bg_color).change();
			jQuery('input[name="optico_theme_options[mainmenufont][color]"').iris('color', mainmenufont_color);  // 
			jQuery('select[name="optico_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change();
			jQuery('input[name="optico_theme_options[header_search]"]').prop('checked', true);
			jQuery('textarea[name="optico_theme_options[header_text]"]').val(header_text);
			jQuery('input[name="optico_theme_options[header_btn][header_btn_text]"]').val('APPOINTMENT');
			jQuery('input[name="optico_theme_options[header_btn][header_btn_link]"]').val('#');
			jQuery('select[name="optico_theme_options[sticky_header_bg_color]"]').val(sticky_header_bg_color).change();
			jQuery('input[name="optico_theme_options[stickymainmenufontcolor]"').iris('color', stickymainmenufontcolor_color);  // 
			jQuery('select[name="optico_theme_options[topbar_text_color]"]').val(topbar_text_color).change();
			jQuery('select[name="optico_theme_options[header_bg_color]"]').val(header_bg_color).change();
			jQuery('input[name="optico_theme_options[titlebar_height]"]').val(titlebar_height);
			jQuery('select[name="optico_theme_options[titlebar_bg_color]"]').val(titlebar_bg_color).change();
			
			themestek_change_logo();
			
		} else if (this.value == 'classic-overlay') {
			jQuery('input[name="optico_theme_options[show_topbar]"]').prop('checked', true);  // Hide topbar
			jQuery('select[name="optico_theme_options[topbar_bg_color]"]').val('white').change();
			jQuery('input[name="optico_theme_options[mainmenufont][color]"').iris('color', '#fff');  // 
			jQuery('select[name="optico_theme_options[mainmenu_active_link_color]"]').val('custom').change();
			jQuery('input[name="optico_theme_options[header_search]"]').prop('checked', true);
			jQuery('textarea[name="optico_theme_options[header_text]"]').val(header_text);
			jQuery('input[name="optico_theme_options[header_btn][header_btn_text]"]').val('APPOINTMENT');
			jQuery('input[name="optico_theme_options[header_btn][header_btn_link]"]').val('#');
			jQuery('select[name="optico_theme_options[sticky_header_bg_color]"]').val("skincolor").change();
			jQuery('input[name="optico_theme_options[stickymainmenufontcolor]"').iris('color', '#fff' );  // 
			jQuery('select[name="optico_theme_options[topbar_text_color]"]').val(topbar_text_color).change();
			jQuery('select[name="optico_theme_options[header_bg_color]"]').val('custom').change();
			jQuery('input[name="optico_theme_options[titlebar_height]"]').val('600');
			jQuery('select[name="optico_theme_options[titlebar_bg_color]"]').val('skincolor').change();
			
			themestek_change_logo('logo-white.png');
			
		} else if (this.value == 'infostack') {
			jQuery('input[name="optico_theme_options[show_topbar]"]').prop('checked', true);  // Show topbar
			jQuery('select[name="optico_theme_options[topbar_bg_color]"]').val('white').change();
			jQuery('input[name="optico_theme_options[mainmenufont][color]"').iris('color', '#ffffff');  // 
			jQuery('select[name="optico_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change();
			jQuery('input[name="optico_theme_options[header_search]"]').prop('checked', true);
			jQuery('textarea[name="optico_theme_options[infostack_phone_text]"]').val(header_text);
			jQuery('input[name="optico_theme_options[header_btn][header_btn_text]"]').val('APPOINTMENT');
			jQuery('input[name="optico_theme_options[header_btn][header_btn_link]"]').val('#');
			jQuery('select[name="optico_theme_options[sticky_header_bg_color]"]').val(sticky_header_bg_color).change();
			jQuery('input[name="optico_theme_options[stickymainmenufontcolor]"').iris('color', stickymainmenufontcolor_color);  // 
			jQuery('select[name="optico_theme_options[topbar_text_color]"]').val('dark').change();
			jQuery('select[name="optico_theme_options[header_bg_color]"]').val(header_bg_color).change();
			jQuery('input[name="optico_theme_options[titlebar_height]"]').val(titlebar_height);
			jQuery('select[name="optico_theme_options[titlebar_bg_color]"]').val(titlebar_bg_color).change();
			
			themestek_change_logo();
			
		}
	});
}
 
function themestek_change_logo( logo='logo.png' ){
	var curr_url     = location.href;
	var root_url     = curr_url.replace("wp-admin/admin.php?page=themestek-theme-options", "");
	var inputele_val = jQuery('input[name="optico_theme_options[logoimg][full-url]"]').val();
	var parentele    = jQuery('input[name="optico_theme_options[logoimg][full-url]"]').closest('.cs-fieldset');
	var newimgsrc    = root_url + 'wp-content/themes/optico/images/' + logo;
	
	if( inputele_val == root_url + 'wp-content/themes/optico/images/logo.png' || inputele_val == root_url + 'wp-content/themes/optico/images/logo-white.png' ){
		// do change
		jQuery( '.cs-preview img', parentele ).attr('src', newimgsrc );
		jQuery( 'input[name="optico_theme_options[logoimg][thumb-url]"]' ).attr( 'value', newimgsrc );
		jQuery( 'input[name="optico_theme_options[logoimg][full-url]"]' ).attr(  'value', newimgsrc );
	}
	
}
 
/**
 *  Codestar Framework : themestek_background JS
 */
jQuery.fn.TS_CSFRAMEWORK_BG_IMAGE_UPLOADER = function($) {
    return this.each(function() {

	var $this      = jQuery(this),
		$add       = $this.find('.cs-add'),
		$preview   = $this.find('.cs-image-preview'),
		$noimgtext = $this.find('.ts-cs-background-heading-noimg'),
		$closeicon = $this.find('.ts-cs-remove'),
		$remove    = $this.find('.cs-remove'),
		$input     = $this.find('input.ts-background-image'),
		$inputid   = $this.find('input.ts-background-imageid'),
		$img       = $this.find('img'),
		$btntitleadd    = $this.find('.ts-cs-background-text-add-image').text(),
		$btntitlechange = $this.find('.ts-cs-background-text-change-image').text(),
		wp_media_frame;

      $add.on('click', function( e ) {

        e.preventDefault();

        // Check if the `wp.media.gallery` API exists.
        if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
          return;
        }

        // If the media frame already exists, reopen it.
        if ( wp_media_frame ) {
          wp_media_frame.open();
          return;
        }

        // Create the media frame.
        wp_media_frame = wp.media({
          library: {
            type: 'image'
          }
        });

        // When an image is selected, run a callback.
        wp_media_frame.on( 'select', function() {

          var attachment = wp_media_frame.state().get('selection').first().attributes;
          var thumbnail  = ( typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;

          $img.removeClass('hidden');
		  $closeicon.removeClass('hidden');
		  $noimgtext.addClass('hidden');
          $img.attr('src', thumbnail);
          $input.val( attachment.url ).trigger('change');
		  $inputid.val( attachment.id ).trigger('change');
			$add.text($btntitlechange);
        });

        // Finally, open the modal.
        wp_media_frame.open();

      });

      // Remove image
      $remove.on('click', function( e ) {
        e.preventDefault();
        $input.val('').trigger('change');
		$inputid.val('').trigger('change');
        $img.addClass('hidden');
		$closeicon.addClass('hidden');
		$noimgtext.removeClass('hidden');
		$add.text($btntitleadd);
      });

    });

  };

/**
 *  Codestar Framework : themestek_typography JS
 */
  jQuery.fn.TS_CSFRAMEWORK_TYPOGRAPHY = function() {
    return this.each( function() {

      var typography      = jQuery(this),
          family_select   = typography.find('.cs-typo-family'),
          variants_select = typography.find('.cs-typo-variant'),
          typography_type = typography.find('.cs-typo-font');

      family_select.on('change', function() {

        var _this     = jQuery(this),
            _type     = _this.find(':selected').data('type') || 'custom',
            _variants = _this.find(':selected').data('variants');

        if( variants_select.length ) {

          variants_select.find('option').remove();

          jQuery.each( _variants.split('|'), function( key, text ) {
            variants_select.append('<option value="'+ text +'">'+ text +'</option>');
          });

          variants_select.find('option[value="regular"]').attr('selected', 'selected').trigger('chosen:updated');

        }

        typography_type.val(_type);

      });

    });
  };
  
/**
 *  themestek_image 
 */
  jQuery.fn.TS_CSFRAMEWORK_IMAGE_UPLOADER = function() {
    return this.each(function() {

      var $this     = jQuery(this),
          $add      = $this.find('.cs-add'),
          $preview  = $this.find('.cs-image-preview'),
          $remove   = $this.find('.cs-remove'),
          $input    = $this.find('input.ts-cs-imgid'),
		  $thumbimg = $this.find('input.ts-cs-thumburl'),
		  $fullimg  = $this.find('input.ts-cs-fullurl'),
          $img      = $this.find('img'),
          wp_media_frame;

      $add.on('click', function( e ) {

        e.preventDefault();

        // Check if the `wp.media.gallery` API exists.
        if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
          return;
        }

        // If the media frame already exists, reopen it.
        if ( wp_media_frame ) {
          wp_media_frame.open();
          return;
        }

        // Create the media frame.
        wp_media_frame = wp.media({
          library: {
            type: 'image'
          }
        });

        // When an image is selected, run a callback.
        wp_media_frame.on( 'select', function() {

          var attachment = wp_media_frame.state().get('selection').first().attributes;
          var thumbnail  = ( typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;
		  var fullimg    = ( typeof attachment.sizes.full.url !== 'undefined' ) ? attachment.sizes.full.url : '';

          $preview.removeClass('hidden');
          $img.attr('src', thumbnail);
          $input.val( attachment.id ).trigger('change');
		  $fullimg.val( fullimg ).trigger('change');
		  $thumbimg.val( thumbnail ).trigger('change');

        });

        // Finally, open the modal.
        wp_media_frame.open();

      });

      // Remove image
      $remove.on('click', function( e ) {
        e.preventDefault();
        $input.val('').trigger('change');
		$fullimg.val('').trigger('change');
		$thumbimg.val('').trigger('change');
        $preview.addClass('hidden');
      });

    });

  };
  
/**
 *  Titlebar text custom color show/hide
 */ 
function ts_show_hide_titlebar_textcolor(){
	
	var $this      = jQuery( 'select[name="optico_theme_options[titlebar_text_color]"]' );
	var $page_this = jQuery( 'select[name="_themestek_metabox_group[titlebar_text_color]"]' );
	
	if( $this.length > 0 ){
		if( jQuery($this).val()=='custom' ){
			jQuery( 'input[name="optico_theme_options[titlebar_heading_font][color]"]' ).closest('.ts-typography-font-color-w').show();
			jQuery( 'input[name="optico_theme_options[titlebar_subheading_font][color]"]' ).closest('.ts-typography-font-color-w').show();
			jQuery( 'input[name="optico_theme_options[titlebar_breadcrumb_font][color]"]' ).closest('.ts-typography-font-color-w').show();
		} else {
			jQuery( 'input[name="optico_theme_options[titlebar_heading_font][color]"]' ).closest('.ts-typography-font-color-w').hide();
			jQuery( 'input[name="optico_theme_options[titlebar_subheading_font][color]"]' ).closest('.ts-typography-font-color-w').hide();
			jQuery( 'input[name="optico_theme_options[titlebar_breadcrumb_font][color]"]' ).closest('.ts-typography-font-color-w').hide();
		}
	}
	
	if( $page_this.length > 0 ){
		if( jQuery($page_this).val()=='custom' ){
			jQuery( 'input[name="_themestek_metabox_group[titlebar_heading_font][color]"]' ).closest('.ts-typography-font-color-w').show();
			jQuery( 'input[name="_themestek_metabox_group[titlebar_subheading_font][color]"]' ).closest('.ts-typography-font-color-w').show();
			jQuery( 'input[name="_themestek_metabox_group[titlebar_breadcrumb_font][color]"]' ).closest('.ts-typography-font-color-w').show();
			
		} else {
			jQuery( 'input[name="_themestek_metabox_group[titlebar_heading_font][color]"]' ).closest('.ts-typography-font-color-w').hide();
			jQuery( 'input[name="_themestek_metabox_group[titlebar_subheading_font][color]"]' ).closest('.ts-typography-font-color-w').hide();
			jQuery( 'input[name="_themestek_metabox_group[titlebar_breadcrumb_font][color]"]' ).closest('.ts-typography-font-color-w').hide();
		}
	}
	
}
  
/**
 *  Titlebar bg custom color show/hide
 */ 
function ts_show_hide_titlebar_bgcolor(){
	
	var $page_this = jQuery( 'select[name="_themestek_metabox_group[titlebar_bg_color]"]' );
	
	if( $page_this.length > 0 ){
		if( jQuery($page_this).val()=='custom' ){
			jQuery( 'input[name="_themestek_metabox_group[titlebar_background][color]"]' ).closest('.ts-background-color-w').show();
		} else {
			jQuery( 'input[name="_themestek_metabox_group[titlebar_background][color]"]' ).closest('.ts-background-color-w').hide();
		}
	}
	
}

/**
 *  ThemeStek icon picker
 */
function themestek_icon_picker(){
	
	if( jQuery('.themestek-iconpicker-wrapper').length > 0 ){
		
		jQuery('.themestek-iconpicker-wrapper').each(function(){
			
			var mainwrapper = jQuery(this);
			
			// checking if iconpicker already applied
			if( jQuery('.themestek-iconpicker-list', mainwrapper ).hasClass('iconpicker') == false ){
				
				// check if click applied
				if( !jQuery( '.ts-ipicker-selector-button', mainwrapper ).hasClass('ts_click_applied') ){
					
					jQuery( '.ts-ipicker-selector-button', mainwrapper ).on('click', function(){
						
						var $btn = jQuery(this);
						if( jQuery( '.themestek-iconpicker-list-w', mainwrapper ).css('display')=='none' ){
							
							// Apply iconpicker() on click so it will not load the page
							if( !jQuery('.themestek-iconpicker-list', mainwrapper ).hasClass('iconpicker') ){
								
								jQuery('.themestek-iconpicker-list', mainwrapper ).iconpicker({
									align: 'left', // Only in div tag
									arrowPrevIconClass: 'fa fa-chevron-left',
									arrowNextIconClass: 'fa fa-chevron-right',
									cols: 8,
									icon: jQuery('.themestek-iconpicker-list', mainwrapper ).data('icon'),
									iconset: jQuery('.themestek-iconpicker-list', mainwrapper ).data('iconset'),
									rows: 5
								});
								jQuery('.themestek-iconpicker-list', mainwrapper ).on('change', function(e) {
									jQuery('.ts-ipicker-selected-icon i',mainwrapper).removeClass().addClass( e.icon );
									jQuery('.themestek-iconpicker-input',mainwrapper).val(e.icon);
								});
								
							}
							
							jQuery( '.themestek-iconpicker-list-w', mainwrapper ).slideDown();
							jQuery( '.ts-ipicker-selector-button i', mainwrapper ).removeClass('fa-arrow-down').addClass('fa-arrow-up');
						} else {
							jQuery( '.themestek-iconpicker-list-w', mainwrapper ).slideUp();
							jQuery( '.ts-ipicker-selector-button i', mainwrapper ).removeClass('fa-arrow-up').addClass('fa-arrow-down');
						}
						return false;
					});
					
					// adding class so no other click applied
					jQuery( '.ts-ipicker-selector-button', mainwrapper ).addClass('ts_click_applied');
					
				}
			
				// close when click outside
				jQuery(document).on('click', function(event) { 
					if(!jQuery(event.target).closest('.themestek-iconpicker-list-w', mainwrapper ).length) {
						if(jQuery('.themestek-iconpicker-list-w', mainwrapper).is(":visible")) {
							//jQuery('.themestek-iconpicker-list-w', mainwrapper).slideUp();
							jQuery( '.ts-ipicker-selector-button', mainwrapper ).trigger('click');
						}
					}
				});
				
			}
			
		});
		
		jQuery('.ts-ipicker-selector-w' ).each(function(){
			
			// specially for CodeStar element only
			if( jQuery('.themestek-iconpicker-element').length > 0 ){
				jQuery('.themestek-iconpicker-element').each(function(){
					var wrapper2 = jQuery(this);
					jQuery('.ts-iconpicker-library-selector', wrapper2 ).on('change', function(e){
						
						var curr_library = jQuery('.ts-iconpicker-library-selector', wrapper2).val();
						
						jQuery('.themestek-iconpicker-wrapper', wrapper2).each(function(){
							jQuery(this).hide();
							jQuery('.themestek-iconpicker-wrapper.ts-iconpicker-'+curr_library, wrapper2).show();
						});
						
					});
					
				});
			};
			
		});

	}
}
 
/**
 *  This is for background with custom color dropdown.. This will will show/hide color picker from the background options.
 */
function themestek_show_hide_color_picker_background(){
	
	var items = [
		/* ['dropdown_id',         'background_id'], */
		['fbar_bg_color',          'fbar_background'],
		['titlebar_bg_color',      'titlebar_background'],
		['full_footer_bg_color',   'full_footer_bg_all'],
		['first_footer_bg_color',  'first_footer_bg_all'],
		['second_footer_bg_color', 'second_footer_bg_all'],
		['bottom_footer_bg_color', 'bottom_footer_bg_all']
	];
	
	jQuery(items).each(function(n,val){
		
		var dropdown_name   = val[0];
		var background_name = val[1];
		
		var $dropdown_element   = jQuery( 'select[name="optico_theme_options['+dropdown_name+']"]' );
		
		// show/hide the color picker on load
		if( $dropdown_element.val()=='custom' ){
			jQuery( 'input[name="optico_theme_options['+background_name+'][color]"]' ).closest('.ts-background-color-w').show();
		} else {
			jQuery( 'input[name="optico_theme_options['+background_name+'][color]"]' ).closest('.ts-background-color-w').hide();
		}
		
		// on change of the dropdown
		$dropdown_element.change(function() {  // Theme Options
			
			if( jQuery(this).val()=='custom' ){
				jQuery( 'input[name="optico_theme_options['+background_name+'][color]"]' ).closest('.ts-background-color-w').show();
			} else {
				jQuery( 'input[name="optico_theme_options['+background_name+'][color]"]' ).closest('.ts-background-color-w').hide();
			}
		});
		
	});
	
}

/**
 *  Blog Post Format - Move the Gallery Meta Box to the Gallery Tab content so user can select images directly from Gallery tab.
 */
function themestek_gallery_post_format(){
	// moving the gallery meta box after the gallery box
	jQuery("#cfpf-format-gallery-preview").after( jQuery("#_themestek_metabox_gallery") );
	
	// hide all box by defualt
	jQuery("#_themestek_metabox_gallery").hide();
	
	jQuery("#cfpf-format-gallery-preview").hide();
	jQuery( '#cfpf-format-gallery-preview > label' ).hide();
	jQuery( '#cfpf-format-gallery-preview > .cfpf-gallery-options' ).hide();
	
	// show/hide if gallery post format
	if( jQuery('input[name="post_format"]:checked').val() == 'gallery' ){
		jQuery("#_themestek_metabox_gallery").show();
	}
	
	jQuery('input[name="post_format"]').change(function() {
		
		if( this.value == 'gallery' ){
			jQuery("#_themestek_metabox_gallery").show();
		} else {
			jQuery("#_themestek_metabox_gallery").hide();
		}
		
	});

}

/**
 *  Document Ready Init
 */
jQuery(document).ready( function() {
	
	// stickey header in theme options
	jQuery(".cs-header").stick_in_parent();
	
	// Icon picker in CodeStar framework
	themestek_icon_picker();
	
	// When clicking on add group button and the group contains icon picker in it. Specially created for Portfolio List
	jQuery('.cs-field-group').each(function(){
		var groups = jQuery(this);
		jQuery( '.cs-add-group', groups ).on('click', function(){
			setTimeout(function(){
				jQuery('.cs-group:last-child .themestek-iconpicker-list', groups ).removeClass('iconpicker');
				jQuery('.cs-group:last-child .ts-ipicker-selector-button', groups ).removeClass('ts_click_applied');
				themestek_icon_picker();
			}, 10);
		});
	});
	
	jQuery('.cs-field-themestek_background', this).TS_CSFRAMEWORK_BG_IMAGE_UPLOADER();
	jQuery('.cs-field-themestek_typography', this).TS_CSFRAMEWORK_TYPOGRAPHY();
	jQuery('.cs-field-themestek_image', this).TS_CSFRAMEWORK_IMAGE_UPLOADER();
	
	// Titlebar Text Color - Show / Hide color for Text color option
	ts_show_hide_titlebar_textcolor();
	jQuery( 'select[name="optico_theme_options[titlebar_text_color]"]' ).change(function() {  // Theme Options
		ts_show_hide_titlebar_textcolor();
	});
	jQuery( 'select[name="_themestek_metabox_group[titlebar_text_color]"]' ).change(function() {  // Page Meta Box Option
		ts_show_hide_titlebar_textcolor();
	});
	
	// Titlebar BG Color - Show / Hide color for bg color option
	ts_show_hide_titlebar_bgcolor()
	jQuery( 'select[name="_themestek_metabox_group[titlebar_bg_color]"]' ).change(function() {  // Page Meta Box Option
		ts_show_hide_titlebar_bgcolor();
	});
	
	/**
	 *  Codestar Framework : themestek_skin_color JS
	 */
	jQuery('.cs-field-themestek_skin_color').each(function(){
		var $this = jQuery(this);
		jQuery( '.themestek-skin-color-list a', $this ).on('click', function() {
			var color = jQuery(this).css('background-color');
			jQuery('.wp-color-picker', $this ).iris('color', color);
			return false;
		});
	});
	
	/**
	 *  Add class in page loading option
	 */
	 
	jQuery('*[data-depend-id="loaderimg_1"]').closest('.cs-field-image-select').addClass('ts-pre-loader-option-wrapper');
	jQuery('input[type=radio][name="optico_theme_options[loaderimg]"]:checked').closest('label').addClass('ts-pre-loader-option-selected');
	jQuery('input[type=radio][name="optico_theme_options[loaderimg]"]').change(function() {
		jQuery('input[type=radio][name="optico_theme_options[loaderimg]"]').closest('label').removeClass('ts-pre-loader-option-selected');
		jQuery(this).closest('label').addClass('ts-pre-loader-option-selected');
		return true;
	});
	
	// Post formats - Move Gallery meta box in Gallery tab 
	themestek_gallery_post_format();
	
	/**
	 *  Icon picker init on adding new group in TS Progress Bar
	 */
	if (typeof vc != 'undefined' && typeof vc.atts != 'undefined') {
		vc.atts.themestek_iconpicker = {
			init: function ( param, $wrapper ) {
				themestek_icon_picker();
			}
		};
	}
	
	// on ajax complete
	jQuery( document ).ajaxComplete(function( event, xhr, settings ) {
		themestek_icon_picker();
	});
	
	/* For all background options - linking dropdown with all color picker for CUSTOM option.. so the color picker will be visiable only when custom color is selected */
	themestek_show_hide_color_picker_background();
	
});  // document.ready

/**
 *  Window Load init
 */
jQuery( window ).on( 'load', function() {
	
	// Header Styles - change values of some options on change of the header style
	ts_header_style_change_triggers();
	
	// Post formats - Open Gallery meta box if closed
	if( jQuery(".js #_themestek_metabox_gallery").hasClass('closed') ){
		jQuery(".js #_themestek_metabox_gallery button.handlediv").trigger('click');
	}
	
	// Codestar - Remove DISABLED and adding READONLY to the export textarea
	jQuery('textarea[name="_nonce"]').prop("readonly", true);
	jQuery('textarea[name="_nonce"]').removeAttr('disabled');

});  // window.load
