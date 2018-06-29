<?php
/**
* lr-blocks
* -----------------------------------------------------------------------------
*
* lr-blocks component
*/

$defaults = [
  'image'      => false,
  'content'    => false,
  'style'      => false
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
$content            = $component_data['content'];
$style              = $component_data['style'];

if( $image ) {
  $bg = ' data-backgrounder';
}else{
  $bg = '';
}

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-lr-blocks<?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="lr-blocks">

  <?php if( $content ) : ?>
    <div class="lr-blocks__content col col-md-7of12 col-lg-7of12 col-xl-7of12">
      <?php echo $content; ?>
    </div><!-- .lr-block__content -->
  <?php endif; ?>

  <?php if( $image ) : ?>
    <figure class="lr-blocks__figure col col-md-7of12 col-lg-7of12 col-xl-7of12"<?php echo $bg;?>>
      <div class="lr-blocks__feature feature">

      <?php echo ll_format_image($image); ?>

      </div><!-- .lr-blocks__feature.feature -->
    </figure><!-- .lr-blocks__figure -->
  <?php endif; ?>

</section>