<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tail_Theme
 */
?>
<div class="mb-8">
    <div class="rounded-md border-gray-200 border-[1px] shadow-md p-4">
        <div id="open-form" class="flex justify-between items-stretch cursor-pointer">
            <p class="mb-0"><?php _e( 'Post Filter', 'dfrwp' ) ?></p>
            <span>
                <svg class="w-[16px] h-[16px] inline transition-all" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                    <path d="M2.909,4.474C1.859,6.436,17.931,37.412,20,37.412S38.401,6.482,36.987,4.474C35.573,2.467,3.958,2.513,2.909,4.474z"/>
                </svg>
            </span>
        </div>
        <form id="post_filters" class="mt-4" action="#">
            <div class="form-x flex flex-col md:flex-row md:gap-4 mb-4">
                <div class="form-item basis-4/12 mb-2">
                    <label class="text-sm" for="posts_s"><?php _e( 'Find by keyword', 'dfrwp' ); ?></label>
                    <input type="text" name="posts_s" id="posts_s" value="" placeholder="<?php _e( 'Enter your keyword', 'dfrwp' ); ?>" />
                </div>
                <div class="form-item basis-4/12 mb-2">
                    <label class="text-sm" for="posts_cat"><?php _e( 'Find by Post Category', 'dfrwp' ); ?></label>
                    <select name="posts_cat" id="posts_cat">
                        <?php
                        $post_categories = get_categories();
                        foreach ($post_categories as $post_cat) {
                            ?><option value="<?php echo $post_cat->slug ?>"><?php echo $post_cat->name ?></option><?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-item basis-4/12 mb-2">
                    <label class="text-sm" for="posts_order_by"><?php _e( 'Order', 'dfrwp' ); ?></label>
                    <select name="posts_order_by" id="posts_order_by">
                        <option value="date-DESC"><?php _e( 'Date ↓', 'dfrwp' ); ?></option><!-- I will explode these values by "-" symbol later -->
                        <option value="date-ASC"><?php _e( 'Date ↑', 'dfrwp' ); ?></option>
                    </select>
                </div>
            </div>
            <button class="bg-black text-white text-sm text-center py-1 px-2 rounded border-2 border-black hover:bg-white hover:text-black inline-block"><?php _e( 'Apply Filters', 'dfrwp' ); ?></button>
            <a id="reset_filter_btn" class="bg-black text-white text-sm text-center py-1 px-2 rounded border-2 border-black hover:bg-white hover:text-black inline-block cursor-pointer"><?php _e( 'Reset Filters', 'dfrwp' ); ?></a>
            <!-- required hidden field for admin-ajax.php -->
            <input type="hidden" name="action" value="postfilter" />
        </form>
    </div>    
</div>  