<?php
/**
* image-slider
* -----------------------------------------------------------------------------
*
* image-slider component
*/

$defaults = [
  'heading'     => false,
  'subheading'  => false,
  'slides'      => false
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
$id               = ( $component_args['id'] ? $component_args['id'] : uniqid('image-slider-') );

/**
 * ACF values pulled into the component from the components.php partial.
 */
$slides     = $component_data['slides'];
$heading    = $component_data['heading'];
$subheading = $component_data['subheading'];

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-image-slider<?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="image-slider">

  <div class="container row centered between">

    <?php if( $heading || $subheading ) : ?>
      <header class="image-slider__heading col text-center">

        <?php if( $heading ) : ?>
        <<?php echo $heading['tag']; ?>><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
        <?php endif; ?>

        <?php if( $subheading ) : ?>
        <?php echo format_text($subheading); ?>
        <?php endif; ?>

      </header><!-- .image-slider__heading -->
    <?php endif; ?>

  </div>

  <div class="image-slider__slides">

    <?php foreach( $slides as $slide ) : ?>

    <div class="image-slider__slide">

    <?php echo ll_format_image($slide['image']); ?>

    </div><!-- .image-slider__slide -->

    <?php endforeach; ?>
  </div><!-- .image-slider__slides -->

  <div class="image-slider__nav container between"></div><!-- .image-slider__nav -->

</section>