/**
* team-grid JS
* -----------------------------------------------------------------------------
*
* All the JS for the team-grid component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-team-grid',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this   = this,
          anchors = $(this.selector).find('[data-magnific]');

      if( anchors ) {

        anchors.magnificPopup({
          type: 'ajax'
        });

      }
    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'team-grid', COMPONENT );
} )( app );
