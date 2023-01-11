<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tail_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
		<header class="page-header border-black border-[1px] bg-gradient-to-l from-primary to-secondary shadow-md">	
			<div class="box-border bg-gradient-to-t from-black">
				<div class="container pt-12 pb-16">				
					<?php
					the_archive_title( '<h1 class="page-title  text-white text-shadow mt-0">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div>
			</div>
		</header><!-- .page-header -->
		<div class="container pb-4 lg:grid lg:grid-flow-col lg:gap-8 lg:grid-cols-4">
			<div class="main-content lg:col-span-3">
				<div class="grid-container mb-8">		
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

						//the_posts_navigation();

						?>
					</div>
				</div>
			</div>
			<div class="my-8">
				<?php get_sidebar(); ?>
			</div>
		</div>
			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
