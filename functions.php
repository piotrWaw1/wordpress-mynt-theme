<?php

function get_title(){
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails' );

}
add_action('after_setup_theme', 'get_title');

function my_theme_enqueue_styles() {
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// Add preconnect hints
function mytheme_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = 'https://fonts.googleapis.com';
        $urls[] = [
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        ];
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'mytheme_resource_hints', 10, 2 );

// Enqueue the actual font stylesheet
function mytheme_enqueue_fonts() {
    wp_enqueue_style(
        'mytheme-google-fonts',
        'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap',
        [],
        null
    );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_fonts' );

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



// 1. Add a text field instead of a dropdown
function mytheme_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'mytheme_typography', [
        'title'    => __( 'Typography' ),
        'priority' => 30,
    ] );

    // --- Body font ---
    $wp_customize->add_setting( 'mytheme_body_font', [
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ] );

    $wp_customize->add_control( 'mytheme_body_font', [
        'label'       => __( 'Body Font (Google Fonts name)' ),
        'description' => __( 'Type an exact Google Fonts name, e.g. "Space Grotesk".' ),
        'section'     => 'mytheme_typography',
        'type'        => 'text',
    ] );

    // --- Heading font ---
    $wp_customize->add_setting( 'mytheme_heading_font', [
        'default'           => 'Space Grotesk',
        'sanitize_callback' => 'sanitize_text_field',
    ] );

    $wp_customize->add_control( 'mytheme_heading_font', [
        'label'       => __( 'Heading Font (h1, h2, h3, h4 — Google Fonts name)' ),
        'description' => __( 'Type an exact Google Fonts name, e.g. "Space Grotesk".' ),
        'section'     => 'mytheme_typography',
        'type'        => 'text',
    ] );

}
add_action( 'customize_register', 'mytheme_customize_register' );

// 2. Validate it against Google Fonts before it's allowed to save
function mytheme_validate_font_name( $validity, $value ) {
    $value = sanitize_text_field( $value );

    // Check cache first so we don't hit Google on every keystroke/save
    $cache_key = 'mytheme_font_check_' . md5( $value );
    $is_valid  = get_transient( $cache_key );

    if ( false === $is_valid ) {
        $url      = 'https://fonts.googleapis.com/css2?family=' . urlencode( $value ) . ':wght@400';
        $response = wp_remote_get( $url );

        if ( is_wp_error( $response ) ) {
            $validity->add( 'font_check_failed', __( 'Could not reach Google Fonts to verify.' ) );
            return $validity;
        }

        $code     = wp_remote_retrieve_response_code( $response );
        $is_valid = ( 200 === $code );

        // Cache result for a day either way
        set_transient( $cache_key, $is_valid, DAY_IN_SECONDS );
    }

    if ( ! $is_valid ) {
        $validity->add( 'font_not_found', __( 'That font was not found on Google Fonts. Check spelling and capitalization.' ) );
    }

    return $validity;
}
add_filter( 'customize_validate_mytheme_body_font', 'mytheme_validate_font_name', 10, 2 );
add_filter( 'customize_validate_mytheme_heading_font', 'mytheme_validate_font_name', 10, 2 );

// 3. Enqueue whatever valid font is saved
function mytheme_enqueue_dynamic_fonts() {
    $body_font    = get_theme_mod( 'mytheme_body_font', 'Inter' );
    $heading_font = get_theme_mod( 'mytheme_heading_font', 'Space Grotesk' );

    // Build one Google Fonts URL requesting both families at once
    $families = urlencode( $body_font ) . ':wght@400;500;600;700'
        . '&family=' . urlencode( $heading_font ) . ':wght@400;500;600;700';

    $url = 'https://fonts.googleapis.com/css2?family=' . $families . '&display=swap';

    wp_enqueue_style( 'mytheme-dynamic-fonts', $url, [], null );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_dynamic_fonts' );

// 4. Output the font-family CSS
function mytheme_customizer_css() {
    $body_font    = get_theme_mod( 'mytheme_body_font', 'Inter' );
    $heading_font = get_theme_mod( 'mytheme_heading_font', 'Space Grotesk' );
    ?>
    <style>
        body {
            font-family: "<?php echo esc_attr( $body_font ); ?>", sans-serif;
        }
        h1, h2, h3, h4 {
            font-family: "<?php echo esc_attr( $heading_font ); ?>", sans-serif;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customizer_css' );


function my_theme_register_options_page() {
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page( array(
            'page_title' => 'Theme Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug'  => 'theme-settings',
            'capability' => 'edit_theme_options',
            'icon_url'   => 'dashicons-admin-customizer',
            'redirect'   => false,
        ) );
    }
}
add_action( 'acf/init', 'my_theme_register_options_page' );

function mytheme_enqueue_blog_filter() {
    if ( ! is_home() ) {
        return;
    }

    wp_enqueue_script(
        'blog-filter',
        get_template_directory_uri() . '/js/blog-filter.js',
        array(),
        '1.0',
        true
    );

    wp_localize_script( 'blog-filter', 'blogFilter', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'blog_filter_nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_blog_filter' );

function mytheme_filter_posts() {
    check_ajax_referer( 'blog_filter_nonce', 'nonce' );

    $category    = isset( $_POST['category'] ) ? sanitize_title( wp_unslash( $_POST['category'] ) ) : '';
    $paged       = isset( $_POST['paged'] ) ? max( 1, absint( $_POST['paged'] ) ) : 1;
    
    $featured_post_id   = 0;
    $featured_post_html = '';

    // Only render featured post on page 1
    if ( 1 === $paged ) {
        $featured_args = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        );

        if ( $category ) {
            $featured_args['category_name'] = $category;
        }

        $featured_query = new WP_Query( $featured_args );

        ob_start();
        if ( $featured_query->have_posts() ) {
            while ( $featured_query->have_posts() ) {
                $featured_query->the_post(); // Populates global $post context for template tags
                $featured_post_id = get_the_ID();
                get_template_part( 'template-parts/content-featured-post-card' );
            }
            wp_reset_postdata();
        }
        $featured_post_html = ob_get_clean();
    }

    $args = array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => get_option( 'posts_per_page' ),
        'post__not_in'        => $featured_post_id ? array( $featured_post_id ) : array(),        
        'paged'               => $paged,
        'ignore_sticky_posts' => true,
    );

    if ( $category ) {
        $args['category_name'] = $category;
    }

    $query = new WP_Query( $args );

    ob_start();

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            get_template_part( 'template-parts/content-post-card');
        }
    } else {
        echo '';
    }
    wp_reset_postdata();
    $posts_html = ob_get_clean();

    wp_send_json_success( array(
        'feature_post_html'=> $featured_post_html,
        'posts_html' => $posts_html,
        'max_pages'  => (int) $query->max_num_pages,
    ) );
}
add_action( 'wp_ajax_filter_posts', 'mytheme_filter_posts' );        // logged-in users
add_action( 'wp_ajax_nopriv_filter_posts', 'mytheme_filter_posts' ); // visitors