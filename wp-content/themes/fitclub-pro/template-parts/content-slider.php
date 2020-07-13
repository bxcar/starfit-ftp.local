<section id="home-slider">
	<div class="fullscreened">
		<?php
		$page_array = array();
		$slider_num = intval( get_theme_mod( 'fitclub_slider_number', 4 ) );
		for ( $i=1; $i<=$slider_num; $i++ ) {
			$page_id = get_theme_mod( 'fitclub_slide'.$i );
				if ( !empty ( $page_id ) )
				array_push( $page_array, $page_id );
		}

		$get_featured_posts = new WP_Query(
			array(
				'posts_per_page'     => -1,
				'post_type'          =>  array( 'page' ),
				'post__in'           => $page_array,
				'orderby'            => 'post__in'
		) );

		$fitclub_slider_image       = '';
		$fitclub_slider_description = '';
		$fitclub_slide_list         = '';
		$fitclub_slider_thumbnail   = '';
		$post_count                 = $get_featured_posts->post_count;

		$i = 1;
		while( $get_featured_posts->have_posts() ) : $get_featured_posts->the_post();
			$fitclub_slider_title        = esc_html( get_the_title() );
			$fitclub_slider_description  = get_the_excerpt();
			$title_attribute             = esc_attr( get_the_title( $post->ID ) );
			$fitclub_slider_image        = get_the_post_thumbnail($post->ID, '', array( 'title' => $title_attribute, 'alt' => $title_attribute ));

			if( !empty ( $fitclub_slider_image ) ): // Only continue if feature image is present

				$j = $i-1;
				$fitclub_slider_image      = '<figure class="slider-image">' . $fitclub_slider_image . '</figure>';

				$fitclub_slider_thumbnail .= '<a data-slide-index="' . $j . '" href="#">' . get_the_post_thumbnail( $post->ID, 'fitclub-slider-thumb', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ) . '</a>';

				$fitclub_slide_list       .= '<li><div class="bg-overlay"></div>'.$fitclub_slider_image.'<div class="slider-caption-wrapper">'.'<div class="tg-container">'.'<div class="caption-title">'.get_the_title().'</div>'.'<div class="caption-sub">'.get_the_excerpt().'</div>'.'<a class="slider-readmore" href="'.esc_url( get_permalink() ).'">'. get_theme_mod( 'fitclub_read_more_text', esc_html__( 'Read More', 'fitclub' ) ).'</a>'.'</div></div></li>';

				if ( $i == $post_count ) {
				?>
					<ul class="bxslider">
						<?php echo $fitclub_slide_list; ?>
					</ul>
					<div id="bx-pager">
						<?php echo $fitclub_slider_thumbnail; ?>
					</div>
					<?php
				}

			endif;

			$i++;
			endwhile;
			// Reset Post Data
			wp_reset_query(); ?>
		</div>
</section>
