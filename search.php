<?php get_header(); ?>

<header class="page-header">
    <h1 class="page-title">
        <?php
        /* translators: %s: search query. */
        printf(esc_html__('Wyniki wyszukiwania dla: %s', 'ezechiasz-theme'), '<span>' . get_search_query() . '</span>');
        ?>
    </h1>
</header>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article>
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                </div>
            <?php endif; ?>
            <h2>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
            <div><?php the_excerpt(); ?></div>
        </article>
    <?php endwhile; ?>
<?php else : ?>

    <p>Niestety, nic nie znaleziono dla Twojego zapytania. Spróbuj wyszukać ponownie, używając innych słów kluczowych.</p>
    <?php get_search_form(); ?>

<?php endif; ?>

<?php get_footer(); ?>