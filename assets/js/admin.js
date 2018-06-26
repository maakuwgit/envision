(function($) {

  //Custom Labels on flexible content metaboxes
  if ( $('.ll-group-label input').length > 0 ) {
    var groupLabels = $( '.ll-group-label input' );
    $.each( groupLabels, function(){
      $(this).closest( '.layout' ).find( '.acf-fc-layout-handle' ).first().before( '<span class="ll-group-title" contenteditable="true">'+$(this).val()+'</span>' );
    });
  }

  /*
   * When a .ll-group-title input is updated, bind its value to the .ll-group-label input
   */
  $(document).on( 'input', '.ll-group-title', function(){
    $(this).closest( '.layout' ).find( '.ll-group-label input' ).attr( 'value', $(this).text() );
  });

})(jQuery);

