<?php
/**
 * Register the custom post type
 */
if ( ! function_exists('register_procedure_custom_post_type') ) {

  // Register Custom Post Type
  function register_procedure_custom_post_type() {

    $labels = array(
      'name'                => 'Procedures',
      'singular_name'       => 'Procedure',
      'menu_name'           => 'Procedures',
      'parent_item_colon'   => 'Parent Procedure',
      'all_items'           => 'All Procedures',
      'view_item'           => 'View Procedure',
      'add_new_item'        => 'Add New Procedure',
      'add_new'             => 'New Procedure',
      'edit_item'           => 'Edit Procedure',
      'update_item'         => 'Update Procedure',
      'search_items'        => 'Search Procedure',
      'not_found'           => 'No procedure found',
      'not_found_in_trash'  => 'No procedure found in Trash',
    );
    $args = array(
      'label'               => 'procedure',
      'description'         => 'Procedure description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'excerpt', 'thumbnail', 'page-attributes' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 20,
      'menu_icon'           => 'dashicons-groups',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => true,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'procedure', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_procedure_custom_post_type', 0 );

}

/**
 * Custom taxonomies
 */
if ( ! function_exists('register_procedure_taxonomies') ) {

  function register_procedure_taxonomies() {

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'                => _x( 'Treatments', 'taxonomy general name' ),
      'singular_name'       => _x( 'Treatment', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Treatments' ),
      'all_items'           => __( 'All Treatments' ),
      'parent_item'         => __( 'Parent Treatment' ),
      'parent_item_colon'   => __( 'Parent Treatment:' ),
      'edit_item'           => __( 'Edit Treatment' ),
      'update_item'         => __( 'Update Treatment' ),
      'add_new_item'        => __( 'Add New Treatment' ),
      'new_item_name'       => __( 'New Treatment Name' ),
      'menu_name'           => __( 'Treatments' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => 'treatment' )
    );

    register_taxonomy( 'treatment', array( 'procedure' ), $args ); // Must include custom post type name

  }

  add_action( 'init', 'register_procedure_taxonomies', 0 );

}

/**
 * Create ACF setting page under CPT menu
 */

// if ( function_exists( 'acf_add_options_sub_page' ) ){
//   acf_add_options_sub_page(array(
//     'page_title' => 'Procedure Settings',
//     'menu_title' => 'Settings',
//     'menu_slug'  => 'team-settings',
//     'parent'     => 'edit.php?post_type=team',
//     'capability' => 'edit_posts'
//   ));
// }
