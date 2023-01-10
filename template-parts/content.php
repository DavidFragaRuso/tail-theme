<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tail_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php  
	if ( has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		//var_dump($thumb);
		if ( ! empty( $thumb[0] ) ) {
			//echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'post-thumbnail' ) );
			?>
			<div class="relative w-full -mt-14 z-20"><img class="post-thumbnail w-8/12 mx-auto rounded-lg shadow-md" alt="<?php the_title(); ?>" src="<?php echo $thumb[0] ?>" decoding="async" /></div>
			<?php 
		}
		//the_post_thumbnail('full');
	}else{
		?><div class="relative w-full -mt-14 z-20"><img class="post-thumbnail w-8/12 mx-auto rounded-lg shadow-md" width="900px" height="650px" alt="" decoding="async" src="<?php echo get_template_directory_uri(); ?>/public/imgs/dummy.jpg" /></div><?php
	}
	
	?>
	<div class="entry-content bg-white border-[1px] border-gray px-4 pt-20 pb-8 -mt-14 mx-2 md:mx-0 rounded-lg shadow-md">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dfrwp' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dfrwp' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<!--<footer class="entry-footer border-[1px] border-gray px-4 py-8 rounded-lg shadow-md">
		<?php //dfrwp_entry_footer(); ?>
	</footer>-->
</article><!-- #post-<?php the_ID(); ?> -->
