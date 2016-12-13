<?php
/**
*
* Theme functions file
*
**/

/* Foundation-Q Loader */
require_once "lib/foundation-q.php";

/* Example of hook wp_head for insert actions or codes in the theme head */
function foundation_q_theme_wp_head(){
	echo '<!-- This is insert in the theme head -->';
}
add_action( 'wp_head', 'foundation_q_theme_wp_head' );

/* Example of hook wp_footer for insert actions or codes in the theme footer */
function foundation_q_theme_wp_footer(){
	echo '<!-- This is insert in the theme footer -->';
}
add_action( 'wp_footer', 'foundation_q_theme_wp_footer' );

add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );

/**
*
* Checklist alert
*
*/
function foundation_q_requiredPluginsExists() {
  $alow_search = get_option( 'blog_public' );
  if( $alow_search == 0 ):
    foundation_q_showPluginMessage();
  endif;
}

add_action('admin_notices', 'foundation_q_requiredPluginsExists' );

/**
*
* Show checklist alert
*
*/
function foundation_q_showPluginMessage( $isError = true ){
  if ( $isError ) {
    echo '<div id="message" class="error">';
  }
  else {
    echo '<div id="message" class="updated fade">';
  }

  echo '<h3>Antes de publicar este website verifique os seguintes itens:</h3>';
  echo '<p><span class="dashicons dashicons-admin-site"></span> A opção: Evitar que mecanismos de busca indexem este website, esta <strong>ativa</strong>. Esta opção deve ser desativada.</p>';
  echo '<p><span class="dashicons dashicons-format-image"></span> Verifique se o Favicon do website foi criado e também os icones para Mobile. Os arquivos dos icones são definidos no arquivo config.php.</p>';
  echo '<p><span class="dashicons dashicons-share-alt2"></span> Verifique se os links para as redes sociais estão corretos.</p>';
  echo '<p><span class="dashicons dashicons-admin-site"></span> Verifique se o plugin WordPress SEO foi ativado e configurado corretamente.</p>';
  echo '<p><span class="dashicons dashicons-email-alt"></span> Verifique se os formulários presentes neste website estão sendo enviados para os emails corretos e sendo recebidos por estes.</p>';
  echo '<p><strong>Esta mensagem é desativada após opção "Evitar que mecanismos de busca indexem este website" ser desativada.</strong></p>';
  echo '</div>';
}

/**
*
* Customize default login page
*
*/
add_action( 'login_enqueue_scripts', 'qwp_my_login_logo' );
function qwp_my_login_logo() {
  $logo_url = foundation_q_get_option('login_page_logo');
  $bg_url = foundation_q_get_option('login_background_url');
  $bg_color = foundation_q_get_option('login_background_color');
  $link_colors = foundation_q_get_option('login_link_colors');
  $btn_color = foundation_q_get_option('login_primary_btn_color');
  $btn_bg = foundation_q_get_option('login_primary_btn_backgound');
  $login_form_background = foundation_q_get_option('login_form_background');
  $login_form_label_color = foundation_q_get_option('login_form_label_color'); ?>
  <style type="text/css">
    body,
    html{
      background: <?php echo ( $bg_url ) ? $bg_color.' url('.$bg_url['url'].') no-repeat center top' : $bg_color; ?> !important;
    }
    a{
      color: <?php echo $link_colors; ?> !important;
    }
    <?php if ( $logo_url ) : ?>
    .login h1 a {
      background-image: url(<?php echo $logo_url['url']; ?>) !important;
      padding-bottom: 30px !important;
      background-size: <?php echo $logo_url['width']; ?>px !important;
      width: <?php echo $logo_url['width']; ?>px !important;
      height: <?php echo $logo_url['height']; ?>px !important;
    }
    <?php endif; ?>
    .wp-core-ui .button-primary{
      border: none !important;
      background: <?php echo $btn_bg; ?> !important;
      text-shadow: none !important;
      box-shadow: none !important;
    }
    .wp-core-ui .button-primary a{
      color: <?php echo $btn_color; ?> !important;
    }
    .login form{
      background: <?php echo $login_form_background; ?> !important;
      box-shadow: none !important;
      border-radius: 15px;
    }
    .login label{ color: <?php echo $login_form_label_color; ?> !important; }
    #user_pass, #user_login{
      border-radius: 5px;
    }
    #login_error a{
      color: <?php echo $link_colors; ?> !important;
    }
  </style>
  <?php
}

