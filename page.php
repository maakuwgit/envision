<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/partials/header', 'page'); ?>
  <?php get_template_part('templates/contents/content', 'page'); ?>
<?php endwhile; ?>
