<?php
require_once 'Settings.php';
/**
 *
 * Classe para funções úteis não relacionadas diretamente à post types
 *
 */

class Util {
  /**
   *
   * Retorna um array com os tamanhos das thumbnails cadastrados
   * @return (array) $formated_thumb_sizes
   *
   */
  public static function get_thumbnail_sizes(){
    $thumbnail_sizes = get_intermediate_image_sizes();
    $formated_thumb_sizes = array();

    foreach ($thumbnail_sizes as $size) {
      $formated_thumb_sizes[$size] = $size;
    }

    return $formated_thumb_sizes;
  }

  /**
   *
   * Retorna um array com os post types cadastrados. Essa função exclui os post types default e post types referentes à outros plugins
   * @return (array) $post_types_array
   *
   */
  public static function get_post_type_array(){
    $post_types_array = array();
    $post_types = get_post_types( '', 'names' );
    $exclude = ['post', 'page', 'frm'];

    foreach ( $post_types as $post_type ) {
      if( $post_type != 'attachment' && $post_type != 'revision' && $post_type != 'nav_menu_item' ) {
        if(!Util::default_post_type($exclude, $post_type)) $post_types_array[ $post_type ] = $post_type;
      }
    }

    return $post_types_array;
  }

  /**
   *
   * Retorna um array com os post types cadastrados. Essa função exclui os post types default e post types referentes à outros plugins
   * @return (array) $post_types_array
   *
   */
  public static function get_registered_post_type_array(){
    $args = array(
      'post_type' => Settings::$main_post_type_name,
      'numberposts' => -1
    );

    $post_types = get_posts( $args );
    $post_types_array = array();

    foreach ( $post_types as $post_type ) {
      $post_types_array[$post_type->ID] = get_post_meta($post_type->ID, Settings::$post_type_field_name, true);
    }

    return $post_types_array;
  }

  /**
   *
   * Verifica se a string de um ítem da variável $array é total ou parte da string $word
   * @return $defaultPostType
   *
   */
  public static function default_post_type($array, $word){
    $defaultPostType = false;

    foreach($array as $str){
      if( stripos($word, $str) !== FALSE ) $defaultPostType = true;
    }

    return $defaultPostType;
  }

  /**
   *
   * GET post ID da página no back-end
   *
   */
  public static function get_panel_post_id(){
    return ( isset( $_GET['post'] ) ) ? $_GET['post'] : null;
  }

} ?>
