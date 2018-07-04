<?php
/**
* team-grid
* -----------------------------------------------------------------------------
*
* team-grid component
*/

$defaults = [
  'num_members' => 4
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


$num_members = $data['num_members'];

$args = array(
  'posts_per_page' => $num_members,
  'order'          => 'ASC',
  'orderby'        => 'menu_order',
  'post_status'    => 'publish',
  'post_type'      => 'team',
);

$members = new WP_Query( $args );

?>

<?php if( !$members->have_posts() ) return; ?>
<section class="ll-team-grid <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="team-grid">

  <div class="container text-center">

    <h2 class="team-grid__heading">Our Team</h2><!-- .team-grid__heading -->

    <ul class="team-grid__list no-bullet row">

  <?php
    while ( $members->have_posts() ) : $members->the_post();

    $positions  = get_the_terms(get_the_ID(), 'position');
  ?>
    <li class="team-grid__item col-3of12">

      <figure id="<?php echo basename(get_permalink()); ?>" class="team-grid__thumb__figure relative">
        <a href="<?php the_permalink(); ?>" data-magnific></a>

        <div class="team-grid__thumb__image" data-backgrounder>
          <div class="feature">
            <?php the_post_thumbnail(); ?>
          </div>
        </div><!-- .team-grid__thumb_image -->

        <figcaption class="team-grid__thumb__caption">

          <h3 class="team-grid__thumb__title h5"><?php the_title(); ?></h3>

        <?php if( $positions && ! is_wp_error( $positions ) ) : ?>
          <?php
            $position_names = [];

            foreach( $positions as $position ) {
              $position_names[] = $position->name;
            }

            $position_list = join(', ', $position_names);

            echo format_text($position_list);
          ?>
        <?php endif; ?>

        </figcaption><!-- .team-grid__thumb__caption -->

      </figure>

    </li><!-- .team-grid__item -->

  <?php endwhile; ?>
<?php wp_reset_postdata(); ?>
    </ul><!-- .team-grid__list.no-bullet.row -->

  </div><!-- .container -->

</section>