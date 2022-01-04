<?php

    function wp_setup() {

        // dire a WP di pensare al tag title
        add_theme_support( 'title-tag' );

        // dire a WP di aggiungere le immagini in evidenza
        add_theme_support( 'post-thumbnails' );

        // aggiungere logo
        add_theme_support( 'custom-logo' );

        // aggiungere gli stili dei blocchi base
        add_theme_support( 'wp-block-styles' );

        // attivare il menu nel backend di wordpress
        register_nav_menus( ['main_menu' => 'Menu Principale'] );

    }
    add_action( 'after_setup_theme', 'wp_setup' );

    function wp_scripts() {
            // style
            wp_enqueue_style( 'wp-style-init', get_stylesheet_uri(), array(), '1.0', 'all' );
            wp_enqueue_style( 'wp-style', get_stylesheet_directory_uri()
                . '/dist/css/style.min.css', array( 'wp-style-init' ), '1.1', 'all' );
            // fontawesome
            wp_enqueue_script( 'wp-fontawesome', 'https://kit.fontawesome.com/a8f17e5631.js', '1.0', 'all' );
            // script
            wp_enqueue_script( 'wp-script-js', get_stylesheet_directory_uri()
                . '/dist/js/index.js', array(), '1.0', true );
    }
    add_action( 'wp_enqueue_scripts', 'wp_scripts' );

    // WIDGET
    function wp_widget_areas() {
        register_sidebar([
            'name' => 'Widget Area 1',
            'id' => 'widget_area1',
            'before_widget' => '<div class="widget-section">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ]);
    }
    add_action( 'widgets_init', 'wp_widget_areas' );

    // ACF BLOCKS
    function my_acf_init_block() {

        if( function_exists('acf_register_block_type') ) {

            acf_register_block_type(array(
                'name'              => '',
                'title'             => __(''),
                'render_template'   => get_template_directory() . '/template-parts/blocks/blocco.php',
                'category'          => 'formatting',
                'icon'              => '',
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/style.min.css',
                'example'  => array(
                    'attributes' => array(
                        'mode' => 'preview'
                    )
                ),
            ));
        }
    }
    add_action('acf/init', 'my_acf_init_block');

    // ACF OPTIONS
    if( function_exists('acf_add_options_page') ) {
	
        acf_add_options_page();
        
    }

?>