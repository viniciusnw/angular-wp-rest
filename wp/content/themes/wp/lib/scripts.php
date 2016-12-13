<?php
/**
*
* Scripts and stylesheets
* /assets/dist/concat.min.js
* /assets/dist/all.min.css
* /assets/hacks/respond.min.js
* html5.js
* Google Fonts
**/

$settings = foundation_q_get_settings();
$setting_bootstrap_cdn_file = $settings['bootstrap_cdn_file'];
$fancybox_cdn_file = $settings['fancybox_cdn_file'];
$jquery_cdn_file = $settings['jquery_cdn_file'];
$setting_extras_scripts = $settings['extras_scripts'];
$setting_google_analytics_id = $settings['google_analytics_id'];
$setting_google_fonts = $settings['google_fonts'];

/**
* Changing jQuery version if configured
*/

function foundation_q_modify_jquery() {
  global $jquery_cdn_file;

  if ( $jquery_cdn_file ) {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', $jquery_cdn_file, true );
    wp_enqueue_script( 'jquery' );
  }
}
add_action('wp_enqueue_scripts', 'foundation_q_modify_jquery');

/**
*
* Load theme scripts and styles
*
**/

function foundation_q_scripts_styles() {
  /**
  * Threaded comments (when in use).
  */
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

  /**
  * Loads default JavaScript files
  */
  wp_enqueue_script( 'foundation-q-script', get_template_directory_uri() . '/assets/dist/concat.min.js', array( 'jquery' ), '1.0', true );

  /**
  * Loads Extras JavaScript files
  */
  global $setting_extras_scripts;
  if( isset( $setting_extras_scripts ) ):
    $script_id = 1;
    foreach( $setting_extras_scripts as $script ):
        wp_enqueue_script( 'extras-scripts-' . $script_id, $script, array( 'jquery' ), '', true );
        $script_id++;
    endforeach;
  endif;

  /**
  * Loads default Style files
  */
  wp_enqueue_style( 'foundation-q-style', get_template_directory_uri() .'/assets/dist/all.min.css', false, '1.0', 'all' );
  wp_enqueue_style( 'generated-style', get_template_directory_uri() .'/lib/assets/css/generated-style.css', false, '1.0', 'all' );
  wp_enqueue_style( 'elusive-icons-redux', get_template_directory_uri() .'/frameworks/ReduxFramework/ReduxCore/assets/css/vendor/elusive-icons/elusive-webfont.css', false, '1404963629', 'all' );
}
add_action( 'wp_enqueue_scripts', 'foundation_q_scripts_styles', 10 );

/**
 * Loads Google Fonts
 */

function foundation_q_load_google_fonts() {
    global $setting_google_fonts;
    $font_id = 1;
    foreach( $setting_google_fonts as $font_url ):
      wp_register_style( 'google-font-' . $font_id, $font_url );
      wp_enqueue_style( 'google-font-' . $font_id );
      $font_id++;
    endforeach;
}
if( $setting_google_fonts ):
  add_action('wp_print_styles', 'foundation_q_load_google_fonts');
endif;

/**
 * Load Fancybox scripts and call fancybox function if is setting
 */

function foundation_q_fancybox_cdn(){
  wp_enqueue_script( 'fancybox-cdn-script', 'http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js', array( 'jquery' ), '2.1.5', true );
  wp_enqueue_style( 'fancybox-cdn-style', 'http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css', false, '2.1.5', 'all'  );
}

function foundation_q_fancybox(){
  $call_fancybox_function = '<script>(function( $ ) {
    $(function() {
      $(".fancybox").fancybox();
    });
  }(jQuery));</script>';
  echo $call_fancybox_function;
}

if( $fancybox_cdn_file ):
  add_action( 'wp_enqueue_scripts', 'foundation_q_fancybox_cdn', 10 );
  add_action('wp_footer','foundation_q_fancybox', 1);
endif;

/**
 * Add HTML5 Fix for Internet Explorer
 */

function foundation_q_ie_fix(){
  $condicional_ie_comment = '<!--[if IE]>
  <script src="' . get_template_directory_uri() . '/assets/hacks/respond.min.js"></script>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->';
  echo $condicional_ie_comment;
}
add_action('wp_head','foundation_q_ie_fix');

/**
 * Google Analytics snippet from HTML5 Boilerplate
 */

function foundation_q_google_analytics() {
  global $setting_google_analytics_id;
  ?>
  <!-- Google Analytics tracking code -->
  <script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','<?php echo $setting_google_analytics_id; ?>');ga('send','pageview');
  </script>
  <?php
}
if ( $setting_google_analytics_id ):
  add_action('wp_footer', 'foundation_q_google_analytics', 20);
endif;

/**
 * Load Bootstrap library from CDN
 */

function foundation_q_bootstrap_cdn() {
  if (!is_admin()):
    wp_enqueue_style('bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', false, '3.3.6', 'all' );
    wp_enqueue_script( 'bootstrap-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
  endif;
}
if ( $setting_bootstrap_cdn_file ):
  add_action('wp_enqueue_scripts', 'foundation_q_bootstrap_cdn');
endif;
