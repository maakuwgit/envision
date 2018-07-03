/**
* testimonials JS
* -----------------------------------------------------------------------------
*
* All the JS for the testimonials component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-testimonials',


    selector : function() {
      return '.' + this.className;
    },

    showTestimonial: function(e) {

      var target = $(this).attr('data-testimonial');

      $('.testimonials__description, .testimonials__author').removeClass('active');

      $('[data-testimonial="'+target+'"]').addClass('active');
      $('#'+target).addClass('active');
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this   = this,
          targets = $(this.selector).find('[data-testimonial]')

      $(targets).off('click').on('click.showTestimonial', this.showTestimonial);

    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'testimonials', COMPONENT );
} )( app );
