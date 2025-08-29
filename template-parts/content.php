<?php

/**
 * Część szablonu do wyświetlania treści wpisów na listach.
 *
 * @package Ezechiasz_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium'); ?>
            </a>
        </div>
    <?php endif; ?>

    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="post-meta">
        <span><?php echo get_the_date(); ?></span>
        <span>w: <?php the_category(', '); ?></span>
    </div>

    <div><?php the_excerpt(); ?></div>
</article>