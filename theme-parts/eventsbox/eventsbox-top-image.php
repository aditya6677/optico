<article class="themestek-box themestek-box-events themestek-box-view-top-image themestek-events-box-view-top-image">
	<div class="themestek-post-item">
		<div class="themestek-post-item-inner">
			<?php echo themestek_wp_kses( themestek_event_price() ); ?>
			<?php echo themestek_get_featured_media( get_the_ID(), 'full', true ); ?>
		</div>

		<div class="themestek-box-bottom-content">
			<div class="themestek-box-title"><?php echo themestek_box_title(); ?></div>
		</div>
	</div>
</article>