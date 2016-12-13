<?php
get_header(); ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <?php
        /*
        *
        * Post Loop
        *
        */
        if( have_posts() ) :
          while( have_posts() ) : the_post();
            //Default tax
            $post_tax = get_post_taxonomies(get_the_ID());
            $defined_feat_image = Default_Post_Type_Custom_Fields::get_post_type_option(get_post_type(), 'qpwp_post_type_thumbnail_archive_size');

            /* Component */
            $args = array(
              'component' => 'component-post-02',
              'show_terms' => ($post_tax) ? $post_tax[0] : false,
              'featured_image' => $defined_feat_image
            );

            Post_Type_View::get_component($args);
          endwhile;
          Post_Type_View::posts_paginate_nav();
        endif; ?>
      </div>
      <?php
      if(Default_Post_Type_Custom_Fields::get_post_type_option(get_post_type(), 'qpwp_post_type_show_sidebar')) : ?>
        <div class="col-sm-3">
          <?php get_sidebar(); ?>
        </div>
        <?php
      endif; ?>
    </div>
  </div>
  <?php
get_footer(); ?>
