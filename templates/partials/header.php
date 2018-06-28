<header class="navbar top" role="banner">

    <div class="navbar-header container">

      <?php $logo = get_field( 'global_logo', 'option' ); ?>

      <?php if ( $logo ) : ?>

        <a class="flex" href="<?php echo esc_url(home_url('/')); ?>">
          <img class="logo logo--header" src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('name'); ?>">
        </a>

      <?php else : ?>

        <a class="logo__brand flex" href="<?php echo esc_url(home_url('/')); ?>">
          <?php echo ll_get_logo(); ?>
        </a>

      <?php endif; ?>

      <?php if (has_nav_menu('secondary_navigation')) : ?>

      <div class="secondary-nav" id="secondary-nav" role="navigation">

        <div class="container row">

          <?php
          wp_nav_menu( array(
            'theme_location' => 'secondary_navigation',
            'menu_class'     => 'nav navbar-nav col col-sm-9of12 col-md-9of12 col-lg-9of12'
          ));
          ?>

          <?php echo get_sidebar(); ?>

        </div><!-- .container -->

      </div><!-- .secondary-nav -->

      <?php endif; ?>

      <?php if (has_nav_menu('primary_navigation')) : ?>
      <nav class="primary-nav flex" id="primary-nav" role="navigation">
        <?php
        if ( has_nav_menu('primary_navigation') ) {
          wp_nav_menu( array(
            'theme_location'  => 'primary_navigation',
            'menu_class'      => 'nav navbar-nav'
          ) );
        }
        ?>
      </nav><!-- .primary-nav -->
      <?php endif; ?>

      <?php if (has_nav_menu('secondary_navigation')) : ?>
      <button type="button" class="navbar-toggle navbar-toggle--stand">

        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggle__box">
          <span class="navbar-toggle__inner"></span>
        </span><!-- .navbar-toggle__box -->

      </button><!-- .navbar-toggle -->
      <?php endif; ?>

    </div>

</header>