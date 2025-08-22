<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <div class="post-meta">
                <span>Opublikowano: <?php echo get_the_date(); ?></span>
                <span>przez: <?php the_author(); ?></span>
            </div>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; ?>
<?php else : ?>
    <p>Nie znaleziono żadnych wpisów.</p>
<?php endif; ?>

<?php get_footer(); ?>