<article class="themestek-box themestek-box-portfolio ts-portfoliobox-style-2 themestek-box-view-overlay ts-hover-style-3 <?php echo themestek_portfoliobox_class(); ?>">
	<div class="themestek-post-item">
		<?php echo themestek_featured_image('themestek-img-800x715'); ?>
		<div class="themestek-box-content themestek-overlay">
			<div class="themestek-box-content-inner">			  
				<div class="themestek-pf-box-title">
					<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
					<div class="themestek-box-category"><?php echo themestek_portfolio_category(true); ?></div>
				</div>	
				<div class="themestek-icon-box themestek-media-link">
					<?php echo themestek_portfoliobox_media_link('demo-icon ts-optico-icon-resize-full'); ?>
				</div>
            </div>
		</div>
	</div>
</article>