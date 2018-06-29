<?php
  $prefooter = array(
    'title'    => get_field('prefooter_title'),
    'content'  => get_field('prefooter_content'),
    'image'    => get_field('prefooter_image')
  );

  ll_include_component(
    'prefooter',
    $prefooter
  )
?>
