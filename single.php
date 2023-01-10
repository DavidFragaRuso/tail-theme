<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tail_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php 
	while ( have_posts() ): the_post();
	?>
	
	<header class="entry-header border-black border-b-white border-[1px] border-b-2 bg-gradient-to-l from-primary to-secondary shadow-md">
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
				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<p class="text-white text-shadow">
							<?php dfrwp_posted_on(); ?>
						</p>
						<p class="text-white text-shadow">
						<?php dfrwp_posted_by(); ?>
						</p>
						
					</div><!-- .entry-meta -->
				<?php 
				endif;
				?>
			</div>
			
		</div>	
	</header>
	<div class="block pb-8 md:container lg:grid lg:grid-flow-col lg:gap-8 lg:grid-cols-4">
			<div class="post-content lg:col-span-3 mb-8">
				<?php
				get_template_part( 'template-parts/content', get_post_type() );
				?>
				<div class="post-navigation mx-8">
					<h2><?php _e( 'Post navigation', 'dfrwp' ); ?></h2>
					<?php
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'dfrwp' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'dfrwp' ) . '</span> <span class="nav-title">%title</span>',
						)
					);
					?>				
				</div>
				<!--<div class="post-comments">-->
					<h2><?php //_e( 'Comments', 'dfrwp' ); ?></h2>
					<?php 
					// If comments are open or we have at least one comment, load up the comment template.
					//if ( comments_open() || get_comments_number() ) :
						//comments_template();
					//endif;
					?>
				<!--</div>-->
			</div>
			<div class="my-8 mx-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	<?php
	endwhile;	
	?>	
</main><!-- #main -->

<?php
get_footer();
