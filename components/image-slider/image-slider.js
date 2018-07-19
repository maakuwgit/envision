/**
* image-slider JS
* -----------------------------------------------------------------------------
*
* All the JS for the image-slider component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-image-slider',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this = this;
      var gallery = $("."+_this.className),
          nextArrow = '',
          prevArrow = '';


        prevArrow += '<button type="button" class="image-slider__slick-prev">';
        prevArrow += ' &#x25C0';
        prevArrow += '</button>';

        nextArrow += '<button type="button" class="image-slider__slick-next">';
        nextArrow += '&#x25B6;';
        nextArrow += '</button>';

        gallery.each(function(){

          $(this).find('.image-slider__slides').slick({
            infinite: true,
            prevArrow: prevArrow,
            nextArrow: nextArrow,
            centerMode: true,
            variableWidth: true,
            appendArrows: gallery.find('.image-slider__nav'),
            dots: false
          });

        });

        function openSlide(e) {
          e.preventDefault();
          var popupId = $(this).data('modal');

          if( popupId !== '' ) {
            var popup = $.magnificPopup.open({
              items           : {
                src: popupId
              },
              type            : 'image',
              fixedBgPos      : true,
              overflowY       : 'auto',
              closeBtnInside  : true,
              preloader       : false,
              midClick        : true,
              removalDelay    : 300,
            }, 0);
          }
        };

        $('.image-slider__slide').off('click.openSlide').on('click.openSlide', openSlide);
    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'image-slider', COMPONENT );
} )( app );
