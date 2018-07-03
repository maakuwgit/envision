<?php
/**
* image-slider
* -----------------------------------------------------------------------------
*
* image-slider component
*/

$defaults = [
  'slides' => false,
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
$id               = ( $component_args['id'] ? $component_args['id'] : uniqid('location-hero-') );

/**
 * ACF values pulled into the component from the components.php partial.
 */
$slides = $component_data['slides'];

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-image-slider<?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="image-slider">

  <div class="image-slider__slides">

    <?php foreach( $slides as $slide ) : ?>

    <div class="image-slider__slide">

    <?php echo ll_format_image($slide['image']); ?>

    </div><!-- .image-slider__slide -->

    <?php endforeach; ?>
  </div><!-- .image-slider__slides -->

  <div class="image-slider__nav container between"></div><!-- .image-slider__nav -->

</section>