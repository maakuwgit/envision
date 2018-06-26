<article <?php post_class('entry'); ?>>
  <header class="entry__header">
    <h2 class="entry__header__title">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    <?php get_template_part('templates/partials/post-meta'); ?>
  </header>
  <div class="entry__summary">
    <?php the_excerpt(); ?>
  </div>
</article>
