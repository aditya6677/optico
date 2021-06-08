<article class="themestek-box themestek-box-team ts-teambox-style-1  ts-hover-style-1 <?php echo themestek_portfoliobox_class(); ?>">
	<div class="themestek-post-item">
		<?php echo themestek_wp_kses(themestek_featured_image('themestek-img-800x800')); ?>

		<div class="themestek-box-content">
            <div class="themestek-box-content-inner">		  

				<div class="themestek-box-team-position ts-skincolor">
					<?php echo themestek_get_meta( 'themestek_team_member_details', 'ts_team_info' , 'team_details_line_position' ); ?>
				</div>
				<div class="themestek-pf-box-title">
					<?php echo themestek_box_title(); ?>
				</div>

				<?php if( has_excerpt() ){ ?>
					<div class="themestek-teambox-short-desc">
					<?php $return  = nl2br( get_the_excerpt() );
					echo do_shortcode($return); ?>
					</div>
				<?php }; ?>

				<div class="themestek-teambox-social-links">
					<?php echo themestek_box_team_social_links(true); ?>
				</div>

			</div>		
		</div>
	</div>
</article>