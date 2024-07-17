<?php
/**
 * Template part for displaying posts grid
 *
 * @package Tail_Theme
 */

?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'block border-1 rounded-lg overflow-hidden border-gray-200 shadow-md mb-8 bg-white' ); ?>>
        <a href="<?php echo the_permalink(); ?>" rel="bookmark">
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
            $tags = get_the_tags();
            //var_dump($tags);
            if ( $tags ):
            ?>
            <span>
                <?php 
                foreach ( $tags as $tag ){
                    $tag_link = get_tag_link( $tag->term_id );
                    //var_dump( $tag_link );
                    echo '<a class="bg-black px-2 text-white text-xs mr-4 p-1 hover:no-underline hover:bg-primary hover:text-white" href="' . $tag_link . '" rel="tag">' . $tag->name . '</a>'; 
                }
                ?>
            </span>
            <?php
            endif;
            //if ( is_singular() ) :
                //the_title( '<h1 class="entry-title">', '</h1>' );
            //else :
                the_title( '<h2 class="entry-title mt-4"><a class="hover:no-underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            //endif;

            if ( 'post' === get_post_type() ) :
                ?>
                <div class="entry-meta posted-on mb-4 text-sm">
                    <?php dfrwp_posted_on(); ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>   
        </div>
                    
    </article>
