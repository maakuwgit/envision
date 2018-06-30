/**
* procedure-grid JS
* -----------------------------------------------------------------------------
*
* All the JS for the procedure-grid component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-procedure-grid',


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
  app.registerComponent( 'procedure-grid', COMPONENT );
} )( app );
