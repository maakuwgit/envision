<?php
/**
* location-hero-banner
* -----------------------------------------------------------------------------
*
* location-hero-banner component
*/

$defaults = [
  'heading' => false,
  'subheading' => false,
  'map' => false
];

$component_data = ll_parse_args( $component_data, $defaults );

if ( ll_empty( $component_data ) ) return;

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
$id               = ( $component_args['id'] ? $component_args['id'] : uniqid('location-hero-') );

/**
 * ACF values pulled into the component fromt the components.php partial.
 */
$heading          = $component_data['heading']['text'];
$heading_tag      = $component_data['heading']['tag'];
$subheading       = $component_data['subheading']['text'];
$subheading_tag   = $component_data['subheading']['tag'];
$map              = $component_data['map'];
$mid              = uniqid('location-hero-map-');
?>

<header class="ll-location-hero-banner hdg relative<?php echo implode( " ", $classes ); ?>" <?php echo ( $id ? 'id="'.$id.'"' : '' ) ?> data-component="location-hero-banner">

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

  <div class="google-map__wrapper" id="<?php echo $mid; ?>" data-locations='<?php echo json_encode( $map ); ?>'>
  </div>
  <!-- .google-map__wrapper -->

  <div class="container row centered">

  <?php if( $heading ) : ?>
    <!-- .location__page_title -->
    <<?php echo $heading_tag; ?> class="location__heading hdg__heading col col-md-8of12 col-lg-8of12 col-xl-9of12">
    <?php echo $heading; ?>
    </<?php echo $heading_tag; ?>>
    <!-- .location__heading -->
  <?php endif; ?>

  <?php if ( $subheading ) : ?>
    <<?php echo $subheading_tag; ?> class="location__subheading hdg__subheading col col-md-8of12 col-lg-8of12 col-xl-9of12">
      <?php echo $subheading; ?>
    </<?php echo $subheading; ?>>
  <?php endif; ?>

  </div><!-- .container -->

</header>