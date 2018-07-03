<?php
/*
Template Name: Consultation
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/contents/content', 'consultation'); ?>
<?php endwhile; ?>


