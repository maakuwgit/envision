<?php
/**
* blog-grid
* -----------------------------------------------------------------------------
*
* blog-grid component
*/

$defaults = [
  'num_posts' => -1
];

$component_data = ll_parse_args( $component_data, $defaults );
?>

<?php
/**
 * Any additional classes to apply to the main component container.
 *
 * @var array
 * @see args['classes']
 */
$classes        = $component_args['classes'] ?: array();

/**
 * ID to apply to the main component container.
 *
 * @var array
 * @see args['id']
 */
$id = ( $component_args['id'] ? $component_args['id'] : uniqid('blog-grid-') );

/**
 * ACF values pulled into the component from the components.php partial.
 */
$showposts = $component_data['num_posts'];
$num_posts = wp_count_posts();
$num_posts = $num_posts->publish;
?>

<?php if ( have_posts() ) : ?>
<section class="ll-blog-grid <?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="blog-grid">

  <div class="container row centered start">

  <?php
  while( have_posts() ) :
    the_post();
    $image = get_the_post_thumbnail();
  ?>

      <div class="blog-grid__blog_wrapper col col-sm-6of12 col-md-3of12 col-lg-4of12 col-xl-4of12">

        <div class="blog-grid__blog" data-clickthrough>

        <?php if( $image ) : ?>
          <figure class="blog-grid__blog__feature__wrapper" data-backgrounder>

            <div class="blog-grid__blog__feature feature">

            <?php echo $image; ?>

            </div><!-- .blog-grid__blog__feature.feature -->

          </figure>
        <?php endif; ?>

          <h3 class="blog-grid__blog__supertitle">
        <?php
          $tags       = get_the_tags();
          $categories = get_the_category();

          if ($tags) :
            foreach($tags as $tag) : ?>

              <span class="blog-grid__blog__meta" href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></span>
              <!-- .entry__meta_tag -->

          <?php
            endforeach;

          endif;

          if ($categories) :

            foreach($categories as $category) :
          ?>

              <span class="blog-grid__blog__meta" href="<?php echo get_tag_link($category->term_id); ?>"><?php echo $category->name; ?></span>
              <!-- .entry__meta_category -->

              <?php
            endforeach;

          endif;
          ?>
          </h3>
          <!-- .blog-grid__blog__title -->
          <h4 class="blog-grid__blog__title">
            <a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
          </h4>
          <!-- .blog-grid__blog__title -->
          <div class="blog-grid__blog__body">
            <?php the_excerpt(); ?>
          </div>
          <!-- .blog-grid__blog__body -->

        </div>

      </div><!-- .blog-grid__blog -->

    <?php if( $num_posts > $showposts && $showposts != -1 ) : ?>
    <nav class="blog-grid__nav">
      <a class="btn" href="<?php echo get_bloginfo('url') . '/blogs'; ?>">View all</a>
    </nav><!-- .blog-grid__nav -->
    <?php endif; ?>

  <?php endwhile; ?>

  </div><!-- .container.row.centered.between -->
</section>
<?php endif; ?>
