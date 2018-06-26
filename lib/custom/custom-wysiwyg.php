<?php

/**
 * Adds the custom formats button back into tinymce
 *
 * @param  array $buttons The available buttons
 * @return array          The buttons to display
 */
function ll_new_mce_button( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}

add_filter( 'mce_buttons_2', 'll_new_mce_button' );

/**
 * adds custom formats to the formats selection
 * on the tinymce editor
 *
 * @param  array $data Tinymce data
 * @return array       Tinyce data
 */
function ll_format_tinymce( $data ) {
    $style_formats = array(

      // array(
      //   'title'    => 'Button',
      //   'classes'  => 'btn',
      //   'selector' => 'a',
      //   'wrapper'  => false
      // ),
    );

  $data['style_formats'] = json_encode( $style_formats );
  return $data;
}

add_filter( 'tiny_mce_before_init', 'll_format_tinymce' );

//Used with ACF to simplify wysiwyg toolbar

// function my_toolbars( $toolbars ) {
//   // Uncomment to view format of $toolbars
//   // echo '<div class="postbox  acf-postbox" style="width: 75%; margin: 0 auto; padding: 20px;">';
//   //   var_dump( $toolbars['Full' ] );
//   // echo '</div>';

//   // Add a new toolbar called "Very Simple"
//   // - this toolbar has only 1 row of buttons
//   $toolbars['Very Simple' ] = array();
//   $toolbars['Very Simple' ][1] = array('formatselect','styleselect','bullist','numlist','bold', 'link', 'unlink','alignleft','aligncenter','alignright' );


//   // remove the 'Basic' toolbar completely
//   unset( $toolbars['Basic' ] );
//   unset( $toolbars['Full'] );

//   // return $toolbars - IMPORTANT!
//   return $toolbars;
// }

// add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );


/**
 * add visual button
 * for added tinymce plugins
 */
function add_tiny_mce_plugins_button( $buttons ) {
   array_push( $buttons, 'anchor' );
   return $buttons;
}
add_filter( 'mce_buttons', 'add_tiny_mce_plugins_button' );

/**
 * Add tinymce plugins assuming they live in
 * /lib/tinymce
 */
function add_tinymce_plugins( $plugins ) {
    $plugins['anchor'] = get_template_directory_uri() . '/lib/tinymce/anchor/plugin.min.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'add_tinymce_plugins' );


/**
 * Allow custom classes to be applied to
 * WYSIWYG fields for editing editor.css
 */
/*
function ll_acf_admin_footer() {
  ?>
  <script>
    ( function( $) {
      acf.add_filter( 'wysiwyg_tinymce_settings', function( mceInit, id ) {
        // grab the classes defined within the field admin and put them in an array
        var classes   = $( '#' + mceInit.id ).closest( '.acf-field-wysiwyg' ).attr( 'class' ),
            classarray = classes.split(' ');
        var bodyclass = $(classarray).get(-1);

        mceInit.body_class += ' ' + bodyclass;
        return mceInit;
      });
    })( jQuery );
  </script>
<?php
}
add_action('acf/input/admin_footer', 'll_acf_admin_footer');
