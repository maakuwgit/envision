<?php
  $hero = array(
    'heading'             => get_field('hero_heading'),
    'subheading'          => get_field('hero_subheading'),
    'image'               => get_field('hero_image'),
    'overlay'             => get_field('overlay_strength'),
    'looping_video'       => get_field('hero_video'),
    'popup_video'         => get_field('hero_popup_video')
  );

  ll_include_component(
    'hero-banner',
    $hero
  );
?>
