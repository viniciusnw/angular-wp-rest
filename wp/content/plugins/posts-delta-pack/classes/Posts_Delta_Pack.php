<?php
//Dependencies
require_once 'Settings.php';
require_once 'Post_Type.php';
require_once 'Post_Type_Factory.php';
require_once 'Post_Type_View.php';
require_once 'Default_Post_Type_Custom_Fields.php';
require_once 'Default_Taxonomy_Custom_Fields.php';
require_once 'Post_Type_Custom_Field.php';
require_once 'Taxonomy.php';
require_once 'Taxonomy_Factory.php';

class Posts_Delta_Pack {
  private $_post_type;
  private $_default_post_type_fields;
  private $_taxonomy;
  private $_default_taxonomy_fields;

  public function __construct() {
    $this->_post_type = new Post_Type();
    $this->_taxonomy = new Taxonomy();

    //Factories
    $post_factory = new Post_Type_Factory();

    //Inicializa os custom fields default do post type principal
    $this->_default_post_type_fields = new Default_Post_Type_Custom_Fields();

    //Inicializa os custom fields default do post type de taxonomias
    $this->_default_taxonomy_fields = new Default_Taxonomy_Custom_Fields();

    //Registra todos os post types cadastrados
    $post_factory->register_all_post_types();
  }

  public function init() {
    load_plugin_textdomain( Settings::$text_domain, false, dirname(dirname(plugin_basename(__FILE__))) . '/lang' );

    //Initial post type
    $this->_post_type->initial_post_type();

    //Default post type custom fields
    add_filter( 'cmb2_init', array( &$this->_default_post_type_fields, 'create_custom_fields' ) );

    //Custom post type custom fields
    $post_type_custom_fields = new Post_Type_Custom_Field();
    add_filter( 'cmb2_init', array( &$post_type_custom_fields, 'create_fields' ) );    

    //Initial taxonomy
    $this->_taxonomy->initial_taxonomy();

    //Carrega os assets do plugin (js e css)
    $this->load_assets();

    //Registra as taxonomias cadastradas
    $taxonomy_factory = new Taxonomy_Factory();
    $taxonomy_factory->register_all_taxonomies();

    //Default taxonomy custom fields
    add_filter( 'cmb2_init', array( &$this->_default_taxonomy_fields, 'create_custom_fields' ) );
  }

  public function load_assets(){
    $plugin_settings = new Settings();

    $assets = array(
      'css' => array(
        'posts-delta-pack-main' => $plugin_settings->plugin_path . 'assets/dist/all.min.css'
      ),
      'js'  => array(
        'posts-delta-pack-js' => $plugin_settings->plugin_path . 'assets/dist/concat.min.js'
      )
    );

    /* Load css */
    foreach( $assets['css'] as $handle => $src ) {
      wp_enqueue_style($handle, $src);
    }

    /* Load js */
    foreach( $assets['js'] as $handle => $src ) {
      wp_enqueue_script($handle, $src, array('jquery'), false, true);
    }
  }
} ?>
