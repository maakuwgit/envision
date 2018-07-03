<article <?php post_class('gallery content'); ?>>

<?php
  $heading = get_field('image-slider-heading');
  if( !$heading['text'] ){
    $heading = array(
      'text' => get_the_title(),
      'tag'  => 'h2'
    );
  }

  $slides = array(
    'supertitle'  => get_field('superheader'),
    'heading'     => $heading,
    'subheading'  => get_field('image-slider-subheading'),
    'slides'      => get_field('image_slider_images')
  );

  ll_include_component(
    'image-slider',
    $slides,
    array()
  );
?>

  <div class="content__body">
    <?php the_content(); ?>
  </div><!-- .content__body -->

</article><!-- .gallery.content -->