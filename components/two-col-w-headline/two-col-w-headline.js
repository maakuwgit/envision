/**
* two-col-w-headline JS
* -----------------------------------------------------------------------------
*
* All the JS for the two-col-w-headline component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-two-column-w-headline',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this = this;

    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'two-column-w-headline', COMPONENT );
} )( app );
