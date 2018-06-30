<?php
/**
* procedure-grid
* -----------------------------------------------------------------------------
*
* procedure-grid component
*/

$defaults = [
  'heading'    => false,
  'num_cards' => -1
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
$heading        = $component_data['heading'];
$showposts      = $component_data['num_cards'];

$args = array(
          'post_type'     => 'procedure',
          'post_status'   => 'publish',
          'order'         => 'ASC',
          'showposts'     => $showposts
        );

$procedures = new WP_Query( $args );
?>

<?php if ( $procedures->have_posts() ) : ?>
<section class="ll-procedure-grid <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="procedure-grid">

  <div class="container row centered between">

  <?php if( $heading ) : ?>
    <header class="procedure-grid__heading col text-center">
      <h2><?php echo $heading; ?></h2>
    </header><!-- .procedure-grid__heading -->
  <?php endif; ?>

    <?php
    while( $procedures->have_posts() ) :

      $procedures->the_post();
      $image = get_the_post_thumbnail();
    ?>

      <div class="procedure-grid__procedure_wrapper col col-sm-6of12 col-md-3of12 col-lg-4of12 col-xl-4of12">

        <div class="procedure-grid__procedure">

        <?php if( $image ) : ?>
          <figure class="procedure-grid__procedure__thumbnail thumbnail" data-backgrounder>

            <div class="procedure-grid__procedure__feature feature">

            <?php echo $image; ?>

            </div><!-- .procedure-grid__procedure__feature.feature -->

          </figure>
        <?php endif; ?>

          <h4 class="procedure-grid__procedure__title"><?php echo the_title(); ?></h4>
          <!-- .procedure-grid__procedure__title -->
          <div class="procedure-grid__procedure__body">
            <?php the_excerpt(); ?>
          </div>
          <!-- .procedure-grid__procedure__body -->
          <a class="procedure-grid__procedure__cta" href="<?php the_permalink(); ?>">View Treatment</a>
          <!-- .procedure-grid__procedure__cta -->

        </div>

      </div><!-- .procedure-grid__procedure -->

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

  </div><!-- .container.row.centered.between -->

</section>
<?php endif; ?>