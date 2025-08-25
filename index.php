<?php get_header(); ?>

<div class="site-content">
    <main>
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
                    <div class="post-meta">
                        <span><?php echo get_the_date(); ?></span>
                        <span>w: <?php the_category(', '); ?></span>
                    </div>
                    <div><?php the_excerpt(); ?></div>
                </article>
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