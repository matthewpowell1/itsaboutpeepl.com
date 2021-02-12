<?php

function peepl_enqueue_styles() {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'peepl-style',
        get_stylesheet_uri(),
        array(
            'twenty-twenty-one-style'
        ),
        wp_get_theme()->get( 'Version' )
    );
}

add_action( 'wp_enqueue_scripts', 'peepl_enqueue_styles' );


function peepl_enqueue_admin_styles() {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'peepl-admin-style',
        get_stylesheet_uri(),
        array( ),
        wp_get_theme()->get( 'Version' )
    );
}

add_action( 'admin_enqueue_scripts', 'peepl_enqueue_admin_styles' );


function peepl_enqueue_editor_styles() {
    add_editor_style(
        '/editor-style.css'
    );
}

add_action( 'admin_init', 'peepl_enqueue_editor_styles' );


function peepl_google_fonts_resource_hint($hints, $relation_type) {
    if ( $relation_type === 'preconnect' ) {
        $hints[] = 'https://fonts.gstatic.com';
    }
    return $hints;
}

add_filter( 'wp_resource_hints', 'peepl_google_fonts_resource_hint', 10, 2 );
