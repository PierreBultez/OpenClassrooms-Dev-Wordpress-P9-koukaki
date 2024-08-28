<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// Get customizer options form parent theme
if ( get_stylesheet() !== get_template() ) {
    add_filter( 'pre_update_option_theme_mods_' . get_stylesheet(), function ( $value, $old_value ) {
        update_option( 'theme_mods_' . get_template(), $value );
        return $old_value; // prevent update to child theme mods
    }, 10, 2 );
    add_filter( 'pre_option_theme_mods_' . get_stylesheet(), function ( $default ) {
        return get_option( 'theme_mods_' . get_template(), $default );
    } );

// import librairie AOS-JS
function theme_enqueue_scripts() {
    // Enqueue AOS CSS
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');

    // Enqueue AOS JS
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), false, true);

    // Initialize AOS
    wp_add_inline_script('aos-js', 'AOS.init();');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

}

function add_custom_scripts() {
    // Enregistre le script avec WordPress, définit une URL et ajoute une dépendance à jQuery (si nécessaire)
    wp_register_script('title-animation-script', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);

    // Met le script en queue pour qu'il soit chargé dans le pied de page
    wp_enqueue_script('title-animation-script');
}

// Ajoute l'action à WordPress
add_action('wp_enqueue_scripts', 'add_custom_scripts');
