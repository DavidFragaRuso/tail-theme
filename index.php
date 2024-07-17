<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tail_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php 
		if ( is_front_page() ):
			?>
			<!--<div class="marquee border-black border-[1px] shadow-md bg-gradient-to-l from-primary to-secondary text-white mb-8">-->
			<div class="marquee shadow-md bg-gray-400 mb-4 lg:mb-8">
				<!--<div class="py-12 bg-gradient-to-t from-black">-->
				<div class="py-8">
					<div class="container">
						<!--<h1 class="text-white text-shadow text-xl mt-0"><?php bloginfo('name'); ?></h1>-->
						<!--<h1 class="text-white text-xl mt-0 mb-2"><?php bloginfo('name'); ?></h1>-->
						<!--<span class="text-white text-lg text-shadow"><?php bloginfo('description') ?></span>-->
						<h1 class="text-white text-xl mt-0 mb-0"><?php bloginfo('description') ?></h1>
					</div>
				</div>
			</div>		
			<?php
		endif;
		?>
		<div class="container pb-4 lg:grid lg:grid-flow-col lg:gap-8 lg:grid-cols-4">
			<div class="main-content lg:col-span-3">
				<div class="grid-container mb-8">
					<?php
					if ( have_posts() ) :
						/*
						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif; */
						get_template_part( 'template-parts/content', 'filterposts' );
						?>
						
						<div id="post-grid" class="flex flex-col md:grid md:grid-cols-2 md:gap-4 xl:grid-cols-3">
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', 'grid' );

						endwhile;
						?></div><?php
						?><div class="w-full mb-8"><nav class="nav-links"><?php
						echo paginate_links(
							array(
								'base' => '%_%',
								'format' => '?paged=%#%'
							)
						);
						?></nav></div><?php
					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
			</div>
			<div class="my-8 md:mt-0">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
