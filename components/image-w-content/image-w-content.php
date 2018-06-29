<?php
/**
* image-w-content
* -----------------------------------------------------------------------------
*
* image-w-content component
*/

$defaults = [
  'image'   => false,
  'content' => false
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

$image              = $component_data['image'];
$content            = $component_data['content'];

if( $image ) {
  $bg = ' data-backgrounder';
}else{
  $bg = '';
}

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-image-w-content <?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="image-w-content">

  <div class="container row stretch">
    <figure class="image-w-content__figure col col-md-6of12 col-lg-6of12 col-xl-6of12"<?php echo $bg; ?>>

    <?php if( $image ) : ?>
      <div class="image-w-content__feature feature">

      <?php echo ll_format_image($image); ?>

      </div><!-- .image-w-content__feature.feature -->
    <?php endif; ?>

    </figure>

  <?php if ( $content ) : ?>
    <div class="image-w-content__content col col-md-6of12 col-lg-6of12 col-xl-6of12">
      <?php echo $content; ?>
    </div>
    <!-- .image-w-content__content -->
  <?php endif; ?>

  </div><!-- .container.row -->

</section>