<?php

/**
 * Główny plik funkcyjny motywu Ezechiasz.
 *
 * @package Ezechiasz_Theme
 */

function ezechiasz_theme_enqueue_styles()
{

    // Wczytanie głównego arkusza stylów
    wp_enqueue_style('ezechiasz-main-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'ezechiasz_theme_enqueue_styles');
