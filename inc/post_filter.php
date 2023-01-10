<?php

function dfr_postfilter_scripts() {
    global $wp_query;
	wp_localize_script( 'theme-functions', 'ajaxpagination', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		//New code
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
		'max_page' => $wp_query->max_num_pages,
		//END New code
		'query_vars' => json_encode( $wp_query->query )
	));
}
add_action( 'wp_enqueue_scripts', 'dfr_postfilter_scripts' );

/**
 * Paginate main Query (DEV)
 */
function wp_ajax_pagination() {

    $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );
    $query_vars['paged'] = $_POST['page'];
	$query_vars['post_status'] = 'publish';
    $posts = new WP_Query( $query_vars );

    $GLOBALS['wp_query'] = $posts;

	if( $posts->have_posts() ):
		?><div id="post-grid" class="flex flex-col gap-4 md:grid md:grid-cols-2 md:gap-4 xl:grid-cols-3 mb-8"><?php
		while( $posts->have_posts() ):
			$posts->the_post();
			get_template_part( 'template-parts/content', 'grid' );
		endwhile;
		?></div><?php
		?><div class="w-full"><nav class="nav-links"><?php
		echo paginate_links(
			array(
				'base' => '%_%',
				'format' => '?paged=%#%',
			)
		);
		?></nav></div><?php
	else:
		get_template_part( 'template-parts/content', 'none' );	
	endif;

    die();
}
add_action( 'wp_ajax_nopriv_ajax_pagination', 'wp_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'wp_ajax_pagination' );

/**
 * Filter main Query (DEV)
 */

 add_action('wp_ajax_postfilter', 'post_filter_function'); 
 add_action('wp_ajax_nopriv_postfilter', 'post_filter_function');
 function post_filter_function(){
 
    //var_dump($_POST); //Crash query look for post content in code inspector/net/response
     
    // example: date-ASC 
    $order = explode( '-', $_POST['posts_order_by'] );
    $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );
    $query_vars['s'] = $_POST['posts_s'];
    if( $_POST['posts_cat'] !== "" ){
        $query_vars['tax_query'][] = array(
            'taxonomy' => 'post_tag',
            'field'    => 'slug',
            'terms'    =>  $_POST['posts_cat'],
        );
    }
    $query_vars['orderby'] = $order[0];
    $query_vars['order'] = $order[1];
    $query_vars['post_status'] = 'publish';
    $query_vars['post_type'] = 'post';
    $posts = new WP_Query( $query_vars );
 
    $GLOBALS['wp_query'] = $posts;
 
     if( $posts->have_posts() ):
        ob_start();
        ?><div id="post-grid" class="flex flex-col gap-4 md:grid md:grid-cols-2 md:gap-4 xl:grid-cols-3 mb-8"><?php
        while( $posts->have_posts() ):
            $posts->the_post();
            get_template_part( 'template-parts/content', 'grid' );
        endwhile;
        wp_reset_postdata();
        ?></div><?php
        ?><div class="w-full"><nav class="nav-links"><?php
        echo paginate_links(
            array(
                'base' => '%_%',
                'format' => '?paged=%#%',
            )
        );
        ?></nav></div><?php
        $content = ob_get_contents();
        ob_end_clean();
    else:
        get_template_part( 'template-parts/content', 'none' );	
    endif;
 
    echo json_encode( array(
        'posts' => json_encode( $posts->query_vars ),
        'max_page' => $posts->max_num_pages,
        'found_posts' => $posts->found_posts,
        'content' => $content
    ));
 
    die();
 }