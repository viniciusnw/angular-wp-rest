<?php
require_once 'Settings.php';
require_once 'Post_Type.php';
require_once 'Util.php';
include_once WP_PLUGIN_DIR . '/' . Settings::$plugin_name .'/vendor/cpt/Post_Type_Abstract_Factory.php';

class Post_Type_Factory {
  public function __construct() {  }

  /**
   *
   * Cadastra todos os post types registrados
   *
   */
  public function register_all_post_types() {
    $post_type_obj = new Post_Type();
    $post_types = $post_type_obj->get_registered_post_types();
    $this->posts_types = $post_types;

    //Percorre todos os post types cadastrados
    if( count($post_types) > 0 ) {
      foreach( $post_types as $post_type ) {
        //Registra todos os campos cadastrados para este post type
        $this->register_fields($post_type);

        //Campos do post type CADASTRADO (back-end)
        $post_type_id             = $post_type->ID;
        $post_type_title          = $post_type->post_title;
        $post_type_name           = Post_type::custom_field_value($post_type_id, 'qpwp_post_type_name');
        $post_type_singular_name  = Post_type::custom_field_value($post_type_id, 'qpwp_post_type_singular_name');
        $post_type_slug           = Post_type::custom_field_value($post_type_id, 'qpwp_post_type_slug');
        $post_type_taxonomy_slug  = Post_type::custom_field_value($post_type_id, 'qpwp_post_type_taxonomy_slug');
        $post_type_posts_per_page = Post_type::custom_field_value($post_type_id, 'qpwp_post_type_posts_per_page');
        $post_type_dashicon_class = Post_type::custom_field_value($post_type_id, 'qpwp_post_type_dashicon_class');
        $post_type_has_archive    = (Post_type::custom_field_value($post_type_id, 'qpwp_post_type_has_archive')) ? true : false;
        $post_type_hierarchical   = (Post_type::custom_field_value($post_type_id, 'qpwp_post_type_hierarchical')) ? true : false;
        $post_type_supports       = Post_type::custom_field_value($post_type_id, 'qpwp_post_type_supports');
        $posts_per_page           = Post_type::custom_field_value($post_type_id, 'qpwp_post_type_posts_per_page');

        //Adiciona title e page-attributes, caso seja hierarchical
        $post_type_supports[] = 'title';
        if ( $post_type_hierarchical ) $post_type_supports[] = 'page-attributes';

        //Regista o post type em questão
        if( isset( $post_type_slug) && isset( $post_type_name ) ) {
          $post_item = new Post_Type_Abstract_Factory(array(
            'post_type_name' => $post_type_name,
            'singular'       => $post_type_singular_name,
            'plural'         => $post_type_title,
            'slug'           => $post_type_slug
          ), array(
            'supports'     => $post_type_supports,
            'has_archive'  => $post_type_has_archive,
            'hierarchical' => $post_type_hierarchical
          ));

          //Ícone menu
          $post_item->menu_icon($post_type_dashicon_class);

          //Text domain
          $post_item->set_textdomain(Settings::$text_domain);
        }
      }
    }
  }

  /**
   *
   * Registra os custom fields para cada post type
   * @param (array) $post_types_arr - Array com todos os post types cadastrados
   *
   */
  private function register_fields( $post_type ) {
    $post_type_id = $post_type->ID;
    $post_type_name = Post_Type::custom_field_value($post_type_id, 'qpwp_post_type_name');
    $custom_fields = Post_Type::custom_field_value($post_type_id, 'qpwp_custom_fields_group');

    //Caso exista custom fields e os campos de ID e Título estejam preenchidos
    if( $custom_fields && isset( $custom_fields[0]['qpwp_custom_field_id'] ) && isset( $custom_fields[0]['qpwp_custom_field_title'] )) {
      //Registra os custom fields
    }
  }

  /**
   *
   * Configura o número de posts por página para cada post type
   *
   */
  public function set_posts_per_page($query) {
    remove_action( 'pre_get_posts', __FUNCTION__ );
    if($query->is_main_query()) {
      $post_type_obj = new Post_Type();
      $post_types = $post_type_obj->get_registered_post_types();

      foreach( $post_types as $post_type ) {
        $post_type_id = $post_type->ID;
        $post_type_name  = Post_type::custom_field_value($post_type_id, 'qpwp_post_type_name');
        $posts_per_page  = Post_type::custom_field_value($post_type_id, 'qpwp_post_type_posts_per_page');

        if(is_post_type_archive($post_type_name) && !is_admin()) {
          $query->set( 'posts_per_page', intval($posts_per_page) );
        }
      }
    }
  }
} ?>
