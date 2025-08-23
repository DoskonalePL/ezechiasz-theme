<?php get_header(); ?>

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
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; ?>
<?php else : ?>
    <p>Nie znaleziono żadnych wpisów.</p>
<?php endif; ?>

<?php get_footer(); ?>