<?php
require_once 'Settings.php';
require_once 'Util.php';

/**
 *
 * Classe destinada à manipulação dos custom fields default do post type de taxonomias
 *
 */

class Default_Taxonomy_Custom_Fields {
  private $_post_id = '';

  public function __construct($post_id = '') {
    $this->_post_id = $post_id;
  }

  public function create_custom_fields() {
    $prefix = 'qpwp_';

    //Metabox "Configurações da taxonomia"
    $qpwp_metabox_tax = new_cmb2_box( array(
      'id'            => $prefix . 'metabox_post_type_tax',
      'title'         => __( 'Taxonomy settings', Settings::$text_domain ),
      'object_types'  => array( Settings::$main_taxonomy_name ), // Post type
    ));

    //Nome da taxonomia
    $qpwp_metabox_tax->add_field( array(
      'name' => __( 'Name', Settings::$text_domain ),
      'desc' => __( 'The name is like an ID, dont use spaces or special characteres. You can insert in this field a existing taxonomy name and ignore the next fields.', Settings::$text_domain ),
      'id'   => $prefix . 'tax_name',
      'type' => 'text',
      'attributes'  => array(
        'required'    => 'required'
       )
    ));

    //Título singular
    $qpwp_metabox_tax->add_field( array(
      'name' => __( 'Singular title', Settings::$text_domain ),
      'desc' => __( 'This title is used only in the WordPress panel', Settings::$text_domain ),
      'id'   => $prefix . 'tax_singular_title',
      'type' => 'text',
      'attributes' => array(
        'required' => 'required'
      )
    ));

    //Slug
    $qpwp_metabox_tax->add_field( array(
      'name' => __( 'Slug', Settings::$text_domain ),
      'desc' => __('The slug is used to set the permalink of this taxonomy', Settings::$text_domain),
      'id'   => $prefix . 'tax_slug',
      'type' => 'text',
      'attributes'  => array(
        'required'    => 'required'
      ),
    ));

    //Hierárquico
    $qpwp_metabox_tax->add_field( array(
      'name' => __( 'Hierarchical', Settings::$text_domain ),
      'desc' => 'Marque se essa taxonomia deve ter o comportamento de tags',
      'id'   => $prefix . 'tax_hierarchical',
      'type' => 'checkbox',
    ));

    //Post type na qual a taxonomia será aplicada
    $qpwp_metabox_tax->add_field( array(
      'name'    => __( 'Post Types', Settings::$text_domain ),
      'desc'    => __( 'Select the post types for use this taxonomy', Settings::$text_domain ),
      'id'      => $prefix . 'tax_post_types',
      'type'    => 'multicheck',
      'options' => Util::get_post_type_array()
    ));

    //Posts por página
    $qpwp_metabox_tax->add_field( array(
      'name' => __( 'Posts per page', Settings::$text_domain ),
      'desc' => __( 'Number of posts per page in the post taxonomy template', Settings::$text_domain ),
      'id'   => $prefix . 'post_type_posts_per_page_tax',
      'type' => 'text_small',
      'default' => 10
    ));
  }
} ?>
