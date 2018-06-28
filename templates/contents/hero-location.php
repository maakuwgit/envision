<?php
  //Locations
  $hero = array(
    'heading' => get_field('hero_heading'),
    'subheading' => get_field('hero_subheading'),
    'map' => get_field('location_map')
  );

  ll_include_component(
    'location-hero-banner',
    $hero
  );
?>