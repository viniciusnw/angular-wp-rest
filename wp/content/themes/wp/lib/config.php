<?php
/**
*
* Config - Configurações do Baby Boomer
*
* @package WordPress
* @subpackage Baby Boomer
*/

/**
*
* Template directory constant
*
**/
define( 'TEMPLATEURL', get_template_directory_uri() );

/**
*
* Enable theme features
*
**/
add_theme_support('bootstrap-gallery'); // Enable Bootstrap's thumbnails component on [gallery]

/**
*
* Baby Boomer Settings
* Set the configuration for your theme, start editing from here
*
**/


/**
*
* Favicons
*
**/
$favicons_settings = array(
  'png_favicon'       => TEMPLATEURL . '/baby-boomer-favicon.png',
  'ico_favicon'       => TEMPLATEURL . '/baby-boomer-favicon.ico',
  'apple_touch_icon'  => TEMPLATEURL . '/lib/assets/images/baby-boomer-apple-icon-touch.png',
  'win8_tile_icon'    => TEMPLATEURL . '/lib/assets/images/baby-boomer-win8-tile-icon.png',
  'win8_tile_icon_bg' => '#333333',
);


/**
*
* Thumbnails
*
**/
$thumbnails_settings = array(
  // array( 'name' => 'thumb-square', 'width' => 200, 'height' => 200 ),
  // array( 'name' => 'thumb-featured', 'width' => 400, 'height' => 200 )
);


/**
*
* Google Web Fonts
*
**/
$google_fonts = array(
  'https://fonts.googleapis.com/css?family=Lato:400,700|Montserrat:400,700',
  'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'
);


/**
*
* Extras Scripts
*
**/
$extras_scripts = array(
  //'http://cdnjs.cloudflare.com/ajax/libs/fitvids/1.1.0/jquery.fitvids.min.js',
);


/**
*
* Plugins
*
**/
$plugins = array(
  // Plugins from the WordPress Plugin Repository
  array(
    'name'     => 'CMB2',
    'slug'     => 'cmb2',
    'required' => true,
  ),
  array(
    'name'     => 'Disqus Comment System',
    'slug'     => 'disqus-comment-system',
    'required' => true,
  ),
  array(
    'name'     => 'Formidable Forms',
    'slug'     => 'formidable',
    'required' => true,
  ),
  array(
    'name'     => 'Post Type Archive Links',
    'slug'     => 'Post-Type-Archive-Links',
    'required' => true,
  ),
  array(
    'name'     => 'Yoast SEO',
    'slug'     => 'wordpress-seo',
    'required' => true,
  ),
  array(
    'name'     => 'Page Builder by SiteOrigin',
    'slug'     => 'siteorigin-panels',
    'required' => true,
  ),
  array(
    'name'     => 'Post Views Counter',
    'slug'     => 'post-views-counter',
    'required' => true,
  ),
);


/**
*
* General Settings
*
**/
$check_bootstrap_cdn = foundation_q_get_option( 'website_bootstrap_files' );
if( $check_bootstrap_cdn )
  $check_bootstrap_cdn =  true;

$foundation_q_settings = array(
  'jquery_cdn_file'       => '',
  'bootstrap_cdn_file'    => $check_bootstrap_cdn,
  'fancybox_cdn_file'     => false,
  'google_analytics_id'   => '',
  'theme_widgets'         => true,
  'favicons'              => $favicons_settings,
  'google_fonts'          => $google_fonts,
  'extras_scripts'        => $extras_scripts,
  'thumbnails_formats'    => $thumbnails_settings,
  'theme_plugins'         => $plugins,
  'gallery_metabox_types' => array( 'qd_gallery' )
);


/**
*
* Remove uneccesary menu items
*
**/
function wpqd_remove_menus(){
  // remove_menu_page( 'index.php' );                  //Dashboard
  // remove_menu_page( 'edit.php' );                   //Posts
  // remove_menu_page( 'upload.php' );                 //Media
  // remove_menu_page( 'edit.php?post_type=page' );    //Pages
  // remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'themes.php' );                 //Appearance
  // remove_menu_page( 'plugins.php' );                //Plugins
  // remove_menu_page( 'users.php' );                  //Users
  // remove_menu_page( 'tools.php' );                  //Tools
  // remove_menu_page( 'options-general.php' );        //Settings
}
add_action( 'admin_menu', 'wpqd_remove_menus' );

/* End of Baby Boomer Settings */

/**
*
* Constants
*
**/
define( 'FOUNDATION_SETTINGS', serialize( $foundation_q_settings ) );
define( 'THEME_TEXT_DOMAIN', 'foundation_q' ); // If you want use widgets in your theme

/**
*
* Get Baby Boomer theme settings
*
**/

function foundation_q_get_settings(){
  $settings = unserialize( FOUNDATION_SETTINGS );
  return $settings;
}

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */

if (!isset($content_width)) { $content_width = 1140; }
