<?php
/*
 *
 *  Single Team member - Default
 *
 */

?>

<div class="ts-team-member-single-content-wrapper ts-team-member-view-default">

	<div class="row multi-columns-row">
		<div class="col-md-7 themestek-box-img-left">
			<?php // You can use like this too - themestek_featured_media(); ?>
			<div class="ts-featured-outer-wrapper ts-post-featured-outer-wrapper">
				<?php echo themestek_wp_kses(themestek_featured_image('full')); ?>
			</div>
		</div>
		<div class="col-md-5 themestek-box-content">
			<h3><?php the_title(); ?></h3>

			<?php $position = themestek_team_member_single_meta( 'position' );
			if( !empty($position) ){
				?>
				<div class="themestek-box-team-position">
					<?php echo themestek_wp_kses($position, 'optico'); ?>
				</div>
			<?php } ?>

			<?php echo themestek_wp_kses( themestek_team_member_extra_details() ); ?>
			<hr>
			<?php echo themestek_wp_kses( themestek_team_member_meta_details() ); ?>
			<?php echo themestek_wp_kses( themestek_box_team_social_links() ); ?>
		</div>
	</div>

	<div class="ts-team-member-single-content row">
		<div class="ts-team-member-single-content-innner">
			<?php echo themestek_team_member_content(); ?>
		</div>
	</div>
</div>

<?php edit_post_link( esc_attr__( 'Edit', 'optico' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
