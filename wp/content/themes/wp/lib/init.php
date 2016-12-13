<?php
/**
*
* Baby Boomer initial setup
*
**/

$settings = foundation_q_get_settings();
$setting_thumbnails_formats = $settings['thumbnails_formats'];
$setting_theme_widgets = $settings['theme_widgets'];

// Disable wordpress theme editor
define('DISALLOW_FILE_EDIT', TRUE);

function foundation_q_setup() {
  global $setting_thumbnails_formats;

  // Make theme available for translation
  load_theme_textdomain( THEME_TEXT_DOMAIN, get_template_directory() . '/lang' );

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_nav' => __( 'Primary Navigation', THEME_TEXT_DOMAIN ),
    'secondary_nav' => __( 'Secondary Navigation', THEME_TEXT_DOMAIN ),
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Add custom post thumbnails formats
  if ( function_exists( 'add_image_size' ) ) {
    if( isset( $setting_thumbnails_formats ) ):
      foreach( $setting_thumbnails_formats as $thumbnail_format ):
        add_image_size( $thumbnail_format['name'], $thumbnail_format['width'], $thumbnail_format['height'], true );
      endforeach;
    endif;
  }

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('lib/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'foundation_q_setup');

/**
 * Register sidebars
 */

function fondation_q_widgets_init() {
  register_sidebar(array(
    'name'          => __('Primary', THEME_TEXT_DOMAIN),
    'id'            => 'main-sidebar',
    'before_widget' => '<div class="panel panel-default list-unstyled widget %1$s %2$s"><div class="panel-body">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', THEME_TEXT_DOMAIN),
    'id'            => 'footer-sidebar',
    'before_widget' => '<div class="panel panel-default list-unstyled widget %1$s %2$s"><div class="panel-body">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));
}
if( $setting_theme_widgets ):
  add_action('widgets_init', 'fondation_q_widgets_init');
endif;
