<?php
  $form_id = ( get_field('form_id') ? get_field('form_id') : 1 );
  $superheader = get_field('superheader');
?>
<article <?php post_class('form-skin'); ?>>
  <header class="gform_heading">
    <h1 class="gform_supertitle"><?php echo $superheader; ?></h1>
  </header>
  <?php if( is_plugin_active( 'gravityforms/gravityforms.php' ) ) : ?>

    <?php gravity_form( $form_id, true, true ); ?>

  <?php endif; ?>

</article>
<!-- .form-skin -->