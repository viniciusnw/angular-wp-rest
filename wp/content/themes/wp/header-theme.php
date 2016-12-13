<?php
/*
 *
 * Cabeçalho
 *
 */

// Header 01
get_template_part( 'components/structure', 'header-01' );

// Header 02
get_template_part( 'components/structure', 'header-02' );

// Header 03
get_template_part( 'components/structure', 'header-03' );

/**
 *
 * Header Top
 *
 */

// Cabeçalho 01
get_template_part( 'components/structure', 'page-heading-01' );

// Cabeçalho 02
get_template_part( 'components/structure', 'page-heading-02' );

/**
 *
 * Menu Mobile
 *
 */
?>
<div class="qwp-header-mobile cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left">
  <div class="qwp-header-mobile__search">
    <?php
    // Busca
    include('searchform.php'); ?>
  </div><!-- /.qwp-header-mobile__search -->
  <?php
  // Menu
  wp_nav_menu( array(
    'theme_location'  => 'primary_nav',
    'depth'           => 3,
    'container'       => 'div',
    'container_class' => 'qwp-header-mobile__menu',
    'container_id'    => 'qwp-header-mobile__menu',
    'menu_class'      => 'qwp-header-mobile__menu__list',
    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
    'walker'          =>  new wp_bootstrap_navwalker(), // Apply bootstrap menu mode
  ) ); ?>

  <div class="clearfix"></div>

  <div class="qwp-header-mobile__socials">
    <?php foundation_q_the_social_links( true, false ); ?>
  </div>
</div><!--/.qwp-header-mobile-->
