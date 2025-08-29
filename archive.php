<?php get_header(); ?>

<header class="archive-header">
    <?php
    the_archive_title('<h1 class="archive-title">', '</h1>');
    the_archive_description('<div class="archive-description">', '</div>');
    ?>
</header>

<div class="site-content">
    <main>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content'); ?>
            <?php endwhile; ?>
            <?php the_posts_pagination(array(
                'prev_text' => __('&laquo; Poprzednia', 'ezechiasz-theme'),
                'next_text' => __('Następna &raquo;', 'ezechiasz-theme'),
            )); ?>
        <?php else : ?>
            <p>Nie znaleziono żadnych wpisów.</p>
        <?php endif; ?>

    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>