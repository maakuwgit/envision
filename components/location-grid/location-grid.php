<?php
/**
* location-grid
* -----------------------------------------------------------------------------
*
* location-grid component
*/

$defaults = [
  'num_locations'     => 3,
];

$component_data = ll_parse_args( $component_data, $defaults );
?>

<?php
/**
 * Any additional classes to apply to the main component container.
 *
 * @var array
 * @see args['classes']
 */
$classes        = $component_args['classes'] ?: array();

/**
 * ID to apply to the main component container.
 *
 * @var array
 * @see args['id']
 */
$id = ( $component_args['id'] ? $component_args['id'] : uniqid('image-w-content-') );

/**
 * ACF values pulled into the component from the components.php partial.
 */
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<div class="ll-location-grid flex <?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="location-grid">

<?php
  $args = array(
            'post_type'     => 'location',
            'post_status'   => 'publish',
            'order'         => 'ASC',
            'showposts'     => -1
          );

  $locations = new WP_Query( $args );

  if ( $locations->have_posts() ) :
?>
    <div class="ll-location-grid__locations">
      <?php while( $locations->have_posts() ) : ?>
        <?php
          $locations->the_post();
          $address = get_field('location_address');
          $fax     = get_field('location_fax');
          $phone   = get_field('location_phone');
        ?>
        <div class="ll-location-grid__location">
          <h4 class="ll-location-grid__location__title"><?php echo the_title(); ?></h4>

          <?php if( $address ) : ?>
            <address class="ll-location-grid__location__address"><?php echo $address; ?></address>
          <?php endif; ?>

          <?php if( $phone ) : ?>
            <a class="ll-location-grid__location__phone" href="tel:+1<?php echo $phone; ?>">Phone: <?php echo format_phone($phone, false, '.'); ?></a>
          <?php endif; ?>

          <?php if( $fax ) : ?>
            <a class="ll-location-grid__location__fax" href="tel:+1<?php echo $fax; ?>">Fax: <?php echo format_phone($fax, false, '.'); ?></a>
          <?php endif; ?>

          <a class="ll-location-grid__location__directions" href="https://www.google.com/maps/place/<?php echo $address; ?>">Get Directions</a>
        </div>
      <?php endwhile; ?>
    </div>

  <?php wp_reset_postdata(); ?>
<?php endif; ?>