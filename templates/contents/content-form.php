<?php
  $form_id = ( get_field('form_id') ? get_field('form_id') : 1 );
  $supertitle = get_field('superheader');
?>
<article <?php post_class('form-skin'); ?>>

<?php if( $supertitle ) : ?>

  <header class="gform_heading">
  <?php
    ll_include_component(
      'supertitle',
      array(
        'text' => $supertitle
      ),
      array(
        'classes' => [ 'gform_supertitle']
      )
    );
  ?>
    <h2 class="gform_title"><?php the_title(); ?></h2>

    <?php the_content(); ?>

  </header><!-- .supertitle -->

<?php endif; ?>


<?php
  ll_include_component(
    'location-grid',
    array(
      'num_locations' => get_field('location_grid_num_locations')
    )
  );
?>

<?php if( is_plugin_active( 'gravityforms/gravityforms.php' ) ) : ?>

  <?php gravity_form( $form_id, false, false ); ?>

<?php endif; ?>

</article>
<!-- .form-skin -->