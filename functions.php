<?php

function get_title(){
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'get_title');

function my_theme_enqueue_styles() {
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function mytheme_enqueue_scripts() {
    wp_enqueue_script(
        'mytheme-main',                                  // handle (unique name)
        get_template_directory_uri() . '/js/main.js',     // path to file
        NULL,                                           // dependencies (e.g. 'jquery')
        '1.0.0',                                           // version (for cache busting)
        true                                                // load in footer
    );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_scripts' );

function mynt_setup() {
    register_nav_menus( array(
        'primary' => __( 'Primary Menu' ),
    ) );
}
add_action( 'after_setup_theme', 'mynt_setup' );

function my_theme_cf7_shortcode_by_title( $title ) {
    $form = get_page_by_title( $title, OBJECT, 'wpcf7_contact_form' );
    if ( ! $form ) {
        return '';
    }
    return do_shortcode( '[contact-form-7 id="' . $form->ID . '" title="' . esc_attr( $title ) . '"]' );
}