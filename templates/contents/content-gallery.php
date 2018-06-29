<?php
  $supertitle = get_field('superheader');
?>
<article <?php post_class('gallery content'); ?>>

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

  </header><!-- .gallery__header -->
<?php endif; ?>

  <div class="content__body">
    <?php the_content(); ?>
  </div><!-- .content__body -->

</article><!-- .gallery.content -->