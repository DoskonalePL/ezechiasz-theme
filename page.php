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
            </div>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; ?>
<?php else : ?>
    <p>Nie znaleziono żadnych wpisów.</p>
<?php endif; ?>

<?php get_footer(); ?>