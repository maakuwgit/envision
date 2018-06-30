<?php
/**
* image-w-caption
* -----------------------------------------------------------------------------
*
* image-w-caption component
*/

$defaults = [
  'image'   => false,
  'caption' => false
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
$id = ( $component_args['id'] ? $component_args['id'] : uniqid('image-w-caption-') );

$image              = $component_data['image'];
$caption            = $component_data['caption'];

if( $image ) {
  $bg = ' data-backgrounder';
}else{
  $bg = '';
}
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-image-w-caption <?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="image-w-caption"<?php echo $bg; ?>>

  <?php if( $image ) : ?>
    <div class="image-w-caption__feature feature">

    <?php echo ll_format_image($image); ?>

    </div><!-- .image-w-caption__feature.feature -->
  <?php endif; ?>

  <?php if ( $caption ) : ?>
    <div class="image-w-caption__caption col col-md-10of12 col-lg-9of12 col-xl-10of12 end">
      <?php echo $caption; ?>
    </div>
    <!-- .image-w-caption__caption -->
  <?php endif; ?>

</section>
