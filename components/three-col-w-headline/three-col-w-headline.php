<?php
/**
* three-col-w-headline, also known as a Shadowbox
* -----------------------------------------------------------------------------
*
* three-col-w-headline component
*/

$defaults = [
  'title'       => false,
  'columns'     => false,
  'num_columns' => 3
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
$id = ( $component_args['id'] ? $component_args['id'] : uniqid('three-column-w-headline-') );

/**
 * ACF values pulled into the component from the components.php partial.
 */
$title        = $component_data['title'];
$columns      = $component_data['columns'];
$num_columns  = $component_data['num_columns'];

$colspan = 12 / $num_columns;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-three-col-w-headline <?php echo 'col-' . $num_columns . '-up';?> <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="three-col-w-headline">

<?php if( $title ) : ?>
  <header class="three-column-w-headline__header container row centered">
    <<?php echo $title['tag']; ?> class="text-center"><?php echo $title['text']; ?></<<?php echo $title['tag']; ?>>
  </header><!-- .container.row.centered -->
<?php endif; ?>

  <div class="three-column-w-headline__blocks container row start">

  <?php if( $columns ) : ?>
    <?php foreach( $columns as $column ) : ?>

    <div class="three-column-w-headline__block col col-sm-6of12 col-md-4of12 col-lg-<?php echo $colspan; ?>of12 col-xl-<?php echo $colspan; ?>of12">
      <h3 class="three-column-w-headline__block__title"><?php echo $column['title']; ?></h3>
      <?php echo $column['content']; ?>
    </div>
    <!-- .three-column-w-headline__block -->

    <?php endforeach; ?>
  <?php endif; ?>

  </div><!-- .container.row.start -->

</section>