<?php
/**
* call-to-action
* -----------------------------------------------------------------------------
*
* call-to-action component
*/

$defaults = [
  'form_id' => false
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
$component_id   = $component_args['id'];
$form_id        = $component_data['form_id'];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<aside class="ll-call-to-action <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="call-to-action">

  <div class="container">
  <?php if( is_plugin_active( 'gravityforms/gravityforms.php' ) ) : ?>

    <?php gravity_form( $form_id, true, true ); ?>

  <?php endif; ?>
  </div>

</aside>