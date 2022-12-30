
//Jquery no-conflict mode
( function( $ ) {

    $(document).ready( () => {
        
        //Menu open button
        var toggleButton = document.getElementById("toggle-btn");
        toggleButton.addEventListener("click", changeVisiblility, false);

        function changeVisiblility(e) {
            e.preventDefault();
            document.querySelector('#primary-menu').classList.toggle('show-element');
        }

        //Set primary padding
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

        //Fix navbar on scroll
        function showFixedNavbar(){
            pageScroll = window.scrollY;
            //console.log(pageScroll);
            navBar.classList.toggle('has-fixed', pageScroll > 80);
        }

        //Events tigger
        window.onresize = setNavOnLoad;
        window.onscroll = showFixedNavbar;

    } );    

} (jQuery) );