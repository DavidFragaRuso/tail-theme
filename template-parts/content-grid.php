<?php
/**
 * Template part for displaying posts grid
 *
 * @package Tail_Theme
 */

?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'block border-[1px] rounded-lg overflow-hidden border-gray-200 shadow-md mb-8' ); ?>>
        <a href="<?php //echo the_permalink(); ?>" rel="bookmark">
            <div class="entry-header">
            <?php

            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            if ( ! empty( $thumb[0] ) ) {
                echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'post-thumbnail' ) ); 
            }else{
                ?><img class="post-thumbnail" width="900px" height="650px" alt="" src="<?php echo get_template_directory_uri(); ?>/public/imgs/dummy.jpg" /><?php
            }

            ?>    
            </div><!-- .entry-header -->
        </a>
        <div class="p-4">
            <?php

            //if ( is_singular() ) :
                //the_title( '<h1 class="entry-title">', '</h1>' );
            //else :
                the_title( '<h2 class="entry-title leading-7 mt-0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            //endif;

            if ( 'post' === get_post_type() ) :
                ?>
                <div class="entry-meta posted-on mb-4 text-sm">
                    <?php dfrwp_posted_on(); ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>   
        </div>
                    
    </article>
