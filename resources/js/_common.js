/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

( function( app ) {

  var COMPONENT = {


    init: function() {

      window.userLoggedIn = false;
      window.adminBarHeight = 0;

      if ( $('#wpadminbar').length > 0 ) {
        window.userLoggedIn = true;
        window.adminBarHeight = '32px';
      }

      /**
       * IF your navbar is fixed
       * use this function
       */
      function checkAdminBar() {
        // if ( window.userLoggedIn ) {
        //   $('header.navbar').css('top', window.adminBarHeight);
        // }
      }

      checkAdminBar();

      /* Collapse/Expand the navigation. Uses a combination of JS and CSS (in _navbar.scss) */
      $('.navbar-toggle').click(function() {
        var btn = $(this);

        btn.toggleClass('open');

        var secondary_nav = $('#secondary-nav');

        $('body').toggleClass('locked');

        if( !$(secondary_nav).hasClass('expanded') ) {
          $(secondary_nav).addClass('expanded');
        }else {
          $(secondary_nav).removeClass('expanded');
        }

      });

      // JavaScript to be fired on all pages
      //Basic Collapse toggle for dropdowns and toggle menus
      $('[data-toggle="collapse"]').on('click', function(e) {
        e.preventDefault();
        //if target element is not open already
        //find all open collapse elements and close them
        if ( !$(this).is('.collapsed') ) {
          if ( $('.collapsed[data-toggle="collapse"]').length > 0 ) {
            $('.collapsed[data-toggle="collapse"]').each(function(){
              $(this).trigger('click');
            });
          }
        }
        var target = $(this).data('target');
        $(this).toggleClass('collapsed');
        $(target).toggleClass('collapsed');
      });

      /*
       * Collapse specificially for the nav. Utilizes .slideToggle()
       * for sliding animation for a more "out of the box" nice looking
       * mobile animation. Can easily be removed or altered for
       * more specific funcitonality.
       */
      $('[data-nav="collapse"]').on('click', function(e) {
        e.preventDefault();
        var target = $(this).data('target');
        $(this).toggleClass('open');
        $('body').toggleClass('locked');
        // $(target).toggleClass('collapsed');
        $(target).slideToggle();
      });


      /*
       * Convert any element into a giant button
       */
      function clickthrough(e) {
        var target = $(this).find('a:first-of-type');
        e.preventDefault();
        if(target && target.length > 0){
          document.location.href = target.attr('href');
        }else{
          document.location.href = $(this).attr('data-clickthrough');
        }
      }

      $('[data-clickthrough]').each(function(args){
        $(this).on('click.clickthrough', clickthrough);
      });

      $(document).click(function(e) {
          //close all [data-toggle="collapse"] elements if
          //target doesn't have any data attributes defined or
          //if the target is does not have a data-toggle and
          //it does not have a data-content and
          //then make sure that the target is not a child of data-content="collapse"
          if (
            ( $(e.target).data('toggle') === undefined || $(e.target).data('toggle') === false ) &&
            ( $(e.target).data('content') === undefined || $(e.target).data('content') ===  false ) &&
            !$(e.target).parents( '[data-content="collapse"]' ).length
            ) {
            $('.collapsed[data-toggle="collapse"]').each(function(e){
              $(this).trigger('click');
            });
        }
      });

      //If theres a controller for ScrollMagic, spool it up!
      if( typeof ScrollMagic !== 'undefined' ) {
        var adminHeight   = ( $('#wpadminbar').length > 0 ? $('#wpadminbar').outerHeight() : 0 ),
            primary_nav   = 'body > header.navbar',
            hero          = 'main > :first-child.hdg';

        var controller  = new ScrollMagic.Controller(),
            offset      = 0;

        if( $(hero) ) {
          offset = $(hero).height() + $(primary_nav).height() + adminHeight ;

          //Adding styles to the primary nav and pinning
          if( $(primary_nav) ) {
            var primary_pin = new ScrollMagic.Scene({
              triggerElement: hero,
              offset: offset
            })
            .on("enter", function () {
              $(primary_nav).removeClass('top');
            })
            .on("leave", function () {
              $(primary_nav).addClass('top');
            })
            .addTo(controller);
          }
        }
      }

      //Dev Note: going to move this into the Backgrounder component for reusability
      //BEOF Backgrounder
      var vh,vw;
      //Media Query (match the _variables.scss breakpoints)
      breakpoints = {};
      breakpoints.xxs = 399;
      breakpoints.xs  = 479;
      breakpoints.sm  = 767;
      breakpoints.md  = 991;
      breakpoints.lg  = 1199;
      breakpoints.xl  = 1599;

      function setSize(){
        vw = window.outerWidth;
        vh = window.outerHeight;
      }

      function getSize(){
        var size = 'small';
        if(vw >= breakpoints.xl){
          size = 'xl';
        }else if(vw >= breakpoints.lg && vw < breakpoints.xl) {
          size = 'lg';
        }else if(vw > breakpoints.sm && vw < breakpoints.lg) {
          size = 'md';
        }
        return size;
      }

      function refactor(e){
        setSize();
        var size = getSize();
        //Dev Note: Create a date attr for the size and only call 'makeBg' oncer per size.
        makeBg(size);
      }

      //Reads the "featured" image (class based) and sets the target background to whatever image is dynamically loaded then animates it in.
      function makeBg(size){
        if(!size){
          size = getSize();
        }

        $('[data-backgrounder]').each(function(args){

          var feat    = $(this).find('.feature');
          var target  = feat;//See if there's a featured image here, if not, just use the parent
          if(feat.length <= 0) {
            target = $(this);
          }

          var img     = false;

          if(feat.length > 0) {
            img = $(feat).find('img');
          }else{
            img = $(this).find('img');
          }

          if(img.length > 0) {
            var src = $(img).attr('src');
            if($(img).attr('data-src-xl') && size === 'xl') {
              src = $(img).attr('data-src-xl');
            }
            if($(img).attr('data-src-lg') && size === 'lg') {
              src = $(img).attr('data-src-lg');
            }
            if($(img).attr('data-src-md') && size === 'md') {
              src = $(img).attr('data-src-md');
            }
            if($(this).attr('style')){
                if(feat.length > 0) {
                  $(feat).css('background-color',$(this).css('background-color'));
                  $(feat).delay(300).fadeOut(300);
                }
                $(this).css({'background-image': 'url('+src+')'});
            }else{
              $(this).css({'background-image':'url('+src+')', 'background-color':$(this).css('background-color')});
              if(feat.length > 0) {
                $(feat).delay(300).fadeOut(300);
              }
            }
          }
        });
      }
      //EOF


      // Magnific Popup
      // For embeded images within the post content
      $('a[rel="magnific"]').magnificPopup({
        type: 'image',
        removalDelay: 300,
        mainClass: 'mfp-fade'
      });

      /*
       * Address Autocompletes
       */

      if ( typeof google !== "undefined" && google.maps.places ) {

        // Organizes Info
        var componentForm = {
          street_number: 'short_name',
          route: 'long_name',
          locality: 'long_name',
          administrative_area_level_1: 'short_name',
          country: 'long_name',
          postal_code: 'short_name'
        };

        /*
          Gravity Forms
         */

        if ( $('div.ginput_container_address').length > 0 ) {
          var gformAddressAutocomplete = new google.maps.places.Autocomplete($("span.address_line_1 input")[0], {});

          google.maps.event.addListener(gformAddressAutocomplete, 'place_changed', function() {
            var place = gformAddressAutocomplete.getPlace();
            var street_address = '';

            for (var i = 0; i < place.address_components.length; i++) {
              var addressType = place.address_components[i].types[0];
              if ( componentForm[addressType] ) {
                var val = place.address_components[i][componentForm[addressType]];

                if ( addressType === 'street_number' || addressType === 'route' ) {
                  street_address += val + ' ';
                  $("span.address_line_1 input").val(street_address);
                } else if ( addressType === 'locality' ) {
                  $("span.address_city input").val(val);
                } else if ( addressType === 'administrative_area_level_1' ) {
                  $("span.address_state input").val(val);
                } else if ( addressType === 'postal_code' ) {
                  $("span.address_zip input").val(val);
                } else if ( addressType === 'country' ) {
                  $("span.address_country select").val(val).trigger('change');
                }
              }
            }
          });
        }

        /*
          WooCommerce
         */

        if ( $('body').hasClass('woocommerce-checkout') ) {

          // Billing
          var billingAutocomplete = new google.maps.places.Autocomplete($(".woocommerce-checkout #billing_address_1")[0], {});

          google.maps.event.addListener(billingAutocomplete, 'place_changed', function() {
              var place = billingAutocomplete.getPlace();
              var street_address = '';

              for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if ( componentForm[addressType] ) {
                  var val = place.address_components[i][componentForm[addressType]];

                  if ( addressType === 'street_number' || addressType === 'route' ) {
                    street_address += val + ' ';
                    $(".woocommerce-checkout #billing_address_1").val(street_address);
                  } else if ( addressType === 'locality' ) {
                    $('.woocommerce-checkout #billing_city').val(val);
                  } else if ( addressType === 'administrative_area_level_1' ) {
                    $('.woocommerce-checkout #billing_state').val(val).trigger('change');
                  } else if ( addressType === 'postal_code' ) {
                    $('.woocommerce-checkout #billing_postcode').val(val);
                  }
                }
              }
          });

          // Shipping
          var shippingAutocomplete = new google.maps.places.Autocomplete($(".woocommerce-checkout #shipping_address_1")[0], {});

          google.maps.event.addListener(shippingAutocomplete, 'place_changed', function() {
              var place = shippingAutocomplete.getPlace();
              var street_address = '';

              for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if ( componentForm[addressType] ) {
                  var val = place.address_components[i][componentForm[addressType]];

                  if ( addressType === 'street_number' || addressType === 'route' ) {
                    street_address += val + ' ';
                    $(".woocommerce-checkout #shipping_address_1").val(street_address);
                  } else if ( addressType === 'locality' ) {
                    $('.woocommerce-checkout #shipping_city').val(val);
                  } else if ( addressType === 'administrative_area_level_1' ) {
                    $('.woocommerce-checkout #shipping_state').val(val).trigger('change');
                  } else if ( addressType === 'postal_code' ) {
                    $('.woocommerce-checkout #shipping_postcode').val(val);
                  }
                }
              }

          });
        }

      } // --end Address Autocomplete


      $(function() {

        $(window).on('resize.refactor', refactor);
        refactor();

        var hero = $('main >:first-child');
        if( !hero.hasClass('hdg') ) {
          $('.navbar').addClass('no-hero');
        }

        $('a[href*="#"]:not(.js-no-scroll):not([href="#"])').click(function() {
          if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
            var target = $(this.hash);
            var wpadminBarHeight = 0;
            if ( $('#wpadminbar').length > 0 ) {
              wpadminBarHeight = $('#wpadminbar').outerHeight();
            }
            var headerHeight = $('header.navbar').outerHeight();
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html, body').animate({
                scrollTop: target.offset().top - ( headerHeight + wpadminBarHeight )
              }, 1000);
              return false;
            }
          }
        });
      });

    },


    finalize: function() {

    }
  };

  app.registerComponent( 'common', COMPONENT );
} )( app );
