<?php
/**
* hero-banner
* -----------------------------------------------------------------------------
*
* hero-banner component
*/

$defaults = [
  'heading'       => false,
  'subheading'    => false,
  'content'       => false,
  'image'         => false,
  'looping_video' => false,
  'overlay'       => 0.6
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
$id = ( $component_args['id'] ? $component_args['id'] : uniqid('hero-banner-') );

/**
 * ACF values pulled into the component from the components.php partial.
 */
$heading            = $component_data['heading']['text'];
$heading_tag        = $component_data['heading']['tag'];
$subheading         = $component_data['subheading']['text'];
$subheading_tag     = $component_data['subheading']['tag'];
$video              = $component_data['looping_video'];
$overlay            = $component_data['overlay'];
$image              = $component_data['image'];

if( $image ) {
  $bg = ' data-backgrounder';
}else{
  $bg = '';
}

if( $page_title_style ) {
  $ps = ' ' . $page_title_style;
}else{
  $ps = '';
}

?>

<div class="ll-hero-banner hdg relative<?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="hero-banner"<?php echo $bg; ?>>

  <?php if( $image ) : ?>
    <div class="hero-banner__feature feature">

    <?php echo ll_format_image($image); ?>

    </div><!-- .hero-banner__feature.feature -->
  <?php endif; ?>

  <?php if( $bg ) : ?>
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
<?php endif; ?>

  <?php
    if( $video ) {

      $loop_video = array(
        'video' => $video,
        'fallback' => wp_get_attachment_url($bg)
      );

      ll_include_component(
        'loop-video',
        $loop_video
      );
    }
  ?>

  <div class="container row centered">

  <?php if( $heading ) : ?>

    <<?php echo $heading_tag; ?> class="hero__heading hdg__heading col col-md-8of12 col-lg-8of12 col-xl-9of12">
      <?php echo $heading; ?>
    </<?php echo $heading_tag; ?>>

    <!-- .hero__heading -->

  <?php endif; ?>

  <?php if ( $subheading ) : ?>

    <<?php echo $subheading_tag; ?> class="hero__subheading hdg__subheading col col-md-8of12 col-lg-9of12 col-xl-8of12">
      <?php echo $subheading; ?>
    </<?php echo $subheading_tag; ?>>
    <!-- .hero__subheading -->
  <?php endif; ?>

  </div>

</div>