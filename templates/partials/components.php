<?php
if( have_rows( 'components' ) ) {
  //We're gonna dump it into a string, so let's define it
  $components = '';

  while( have_rows( 'components' ) ) {
    the_row();

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
      case 'lr-block' :
        //Home, About Us, all Procedures
        $block = array(
          'content'  => get_sub_field('lr_blocks_content'),
          'image'    => get_sub_field('lr_blocks_image'),
          'style'    => get_sub_field('lr_blocks_style')
        );

        $components .= ll_include_component(
          'lr-blocks',
          $block,
          array(),
          true
        );
      break;/*
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
      break;*/
      case 'image-w-caption' :
        //Home, All Locations
        $image = array(
          'image'   => get_sub_field('image_w_caption_image'),
          'caption' => get_sub_field('image_w_caption_caption')
        );

        $components .= ll_include_component(
          'image-w-caption',
          $image,
          array(),
          true
        );
      break;
      case 'image-w-content' :
        //About Us, Dermafillers
        $image = array(
          'image'   => get_sub_field('image_w_content_image'),
          'content' => get_sub_field('image_w_content_content')
        );

        $components .= ll_include_component(
          'image-w-content',
          $image,
          array(),
          true
        );
      break;
      case 'procedure-grid' :
        //Home Page, “Currently Located in 3 Cities” section
        $num_cards = array(
          'heading'   => get_sub_field("procedure-grid-heading"),
          'num_cards' => get_sub_field("procedure-grid-num_cards"),
          'post__in'  => get_sub_field("procedure-grid-specific_posts")
        );

        $components .= ll_include_component(
          'procedure-grid',
          $num_cards,
          array(),
          true
        );
      break;/*
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
      break;*/
      case 'testimonial' :
        //All Procedures
        $testimonials = array(
          'num_testimonials' => get_sub_field('num_testimonials')
        );

        $components .= ll_include_component(
          'testimonials',
          $testimonials,
          array(),
          true
        );
      break;
      case 'three-col-w-headline' :
        //All Procedures
        $columns = array(
          'title'       => get_sub_field('three_column_w_headline_heading'),
          'columns'     => get_sub_field('three_column_w_headline_columns'),
          'num_columns' => get_sub_field('three_column_w_headline_num_columns')
        );

        $components .= ll_include_component(
          'three-col-w-headline',
          $columns,
          array(),
          true
        );
      break;
      case 'two-col-w-headline' :
        //Home, About, all Locations
        $blocks = array(
          'title'     => get_sub_field("two-col-w-headline-title"),
          'l_content' => get_sub_field("two-col-w-headline-l_content"),
          'r_content' => get_sub_field("two-col-w-headline-r_content")
        );

        $components .= ll_include_component(
          'two-col-w-headline',
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
