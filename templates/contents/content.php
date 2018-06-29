<?php
  $supertitle = get_field('superheader');
?>
<article <?php post_class(); ?>>
  <header class="heading">
  <?php
      ll_include_component(
        'supertitle',
        array(
          'text' => $supertitle
        ),
        array(
          'classes' => [ 'supertitle']
        )
      );
  ?>
  </header><!-- .supertitle -->

  <div class="container row">
    <?php include( locate_template('templates/partials/components.php') ); ?>
  </div><!-- .container.row -->
</article>