<article class="themestek-box themestek-box-portfolio ts-portfoliobox-style-3 ts-hover-style-1 <?php echo themestek_portfoliobox_class(); ?>">
	<div class="themestek-post-item">
		<?php echo themestek_featured_image('themestek-img-800x650'); ?>
		<div class="themestek-box-content">
            <div class="themestek-box-content-inner">			  

				<div class="themestek-pf-box-title">
					<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
				</div>

				<?php if( has_excerpt() ){ ?>
					<div class="themestek-box-desc">
						<?php the_excerpt(); ?>
					</div>
				<?php } ?>

				<div class="ts-vc_btn3-container ts-vc_btn3-inline">
					<a class="ts-vc_general ts-vc_btn3 ts-vc_btn3-size-md ts-vc_btn3-shape-round ts-vc_btn3-weight-yes ts-vc_btn3-style-text  ts-vc_btn3-icon-right ts-vc_btn3-color-skincolor" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
						<?php esc_attr_e('Read More', 'optico') ?> <i class="ts-vc_btn3-icon fa fa-arrow-circle-right"></i>
					</a>
				</div>

			</div>		
		</div>
	</div>
</article>