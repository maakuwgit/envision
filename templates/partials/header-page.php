<?php

  if( is_archive() ){

    $cat = get_queried_object();
    $heading      = $cat->name;
    $spotlight    = 0.6;
    $image        = get_the_post_thumbnail_url( get_option( 'page_for_posts' ), 'large' );

  }else{

    $heading      = get_field('hero_heading');
    $subheading   = get_field('hero_subheading');
    $spotlight    = get_field('overlay_strength');
    $image        = get_field('hero_image');
    $video        = get_field('hero_video');

  }

  $hero = array(
    'heading'     => $heading,
    'subheading'  => $subheading,
    'image'       => $feature,
    'overlay'     => $overlay,
    'video'     => $video
  );

  ll_include_component(
    'hero-banner',
    $hero
  );

?>