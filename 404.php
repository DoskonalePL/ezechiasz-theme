<?php get_header(); ?>

<div class="error-404-content">

    <h1>Błąd 404: Strona nie została znaleziona</h1>

    <p>Przykro nam, ale strona, której szukasz, nie istnieje. Być może została usunięta, zmieniła nazwę lub po prostu wkradł się błąd w adresie.</p>

    <p>Spróbuj skorzystać z wyszukiwarki poniżej lub wróć na stronę główną.</p>

    <?php get_search_form(); ?>

    <a href="<?php echo esc_url(home_url('/')); ?>" class="button-404">Wróć na stronę główną</a>

</div>

<?php get_footer(); ?>