<?php
/**
* Loop Video
* -----------------------------------------------------------------------------
*
* Loop Video component
*/

$defaults = [
  'video'    => null,
  'fallback' => null,
  'overlay'  => 0
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
$id = ( $component_args['id'] ? $component_args['id'] : uniqid('loop-video-') );

$overlay = $component_data['overlay'];

if ( $component_data['fallback'] ) {
 $style = 'style="background-image: url( '.$component_data['fallback'].' );"';
} else {
 $style = '';
}

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<div class="loop-video-container <?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="loop-video" <?php echo $style; ?>>

  <?php if( $overlay ) : ?>
  <style>
    #<?php echo $id; ?>:before {
      position: absolute;
      content: '';
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 1;
      opacity: <?php echo $overlay; ?>;
      background-color: rgba(17,43,95,0.5);
      background: linear-gradient(270deg, #00959B 0%, #20337B 100%);
    }
  </style>
<?php endif; ?>

  <video class="loop-video" muted autoplay loop playsinline poster="<?php echo $component_data['fallback']; ?>">
    <source src="<?php echo $component_data['video']; ?>">
  </video>
</div>
