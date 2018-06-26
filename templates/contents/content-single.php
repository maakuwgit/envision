<article <?php post_class(); ?>>
  <div class="post">
    <header class="post__header">
      <h1 class="post__header__title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/partials/post-meta'); ?>
    </header>
    <div class="post__content">
      <?php the_content(); ?>
    </div>
    <footer class="post__footer">
      <?php wp_link_pages(array('before' => '<nav class="post__footer__nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php get_template_part('templates/partials/comments'); ?>
  </div><!-- /.post -->
</article>
