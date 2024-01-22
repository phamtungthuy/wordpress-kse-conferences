<?php 
    function icse_support_theme() {
        add_theme_support('widgets');
    }
    add_action('after_setup_theme', 'icse_support_theme');
        
    function icse_register_styles() {
        // wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0.0' );
        // wp_enqueue_style( 'ekiline-style-css', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0');
        // wp_enqueue_style( 'dashicons', get_template_directory_uri() . '/assets/css/dashicons.min.css', array(), '1.0.0' );
        // wp_enqueue_style( 'wp-block-library', get_template_directory_uri() . '/assets/css/style.min.css', array(), '0.0.1' );
        // wp_enqueue_style('wp-block-library-theme-inline-css', get_template_directory_uri().'/assets/css/wp-block-library-theme.css', array(), '1.0.0');

        // wp_enqueue_style('global-styles-inline-css', get_template_directory_uri().'/assets/css/global-styles.css', array(), '1.0.0');
        // wp_enqueue_style('ekiline-style-inline-css', get_template_directory_uri().'/assets/css/ekiline-style.css', array(), '1.0.0');
        // wp_enqueue_style('wp-sponsors-css', get_template_directory_uri().'/assets/css/public.css', array(), '1.0.0');
        // wp_enqueue_style('icse-style', get_template_directory_uri().'/assets/css/footer.css', array(), '1.0.0', true);
    }
    
    add_action('wp_enqueue_scripts', 'icse_register_styles');
    
    function icse_register_scripts() {
        // wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery/jquery.min.js', array(), '3.6.0');
        // wp_enqueue_script( 'jquery-migrate', get_template_directory_uri() . '/assets/js/jquery/jquery-migrate.min.js', array(), '3.3.2');
        // wp_enqueue_script( 'wp-sponsors', get_template_directory_uri() . '/assets/js/public.js', array(), '1.0.0');
        // wp_enqueue_script( 'wp-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '1.0.0');
        // wp_enqueue_script( 'wp-ekiline', get_template_directory_uri() . '/assets/js/ekiline', array(), '1.0.0');

    }
    
    add_action('wp_enqueue_scripts', 'icse_register_scripts');

    function icse_register_menus() {
        $locations = array(
            'menu' => 'menu'
        );

        register_nav_menus($locations);
    
    }
    add_action('init', icse_register_menus());
?>