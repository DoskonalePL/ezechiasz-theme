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

    // Dodanie wsparcia dla własnego logo
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 100, // Przykładowa sugerowana wysokość w pixelach
            'width'       => 400, // Przykładowa sugerowana szerokość w pixelach
            'flex-height' => true,
            'flex-width'  => true,
        )
    );
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

/**
 * Dodaje opcje personalizacji motywu do panelu "Dostosuj".
 *
 * @param WP_Customize_Manager $wp_customize Obiekt menedżera personalizacji.
 */
function ezechiasz_theme_customize_register($wp_customize)
{

    // 1. Dodaj nową sekcję o nazwie "Kolory"
    $wp_customize->add_section('ezechiasz_colors', array(
        'title'    => __('Kolory', 'ezechiasz-theme'),
        'priority' => 30,
    ));

    // 2. Zarejestruj ustawienie, które będzie przechowywać nasz kolor
    $wp_customize->add_setting('ezechiasz_accent_color', array(
        'default'   => '#0073aa', // Kolor domyślny
        'transport' => 'refresh', // Sposób odświeżania podglądu (pełne przeładowanie)
    ));

    // 3. Dodaj kontrolkę (próbnik kolorów) do zmiany tego ustawienia
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ezechiasz_accent_color_control', array(
        'label'    => __('Główny Kolor Akcentów', 'ezechiasz-theme'),
        'section'  => 'ezechiasz_colors', // Przypisz do naszej nowej sekcji "Kolory"
        'settings' => 'ezechiasz_accent_color', // Połącz z naszym nowym ustawieniem
    )));
}
add_action('customize_register', 'ezechiasz_theme_customize_register');

/**
 * Generuje i wstrzykuje niestandardowe style CSS na podstawie opcji z Customizera.
 */
function ezechiasz_theme_customize_css()
{
?>
    <style type="text/css">
        a,
        .read-more,
        .post-meta a:hover,
        .archive-title {
            color: <?php echo get_theme_mod('ezechiasz_accent_color', '#0073aa'); ?>;
        }

        .page-numbers.current,
        .page-numbers:hover,
        .form-submit .submit {
            background-color: <?php echo get_theme_mod('ezechiasz_accent_color', '#0073aa'); ?>;
        }
    </style>
<?php
}
add_action('wp_head', 'ezechiasz_theme_customize_css');
