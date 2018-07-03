<?php
/**
 * Register the custom post type
 */
if ( ! function_exists('register_team_custom_post_type') ) {

  // Register Custom Post Type
  function register_team_custom_post_type() {

    $labels = array(
      'name'                => 'Team',
      'singular_name'       => 'Team',
      'menu_name'           => 'Team',
      'parent_item_colon'   => 'Parent Team',
      'all_items'           => 'All Team Members',
      'view_item'           => 'View Team Member',
      'add_new_item'        => 'Add New Team Member',
      'add_new'             => 'New Team Member',
      'edit_item'           => 'Edit Team Member',
      'update_item'         => 'Update Team Member',
      'search_items'        => 'Search Team Member',
      'not_found'           => 'No team member found',
      'not_found_in_trash'  => 'No team member found in Trash',
    );
    $args = array(
      'label'               => 'team',
      'description'         => 'Team description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
      'hierarchical'        => true,
      'public'              => false,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => false,
      'show_in_admin_bar'   => false,
      'menu_position'       => 20,
      'menu_icon'           => 'dashicons-groups',
      'can_export'          => true,
      'has_archive'         => false,
      'exclude_from_search' => true,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'team', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_team_custom_post_type', 0 );

}

/**
 * Custom taxonomies
 */
if ( ! function_exists('register_team_taxonomies') ) {

  function register_team_taxonomies() {

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'                => _x( 'Position', 'taxonomy general name' ),
      'singular_name'       => _x( 'Position', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Positions' ),
      'all_items'           => __( 'All Positions' ),
      'parent_item'         => __( 'Parent Position' ),
      'parent_item_colon'   => __( 'Parent Position:' ),
      'edit_item'           => __( 'Edit Position' ),
      'update_item'         => __( 'Update Position' ),
      'add_new_item'        => __( 'Add New Position' ),
      'new_item_name'       => __( 'New Position Name' ),
      'menu_name'           => __( 'Positions' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => 'position' )
    );

    register_taxonomy( 'position', array( 'team' ), $args ); // Must include custom post type name

  }

  add_action( 'init', 'register_team_taxonomies', 0 );

}

/**
 * Create ACF setting page under CPT menu
 */

// if ( function_exists( 'acf_add_options_sub_page' ) ){
//   acf_add_options_sub_page(array(
//     'page_title' => 'Team Settings',
//     'menu_title' => 'Settings',
//     'menu_slug'  => 'team-settings',
//     'parent'     => 'edit.php?post_type=team',
//     'capability' => 'edit_posts'
//   ));
// }
