<?php
require_once 'Settings.php';
require_once 'Taxonomy_Factory.php';

class Taxonomy {
  public $post_types_tax_settings;

  public function __construct() { }

  /**
   *
   * Registra o post_type que cadastra taxonomias
   *
   */
  public function initial_taxonomy() {
    $labels = array(
      'name'               => __( 'Taxonomies',  Settings::$text_domain ),
      'singular_name'      => __( 'Taxonomy',  Settings::$text_domain ),
      'menu_name'          => __( 'Taxonomies',  Settings::$text_domain ),
      'name_admin_bar'     => __( 'Taxonomies',  Settings::$text_domain ),
      'add_new'            => __( 'Add New', Settings::$text_domain ),
      'add_new_item'       => __( 'Add New Taxonomy', Settings::$text_domain ),
      'new_item'           => __( 'New Taxonomy', Settings::$text_domain ),
      'edit_item'          => __( 'Edit Taxonomy', Settings::$text_domain ),
      'view_item'          => __( 'View Taxonomy', Settings::$text_domain ),
      'all_items'          => __( 'Taxonomies', Settings::$text_domain ),
      'search_items'       => __( 'Search Taxonomies', Settings::$text_domain ),
      'parent_item_colon'  => __( 'Parent Taxonomies:', Settings::$text_domain ),
      'not_found'          => __( 'No taxonomy found.', Settings::$text_domain ),
      'not_found_in_trash' => __( 'No taxonomies found in Trash.', Settings::$text_domain )
    );

    $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => 'tools.php',
      'show_in_nav_menus'  => false,
      'query_var'          => true,
      'capability_type'    => 'post',
      'has_archive'        => false,
      'hierarchical'       => false,
      'menu_position'      => null,
      'taxonomies'         => array( '' ),
      'menu_icon'          => 'dashicons-category',
      'supports'           => array('title')
    );

    register_post_type( Settings::$main_taxonomy_name, $args );

    $taxonomy_factory = new Taxonomy_Factory();
    $taxonomy_factory->register_all_taxonomies();

    //Configura o número de posts por página
    add_action('pre_get_posts', array($taxonomy_factory, 'set_posts_per_page'));
  }

  /**
   *
   * Retorna todas as taxonomias cadastradas
   *
   */
  public function get_registered_taxonomies($count = -1) {
    $args = array(
      'post_type' => Settings::$main_taxonomy_name,
      'numberposts' => -1
    );

    return get_posts( $args );
  }

  /**
   *
   * Checa se o custom field passado possui algum valor
   *
   */
  public static function custom_field_value($post_id, $field_name){
    $field_value = get_post_meta( $post_id, $field_name, true );

    if( is_array($field_value) ) {
      return $field_value;
    }

    return ($field_value) ? esc_html($field_value) : null;
  }

} ?>
