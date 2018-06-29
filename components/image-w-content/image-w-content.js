/**
* image-w-content JS
* -----------------------------------------------------------------------------
*
* All the JS for the image-w-content component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-image-w-content',


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
  app.registerComponent( 'image-w-content', COMPONENT );
} )( app );
