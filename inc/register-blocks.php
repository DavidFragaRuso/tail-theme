<?php
/**
 * Register a Gutenber Block with ACF
 */

namespace TailTheme\RegisterACF;

class RegisterBasicBlocks {

    /**
     * Constructor de nuestra funcion, se ejecuta automáticamente 
     * cada vez que creamos una instancia de nuestra clase
     */

    public function __construct() {
        add_action ( 'acf/init', array( $this, 'register_article' ) );
    }

    /**
     * Register Article Block
     */

    public function register_article() {

        /**
         * Verificamos que la funcion existe para estar
         * seguros de que el plugin acf está activo, en caso contrario
         * no continua
        */
        if ( ! function_exists( 'acf_register_block' ) && ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        /** 
         * Registramos nuestro primer bloque
        */
        acf_register_block_type( array(
            'name' => 'basic-article',
            'title' => __('Artículo Básico', 'dfrwp'),
            'description' => __('Artículo Básico.', 'dfrwp'),
            'render_callback' => 'dfr_blocks_render_callback',
            'category' => 'formatting',
            'icon' => 'format-aside',
            'mode' => 'preview',
            'keywords' => array( __('Artículo', 'dfrwp'), __('Básico.', 'dfrwp') ),
        ) );

        /**
         * Registramos un Field Group, 
         * necesario para añadir despues los campos de nuestro
         * bloque
         */
        acf_add_local_field_group ( array(
            'key' => 'group_1',
            'title' => 'Article',
            //'fields' => $fields,
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/basic-article'
                    )   
                )
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => ''
        ) );

        /**
         * Agregamos los fields desde una variable separada
         * Para facilitar la legibilidad y escalabilidad del codigo
         */

        $fields = [
            /*
            array(
                'key' => 'field_1',
                'label' => 'Artículo a mostrar',
                'name' => 'basic_article',
                'type' => 'post_object',
                'instructions' => __( 'Elige un post para mostrar en este widget', 'dfrwp'),
                'required' => 0,
                /* Ejemplo de field previo que debe mostrar o no este field
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_123456',
                            'operator' => '==',
                            'value' => 'searchbox'
                        )
                    )
                ),
                */
                /*
                'wrapper' => array(
                    ''
                )
                //Seguimos aquí mañana
                ),
            */
        ];   

    }

}