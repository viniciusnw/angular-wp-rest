<?php
//Dependencies
require_once 'Settings.php';
require_once 'Post_Type_Factory.php';
require_once 'Post_Type_Template_Loader.php';

/**
 *
 * Classe destinada à criação de post types registrados no back-end
 *
 */

class Post_Type {
  public $post_type_settings = '';

  public function __construct() { }

  /**
   *
   * Registra o post_type que cadastra os post types (like a inception)
   *
   */
  public function initial_post_type() {
    $labels = array(
      'name'               => __( 'Post Types', Settings::$text_domain ),
      'singular_name'      => __( 'Post Type', Settings::$text_domain ),
      'menu_name'          => __( 'Post Types', Settings::$text_domain ),
      'name_admin_bar'     => __( 'Post Types', Settings::$text_domain ),
      'add_new'            => __( 'Add New', Settings::$text_domain ),
      'add_new_item'       => __( 'Add New Post Type', Settings::$text_domain ),
      'new_item'           => __( 'New Post Type', Settings::$text_domain ),
      'edit_item'          => __( 'Edit Post Type', Settings::$text_domain ),
      'view_item'          => __( 'View Post Type', Settings::$text_domain ),
      'all_items'          => __( 'Posts Types', Settings::$text_domain ),
      'search_items'       => __( 'Search Posts Types', Settings::$text_domain ),
      'parent_item_colon'  => __( 'Parent Posts Types:', Settings::$text_domain ),
      'not_found'          => __( 'No post type found.', Settings::$text_domain ),
      'not_found_in_trash' => __( 'No posts types found in Trash.', Settings::$text_domain )
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
      'menu_icon'          => 'dashicons-admin-settings',
      'supports'           => array( 'title')
    );

    register_post_type( Settings::$main_post_type_name, $args );
    $post_factory = new Post_Type_Factory();

    //Configura a quantidade de posts por página
    add_action('pre_get_posts', array($post_factory, 'set_posts_per_page'));

    //Configura o template para os post types registrados
    $template_loader = new Post_Type_Template_Loader();
  }

  /**
   *
   * Retorna os post types cadastrados
   *
   */
  public function get_registered_post_types($count = -1) {
    $args = array(
      'post_type' => Settings::$main_post_type_name,
      'numberposts' => $count
    );

    $posts = get_posts( $args );

    return $posts;
  }

  /**
   *
   * Retorna as taxonomias registradas para este post_type
   * @param (int) $post_type_id - Deve ser o ID do post que contém as configurações do post_type (Ferramentas > Post Type)
   * @return (array) $post_type_taxonomies - Array com todas as taxonomias relacionadas à esse post
   *
   */
  public function get_post_taxonomies( $post_type_id ) {
    $post_type_taxonomies = array( '' => 'Nenhum' );
    $post_type_name = esc_html( get_post_meta( $post_type_id, Settings::$post_type_field_name, true ) );
    $taxonomy_names = get_object_taxonomies( $post_type_name );

    if( $taxonomy_names ) {
      foreach( $taxonomy_names as $tax_name ) {
        $post_type_taxonomies[$tax_name] = $tax_name;
      }
    }

    return $post_type_taxonomies;
  }

  /**
   *
   * Checa se o custom field passado possui algum valor
   * @param (int) $post_id
   * @param (string) $field_name
   *
   */
  public static function custom_field_value($post_id, $field_name) {
    $field_value = get_post_meta( $post_id, $field_name, true );

    return ($field_value) ? $field_value : null;
  }

} ?>
