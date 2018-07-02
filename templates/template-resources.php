<?php
/*
Template Name: Resources
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/contents/content', 'resources'); ?>
<?php endwhile; ?>


