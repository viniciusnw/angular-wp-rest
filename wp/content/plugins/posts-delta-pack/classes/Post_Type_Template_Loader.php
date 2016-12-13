<?php
//Dependencies
require_once 'Settings.php';
require_once 'Post_Type.php';
require_once 'Taxonomy.php';
require_once 'Util.php';
require_once 'Default_Post_Type_Custom_Fields.php';

if ( ! defined( 'ABSPATH' ) ) {
  die( 'Access denied.' );
}

class Post_Type_Template_Loader {
  /* Configurações do plugin */
  public $post_type_settings = '';
  public $taxonomy_settings = '';

  public function __construct() {
    add_filter( 'template_include', array( $this, 'template_loader' ) );
  }

	public function template_loader( $original_template ) {
    $post_type_settings = '';
    $taxonomy_settings = '';

    /* Dados do post type */
		$post_type_name = Settings::$main_post_type_name;
		$tax_name = Settings::$main_taxonomy_name;

		/* Arquivos de template */
    $archive_template_filename = 'archive-' . $post_type_name . '.php';
    $taxonomy_template_filename = 'taxonomy-' . $tax_name . '.php';
    $single_template_filename = 'single-' . $post_type_name . '.php';

    /* Definição das variáveis de post types ou taxonomias */
    $plugin_post_type = new Post_Type();
    $plugin_taxonomy = new Taxonomy();

    /* Post Type loop para adicionar os templates de post type a cada um */
    if( is_post_type_archive() || is_single() ) {
      $default_archive_template = POST_TYPE_PLUGIN_PATH . '/views/default/' . $archive_template_filename;
      $default_single_template = POST_TYPE_PLUGIN_PATH . '/views/default/' . $single_template_filename;
      $post_type_settings = $plugin_post_type->get_registered_post_types();

      foreach($post_type_settings as $post_type_obj){
        $post_type_id = $post_type_obj->ID;
        $post_type_name = get_post_meta( $post_type_id, Settings::$post_type_field_name, true );

        /* Condicional para definição dos templates */
        if( is_post_type_archive( $post_type_name ) && !is_single()){
          $custom_template = locate_template('archive-' . $post_type_name . '.php');

        	// Archive
        	return (empty($custom_template)) ? $default_archive_template : $custom_template;
        }
        elseif( get_post_type() == $post_type_name && is_single() ){
          $custom_template = locate_template('single-' . $post_type_name . '.php');
        	// Single
        	return (empty($custom_template)) ? $default_single_template : $custom_template;
        }
        else {
          return $original_template;
        }
      }
    }

    /* Taxonomy loop para adicionar os templates de taxonomia a cada uma */
    elseif(is_tax()){
      /* Caminho dos arquivos de template */
      $default_tax_template = POST_TYPE_PLUGIN_PATH . '/views/default/' . $taxonomy_template_filename;
      $taxonomy_settings = $plugin_taxonomy->get_registered_taxonomies();

      if($taxonomy_settings) {
        foreach($taxonomy_settings as $taxonomy_obj) {
          $taxonomy_id = $taxonomy_obj->ID;
          $taxonomy_name = get_post_meta( $taxonomy_id, Settings::$tax_field_name, true );

          /* Condicional para definição dos templates */
          if( is_tax( $taxonomy_name ) ) {
            $custom_tax_template = locate_template('taxonomy-' . $taxonomy_name . '.php');
            return empty($custom_tax_template) ? $default_tax_template : $custom_tax_template;
          }
          else {
            return $original_template;
          }
        }
      }
      else {
        return $original_template;
      }
    }
    else {
      return $original_template;
    }
	}
}
?>
