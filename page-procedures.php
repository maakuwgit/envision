<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/contents/content', 'procedures'); ?>
  <?php
    $num_cards = array(
      'heading'   => get_field("procedure-grid-heading"),
      'num_cards' => get_field("procedure-grid-num_cards"),
      'post__in'  => get_field("procedure-grid-specific_posts")
    );

    ll_include_component(
      'procedure-grid',
      $num_cards );
    ?>
<?php endwhile; ?>
