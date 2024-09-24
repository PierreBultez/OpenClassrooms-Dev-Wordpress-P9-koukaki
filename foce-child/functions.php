<?php
// Enqueue parent theme style and necessary scripts
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    // Enqueue SwiperJS CSS
    wp_enqueue_style( 'swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), null );

    // Enqueue SwiperJS JS
    wp_enqueue_script( 'swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true );

    // Enqueue custom JS, ensuring it's only enqueued once
    if ( !wp_script_is( 'custom-scripts', 'enqueued' ) ) {
        wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('swiper-js'), null, true );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// Get customizer options from parent theme
if ( get_stylesheet() !== get_template() ) {
    add_filter('pre_update_option_theme_mods_' . get_stylesheet(), function ($value, $old_value) {
        update_option('theme_mods_' . get_template(), $value);
        return $old_value; // Prevent update to child theme mods
    }, 10, 2);

    add_filter('pre_option_theme_mods_' . get_stylesheet(), function ($default) {
        return get_option('theme_mods_' . get_template(), $default);
    });
}
