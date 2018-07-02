<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
    return '&hellip; <br><a class="blog__excerpt__more" href="' . get_permalink() . '">' . __('View More', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');
