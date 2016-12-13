<?php
require_once 'Settings.php';
require_once 'Post_Type.php';
require_once 'Util.php';

/**
 *
 * Classe destinada à manipulação de custom fields do post type default
 *
 */
class Default_Post_Type_Custom_Fields {
  private $_post_id = '';

  public function __construct($post_id = '') {
    $this->_post_id = $post_id;
  }

  /**
   *
   * Cria os custom fields
   *
   */
  public function create_custom_fields() {
    $prefix = 'qpwp_';

    /**
    *
    * Metabox para as configurações do post type
    *
    **/
    $qpwp_metabox = new_cmb2_box( array(
      'id'            => $prefix . 'metabox_post_type_settings',
      'title'         => __( 'Post Type settings', Settings::$text_domain ),
      'object_types'  => array( Settings::$main_post_type_name ), // Post type
    ));

    /**
     *
     * Fields
     *
     */

    /* Nome do post type */
    $qpwp_metabox->add_field( array(
      'name' => __( 'Post Type name', Settings::$text_domain ),
      'desc' => __('The name is like an ID, dont use spaces or special characteres.', Settings::$text_domain ),
      'id'   => $prefix . 'post_type_name',
      'type' => 'text',
      'attributes'  => array(
        'required'    => 'required',
      ),
    ));

    /* Nome singular do post type */
    $qpwp_metabox->add_field( array(
      'name' => __( 'Post Type singular name', Settings::$text_domain ),
      'desc' => '',
      'id'   => $prefix . 'post_type_singular_name',
      'type' => 'text',
    ));

    /* Slug do post type */
    $qpwp_metabox->add_field( array(
      'name' => __( 'Post type slug', Settings::$text_domain ),
      'desc' => '',
      'id'   => $prefix . 'post_type_slug',
      'type' => 'text',
      'attributes'  => array(
        'required'    => 'required',
      )
    ));

    /* Dashicon */
    $qpwp_metabox->add_field( array(
      'name' => __( 'Post type menu dashicon class', Settings::$text_domain ),
      'desc' => __( 'Set the class of menu <a href="https://developer.wordpress.org/resource/dashicons" target="_blank">dashicon</a>', Settings::$text_domain ),
      'id'   => $prefix . 'post_type_dashicon_class',
      'type' => 'text',
      'default' => 'dashicons-welcome-write-blog'
    ));

    /* Possui arquivo */
    $qpwp_metabox->add_field( array(
      'name' => __( 'Has archive', Settings::$text_domain ),
      'desc' => __( 'Mark if this post type has archive for show posts in front end', Settings::$text_domain ),
      'id'   => $prefix . 'post_type_has_archive',
      'type' => 'checkbox',
    ));

    /* Possui hierarquia */
    $qpwp_metabox->add_field( array(
      'name' => __( 'Hierarchical', Settings::$text_domain ),
      'desc' => __( 'Mark if this post type is hierarchical like a page', Settings::$text_domain ),
      'id'   => $prefix . 'post_type_hierarchical',
      'type' => 'checkbox',
    ));

    /* Mostrar nos feeds */
    $qpwp_metabox->add_field( array(
      'name' => __( 'Show in feeds', Settings::$text_domain ),
      'desc' => __( 'Mark if you want that post type in wordpress feeds', Settings::$text_domain ),
      'id'   => $prefix . 'post_type_in_feeds',
      'type' => 'checkbox',
    ));

    /* Post type supports */
    $qpwp_metabox->add_field( array(
      'name' => __( 'Post type supports', Settings::$text_domain ),
      'desc' => '',
      'id'   => $prefix . 'post_type_supports',
      'type' => 'multicheck',
      'options' => array(
        'editor' => __( 'Editor', Settings::$text_domain ),
        'author' => __( 'Author', Settings::$text_domain ),
        'thumbnail' => __( 'Thumbnail', Settings::$text_domain ),
        'excerpt' => __( 'Excerpt', Settings::$text_domain ),
        'trackbacks' => __( 'Trackbacks', Settings::$text_domain ),
        'custom-fields' => __( 'Custom Fields', Settings::$text_domain ),
        'comments' => __( 'Comments', Settings::$text_domain ),
        'revisions' => __( 'Revisions', Settings::$text_domain ),
        'page-attributes' => __( 'Page Attributes', Settings::$text_domain ),
        'post-formats' => __( 'Post Formats', Settings::$text_domain ),
      )
    ));

    /* Post type taxonomies */
    $post_type_ob = new Post_Type();
    $qpwp_metabox->add_field( array(
      'name' => __( 'Default taxonomy', Settings::$text_domain ),
      'desc' => __( 'Set the default taxonomy for this post type', Settings::$text_domain ),
      'id' => $prefix . 'post_type_default_tax',
      'type'             => 'radio',
      'show_option_none' => true,
      'options' => $post_type_ob->get_post_taxonomies(Util::get_panel_post_id())
    ));

    /* Metabox para configurações do template do post type */
    $qpwp_templates_metabox = new_cmb2_box( array(
      'id'            => 'qpwp_metabox_post_type_template_settings',
      'title'         => __( 'Template settings', Settings::$text_domain ),
      'object_types'  => array( Settings::$main_post_type_name ), // Post type
    ));

    /* Posts por página */
    $qpwp_templates_metabox->add_field( array(
      'name' => __( 'Posts per page', Settings::$text_domain ),
      'desc' => __( 'Number of posts per page in the post archive', Settings::$text_domain ),
      'id'   => 'qpwp_post_type_posts_per_page',
      'type' => 'text_small',
      'default' => 10
    ));

    /* Tamanhos das thumbnails */
    $qpwp_templates_metabox->add_field( array(
      'name' => __( 'Thumbnail size', Settings::$text_domain  ),
      'desc' => __( 'Thumbnail size displayed in archive list', Settings::$text_domain  ),
      'id'   => 'qpwp_post_type_thumbnail_archive_size',
      'type' => 'select',
      'options' => Util::get_thumbnail_sizes()
    ));

    /* Mostrar sidebar? */
    $qpwp_templates_metabox->add_field( array(
      'name' => __( 'Show sidebar', Settings::$text_domain  ),
      'desc' => __( 'Mark this option with you want to show sidebar', Settings::$text_domain  ),
      'id'   => 'qpwp_post_type_show_sidebar',
      'type' => 'checkbox'
    ));

    /* Campos customizados */
    $qpwp_custom_fields_metabox = new_cmb2_box( array(
      'id'            => 'qpwp_metabox_post_type_custom_fields',
      'title'         => __( 'Custom fields', Settings::$text_domain ),
      'object_types'  => array( Settings::$main_post_type_name ) // Post type
    ));

    /* Custom fields para o post type */
    $group_custom_field_id = $qpwp_custom_fields_metabox->add_field( array(
      'id'          => 'qpwp_custom_fields_group',
      'type'        => 'group',
      'description' => '',
      'options'     => array(
          'group_title'   => __( 'Custom Field {#}', Settings::$text_domain ), // since version 1.1.4, {#} gets replaced by row number
          'add_button'    => __( 'Add Another Custom Field', Settings::$text_domain ),
          'remove_button' => __( 'Remove Custom Field', Settings::$text_domain ),
          'sortable'      => true, // beta
      ),
    ));

    /* Título do campo */
    $qpwp_custom_fields_metabox->add_group_field( $group_custom_field_id, array(
      'name' => __( '*Title', Settings::$text_domain ),
      'desc' => __( '<strong>*Required.</strong> Title label field.</strong>', Settings::$text_domain ),
      'id'   => 'qpwp_custom_field_title',
      'type' => 'text',
    ));

    /* Descrição do campo */
    $qpwp_custom_fields_metabox->add_group_field( $group_custom_field_id, array(
      'name' => __( 'Description', Settings::$text_domain ),
      'desc' => __( 'Field description', Settings::$text_domain ),
      'id'   => 'qpwp_custom_field_description',
      'type' => 'text',
    ));

    /* ID do campo */
    $qpwp_custom_fields_metabox->add_group_field( $group_custom_field_id, array(
      'name' => __( '*ID', Settings::$text_domain ),
      'desc' => __( '<strong>*Required.</strong> Dont use spaces or special characters. <br />Example: field_title, in this case your final fild ID is <strong>post_type_name_field_title</strong>', Settings::$text_domain ),
      'id'   => 'qpwp_custom_field_id',
      'type' => 'text'
    ));

    /* Tipo do campo */
    $qpwp_custom_fields_metabox->add_group_field( $group_custom_field_id, array(
      'name' => __( 'Type', Settings::$text_domain ),
      'desc' => __( 'Field input type', Settings::$text_domain ),
      'id'   => 'qpwp_custom_field_type',
      'type' => 'select',
      'options' => array(
        'text' => 'Text',
        'text_email' => 'Text Email',
        'text_url' => 'Text URL',
        'textarea' => 'Textarea',
        'textarea_code' => 'Code',
        'wysiwyg' => 'Editor',
        'text_date_timestamp' => 'Datepicker',
        'colorpicker' => 'Colorpicker',
        'oembed' => 'oEmbed',
        'file' => 'File Upload',
        'select' => 'Select',
        'radio' => 'Radio',
        'multicheck' => 'Multi Checkbox',
        'checkbox' => 'Checkbox',
      )
    ));

    /* Valores dos campos que forem select, radio ou multicheck */
    $qpwp_custom_fields_metabox->add_group_field( $group_custom_field_id, array(
      'name' => __( 'Options', Settings::$text_domain ),
      'desc' => __( 'Itens values for fiedls like select, radio or multicheck. Insert one item per line', Settings::$text_domain ),
      'id'   => 'qpwp_custom_field_options',
      'type' => 'textarea',
    ));

    /* Campo obrigatório? */
    $qpwp_custom_fields_metabox->add_group_field( $group_custom_field_id, array(
      'name' => __( 'Required', Settings::$text_domain ),
      'desc' => __( 'This field is required', Settings::$text_domain ),
      'id'   => 'qpwp_custom_field_required',
      'type' => 'checkbox'
    ));
  }

  /**
   *
   * Retorna o valor de uma opção do admim do post type
   *
   */
  public static function get_post_type_option($post_type, $option) {
    $args = array(
      'numberposts' => 1,
      'post_type' => Settings::$main_post_type_name,
      'meta_query' => array(
        array(
          'key' => Settings::$post_type_field_name,
          'value' => $post_type,
          'compare' => '='
        )
      )
    );

    $post_data = get_posts($args);

    return get_post_meta($post_data[0]->ID, $option, true);
  }
} ?>
