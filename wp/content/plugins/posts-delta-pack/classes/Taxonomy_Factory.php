<?php
require_once 'Taxonomy.php';

class Taxonomy_Factory {
  private $registered_taxonomies = array();

  public function __construct() { }

  /**
   *
   * Registra todas as taxonomias cadastradas no painel
   *
   */
  public function register_all_taxonomies() {
    $taxonomies = new Taxonomy();
    $taxonomy_list = $taxonomies->get_registered_taxonomies();

    if( count( $taxonomy_list ) > 0 ) {
      foreach( $taxonomy_list as $tax ) {
        $post_type_tax_id = $tax->ID;

        $tax_name = Taxonomy::custom_field_value( $post_type_tax_id, 'qpwp_tax_name');
        $tax_title = $tax->post_title;
        $tax_singular_title = Taxonomy::custom_field_value( $post_type_tax_id, 'qpwp_tax_singular_title');
        $tax_hierarchical = Taxonomy::custom_field_value( $post_type_tax_id, 'qpwp_tax_hierarchical');
        $tax_post_types_array = Taxonomy::custom_field_value( $post_type_tax_id, 'qpwp_tax_post_types');

        //echo $tax_hierarchical;

        //Slug
        $tax_slug = Taxonomy::custom_field_value( $post_type_tax_id, 'qpwp_tax_slug');
        $tax_slug = ( $tax_slug ) ? $tax_slug : $tax_name;

        //Hierarchical
        $tax_hierarchical = ( isset($tax_hierarchical) ) ? false : true;

        if( $tax_name && $tax_slug && $tax_title && $tax_post_types_array ) {
          register_taxonomy(
            $tax_name,
            $tax_post_types_array,
            array(
              "show_in_nav_menus" => false,
              "hierarchical" => $tax_hierarchical,
              "label" => $tax_title,
              "singular_label" => $tax_singular_title,
              'rewrite' => array( 'slug' => $tax_slug )
            )
          );
        }
      }
    }
  }

  /**
   *
   * Configura o número de posts por página para cada taxonomia
   *
   */
  public function set_posts_per_page($query) {
    remove_action( 'pre_get_posts', __FUNCTION__ );
    if($query->is_main_query()) {
      $taxonomy_obj = new Taxonomy();
      $taxonomies = $taxonomy_obj->get_registered_taxonomies();

      foreach( $taxonomies as $taxonomy ) {
        $tax_id = $taxonomy->ID;
        $taxonomy_name  = Taxonomy::custom_field_value($tax_id, 'qpwp_tax_name');
        $posts_per_page  = Post_type::custom_field_value($tax_id, 'qpwp_post_type_posts_per_page_tax');

        if(is_tax($taxonomy_name) && !is_admin()) {
          $query->set( 'posts_per_page', intval($posts_per_page) );
        }
      }
    }
  }
} ?>
