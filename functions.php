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

/**
 * Zmienia domyślne [...] na końcu zajawki na link "Czytaj dalej".
 */
function ezechiasz_theme_excerpt_more($more)
{
    return '... <a class="read-more" href="' . get_permalink() . '">Czytaj dalej &raquo;</a>';
}
add_filter('excerpt_more', 'ezechiasz_theme_excerpt_more');

/**
 * Inicjalizacja obszarów widgetów.
 */
function ezechiasz_theme_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Główny Pasek Boczny', 'ezechiasz-theme'),
            'id'            => 'main-sidebar',
            'description'   => esc_html__('Dodaj widgety, aby pojawiły się w pasku bocznym.', 'ezechiasz-theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'ezechiasz_theme_widgets_init');
