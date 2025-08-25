<?php

/**
 * Szablon dla paska bocznego (sidebar).
 *
 * @package Ezechiasz_Theme
 */

if (! is_active_sidebar('main-sidebar')) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar('main-sidebar'); ?>
</aside>