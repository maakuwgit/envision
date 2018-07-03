<?php
/**
* testimonials
* -----------------------------------------------------------------------------
*
* testimonials component
*/

$defaults = [
  'num_testimonials' => 4
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
$showposts      = $component_data['num_testimonials'];

$args = array(
          'post_type'     => 'testimonial',
          'post_status'   => 'publish',
          'order'         => 'ASC',
          'showposts'     => $showposts
        );

$testimonials     = new WP_Query( $args );
$num_testimonials = wp_count_posts('testimonial');
$num_testimonials = $num_testimonials->publish;

?>

<?php if ( $testimonials->have_posts() ) : ?>
<section class="ll-testimonials<?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="testimonials">

  <div class="container row centered between">

      <header class="testimonials__heading col col8of12 text-center">
        <h2>Testimonials</h2>
      </header><!-- .testimonials__heading -->

      <div class="testimonials__list col col-8of12">

        <div class="testimonials__descriptions">

        <?php
        $first_css = ' active';
        while( $testimonials->have_posts() ) :

          $testimonials->the_post();
        ?>

          <div id="testimonials__author-<?php the_ID(); ?>" class="testimonials__description<?php echo $first_css; ?>">
            <?php the_excerpt(); ?>
          </div><!-- .testimonials__description -->

        <?php $first_css = ''; ?>
      <?php endwhile; ?>
        </div><!-- .testimonials__descriptions -->

        <div class="testimonials__authors row centered">
          <?php
          $first_css = ' active';
          while( $testimonials->have_posts() ) :

            $testimonials->the_post();
            $image = get_the_post_thumbnail();
          ?>
          <div class="testimonials__author<?php echo $first_css; ?>" data-testimonial="testimonials__author-<?php the_ID(); ?>">

          <?php if( $image ) : ?>
            <figure class="testimonials__thumbnail thumbnail" data-backgrounder>

              <div class="testimonials__feature feature">

              <?php echo $image; ?>

              </div><!-- .testimonials__feature.feature -->

            </figure><!-- .testimonials__thumbnail -->
          <?php endif; ?>

            <a class="testimonials__author_name">
              <?php the_title(); ?>
            </a><!-- .testimonials__author_name -->

          </div><!-- .testimonials__description -->

            <?php $first_css = ''; ?>
          <?php endwhile; ?>
        </div><!-- .testimonials__authors -->

      </div><!-- .testimonials__list -->

  </div><!-- .container.row -->

</section>
<?php endif; ?>