<!--
*
* HEADER 02
*
-->

<h1 class="qwp-title">Modelo Header 02:</h1><!-- /.qwp-title -->

<!--
*
* Busca do Header 02
*
-->
<div class="qwp-header-02--search cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top">
  <?php
  // Busca
  get_search_form(); ?>
</div><!-- /.qwp-header-02--search -->

<header class="qwp-header qwp-header-02">
  <div class="container">
    <div class="qwp-header-02__flex">
      <div class="qwp-header-02__flex__left">

        <a href="<?php echo home_url(); ?>" class="qwp-header-02__flex__left__logo">
          <?php foundation_q_the_logo('header'); ?>
        </a>

        <div class="qwp-header-02__flex__left__menu hidden-sm hidden-xs">
          <?php
          // Menu
          wp_nav_menu( array(
            'theme_location'  => 'primary_nav',
            'depth'           => 3,
            'container'       => 'div',
            'container_class' => 'qwp-header-02__flex__right__bottom__menu',
            'container_id'    => 'qwp-header-02__flex__right__bottom__menu',
            'menu_class'      => 'qwp-header-02__flex__right__bottom__menu__list',
            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
            'walker'          =>  new wp_bootstrap_navwalker(), // Apply bootstrap menu mode
          ) ); ?>
        </div>

      </div>
      <div class="qwp-header-02__flex__right">

        <div class="qwp-header-02__flex__right__socials hidden-sm hidden-xs">

          <?php
          // Redes Sociais
          foundation_q_the_social_links( true, false ); ?>

        </div>
        <button class="qwp-header-02__flex__right__toggle--search menu-top pull-bottom push-body hidden-sm hidden-xs">
          <i class="fa fa-search"></i>
        </button>

        <button class="qwp-header-02__flex__right__toggle--mobile menu-left pull-right push-body visible-sm visible-xs">
          <i class="fa fa-bars" aria-hidden="true"></i>
          <span>Menu</span>
        </button>

      </div>
    </div>
  </div>
</header>
