<?php
if( have_rows( 'components' ) ) {
  //We're gonna dump it into a string, so let's define it
  $components = '';

  while( have_rows( 'components' ) ) {
    the_row();
    //var_dump(get_row_layout());
    switch( get_row_layout() ) {
      case 'hero' :
        //Pretty much every page
        $hero = array(
          'title'       => get_sub_field('hero_title'),
          'heading'     => get_sub_field('hero_heading'),
          'subheading'  => get_sub_field('hero_subheading'),
          'content'     => get_sub_field('hero_content'),
          'background'  => get_sub_field('hero_background'),
          'video'       => get_sub_field('hero_video'),
          'spotlight'   => get_sub_field('spotlight_strength')
        );

        $components .= ll_include_component(
          'hero-banner',
          $hero,
          array(),
          true
        );
      break;
      case 'lr_blocks' :
        //ITero Impressionless Scanner, Features section
        $block = array(
          'show_steps' => get_sub_field('lr_blocks_show_steps'),
          'content'    => get_sub_field('lr_blocks_content'),
          'background' => get_sub_field('lr_blocks_background_image'),
          'video'      => get_sub_field('lr_blocks_video')
        );

        $components .= ll_include_component(
          'lr-blocks',
          $block,
          array(),
          true
        );
      break;
      case 'call_to_action' :
        //Bottom of most pages above the footer
        $cta = array(
          'show_logo' => get_sub_field('cta_show_logo'),
          'title' => get_sub_field('cta_section_title'),
          'content' => get_sub_field('cta_content')
        );

        $components .= ll_include_component(
          'call-to-action',
          $cta,
          array(),
          true
        );
      break;
      case 'item_grid' :
        //Meet the Team, “Meet the team section”
        $items = array(
          'title' => get_sub_field('item_grid_section_title'),
          'items' => get_sub_field('item_grid_items')
        );

        $components .= ll_include_component(
          'item-grid',
          $items,
          array(),
          true
        );
      break;
      case 'image_grid' :
        //Early Childhood “Preventative Orthodontic Treatment” section
        $images = array(
          'title'  => get_sub_field("image_grid_section_title"),
          'images' => get_sub_field('image_grid_images')
        );

        $components .= ll_include_component(
          'image-grid',
          $images,
          array(),
          true
        );
      break;
      case 'location_grid' :
        //Home Page, “Currently Located in 3 Cities” section
        $locations = array(
          'title'     => get_sub_field("location_grid_section_title"),
          'sub_title' => get_sub_field("location_grid_sub_title")
        );

        $components .= ll_include_component(
          'location-grid',
          $locations,
          array(),
          true
        );
      break;
      case 'three_column_content' :
        //Early Childhood “Preventative Orthodontic Treatment” section
        $columns = array(
          'title'  => get_sub_field("three_column_content__section_title"),
          'columns' => get_sub_field('three_column_content_columns')
        );

        $components .= ll_include_component(
          'three-col-content',
          $columns,
          array(),
          true
        );
      break;
      case 'two_col_block' :
        //Home Page, “Currently Located in 3 Cities” section
        $blocks = array(
          'l_title'     => get_sub_field("two_col_block_left_title"),
          'l_intro' => get_sub_field("two_col_block_left_intro_text"),
          'l_content' => get_sub_field("two_col_block_left_content"),
          'r_title'     => get_sub_field("two_col_block_right_title"),
          'r_intro' => get_sub_field("two_col_block_right_intro_text"),
          'r_content' => get_sub_field("two_col_block_right_content")
        );

        $components .= ll_include_component(
          'two-col-block',
          $blocks,
          array(),
          true
        );
      break;
      default:
        the_content();
      break;
    }
  }
  echo $components;
}
?>
<?php // wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
