/**
* three-col-w-headline JS
* -----------------------------------------------------------------------------
*
* All the JS for the three-col-w-headline component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-three-col-w-headline',


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
  app.registerComponent( 'three-col-w-headline', COMPONENT );
} )( app );
