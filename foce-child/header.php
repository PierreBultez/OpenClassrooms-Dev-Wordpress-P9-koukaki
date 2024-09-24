<?php
/**
 * The header for our child theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fleurs_d\'oranger_&_Chats_errants
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'foce' ); ?></a>
    <header id="masthead" class="site-header">
        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
            <ul>
                <li class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></li>
            </ul>
            <div id="burger-menu">
                <span></span>
            </div>
            <div id="menu">
                <ul>
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/Image logo en paralax.png' ); ?>" alt="Logo en Parallaxe">
                    <li><a href="#story"><p><span class="hidden-text"><?php esc_html_e('Histoire', 'foce'); ?></span></p></a></li>
                    <li><a href="#characters"><p><span class="hidden-text"><?php esc_html_e('Personnages', 'foce'); ?></span></p></a></li>
                    <li><a href="#place"><p><span class="hidden-text"><?php esc_html_e('Lieu', 'foce'); ?></span></p></a></li>
                    <li><a href="#studio"><p><span class="hidden-text"><?php esc_html_e('Studio Koukaki', 'foce'); ?></span></p></a></li>
                    <p><?php esc_html_e('STUDIO KOUKAKI', 'foce'); ?></p>
                </ul>
                <!-- Conteneur pour les décorations (fleurs et chats) -->
                <div class="decorations">
                    <!-- Images des fleurs -->
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/orchid.png' ); ?>" class="flower flower-1" alt="<?php esc_attr_e('Orchidée', 'foce'); ?>">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/flower.png' ); ?>" class="flower flower-2" alt="<?php esc_attr_e('Fleur', 'foce'); ?>">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/Sunflower.png' ); ?>" class="flower flower-3" alt="<?php esc_attr_e('Tournesol', 'foce'); ?>">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/random_flower.png' ); ?>" class="flower flower-4" alt="<?php esc_attr_e('Fleur aléatoire', 'foce'); ?>">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/hibiscus_footer.png' ); ?>" class="flower flower-5" alt="<?php esc_attr_e('Hibiscus', 'foce'); ?>">

                    <!-- Images des chats -->
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/cat.png' ); ?>" class="cat cat-1" alt="<?php esc_attr_e('Chat 1', 'foce'); ?>">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/cat_2.png' ); ?>" class="cat cat-2" alt="<?php esc_attr_e('Chat 2', 'foce'); ?>">
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/cat_3.png' ); ?>" class="cat cat-3" alt="<?php esc_attr_e('Chat 3', 'foce'); ?>">
                </div>
            </div>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->
