<?php
  $street = get_field('contact_street_address', 'options');
  $city   = get_field('contact_city', 'options');
  $state  = get_field('contact_state', 'options');
  $zip    = get_field('contact_zip', 'options');
  $phone  = get_field('contact_phone_number', 'options');

  $address  = get_bloginfo('name') . get_bloginfo('tagline');
  $address  .= '<br>' . $street;
  $address  .= '<br>' . $city . ', ' . $state . ' ' . $zip;
  $address  .= '<br>' . format_phone($phone, true, '-');
?>
<footer class="footer" role="contentinfo">

  <div class="footer__top">

    <div class="row container">

      <div class="footer__logo_wrap col col-md-4of12 col-lg-4of12 col-xl-4of12">

        <a class="footer__logo__anchor" href="<?php echo esc_url(home_url('/')); ?>">
          <?php bloginfo('name');?>
        </a><!-- .footer__logo__anchor -->

        <?php if( $address ) : ?>
        <address>
          <?php echo $address; ?>
        </address><!-- .footer__address -->
        <?php endif; ?>

        <nav class="footer__social">
          <?php ll_get_social_list(); ?>
        </nav><!-- .footer__social -->

      </div><!-- .col -->

      <div class="footer__navigation_wrap col col-md-8of12 col-lg-8of12 col-xl-8of12">

        <div class="footer__navigation">
        <?php if (has_nav_menu('footer_navigation')) : ?>
          <?php wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav navbar__nav')); ?>
        <?php endif;?>
        </div><!-- .footer__top__nav -->

      </div><!-- .col -->

    </div><!-- .container.row -->

  </div><!-- .footer__top -->

  <div class="footer__bottom">

    <div class="row between container">

      <div class="footer__copyright col center col-md-6of12 col-lg-6of12 col-xl-6of12">
       <p> &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
      </div><!-- .footer__copyright -->

      <div class="footer__credits col center col-md-6of12 col-lg-6of12 col-xl-6of12">
        <p class="relative flex">
          <a href="https://liftedlogic.com/" target="_blank" class="footer__ll_tagline iflex">Web Design in Kansas City</a>
          <a href="https://liftedlogic.com/" target="_blank" class="footer__ll_logo iflex">
            <svg class="icon icon-LiftedLogic">
              <use xlink:href="#icon-LiftedLogic"></use>
            </svg>
          </a>
        </p>
      </div><!-- .footer__credits -->

    </div><!-- .container.row -->

  </div><!-- .footer__bottom -->

</footer>
