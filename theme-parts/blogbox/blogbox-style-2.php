<article class="themestek-box themestek-box-blog ts-blogbox-style-2 themestek-blogbox-format-<?php echo get_post_format() ?> <?php echo themestek_sanitize_html_classes(themestek_post_class()); ?> themestek-box-view-style2 themestek-blog-box-view-left-image themestek-blog-box-lr">
	<div class="post-item">

        <div class="col-md-4 col-sm-4 themestek-box-img-left">
			<?php // You can use like this too - themestek_featured_media(); ?>
			<?php echo themestek_get_featured_media( '', 'themestek-img-800x740' ); // Featured content ?>
		</div>

        <div class="themestek-box-content col-md-8 col-sm-8">
			<div class="themestek-box-content-inner">
				<div class="ts-featured-meta-wrapper ts-featured-overlay">				

					<?php
					// Category list
					$categories_list = get_the_category_list( ', ' );
					if ( !empty($categories_list) ) { ?>
						<span class="ts-meta-line cat-links"><i class="ts-optico-icon-category"></i> <span class="screen-reader-text ts-hide"><?php echo esc_attr_x( 'Categories', 'Used before category names.', 'optico' ); ?> </span><?php echo themestek_wp_kses($categories_list); ?></span>
					<?php } ?>

					<?php
					// Date
					$date_format =  get_option('date_format'); ?>
					<span class="ts-meta-line posted-on">
						<i class="ts-optico-icon-clock"></i> 
						<span class="screen-reader-text ts-hide"><?php echo esc_attr_x( 'Posted on', 'Used before publish date.', 'optico' ); ?> </span>
						<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
							<time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date($date_format); ?></time>
							<time class="updated ts-hide" datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>"><?php echo get_the_modified_date($date_format); ?></time>
						</a>
					</span>

				</div>
				<?php echo themestek_box_title(); ?>				
				<div class="themestek-box-desc">
					<div class="themestek-box-desc-text"><?php echo themestek_blogbox_description(); ?></div>
				</div>
            </div>
        </div>
	</div>
</article>
