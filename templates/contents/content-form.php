<?php
  $form_id = ( get_field('form_id') ? get_field('form_id') : 1 );
?>
<article <?php post_class('form-skin'); ?>>
  <header class="gform_heading">
    <h1 class="grey">The Best Medical Spa in Rochester New York</h1>
    <h2 class="h0 gform_title"><?php the_title(); ?></h2>
    <?php the_excerpt(); ?>
  </header>
  <?php if( is_plugin_active( 'gravityforms/gravityforms.php' ) ) : ?>

    <?php gravity_form( $form_id, false, false ); ?>

  <?php endif; ?>

</article>
<!-- .form-skin -->