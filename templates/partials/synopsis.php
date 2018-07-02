<?php

  $synopsis    = array(
    'headline'     => get_field('synopsis_headline'),
    'content'      => get_field('synopsis_content'),
    'application'  => get_field('synopsis_application'),
    'procedure'    => get_field('synopsis_procedure'),
    'recovery'     => get_field('synopsis_recovery')
  );

  ll_include_component(
    'synopsis',
    $synopsis
  );
?>