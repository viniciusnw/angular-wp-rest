<?php
require_once 'Settings.php';
require_once 'Post_Type.php';

/**
 *
 * Classe destinada à criação e manipulação de custom fields definidos nos post type dinâmicos.
 *
 */
class Post_Type_Custom_Field {
  public function __construct() {}

  /**
   *
   * Cria custom fields
   *
   */
  public function create_fields() {
    $post_types_obj = new Post_Type();
    $registered_post_types = $post_types_obj->get_registered_post_types();

    if ( $registered_post_types ) {
      foreach( $registered_post_types as $post_type ) {
        $post_type_id = $post_type->ID;

        //Custom fields
        $post_type_name = Post_Type::custom_field_value( $post_type_id, 'qpwp_post_type_name' );
        $custom_fields = Post_Type::custom_field_value( $post_type_id, 'qpwp_custom_fields_group' );

        if( $custom_fields && isset( $custom_fields[0]['qpwp_custom_field_id'] ) && isset( $custom_fields[0]['qpwp_custom_field_title'] ) ) {
          //Cria a metabox do custom field
          $qpwp_metabox_custom_fields = $this->create_metaboxes($post_type_name);

          //Registra os custom fields do post
          foreach ( (array) $custom_fields as $key => $field ) {
            $title = $id = $type = $description = '';
            $required = false;

            // id
            if ( isset( $field['qpwp_custom_field_id'] ) ){
              $id = esc_html( $field['qpwp_custom_field_id'] );
            }

            // title
            if ( isset( $field['qpwp_custom_field_title'] ) ){
              $title = esc_html( $field['qpwp_custom_field_title'] );
            }

            // description
            if ( isset( $field['qpwp_custom_field_description'] ) ){
              $description = esc_html( $field['qpwp_custom_field_description'] );
            }

            // type
            if ( isset( $field['qpwp_custom_field_type'] ) ){
              $type = $field['qpwp_custom_field_type'];
            }

            // options
            if ( isset( $field['qpwp_custom_field_options'] ) ){
              $options = $field['qpwp_custom_field_options'];
            }

            // required
            if( isset( $field['qpwp_custom_field_required'] ) && $field['qpwp_custom_field_required'] == true ) {
              $attributes = array(
                'required' => 'required'
              );
            }
            else {
              $attributes = array();
            }

            if( $type == 'select' || $type == 'radio' || $type == 'multicheck' ) {
              $options = explode( "\n", str_replace("\r", "", $options) );
              $options_result = '';

              foreach( $options as $option ) {
                $options_result[ sanitize_title( $option ) ] = $option;
              }

              if ( $type == 'multicheck' ) {
                $required = 'none';
              }

              $qpwp_metabox_custom_fields->add_field( array(
                'name'       => $title,
                'desc'       => $description,
                'id'         => $post_type_name . '_' . $id,
                'type'       => $type,
                'options'    => $options_result,
                'attributes' => $attributes
              ));
            }
            else {
              $qpwp_metabox_custom_fields->add_field( array(
                'name' => $title,
                'desc' => $description,
                'id'   => $post_type_name . '_' . $id,
                'date_format' => 'd/m/Y', // Work only for datepicker field type
                'type' => $type,
                'attributes'  => $attributes
              ));
            }
          }
        }
      }
    }
  }

  /**
   *
   * Cria o metabox
   *
   */
  public function create_metaboxes($post_type_name) {
    $qpwp_metabox_custom_fields = new_cmb2_box( array(
      'id'            => $post_type_name . 'metabox_post_type_custom_fields',
      'title'         => __( 'Additional information', Settings::$text_domain),
      'object_types'  => array( $post_type_name ), // Post type
    ));

    return $qpwp_metabox_custom_fields;
  }
} ?>
