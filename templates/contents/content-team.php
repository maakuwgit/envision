<?php $positions  = get_the_terms(get_the_ID(), 'position'); ?>
<?php get_template_part('templates/contents/hero', 'page'); ?>
<article <?php post_class(); ?>>

  <div class="post team container row stretch">

    <div class="post__image team__image col col-4of12" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
        <?php the_post_thumbnail();?>
    </div><!-- .post__image.team__image -->

    <div class="post__content team__content col col-8of12">
      <h1 class="h2 post__title team__title"><?php the_title(); ?></h1>
      <!-- .post__title team__title -->
      <?php if( $positions && ! is_wp_error( $positions ) ) : ?>
        <?php
          $position_names = [];

          foreach( $positions as $position ) {
            $position_names[] = $position->name;
          }

          $position_list = join(', ', $position_names);
        ?>
      <p class="team__positions"><?php echo $position_list; ?></p>
      <!-- .team__positions -->
      <?php endif; ?>

      <?php the_content(); ?>
    </div>
    <!-- .post_content.team__content -->

  </div><!-- .post.team -->

</article>
