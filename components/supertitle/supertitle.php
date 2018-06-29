<?php
/**
* supertitle
* -----------------------------------------------------------------------------
*
* supertitle component
*/

$defaults = [
  'text' => 'The Best Medical Spa in Rochester New York'
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
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<h1 class="ll-supertitle <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="supertitle"><?php echo $component_data['text']; ?></h1>