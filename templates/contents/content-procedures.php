<?php
  $supertitle = get_field('superheader');
?>
<article <?php post_class('content'); ?>>

<?php if( $supertitle ) : ?>
  <header class="content__header">
  <?php
      ll_include_component(
        'supertitle',
        array(
          'text' => $supertitle
        ),
        array(
          'classes' => [ 'content__supertitle']
        )
      );
  ?>
    <h2 class="content__title"><?php the_title(); ?></h2>

  </header><!-- .procedures__header -->
<?php endif; ?>

  <div class="content__body">
    <?php the_content(); ?>
  </div><!-- .procedures__content -->

</article><!-- .procedures -->