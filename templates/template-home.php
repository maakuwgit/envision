<?php
/*
Template Name: Home
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/contents/hero', 'page'); ?>
  <?php include( locate_template('templates/partials/components.php') ); ?>
<?php endwhile; ?>


