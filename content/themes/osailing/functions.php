<?php

// Bonne pratique dans le fichier "functions.php"
// => vérifier que la fonction n'existe pas, avant de la déclarer
if (!function_exists('osailing_setup')) {
    // Déclaration de la fonction gérant le configuration du thème
    function osailing_setup() {
        // https://github.com/O-clock-Alumni/fiches-recap/blob/master/wordpress/themes/setup-theme.md#title-tag
        // On demande à Wordpress de gérer la balise <title> pour nous dans le <head>
        add_theme_support( 'title-tag' );

        // https://github.com/O-clock-Alumni/fiches-recap/blob/master/wordpress/themes/setup-theme.md#menus-de-navigation
        // On demande à Wordpress d'activer les menus (dans le BackOffice)
        add_theme_support( 'menus' );

        // https://github.com/O-clock-Alumni/fiches-recap/blob/master/wordpress/themes/setup-theme.md#enregistrement-dun-menu
        // Ici, on définit un "emplacement" pour les menus
        // => dans le BO, on pourra créer un menu et l'appliquer à cet emplacement
        register_nav_menus([
            // ici on décide du slug de l'emplacement (main) et du nom apparaissant dans le backOffice (Pricnipal)
            'main' => 'Principal'
        ]);
    }
}
// Ajout d'une action au Hook 'after_setup_theme'
add_action( 'after_setup_theme', 'osailing_setup' );

// Bonne pratique dans le fichier "functions.php"
// => vérifier que la fonction n'existe pas, avant de la déclarer
if (!function_exists('osailing_scripts')) {
    // Déclaration de la fonction gérant la défintion des JS & CSS
    function osailing_scripts() {
        // Ajout de reset.css
        // wp_enqueue_style( 'reset', get_theme_file_uri() . 'public/assets/css/reset.css');
        
        // Ajout de style.css
        wp_enqueue_style( 'main', get_theme_file_uri() . 'public/assets/css/style.css');
    }
}
// On dit à Wordpress d'exécuter la fonction "osailing_scripts"
// lors que l'event (hook) "wp_enqueue_scripts" survient
add_action( 'wp_enqueue_scripts', 'osailing_scripts' );


// On veut restreindre le nombre de caractères des résumés (excerpt)
// Pour cela, on doit utiliser un hook sur le contenu => un hook de type filtre : excerpt_length
function osailing_excerpt_length() {
    // Retourne le nombre de mots max pour chaque "excerpt"
    return 25;
}
add_filter( 'excerpt_length', 'osailing_excerpt_length' );

// On supprime des scripts ajoutés par défaut par Wordpress dans wp_head
// Supprime WP EMOJI
remove_action( 'wp_head', 'print_emoji_detection_script', 7);
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_print_styles', 'print_emoji_styles');

// Supprime le lien vers Windows Live Editor Manifest
remove_action( 'wp_head', 'wlwmanifest_link' );

// Supprime le lien RSD + XML
remove_action( 'wp_head', 'rsd_link' ); 

// Supprime la meta generator
remove_action( 'wp_head', 'wp_generator' ); 

// Supprime les extra feed rss
remove_action( 'wp_head', 'feed_links_extra', 3 ); 

// Supprime les feeds des Posts et des Commentaires
remove_action( 'wp_head', 'feed_links', 2 ); 