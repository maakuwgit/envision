<?php
/**
 * Register the custom post type
 */
if ( ! function_exists('register_testimonial_custom_post_type') ) {

  // Register Custom Post Type
  function register_testimonial_custom_post_type() {

    $labels = array(
      'name'                => 'Testimonials',
      'singular_name'       => 'Testimonial',
      'menu_name'           => 'Testimonial',
      'parent_item_colon'   => 'Parent Testimonial',
      'all_items'           => 'All Testimonials',
      'view_item'           => 'View Testimonial',
      'add_new_item'        => 'Add New Testimonial',
      'add_new'             => 'New Testimonial',
      'edit_item'           => 'Edit Testimonial',
      'update_item'         => 'Update Testimonial',
      'search_items'        => 'Search Testimonial',
      'not_found'           => 'No testimonial found',
      'not_found_in_trash'  => 'No testimonial found in Trash',
    );
    $args = array(
      'label'               => 'testimonial',
      'description'         => 'Testimonial description',
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
      'has_archive'         => false,
      'exclude_from_search' => true,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'testimonial', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_testimonial_custom_post_type', 0 );

}