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
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ]);
    }
    add_action( 'widgets_init', 'wp_widget_areas' );

    // // CUSTOM POST TYPE
    // function wp_partners_area() {
    //     $labels = array(
    //         'name'                  => 'Partners',
    //         'singular_name'         => 'Partner',
    //         'menu_name'             => 'Partners',
    //         'name_admin_bar'        => 'Partner',
    //         'add_new'               => 'Add new',
    //         'add_new_item'          => 'Add new partner',
    //         'new_item'              => 'New partner',
    //         'edit_item'             => 'Edit partner',
    //         'view_item'             => 'View partner',
    //         'all_items'             => 'All partners',
    //         'search_items'          => 'Search partners',
    //         'not_found'             => 'No partner found.',
    //         'not_found_in_trash'    => 'No partner found in trash.',
    //         'featured_image'        => 'Partner cover image',
    //         'set_featured_image'    => 'Set cover image',
    //         'remove_featured_image' => 'Remove cover image',
    //         'use_featured_image'    => 'Use as cover image',
    //         'archives'              => 'Partners archives',
    //         'insert_into_item'      => 'Insert into partners',
    //     );
     
    //     $args = array(
    //         'labels'             => $labels,
    //         'public'             => true,
    //         'publicly_queryable' => true,
    //         'show_ui'            => true,
    //         'show_in_menu'       => true,
    //         'query_var'          => true,
    //         'rewrite'            => array( 'slug' => 'partners' ),
    //         'capability_type'    => 'post',
    //         'has_archive'        => true,
    //         'hierarchical'       => false,
    //         'menu_position'      => null,
    //         'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    //         'show_in_rest'       => true,
    //         'menu_icon'          => 'dashicons-admin-users',
    //     );
     
    //     register_post_type( 'partners', $args );
    // }
     
    // add_action( 'init', 'wp_partners_area' );


    // // CUSTOM POST TYPE TAXONOMY
    // function rdb_partners_category_taxonomies() {
    //     $labels = array(
    //         'name'              => 'Partners categories',
    //         'singular_name'     => 'Partner Category',
    //         'search_items'      => 'Search partner categories',
    //         'all_items'         => 'All le partner categories',
    //         'edit_item'         => 'Edit partner category',
    //         'add_new_item'      => 'Add new partner category',
    //         'menu_name'         => 'Partner category',
    //     );
     
    //     $args = array(
    //         'hierarchical'      => true,
    //         'labels'            => $labels,
    //         'show_ui'           => true,
    //         'show_admin_column' => true,
    //         'query_var'         => true,
    //         'rewrite'           => array( 'slug' => 'partner_category' ),
    //     );
     
    //     register_taxonomy( 'partner_categories', array( 'partners' ), $args );
    // }
    // add_action( 'init', 'rdb_partners_category_taxonomies' );

    // // ACF BLOCKS
    // function my_acf_init_block() {

    //     if( function_exists('acf_register_block_type') ) {

    //         acf_register_block_type(array(
    //             'name'              => '',
    //             'title'             => __(''),
    //             'render_template'   => get_template_directory() . '/template-parts/blocks/blocco.php',
    //             'category'          => 'formatting',
    //             'icon'              => '',
    //             'enqueue_style'     => get_template_directory_uri() . '/dist/css/style.min.css',
    //             'example'  => array(
    //                 'attributes' => array(
    //                     'mode' => 'preview'
    //                 )
    //             ),
    //         ));
    //     }
    // }
    // add_action('acf/init', 'my_acf_init_block');

    // // ACF OPTIONS
    // if( function_exists('acf_add_options_page') ) {
	
    //     acf_add_options_page();
        
    // }

?>