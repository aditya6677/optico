<article <?php themestek_sanitize_html_classes( post_class( themestek_blog_classic_extra_class('common-box-shadow') )); ?>>

	<?php echo themestek_get_featured_media(); // Featured content ?>

	<div class="ts-blog-classic-box-content">
		<header class="entry-header">

			<?php if( !is_single() ) : ?>
				<?php if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>

					<?php echo themestek_wp_kses( optico_entry_meta('blogclassic') ); ?>

					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php endif; ?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if( 'quote' != get_post_format() ) : ?>

			<div class="entry-content">
				<?php
				$blogclassic_text_limit = themestek_get_option('blog_text_limit');
				$read_more_text = '<a href="'.get_permalink().'">'.themestek_get_option('blog_readmore_text').'</a>';
				$read_more_html = '<div class="themestek-readmore-link">'.$read_more_text.'</div>';
				//$blog_classic_excerpt_enable = themestek_get_option('blog_classic_excerpt_enable');

				if( has_excerpt()){
					the_excerpt();
					echo themestek_wp_kses($read_more_html);

				} else if( $blogclassic_text_limit){
					$content = get_the_content();
					$trimmed_content = wp_trim_words( $content, $blogclassic_text_limit, NULL );?>
					<p> <?php echo esc_html($trimmed_content);?> </p>
					<?php echo themestek_wp_kses($read_more_html);
				} else {
					the_content( themestek_get_option('blog_readmore_text') , false );

				}

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

	</div>

</article>
