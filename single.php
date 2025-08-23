<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article>
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>
            <h1><?php the_title(); ?></h1>
            <div class="post-meta">
                <span>Opublikowano: <?php echo get_the_date(); ?></span>
                <span>przez: <?php the_author(); ?></span>
                <span>w: <?php the_category(', '); ?></span>
            </div>
            <div><?php the_content(); ?></div>
            <?php // Jeśli komentarze są otwarte lub mamy przynajmniej jeden komentarz, wyświetl szablon komentarzy.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif; ?>
        </article>
    <?php endwhile; ?>
<?php else : ?>
    <p>Nie znaleziono żadnych wpisów.</p>
<?php endif; ?>

<?php get_footer(); ?>