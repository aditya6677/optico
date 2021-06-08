<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Optico
 * @since Optico 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( themestek_sanitize_html_classes(themestek_postlayout_class()) ); ?> >

	<?php echo themestek_get_featured_media(); // Featured content ?>

	<div class="ts-blog-classic-box-content">

		<?php
		 if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
		 	<?php echo themestek_wp_kses( optico_entry_meta('blogclassic') ); ?>
		<?php endif; ?>

		<header class="entry-header">
			<?php if( !is_single() ) : ?>
				<?php if( 'aside' != get_post_format() && 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php endif; ?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if( 'quote' != get_post_format() ) : ?>
			<div class="entry-content">

				<?php if( !is_single() ) : ?>
					<div class="themestek-box-desc-text"><?php echo themestek_blogbox_description(); ?></div>
				<?php endif; ?>

				<?php
				the_content( sprintf(
					esc_attr__( 'Read More %s', 'optico' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );
				?>

				<div class="themestek-blogbox-footer-readmore">
					<?php echo themestek_blogbox_readmore(); ?>
				</div>
				<?php
				// pagination if any
				wp_link_pages( array(
					'before'      => '<div class="page-links">' . esc_attr__( 'Pages:', 'optico' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
				?>
			</div><!-- .entry-content -->
		<?php endif; ?>

		<?php
		if( is_single() ){
			echo themestek_social_share_box('post');
		}
		?>

		<?php
		// Tags & Categories

		if( !empty($tags) || !empty($category) ){
			echo themestek_wp_kses('<div class="ts-post-tag-cat">');
		}

		if( !empty($tags) ){
			echo sprintf( themestek_wp_kses('<div class="ts-post-tag">%s</div>'), esc_attr__('Tags:', 'optico') . ' ' . $tags );
		}
		if( !empty($category) ){
			echo sprintf( themestek_wp_kses('<div class="ts-post-cat">%s</div>'), esc_attr__('Categories:', 'optico') . ' ' . $category );
		}

		if( !empty($tags) || !empty($category) ){
			echo themestek_wp_kses('</div><!-- .ts-post-tag-cat -->');
		}

		?>

		<?php
		// Next Prev buttons
		$prev_post = get_previous_post();  // Prev post
		$next_post = get_next_post();  // Next post
		if( ( !empty($prev_post) || !empty($next_post) ) && shortcode_exists('ts-btn') ){
			?>
			<div class="ts-post-prev-next-buttons">
				<?php
				if( !empty( $prev_post ) && shortcode_exists('ts-btn') ){
					echo do_shortcode('[ts-btn title="' . esc_attr__('PREVIOUS', 'optico') . '" style="flat" shape="rounded" font_weight="yes" color="skincolor" size="md" i_align="left" i_icon_themify="themifyicon ti-arrow-left" add_icon="true" link="url:' . urlencode(esc_url( get_permalink( $prev_post->ID ) )) . '|title:' . rawurlencode($prev_post->post_title) . '||" el_class="ts-left-align-btn"]');
				};
				// Next post
				if ( !empty($next_post) && shortcode_exists('ts-btn') ){
					echo do_shortcode('[ts-btn title="' . esc_attr__('NEXT', 'optico') . '" style="flat shape="rounded" font_weight="yes" color="skincolor" size="md" i_align="right" i_icon_themify="themifyicon ti-arrow-right" add_icon="true" link="url:' . urlencode(esc_url( get_permalink( $next_post->ID ) )) . '|title:' . rawurlencode($next_post->post_title) . '||" el_class="ts-right-align-btn"]');
				};
				?>
			</div>
			<?php
		}
		?>

		<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'theme-parts/author-bio', 'customized' );
		endif;
		?>

	</div><!-- .ts-blog-classic-box-content -->

</article><!-- #post-## -->
