<?php
get_header();
?>

    <main id="primary" class="site-main">
        <section class="banner">

            <!-- Div enveloppante pour la vidéo -->
            <div class="video-container">
                <video autoplay muted loop id="bg-video" class="fade-in-down">
                    <source src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/video_header.mp4' ); ?>" type="video/mp4">
                    <?php esc_html_e('Votre navigateur ne supporte pas les balises vidéo.', 'foce'); ?>
                </video>
            </div>

            <!-- Div enveloppante pour le logo -->
            <div class="logo-container">
                <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/logo.png' ); ?>" class="fade-in-up" alt="<?php esc_attr_e('logo Fleurs d\'oranger & chats errants', 'foce'); ?>">
            </div>
        </section>

        <section id="story" class="story fade-in-up">
            <h2 class="animated-heading"><span class="hidden-text"><?php esc_html_e('L\'histoire', 'foce'); ?></span></h2>
            <article id="" class="story__article">
                <p><?php echo esc_html( get_theme_mod('story') ); ?></p>
            </article>
            <?php
            $args = array(
                'post_type' => 'characters',
                'posts_per_page' => -1,
                'meta_key'  => '_main_char_field',
                'orderby'   => 'meta_value_num',
            );
            $characters_query = new WP_Query($args);
            ?>

            <article id="characters">
                <div class="main-character">
                    <h3 class="animated-heading"><span class="hidden-text"><?php esc_html_e('Les personnages', 'foce'); ?></span></h3>
                </div>

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        while ( $characters_query->have_posts() ) {
                            $characters_query->the_post();
                            echo '<div class="swiper-slide">';
                            echo '<figure>';
                            echo get_the_post_thumbnail( get_the_ID(), 'full' );
                            echo '<figcaption>';
                            the_title();
                            echo '</figcaption>';
                            echo '</figure>';
                            echo '</div>'; // Fin swiper-slide
                        }
                        wp_reset_postdata(); // Reset query
                        ?>
                    </div>
                    <!-- Ajout des boutons pour naviguer dans le slider -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </article>

            <article id="place">
                <div>
                    <h3 class="animated-heading"><span class="hidden-text"><?php esc_html_e('Le Lieu', 'foce'); ?></span></h3>
                    <p><?php echo esc_html( get_theme_mod('place') ); ?></p>
                </div>

                <!-- Ajout des nuages -->
                <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/big_cloud.png' ); ?>" class="cloud big-cloud" alt="<?php esc_attr_e('Grand nuage', 'foce'); ?>">
                <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/little_cloud.png' ); ?>" class="cloud little-cloud" alt="<?php esc_attr_e('Petit nuage', 'foce'); ?>">
            </article>
        </section>

        <section id="studio" class="fade-in-up">
            <h2 class="animated-heading"><span class="hidden-text"><?php esc_html_e('Studio Koukaki', 'foce'); ?></span></h2>
            <div>
                <p>Acteur majeur de l’animation, Koukaki est un studio intégré fondé en 2012 qui créé, produit et distribue des programmes originaux dans plus de 190 pays pour les enfants et les adultes. Nous avons deux sections en activité : le long métrage et le court métrage. Nous développons des films fantastiques, principalement autour de la culture de notre pays natal, le Japon.</p>
                <p>Avec une créativité et une capacité d’innovation mondialement reconnues, une expertise éditoriale et commerciale à la pointe de son industrie, le Studio Koukaki se positionne comme un acteur incontournable dans un marché en forte croissance. Koukaki construit chaque année de véritables succès et capitalise sur de puissantes marques historiques. Cette année, il vous présente “Fleurs d’oranger et chats errants”.</p>
            </div>
        </section>

        <section id="nomination" class="nomination">
            <h3 class="animated-heading"><span class="hidden-text"><?php esc_html_e('Fleurs d’oranger & chats errants est nominé aux Oscars Short Film Animated de 2022 !', 'foce'); ?></span></h3>
            <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/18-courts-metrages-francais-d-animation-eligibles-aux-oscars-2021.png' ); ?>" alt="Oscars Nomination">
        </section>
    </main><!-- #main -->

<?php
get_footer();
?>