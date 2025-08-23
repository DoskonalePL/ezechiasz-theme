<?php

/**
 * Główny plik funkcyjny motywu Ezechiasz.
 *
 * @package Ezechiasz_Theme
 */

function ezechiasz_theme_setup()
{

    // Rejestracja lokalizacji menu nawigacyjnego
    register_nav_menus(array(
        'primary' => __('Główne Menu', 'ezechiasz-theme'),
    ));

    // Dodanie wsparcia dla obrazków wyróżniających
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'ezechiasz_theme_setup');

function ezechiasz_theme_enqueue_styles()
{

    // Wczytanie głównego arkusza stylów
    wp_enqueue_style('ezechiasz-main-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'ezechiasz_theme_enqueue_styles');
