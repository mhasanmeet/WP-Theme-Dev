<?php

/**
 * My theme functions
 */


// Theme title
add_theme_support( 'title-tag' ); 


// Include theme scripts and styles
function mythemenew_public_assets(){
    
    // register styles
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false, '5.3.2', 'all');
    wp_register_style('css', get_template_directory_uri() . '/assets/css/main.css', array('bootstrap'), '0.1.0', 'all');

    // register scripts
    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', false, '5.3.2', array('strategy'  => 'defer'));
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '0.1.0', array('strategy'  => 'defer'));

    //Enqueue styles & scripts
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'css' );
    wp_enqueue_script( 'bootstrap' );
    wp_enqueue_script( 'script' );
}
add_action( 'wp_enqueue_scripts', 'mythemenew_public_assets' );



// Register Site Logo
function mythemenew_customizer_register($wp_customize){
    $wp_customize->add_section('mythemenew_header_logo', array(
        'title' => __('Header Builder', 'mythemenew'),
        'priority' => 120,
        'description' => 'In the Header Builder, you can build header blocks such as logo and menu.'
    ));

    $wp_customize->add_setting('mythemenew_logo', array(
        'default' => get_bloginfo('template_directory') . 'assets/media/logo.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mythemenew_logo', array(
        'label' => __('Logo', 'your-theme-text-domain'),
        'section' => 'mythemenew_header_logo',
        'setting' => 'mythemenew_logo',
    )));
}
add_action('customize_register', 'mythemenew_customizer_register');



// Register Site menu
register_nav_menus( 
    [
        'primary' => esc_html__( 'Header Menu', 'mythemenew' ),
    ]
);