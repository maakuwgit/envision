<?php
  $supertitle = get_field('superheader');
?>
<article <?php post_class('content resources'); ?>>

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

  </header><!-- .resources__header -->
<?php endif; ?>

<?php if( have_rows( 'resources' ) ) : ?>

  <div class="content__body container">
    <ul class="resources__resource__list no-bullet column">

  <?php
      while( have_rows( 'resources' ) ) :
        the_row();
        $resource = get_sub_field('file');
  ?>
      <li class="resources__resource__item" data-clickable>
        <a class="resources__resource__icon" href="<?php echo $resource['url']; ?>" title="<?php echo $resource['title']; ?>">
          <svg class="icon icon-download">
            <use xlink:href="#icon-download"></use>
          </svg>
        </a>
        <a class="resources__resource__anchor" href="<?php echo $resource['url']; ?>" title="<?php echo $resource['title']; ?>">
          <span class="resources__resource__filename"><?php echo $resource['filename']; ?></span>
        </a>
      </li>
  <?php endwhile; ?>

    </ul>
  </div><!-- .resources__content -->

<?php endif; ?>

  <div class="resources__resource__body content__body">
    <?php the_content(); ?>
  </div><!-- .resources__content -->

</article><!-- .resources -->