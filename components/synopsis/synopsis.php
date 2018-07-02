<?php
/**
* synopsis
* -----------------------------------------------------------------------------
*
* synopsis component
*/

$defaults = [
  'headline'     => false,
  'content'      => false,
  'application'  => false,
  'procedure'    => false,
  'recovery'     => false
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
$id = ( $component_args['id'] ? $component_args['id'] : uniqid('synopsis-') );
$headline    = $component_data['headline'];
$content     = $component_data['content'];
$application = $component_data['application'];
$procedure   = $component_data['procedure'];
$recovery    = $component_data['recovery'];

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<header class="ll-synopsis <?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="synopsis">

  <div class="container row between">

    <div class="synopsis__col synopsis__description col col-md-6of12 col-lg-6of12 col-xl-6of12 center">
    <?php if( $headline ) : ?>
      <h2 class="synopsis__header"><?php echo $headline; ?></h2>
    <?php endif; ?>

    <?php if( $content ) : ?>
      <?php echo $content; ?>
    <?php endif; ?>
    </div><!-- .synopsis__col -->

    <div class="synopsis__col col col-md-6of12 col-lg-6of12 col-xl-6of12 center">

      <div class="row between">
      <?php if( $application ) : ?>
        <div class="synopsis__treatment" data-clickable>

          <svg class="icon icon-download">
            <use xlink:href="#icon-download"></use>
          </svg>

          <div class="synopsis__treatment__description">
            <h4>What It Treats</h4>
            <?php echo format_text($application); ?>
          </div><!-- .synopsis__treatment__description -->

        </div><!-- .synopsis__treatment -->
      <?php endif; ?>

      <?php if( $procedure ) : ?>
        <div class="synopsis__procedure" data-clickable>

          <svg class="icon icon-download">
            <use xlink:href="#icon-download"></use>
          </svg>

          <div class="synopsis__procedure__description">
            <h4>Procedure Time</h4>
            <?php echo format_text($procedure); ?>
          </div><!-- .synopsis__procedure__description -->

        </div><!-- .synopsis__procedure -->
      <?php endif; ?>

      <?php if( $recovery ) : ?>
        <div class="synopsis__recovery" data-clickable>

          <svg class="icon icon-download">
            <use xlink:href="#icon-download"></use>
          </svg>

          <div class="synopsis__recovery__description">
            <h4>Recovery Time</h4>
            <?php echo format_text($recovery); ?>
          </div><!-- .synopsis__recovery__description -->

        </div><!-- .synopsis__recovery -->
      <?php endif; ?>

      </div><!-- .row -->

    </div><!-- .synopsis__col -->

  </div><!-- .container.row.between -->

</header>