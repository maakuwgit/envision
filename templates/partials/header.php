<header class="navbar" role="banner">
  <div class="container">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle navbar-toggle--stand" data-nav="collapse" data-target="#primary-nav">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggle__box">
          <span class="navbar-toggle__inner"></span>
        </span><!-- .navbar-toggle__box -->
      </button><!-- .navbar-toggle -->

      <?php $logo = get_field( 'global_logo', 'option' ); ?>
      <?php if ( $logo ) : ?>
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <img class="logo logo--header" src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('name'); ?>">
        </a>
      <?php else : ?>
        <a class="logo__brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <?php endif; ?>

    </div>

    <nav class="primary-nav" id="primary-nav" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
      endif;
      ?>
    </nav>

  </div>
</header>
