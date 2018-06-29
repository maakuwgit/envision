<?php
/**
* two-col-w-headline
* -----------------------------------------------------------------------------
*
* two-col-w-headline component
*/

$defaults = [
  'title'     => false,
  'l_content' => false,
  'r_content' => false
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

$title        = $component_data['title'];
$l_content    = $component_data['l_content'];
$r_content    = $component_data['r_content'];

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-two-column-w-headline <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="two-column-w-headline">

  <header class="container">
    <h2><?php echo $title; ?></h2>
  </header><!-- .container -->

  <div class="container row">


    <div class="two-column-w-headline__block col col-md-6of12 col-lg-6of12 col-xl-6of12">
      <?php echo $l_content; ?>
    </div>
    <!-- .two-col-w-headline__block -->

    <div class="two-column-w-headline__block col col-md-6of12 col-lg-6of12 col-xl-6of12">
      <?php echo $r_content; ?>
    </div>
    <!-- .two-col-w-headline__block -->

  </div><!-- .container.row -->

</section>