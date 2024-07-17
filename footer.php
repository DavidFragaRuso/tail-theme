<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tail_Theme
 */

global $theme_customizer;

?>

			<footer id="colophon" class="site-footer bg-primary text-white py-8">
				<div class="container">
					<div class="flex flex-wrap">
						<div class="footer-widget">
							<span class="footer-site-title"><?php echo bloginfo('name'); ?></span>
							<?php $theme_customizer->dfr_render_rrss_links(); ?>
						</div>
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							<?php endif; ?>
						</div>
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
								<?php dynamic_sidebar( 'sidebar-3' ); ?>
							<?php endif; ?>	
						</div>
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
								<?php dynamic_sidebar( 'sidebar-4' ); ?>
							<?php endif; ?>	
						</div>
					</div>
				</div>	
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
