<div id="site-header" class="site-header <?php echo themestek_sanitize_html_classes(themestek_header_class()); ?>">
	<div class="site-header-main ts-table">
	
		<div class="ts-header-top-wrapper <?php echo themestek_sanitize_html_classes(themestek_header_container_class()); ?>">
				<div class="site-branding">
					<?php echo themestek_site_logo(); ?>
				</div><!-- .site-branding -->	
				<div class="ts-infostack-right-content">
					<div class="info-widget">
						<div class="info-widget-inner">
							<?php echo themestek_wp_kses( do_shortcode( themestek_get_option('infostack_left_text') ) ); ?>
						</div>
					</div>
					<div class="info-widget">
						<div class="info-widget-inner">
							<?php echo themestek_wp_kses( do_shortcode( themestek_get_option('infostack_right_text') ) ); ?>
						</div> 
					</div> 
					<div class="info-widget">
						<div class="info-widget-inner">
							<?php echo themestek_wp_kses( do_shortcode( themestek_get_option('infostack_phone_text') ) ); ?>
							<?php themestek_header_button(); ?>
						</div> 
					</div> 


					
				</div>
		</div><!-- .ts-header-top-wrapper -->
		
		<div id="ts-stickable-header-w" class="ts-stickable-header-w ts-bgcolor-<?php echo themestek_get_option('header_bg_color'); ?>" style="height:<?php echo themestek_header_menuarea_height(); ?>px">
			<div id="site-header-menu" class="site-header-menu">
				<div class="site-header-menu-inner <?php echo sanitize_html_class(themestek_sticky_header_class()); ?> <?php echo themestek_sanitize_html_classes(themestek_header_menu_class()); ?>">
					<div class="site-header-menu-middle <?php echo themestek_sanitize_html_classes(themestek_header_menu_class()); ?>">
						<div class="<?php echo themestek_sanitize_html_classes(themestek_header_container_class()); ?> ">
						
							<div>
								<nav id="site-navigation" class="main-navigation" aria-label="Primary Menu" data-sticky-height="<?php echo esc_attr(themestek_get_option('header_height_sticky')); ?>">		                        
									<?php get_template_part('theme-parts/header/header','menu'); ?>
								</nav><!-- .main-navigation -->
							</div>
							<div class="ts-phone">
								<?php get_template_part('theme-parts/header/header','search-form'); ?>
								<?php echo themestek_wp_kses( themestek_header_links(), 'header_links' ); ?>
							</div>
						</div>
					</div>
				</div>
		<?php // You can use like this too - themestek_fbar_btn(); ?>
			</div><!-- .site-header-menu -->
		</div>
		
	</div><!-- .site-header-main -->
</div>


