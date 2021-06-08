<article class="themestek-box themestek-box-events themestek-box-view-top-image-details themestek-events-box-view-top-image-details">
	<div class="themestek-post-item">
		<div class="themestek-post-item-inner">
			<?php // You can use like this too - themestek_featured_image(); ?>
			<?php echo themestek_wp_kses( themestek_event_price() ); ?>
			<?php echo themestek_get_featured_media( get_the_ID(), 'full', true ); ?>
		</div>

		<div class="themestek-box-bottom-content">
			<div class="themestek-box-title"><?php echo themestek_box_title(); ?></div>
			<div class="themestek-box-meta themestek-events-meta"><?php echo themestek_wp_kses( themestek_event_meta() ); ?></div>
			<div class="themestek-box-desc"><?php echo themestek_event_description(); ?></div>
		</div>
	</div>
</article>