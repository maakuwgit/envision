<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
    return '&hellip;';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Filter the excerpt length to 50 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function roots_slug_excerpt_length( $length ) {
        if ( is_admin() ) {
                return $length;
        }
        return 12;
}
add_filter( 'excerpt_length', 'roots_slug_excerpt_length' );
