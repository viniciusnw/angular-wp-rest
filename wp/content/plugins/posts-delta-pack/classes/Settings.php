<?php
class Settings {
  public static $text_domain = 'posts-delta-pack';
  public static $plugin_slug = 'posts-delta-pack';
  public static $main_post_type_name = 'qpwp_type_post';
  public static $main_taxonomy_name = 'qpwp_type_post_tax';
  public static $post_type_field_name = 'qpwp_post_type_name';
  public static $tax_field_name = 'qpwp_tax_name';
  public static $settings_name = 'qpwp_posts_alfa_pack_settings';
  public static $plugin_name = 'posts-delta-pack';
  public $plugin_url;
  public $plugin_path;

  public function __construct() {
    $this->plugin_url = plugin_dir_url(plugin_dir_url( __FILE__ ));
    $this->plugin_path = plugin_dir_url(plugin_dir_path( __FILE__ ));
  }

  /**
   *
   * Adiciona menu no painel
   *
   */
  function qpwp_add_admin_menu() {
    add_submenu_page(
      'options-general.php',
      __( 'Posts Alfa Pack', Settings::$text_domain ),
      __( 'Posts Alfa Pack', Settings::$text_domain ),
      'manage_options',
      'posts-delta-pack',
      'qpwp_posts_options_page'
    );
  }

  /**
   *
   * Verifica se as opções de configurações foram inicializadas
   *
   */
  public function settings_exist() {
    if( false == get_option( Settings::$settings_name ) ) {
      add_option( Settings::$settings_name );
    }
  }

  /**
   *
   * Inicializa os settings
   *
   */
  public function settings_init() {
    $menu_posts_id = 'qpwp_posts_options';

    //Registra área de opções
    register_setting( $menu_posts_id, Settings::$settings_name );

    //Área de configurações
    add_settings_section(
      'qpwp_posts_options_section',
      __( 'Settings', Settings::$text_domain ),
      'settings_section_callback',
      $menu_posts_id
    );

    //Campo de configurações
    add_settings_field(
      'qpwp_checkbox_field_posts_slick_slider',
      __( 'Load Slick Slider JS', Settings::$text_domain ),
      'qpwp_checkbox_field_posts_slick_slider_render',
      $menu_posts_id,
      'qpwp_posts_options_section'
    );
  }

  /**
   *
   * Settings callback
   *
   */
  public function settings_section_callback(  ) {
    echo __( 'These settings will change how plugin works', Settings::$text_domain );
  }
}
?>
