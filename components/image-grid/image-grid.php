<?php
/**
* image-grid
* -----------------------------------------------------------------------------
*
* image-grid component
*/

$defaults = [
  'heading'  => false,
  'images'   => false,
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
$id       = ( $component_args['id'] ? $component_args['id'] : uniqid('image-grid-') );

/**
 * ACF values pulled into the component from the components.php partial.
 */
$images   = $component_data['images'];
$heading  = $component_data['heading'];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-image-grid<?php echo $layout . implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="image-grid">

  <div class="container text-center">

  <?php if( $heading  ) : ?>
    <<?php echo $heading['tag']; ?> class="image-grid__heading"><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
  <?php endif; ?><!-- .image-slider__heading -->

<?php if( $images ) : ?>

  <ul class="image-grid__items">

  <?php
    foreach( $images as $image ) :

      $img      = $image['image'];
      $caption  = $image['caption'];

  ?>
    <li class="image-grid__item" data-backgrounder>

    <?php if( $img ) : ?>
      <figure class="image-grid__image feature">
        <?php echo ll_format_image($img); ?>
      </figure><!-- .image-grid__image -->
    <?php else: ?>

      <?php if( $caption ) : ?>
        <div class="image-grid__content text-left">
          <h3 class="image-grid__content__caption"><?php echo $caption; ?></h3>
        </div>
        <!-- .image-grid__content -->
      <?php endif; ?>

    <?php endif; ?>

    </li><!-- .image-grid__item -->

  <?php endforeach; ?>

  </ul><!-- .image-grid__items -->

<?php endif; ?>

  </div><!-- .container text-center -->

</section>