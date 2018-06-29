/**
* image-w-caption JS
* -----------------------------------------------------------------------------
*
* All the JS for the image-w-caption component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-image-w-caption',


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
  app.registerComponent( 'image-w-caption', COMPONENT );
} )( app );
