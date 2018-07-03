<?php
/**
* prefooter
* -----------------------------------------------------------------------------
*
* prefooter component
*/

$defaults = [
  'title'     => false,
  'content'   => '',
  'image'     => false,
  'overlay'   => 0.6
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
$id = ( $component_args['id'] ? $component_args['id'] : uniqid('prefooter-') );

$title          = $component_data['title'];
$content        = $component_data['content'];
$image          = $component_data['image'];
$overlay        = $component_data['overlay'];

if( $image ) {
  $bg = ' data-backgrounder';
}else{
  $bg = '';
}

if ( !$title && !$content ) return;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<aside class="ll-prefooter <?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="prefooter"<?php echo $bg; ?>>

  <?php if( $image ) : ?>
  <div class="prefooter__feature feature">

    <?php echo ll_format_image($image); ?>

  </div><!-- .prefooter__feature.feature -->
  <?php endif; ?>

  <style>
    #<?php echo $id; ?>:before {
      position: absolute;
      content: '';
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      opacity: <?php echo $overlay; ?>;
      background-color: rgba(17,43,95,0.5);
      background: linear-gradient(270deg, #00959B 0%, #20337B 100%);
    }
  </style>

  <?php if( $title ) : ?>
  <div class="container row">

    <h2 class="prefooter__title text-center col col-md-6of12 col-lg-8of12 col-xl-10of12">
      <?php echo $title; ?>
    </h2><!-- .prefooter__section -->

  </div><!-- .container -->
  <?php endif; ?>

  <?php if( $content ) : ?>
  <div class="container row">

    <div class="prefooter__content text-center col col-md-6of12 col-lg-8of12 col-xl-10of12">
      <?php echo format_text($content); ?>
    </div><!-- .prefooter__content -->

  </div><!-- .container -->
  <?php endif; ?>

</aside>