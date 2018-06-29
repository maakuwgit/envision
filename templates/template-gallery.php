<?php
/*
Template Name: Gallery
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/contents/content', 'gallery'); ?>
<?php endwhile; ?>


