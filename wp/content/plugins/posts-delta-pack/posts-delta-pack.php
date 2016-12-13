<?php
/*
Plugin Name: Postagem Delta Pack
Plugin URI: http://quarteldesign.com
Description: Plugin para criação posts types e taxonomias personalizadas, permitindo a rápida implementação de seções de conteúdo em seu projeto
Text Domain: posts-delta-pack
Domain Path: /lang/
Author: Quartel Design
Version: 2.0
Author URI: http://www.quarteldesign.
*/

if ( ! defined( 'ABSPATH' ) ) {
  die( 'Access denied.' );
}

//Plugin path
define( 'POST_TYPE_PLUGIN_PATH', plugin_dir_path(__FILE__) );

//Arquivos necessários
require_once 'classes/Posts_Delta_Pack.php';
require_once 'classes/Post_Type_Factory.php';
require_once 'classes/Taxonomy_Factory.php';
require_once 'classes/Settings.php';

//Inicializa o plugin
$posts_delta_pack = new Posts_Delta_Pack();
add_action('init', array(&$posts_delta_pack, 'init'));

//Registra todas as taxonomias cadastradas
$taxonomy_factory = new Taxonomy_Factory();
add_action('init', array(&$taxonomy_factory, 'register_all_taxonomies'));

//Inicializa as configurações do plugin
$plugin_settings = new Settings();

//Configura o template para os post types
//$template_loader = new Post_Type_Template_Loader();
new Post_Type_View();
?>
