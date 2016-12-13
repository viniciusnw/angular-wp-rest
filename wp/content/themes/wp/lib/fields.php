<?php
/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function foundation_q_show_if_front_page( $cmb ) {
  // Don't show this metabox if it's not the front page template
  if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
    return false;
  }
  return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function foundation_q_hide_if_no_cats( $field ) {
  // Don't show this field if not in the cats category
  if ( ! has_tag( 'cats', $field->object_id ) ) {
    return false;
  }
  return true;
}



/**
*
*
* Register Custom Metaboxes
*
*
**/
add_action( 'cmb2_init', 'foundation_q_register_metaboxes' );
function foundation_q_register_metaboxes() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = 'qd_';


  /**
   * Video metabox
   */
  // $videos = new_cmb2_box( array(
  //   'id'           => $prefix . 'meta_videos',
  //   'title'        => 'YouTube Vídeo',
  //   'object_types' => array( 'qd_video', ), // Post type
  //   'context'      => 'normal',
  //   'priority'     => 'high',
  //   'show_names'   => true, // Show field names on the left
  //   'cmb_styles'   => true, // false to disable the CMB stylesheet
  //   'closed'       => false, // true to keep the metabox closed by default
  //   // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
  // ) );
  // $videos->add_field( array(
  //   'name' => 'Endereço do vídeo do YouTube',
  //   'desc' => 'Insira a url completa de um vídeo do <a href="http://www.youtube.com" target="_blank">YouTube</a>',
  //   'id'   => $prefix . 'video_url',
  //   'type' => 'oembed',
  // ) );


}

