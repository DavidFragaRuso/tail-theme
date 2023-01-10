<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tail_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
		?>
	
		<header class="entry-header border-black border-[1px] bg-gradient-to-l from-primary to-secondary shadow-md">
			<!--<div class="post-img">
				<?php 
				//if ( has_post_thumbnail() ) {
					//$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					//if ( ! empty( $thumb[0] ) ) {
						//echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'post-thumbnail' ) ); 
					//}
					//the_post_thumbnail('full');
				//}else{
					//?><!--<img class="post-thumbnail" width="900px" height="650px" alt="" src="<?php //echo get_template_directory_uri(); ?>/src/imgs/dummy.jpg">--><?php
				//}
				?>
			<!--</div>-->
			<div class="box-border bg-gradient-to-t from-black">
				<div class="container pt-12 pb-16">
				<?php 
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title text-white text-shadow mt-0">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
				?>
				</div>
				
			</div>	
		</header>
		<div class="block my-8 md:container">
			<?php
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
