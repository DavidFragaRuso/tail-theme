
//Jquery no-conflict mode
( function( $ ) {

    $(document).ready( () => {

        //Events tigger
        window.onresize = setNavOnLoad;
        window.onscroll = showFixedNavbar;
        
        /**
         * Menu open button
         */
        var toggleButton = document.getElementById("toggle-btn");
        toggleButton.addEventListener("click", changeVisiblility, false);

        function changeVisiblility(e) {
            e.preventDefault();
            document.querySelector('#primary-menu').classList.toggle('show-element');
        }

        /**
         * Filter form open
         */

        var openForm = document.getElementById("open-form");
        //console.log(openForm);
        if(openForm){
            openForm.addEventListener("click", flipFormIcon, false);
        }
        
        function flipFormIcon(e) {
            e.preventDefault();
            document.querySelector('#flipicon').classList.toggle('flip');
            document.querySelector('#post_filters').classList.toggle('show-element');
        }

        /**
         * Set primary padding height nav based
         */
        let adminBar = document.getElementById('wpadminbar');
        if(adminBar){
            var adminBarHeight = adminBar.clientHeight;
        }
        const wpBody = document.getElementById('primary');
        const navBar = document.getElementById('masthead');
        if(navBar){
            var navBarHeight = navBar.clientHeight;
        }
        wpBody.style.paddingTop = navBarHeight + 'px';
        if(adminBar){
            navBar.style.marginTop = adminBarHeight + 'px';    
        }

        //Recalculate on window resize
        function setNavOnLoad() {
            if(adminBarHeight){
                adminBarHeight = adminBar.clientHeight;
            }
            wpBody.style.paddingTop = navBarHeight + 'px';
            navBar.style.marginTop = adminBarHeight + 'px';
        }

        /**
         * Fix navbar on scroll
         */
        function showFixedNavbar(){
            pageScroll = window.scrollY;
            //console.log(pageScroll);
            navBar.classList.toggle('has-fixed', pageScroll > 140);
        }

        /**
         * Pagination
         */

        function find_page_number( element ) {
            var link_content= element.attr('href').replace(/[^0-9. ]/g, "");
            //console.log('Element vale ', link_content);
            var page_num = parseInt( link_content );
            if( link_content === "" ){
                page_num = link_content;
            }
            
            return page_num;
        }
    
        $(document).on( 'click', '.nav-links a', function( event ) {
            event.preventDefault();
            page = find_page_number( $(this).clone() );
            $.ajax({
                url: ajaxpagination.ajaxurl,
                type: 'post',
                data: {
                    action: 'ajax_pagination',
                    query_vars: ajaxpagination.posts,
                    page: page
                },
                success: function( html ) {
                    //console.log(ajaxpagination);
                    $('#post-grid').remove();
                    $('nav.nav-links').remove();
                    $('.grid-container').append( html );
                }
            })
        });

        /**
         * Posts Filter
         */
        
        $('#post_filters').submit(function(){
            $.ajax({
                url : ajaxpagination.ajaxurl,
                data : $('#post_filters').serialize(), // form data
                dataType : 'json', // this data type allows us to receive objects from the server
                type : 'POST',
                beforeSend : function(xhr){
                    $('#post_filters').find('button').text('Filtering...');
                },
                success : function( data ){
                    //console.log(data);
                    // when filter applied:
                    // set the current page to 1
                    ajaxpagination.current_page = 1;
    
                    // set the new query parameters
                    ajaxpagination.posts = data.posts;
    
                    // set the new max page parameter
                    ajaxpagination.max_page = data.max_page;
    
                    // change the button label back
                    $('#post_filters').find('button').text('Filter again');
    
                    // insert the posts to the container
                    //$('#misha_posts_wrap').html(data.content); // Original
                    $('#post-grid').remove();
                    $('nav.nav-links').remove();
                    $('.grid-container').append( data.content );
                },
                error: function(err){ console.error(err); }
            });	
            // do not submit the form
            return false;	
        });

        /**
         * Reset filters
         */

        $('#reset_filter_btn').on('click', function(event) {
            event.preventDefault();

            location.reload(true);
        });

    } );

} (jQuery) );