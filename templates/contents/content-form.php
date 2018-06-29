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
  </header>
<?php endif; ?>
  <?php if( is_plugin_active( 'gravityforms/gravityforms.php' ) ) : ?>

    <?php gravity_form( $form_id, true, true ); ?>

  <?php endif; ?>

</article>
<!-- .form-skin -->