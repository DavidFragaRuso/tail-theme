<?php
// WP Customizer API example
// https://raddy.co.uk/blog/wordpress-customizer-api-editable-sections-theme-development/
class DFR_Theme_Customizer {
	public function __construct() {
            add_action( 'customize_register', array( $this, 'register_customize_sections' ) );
	}
	public function register_customize_sections( $wp_customize ) {
        /*
        * Add settings to sections.
        */
        $this->sn_callout_section( $wp_customize );
    }
    
    /* Sanitize Inputs (working examples) */
    public function sanitize_custom_option($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }
    public function sanitize_custom_text($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }
    public function sanitize_custom_url($input) {
        return filter_var($input, FILTER_SANITIZE_URL);
    }
    public function sanitize_custom_email($input) {
        return filter_var($input, FILTER_SANITIZE_EMAIL);
    }
    public function sanitize_hex_color( $color ) {
        if ( '' === $color ) {
            return '';
        }
     
        // 3 or 6 hex digits, or the empty string.
        if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
            return $color;
        }
    }

    private function sn_callout_section( $wp_customize ) {
        
        //Social networks
        $wp_customize->add_section('social-networks-callout-section', array(
            'title' => __(esc_html('RRSS Data', 'dfrwp')),
            'priority' => 180,
            'description' => __('Add here the data about your social networks.', 'dfrwp'),
        ));

        //Email for legal data
        $wp_customize->add_setting('email-callout-display', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_email' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'email-callout-display-control', array(
            'label' => __(esc_html('Email', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'email-callout-display',
            'type' => 'text'
        )));
        //Facebook
        $wp_customize->add_setting('facebook-callout-display', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'facebook-callout-display-control', array(
            'label' => __(esc_html('Facebook Link', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'facebook-callout-display',
            'type' => 'text'
        )));
        //Instagram
        $wp_customize->add_setting('instagram-callout-display', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'instagram-callout-display-control', array(
            'label' => __(esc_html('Instagram Link', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'instagram-callout-display',
            'type' => 'text'
        )));
        //Twitter
        $wp_customize->add_setting('twitter-callout-display', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'twitter-callout-display-control', array(
            'label' => __(esc_html('Twitter Link', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'twitter-callout-display',
            'type' => 'text'
        )));
        //Tumblr
        $wp_customize->add_setting('tumblr-callout-display', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tumblr-callout-display-control', array(
            'label' => __(esc_html('Tumblr Link', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'tumblr-callout-display',
            'type' => 'text'
        )));
        //Linkedin
        $wp_customize->add_setting('linkedin-callout-display', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'linkedin-callout-display-control', array(
            'label' => __(esc_html('Linkedin Link', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'linkedin-callout-display',
            'type' => 'text'
        )));
        //Pinterest
        $wp_customize->add_setting('pinterest-callout-display', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pinterest-callout-display-control', array(
            'label' => __(esc_html('Pinterest Link', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'pinterest-callout-display',
            'type' => 'text'
        )));
        //YouTube
        $wp_customize->add_setting('youtube-callout-display', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'youtube-callout-display-control', array(
            'label' => __(esc_html('YouTube Link', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'youtube-callout-display',
            'type' => 'text'
        )));
        //Tik Tok
        $wp_customize->add_setting('tiktok-callout-display', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tiktok-callout-display-control', array(
            'label' => __(esc_html('Tik Tok Link', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'tiktok-callout-display',
            'type' => 'text'
        )));
        //Telegram
        $wp_customize->add_setting('telegram-callout-display', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'telegram-callout-display-control', array(
            'label' => __(esc_html('Telegram Link', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'telegram-callout-display',
            'type' => 'text'
        )));
        //Whatsapp
        $wp_customize->add_setting('whatsapp-callout-display', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'whatsapp-callout-display-control', array(
            'label' => __(esc_html('WhatsApp Link', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'whatsapp-callout-display',
            'type' => 'text'
        )));
        //color
        $wp_customize->add_setting('color-callout-display', array(
            'default' => '#000000',
            'sanitize_callback' => array( $this, 'sanitize_hex_color' )
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color-callout-display', array(
            'label' => __(esc_html('Main icons color', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'color-callout-display',
            //'type' => 'text'
        )));
        //Hover Color
        $wp_customize->add_setting('hcolor-callout-display', array(
            'default' => '#767676',
            'sanitize_callback' => array( $this, 'sanitize_hex_color' )
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hcolor-callout-display', array(
            'label' => __(esc_html('Hover icons color', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'hcolor-callout-display',
            //'type' => 'text'
        )));
        //Number in pixels
        $wp_customize->add_setting('size-callout-display', array(
            'default' => '40',
            //'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'size-callout-display', array(
            'label' => __(esc_html('Icon size (in pixels)', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'size-callout-display',
            'type' => 'number'
        )));
        //Margin in pixels
        $wp_customize->add_setting('margin-callout-display', array(
            'default' => '15',
            //'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'margin-callout-display', array(
            'label' => __(esc_html('Icon margin (in pixels)', 'dfrwp')),
            'section' => 'social-networks-callout-section',
            'settings' => 'margin-callout-display',
            'type' => 'number'
        )));
    }
}
new DFR_Theme_Customizer();

//[rrss] Short code
function dfr_corporative_data() {
    //Email
    $email = array(
        'name' => 'email',
        'link' => get_theme_mod('email-callout-display'),
        'icon' => '<svg height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330.001 330.001" xml:space="preserve"><g id="XMLID_348_"><path id="XMLID_350_" d="M173.871,177.097c-2.641,1.936-5.756,2.903-8.87,2.903c-3.116,0-6.23-0.967-8.871-2.903L30,84.602 L0.001,62.603L0,275.001c0.001,8.284,6.716,15,15,15L315.001,290c8.285,0,15-6.716,15-14.999V62.602l-30.001,22L173.871,177.097z"   /><polygon id="XMLID_351_" points="165.001,146.4 310.087,40.001 19.911,40 	"/></g></svg>'
    );
    //Facebook
    $facebook = array(
        'name' => 'facebook', 
        'link' => get_theme_mod('facebook-callout-display'),
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="10.798" height="20.849" viewBox="0 0 10.798 20.849"><path id="social_facebook_o_n" d="M12.929,11.38h3.179l.5-3.857H12.929V4.83a1.355,1.355,0,0,1,1.32-1.355h2.389V0H13.3A4.274,4.274,0,0,0,9.028,4.274V7.523H5.84V11.38H9.028v9.469h3.9Z" transform="translate(-5.84)"/></svg>'
    );
    //Twitter    
    $twitter = array(
        'name' => 'twitter',
        'link' => get_theme_mod('twitter-callout-display'),
        'icon' => '<svg width="100" height="100"  viewBox="0 0 32 32"><title>twitter icon</title><path d="M2 4 C6 8 10 12 15 11 A6 6 0 0 1 22 4 A6 6 0 0 1 26 6 A8 8 0 0 0 31 4 A8 8 0 0 1 28 8 A8 8 0 0 0 32 7 A8 8 0 0 1 28 11 A18 18 0 0 1 10 30 A18 18 0 0 1 0 27 A12 12 0 0 0 8 24 A8 8 0 0 1 3 20 A8 8 0 0 0 6 19.5 A8 8 0 0 1 0 12 A8 8 0 0 0 3 13 A8 8 0 0 1 2 4"></path></svg>'
    );
    //Tumblr
    $tumblr = array(
        'name' => 'tumblr',
        'link' => get_theme_mod('tumblr-callout-display'),
        'icon' => '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 260 260" style="enable-background:new 0 0 260 260;" xml:space="preserve"><path d="M210.857,197.545c-1.616-0.872-3.584-0.787-5.119,0.223c-11.62,7.638-23.4,11.511-35.016,11.511c-6.242,0-11.605-1.394-16.416-4.275c-3.27-1.936-6.308-5.321-7.397-8.263c-1.057-2.797-1.045-10.327-1.029-20.748l0.005-63.543h52.795c2.762,0,5-2.239,5-5V62.802c0-2.761-2.238-5-5-5h-52.795V5c0-2.761-2.238-5-5-5h-35.566c-2.528,0-4.658,1.887-4.964,4.397c-1.486,12.229-4.258,22.383-8.247,30.196c-3.89,7.7-9.153,14.401-15.651,19.925c-5.206,4.44-14.118,8.736-26.49,12.769c-2.058,0.671-3.45,2.589-3.45,4.754v35.41c0,2.761,2.238,5,5,5h28.953v82.666c0,12.181,1.292,21.347,3.952,28.026c2.71,6.785,7.521,13.174,14.303,18.993c6.671,5.716,14.79,10.187,24.158,13.298c9.082,2.962,16.315,4.567,28.511,4.567c10.31,0,20.137-1.069,29.213-3.179c8.921-2.082,19.017-5.761,30.008-10.934c1.753-0.825,2.871-2.587,2.871-4.524v-39.417C213.484,200.108,212.476,198.418,210.857,197.545z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'
    );
    //Linkedin
    $linkedin = array(
        'name' => 'linkedin',
        'link' => get_theme_mod('linkedin-callout-display'),
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="19.19" height="19.113" viewBox="0 0 19.19 19.113"><path d="M3.151,1A2.3,2.3,0,1,1,.84,3.293,2.3,2.3,0,0,1,3.151,1Z" transform="translate(-0.84 -1)" /><path d="M4.5,21.066H1.844a.634.634,0,0,1-.634-.634V8.9a.634.634,0,0,1,.634-.634H4.5a.634.634,0,0,1,.669.634V20.432a.634.634,0,0,1-.669.634Z" transform="translate(-0.889 -1.954)"/><path d="M21.027,12.344A4.344,4.344,0,0,0,16.683,8h-.695a3.866,3.866,0,0,0-3.179,1.659A3.571,3.571,0,0,0,12.6,10h0V8.53a.269.269,0,0,0-.269-.261H8.961A.269.269,0,0,0,8.7,8.53V20.761a.269.269,0,0,0,.261.269h3.475a.269.269,0,0,0,.261-.261V13.7a2.181,2.181,0,1,1,4.361,0V20.77a.269.269,0,0,0,.269.261H20.8a.261.261,0,0,0,.261-.261V12.344Z" transform="translate(-1.872 -1.919)" /></svg>'
    );
    //Instagram
    $instagram = array(
        'name' => 'instagram',
        'link' => get_theme_mod('instagram-callout-display'),
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20.849" height="20.849" viewBox="0 0 20.849 20.849"><path d="M15.158,0H6.731A6.211,6.211,0,0,0,.52,6.211v8.427a6.211,6.211,0,0,0,6.211,6.211h8.427a6.22,6.22,0,0,0,6.211-6.211V6.211A6.22,6.22,0,0,0,15.158,0Zm4.109,14.638a4.118,4.118,0,0,1-4.109,4.118H6.731a4.118,4.118,0,0,1-4.118-4.118V6.211A4.118,4.118,0,0,1,6.731,2.094h8.427a4.118,4.118,0,0,1,4.109,4.118Z" transform="translate(-0.52)"/><path d="M11.7,5.79a5.395,5.395,0,1,0,5.386,5.395A5.395,5.395,0,0,0,11.7,5.79Zm0,8.687A3.292,3.292,0,1,1,15,11.185,3.292,3.292,0,0,1,11.7,14.477Z" transform="translate(-1.279 -0.76)" /><circle cx="1.294" cy="1.294" r="1.294" transform="translate(14.534 3.779)" /></svg>'
    );
    //Pinterest
    $pinterest = array(
        'name' => 'pinterest',
        'link' => get_theme_mod('pinterest-callout-display'),
        'icon' => '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 144 144" enable-background="new 0 0 144 144" xml:space="preserve"><g><g><path fill="#BD081C" d="M71.9,5.4C35.1,5.4,5.3,35.2,5.3,72c0,28.2,17.5,52.3,42.3,62c-0.6-5.3-1.1-13.3,0.2-19.1c1.2-5.2,7.8-33.1,7.8-33.1s-2-4-2-9.9c0-9.3,5.4-16.2,12-16.2c5.7,0,8.4,4.3,8.4,9.4c0,5.7-3.6,14.3-5.5,22.2c-1.6,6.6,3.3,12,9.9,12c11.8,0,20.9-12.5,20.9-30.5c0-15.9-11.5-27.1-27.8-27.1c-18.9,0-30.1,14.2-30.1,28.9c0,5.7,2.2,11.9,5,15.2c0.5,0.7,0.6,1.2,0.5,1.9c-0.5,2.1-1.6,6.6-1.8,7.5c-0.3,1.2-1,1.5-2.2,0.9c-8.3-3.9-13.5-16-13.5-25.8c0-21,15.3-40.3,44-40.3c23.1,0,41,16.5,41,38.4c0,22.9-14.5,41.4-34.5,41.4c-6.7,0-13.1-3.5-15.3-7.6c0,0-3.3,12.7-4.1,15.8c-1.5,5.8-5.6,13-8.3,17.5c6.2,1.9,12.8,3,19.7,3c36.8,0,66.6-29.8,66.6-66.6C138.5,35.2,108.7,5.4,71.9,5.4z"/></g></g></svg>'
    );
    //YouTube
    $youtube = array(
        'name'=> 'youtube',
        'link' => get_theme_mod('youtube-callout-display'),
        'icon' => '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="553.102px" height="553.102px" viewBox="0 0 553.102 553.102" style="enable-background:new 0 0 553.102 553.102;" xml:space="preserve"><g><g><path d="M333.087,326.967c-8.641,0-16.805,4.799-24.485,14.4v-57.98h-24.125v177.529h24.125v-12.969c7.919,9.848,16.077,14.768,24.485,14.768c9.842,0,16.2-5.037,19.083-15.123c1.677-5.049,2.521-13.801,2.521-26.291v-52.576c0-12.719-0.845-21.604-2.521-26.641C349.287,331.998,342.929,326.967,333.087,326.967z M330.927,423.105c0,11.775-3.482,17.639-10.446,17.639c-4.082,0-8.042-1.916-11.879-5.752v-80.668c3.837-3.826,7.797-5.754,11.879-5.754c6.958,0,10.446,6.004,10.446,18.006V423.105z"/><path d="M409.422,326.967c-12.24,0-21.849,4.572-28.807,13.686c-4.804,6.469-7.203,16.811-7.203,30.961v46.463c0,14.162,2.521,24.473,7.564,30.961c6.958,9.131,16.683,13.684,29.168,13.684c12.724,0,22.325-4.797,28.807-14.406c2.883-4.32,4.682-9.113,5.404-14.406c0.477-3.348,0.716-8.525,0.716-15.49v-3.236h-24.486c0,2.643,0,5.219,0,7.734s-0.062,4.498-0.178,5.949c-0.122,1.432-0.177,2.277-0.177,2.516c-1.438,6.248-5.043,9.352-10.802,9.352c-8.165,0-12.24-6.121-12.24-18.354v-23.41h47.889v-27.361c0-13.912-2.521-24.236-7.559-30.963C431.032,331.539,421.668,326.967,409.422,326.967z M420.946,379.178h-23.765v-12.254c0-12.238,3.96-18.354,11.88-18.354c7.925,0,11.885,6.121,11.885,18.354V379.178z"/><path d="M239.818,429.588c-5.281,7.441-10.324,11.156-15.123,11.156c-3.366,0-5.165-1.799-5.397-5.404c-0.245-0.465-0.361-3.598-0.361-9.352v-97.223h-23.764v104.426c0,9.131,0.722,15.6,2.16,19.438c2.161,6.738,7.203,10.086,15.123,10.086c8.88,0,18.005-5.404,27.369-16.205v14.406h24.125v-132.15h-24.125v100.822H239.818z"/><path d="M271.153,193.013c7.681,0,11.524-6.132,11.524-18.372v-56.182c0-12.479-3.843-18.721-11.524-18.721c-7.687,0-11.524,6.242-11.524,18.721v56.182C259.629,186.88,263.466,193.013,271.153,193.013z"/><polygon points="108.03,308.596 136.115,308.596 136.115,460.916 162.762,460.916 162.762,308.596 191.568,308.596 191.568,283.387 108.03,283.387 		"/><path d="M449.398,0H103.71C75.142,0,50.717,10.153,30.429,30.422C10.141,50.723,0,75.142,0,103.709v345.683c0,28.566,10.141,52.998,30.429,73.268c20.282,20.281,44.707,30.441,73.281,30.441h345.688c28.562,0,52.986-10.154,73.274-30.441c20.281-20.27,30.429-44.701,30.429-73.268V103.709c0-28.568-10.147-52.987-30.429-73.287C502.385,10.153,477.96,0,449.398,0z M326.606,79.939h24.125v97.938c0,5.765,0.122,8.892,0.361,9.37c0.238,3.855,2.16,5.765,5.759,5.765c4.798,0,9.841-3.715,15.122-11.169V79.939h24.125v133.232h-24.125v-14.406c-9.847,10.802-19.088,16.206-27.729,16.206c-7.687,0-12.846-3.237-15.483-9.719c-1.438-4.32-2.16-10.918-2.16-19.804V79.939H326.606z M235.498,123.147c0-13.911,2.521-24.364,7.564-31.322c6.481-9.113,15.845-13.685,28.085-13.685c11.756,0,21.12,4.572,28.084,13.685c5.043,6.964,7.559,17.411,7.559,31.322v46.812c0,14.4-2.521,24.854-7.559,31.322c-6.965,9.131-16.328,13.685-28.084,13.685c-12.24,0-21.604-4.56-28.085-13.685c-5.043-6.946-7.564-17.387-7.564-31.322V123.147z M170.687,34.211l19.088,70.215l18.36-70.215h27.008l-32.406,106.592v72.369h-26.646v-72.369c-2.644-13.207-8.164-32.167-16.566-56.897c-1.683-5.514-4.45-13.801-8.287-24.853c-3.843-11.028-6.726-19.315-8.642-24.841H170.687z M467.403,468.834c-2.405,10.338-7.51,19.09-15.307,26.293c-7.803,7.203-16.866,11.406-27.185,12.6c-32.89,3.6-82.345,5.404-148.355,5.404c-66.023,0-115.472-1.799-148.355-5.404c-10.325-1.193-19.388-5.402-27.185-12.6c-7.803-7.203-12.907-15.949-15.3-26.293c-4.804-20.158-7.203-51.371-7.203-93.623c0-41.523,2.399-72.736,7.203-93.623c2.399-10.551,7.503-19.37,15.3-26.458c7.797-7.087,16.983-11.224,27.546-12.436c32.644-3.599,81.978-5.404,148-5.404c66.255,0,115.705,1.799,148.355,5.404c10.324,1.212,19.449,5.343,27.368,12.436c7.926,7.087,13.085,15.906,15.484,26.458c4.559,19.932,6.842,51.133,6.842,93.623C474.601,417.463,472.201,448.676,467.403,468.834z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'
    );
    //Tiktok
    $tiktok = array(
        'name' => 'tiktok',
        'link' => get_theme_mod('tiktok-callout-display'),
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2859 3333" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"><path d="M2081 0c55 473 319 755 778 785v532c-266 26-499-61-770-225v995c0 1264-1378 1659-1932 753-356-583-138-1606 1004-1647v561c-87 14-180 36-265 65-254 86-398 247-358 531 77 544 1075 705 992-358V1h551z"/></svg>'
    );
    //Telegram
    $telegram = array(
        'name' => 'telegram',
        'link' => get_theme_mod('telegram-callout-display'),
        'icon' => '<svg version="1.1" id="svg9" xml:space="preserve" width="40" height="40" viewBox="0 0 40 40" sodipodi:docname="telegram-ico.svg" inkscape:version="1.1.2 (b8e25be833, 2022-02-05)" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg"><defs id="defs13"><clipPath clipPathUnits="userSpaceOnUse" id="clipPath23"><path d="M 0,20 H 20 V 0 H 0 Z" id="path21" /></clipPath></defs><sodipodi:namedview id="namedview11" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageshadow="2" inkscape:pageopacity="0.0" inkscape:pagecheckerboard="0" showgrid="false" width="40px" inkscape:zoom="15.149999" inkscape:cx="22.079209" inkscape:cy="19.339935" inkscape:window-width="1920" inkscape:window-height="1017" inkscape:window-x="-8" inkscape:window-y="-8" inkscape:window-maximized="1" inkscape:current-layer="g15" /><g id="g15" inkscape:groupmode="layer" inkscape:label="icons" transform="matrix(1.3333333,0,0,-1.3333333,0,26.666667)"><g id="g17" transform="matrix(1.4777252,0,0,1.4777252,0.19801978,-9.7673752)"><g id="g19" clip-path="url(#clipPath23)"><g id="g25" transform="translate(14.7688,13.4971)"><path d="M 0,0 C -0.029,-0.405 -0.26,-1.821 -0.491,-3.353 -0.838,-5.52 -1.214,-7.89 -1.214,-7.89 c 0,0 -0.058,-0.665 -0.549,-0.781 -0.491,-0.115 -1.301,0.405 -1.445,0.521 -0.116,0.086 -2.168,1.387 -2.919,2.023 -0.202,0.173 -0.434,0.52 0.029,0.925 1.04,0.953 2.283,2.138 3.034,2.89 0.347,0.347 0.694,1.156 -0.751,0.173 -2.052,-1.416 -4.075,-2.745 -4.075,-2.745 0,0 -0.463,-0.289 -1.33,-0.029 -0.867,0.26 -1.878,0.607 -1.878,0.607 0,0 -0.694,0.433 0.491,0.896 v 0 c 0,0 5,2.052 6.734,2.774 0.665,0.289 2.919,1.214 2.919,1.214 0,0 1.041,0.405 0.954,-0.578 m -4.769,6.503 c -5.523,0 -10,-4.477 -10,-10 0,-5.523 4.477,-10 10,-10 5.523,0 10,4.477 10,10 0,5.523 -4.477,10 -10,10" id="path27" /></g></g></g></g></svg>'
    );
    //Whatsapp
    $whatsapp = array(
        'name' => 'whatsapp',
        'link' => get_theme_mod('whatsapp-callout-display'),
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="23.4" height="24.013" viewBox="0 0 23.4 24.013"><g transform="translate(-0.187 0.002)"><path d="M11.49,0a11.9,11.9,0,0,0-10,17.3L.2,23.44A.47.47,0,0,0,.76,24l6-1.43a11.71,11.71,0,0,0,5.11,1.24A11.907,11.907,0,0,0,11.49,0Zm7.17,18.48a9.26,9.26,0,0,1-6.59,2.73,9.14,9.14,0,0,1-4.15-1l-.84-.42-3.68.88.77-3.77-.41-.81a9.314,9.314,0,1,1,14.9,2.4Z" fill="currentColor"/><path d="M17.84,14.48l-2.3-.66a.87.87,0,0,0-.85.23l-.57.57a.83.83,0,0,1-.91.19,12.34,12.34,0,0,1-4-3.5.83.83,0,0,1,.07-.93l.49-.64a.88.88,0,0,0,.11-.87l-1-2.19a.87.87,0,0,0-1.35-.31,3.91,3.91,0,0,0-1.5,2.29c-.16,1.61.53,3.65,3.15,6.09,3,2.83,5.45,3.2,7,2.82a3.88,3.88,0,0,0,2.06-1.8.86.86,0,0,0-.4-1.29Z" fill="#f5d7c1"/></g></svg>'
    );
    //Create array whith RRSS data
    $rrss = [];
    array_push($rrss, $email, $facebook, $instagram, $twitter, $tumblr, $linkedin, $pinterest, $youtube, $tiktok, $telegram, $whatsapp);

    //var_dump($rrss);
    //Create array with html markup for print data
    $rrss_list = '';
    $rrss_list .= '<ul class="social-links">';
    foreach ($rrss as $rrss_link) {
        if(isset($rrss_link['link'])& $rrss_link['link'] != false ){
            if( $rrss_link['name'] == 'email' ) {
                $rrss_list.='<li><a rel="nofollow" href="mailto:'.$rrss_link['link'].'" target="_blank">' . $rrss_link['icon'] . '</a></li>';   
            }else {
                $rrss_list.='<li><a rel="nofollow" href="'.$rrss_link['link'].'" target="_blank">' . $rrss_link['icon'] . '</a></li>';      
            }
        }
    }
    $rrss_list .= '</ul>';
    return $rrss_list;
    
}
add_shortcode( 'rrss', 'dfr_corporative_data' );

//Add values to css
function dfr_cd_option_css(){
    $main_color = get_theme_mod('color-callout-display');
    $hover_color = get_theme_mod('hcolor-callout-display');
    $size_icon = get_theme_mod('size-callout-display');
    $margin_icon = get_theme_mod( 'margin-callout-display' );
    
    if(!empty($main_color)):
    ?>
    <style type="text/css" id="dfr-option-css">
        ul.social-links li a svg{
            width: <?php echo $size_icon ?>px;
            height: <?php echo $size_icon ?>px;
        }
        ul.social-links li a svg path, 
        ul.social-links li a svg circle, 
        ul.social-links li a svg polygon,
        ul.social-links li a svg defs,
        ul.social-links li a svg g,
        ul.social-links li a svg g path{
            fill: <?php echo $main_color ?>;
        }
        ul.social-links li a:hover svg path,
        ul.social-links li a:hover svg circle,
        ul.social-links li a:hover svg polygon,
        ul.social-links li a:hover svg defs,
        ul.social-links li a:hover svg g,
        ul.social-links li a:hover svg g path{
            fill: <?php echo $hover_color ?>;
        }
    </style>
    <?php
    endif;
}
add_action( 'wp_head', 'dfr_cd_option_css' );