<!--
*
* HEADER 03
*
-->

<h1 class="qwp-title">Modelo Header 03:</h1>

<header class="qwp-header qwp-header-03">
  <div class="qwp-header-03__top">
    <div class="container">
      <div class="qwp-header-03__top__flex">
        <div class="qwp-header-03__top__flex__left">

          <?php
          // Redes Sociais
          foundation_q_the_social_links( true, false ); ?>

        </div><!-- /.qwp-header-03__top__flex__left -->
        <div class="qwp-header-03__top__flex__right">
          <div class="qwp-header-03__top__flex__right__links">

            <a href="#" class="btn btn-link">Link superior</a>

          </div><!-- /.qwp-header-03__top__flex__right__links -->
        </div><!-- /.qwp-header-03__top__flex__right -->
      </div><!-- /.qwp-header-03__top__flex -->
    </div><!-- /.container -->
  </div><!-- /.qwp-header-03__top -->
  <div class="qwp-header-03__bottom">
    <div class="container">
      <div class="qwp-header-03__bottom__flex">

        <a href="<?php echo home_url(); ?>" class="qwp-header-03__bottom__flex__logo">
          <?php foundation_q_the_logo('header'); ?>
        </a>

        <?php
        // Menu
        wp_nav_menu( array(
          'theme_location'  => 'primary_nav',
          'depth'           => 3,
          'container'       => 'div',
          'container_class' => 'qwp-header-03__bottom__flex__menu',
          'container_id'    => 'qwp-header-03__bottom__flex__menu',
          'menu_class'      => 'qwp-header-03__bottom__flex__menu__list hidden-sm hidden-xs',
          'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
          'walker'          =>  new wp_bootstrap_navwalker(), // Apply bootstrap menu mode
        ) ); ?>

        <div class="qwp-header-03__bottom__flex__search hidden-sm hidden-xs">

          <?php
          // Busca
          get_search_form(); ?>

        </div><!-- /.qwp-header-03__bottom__flex__search -->

        <button class="qwp-header-03__bottom__flex__toggle--mobile menu-left pull-right push-body visible-sm visible-xs">
          <i class="fa fa-bars" aria-hidden="true"></i>
          <span>Menu</span>
        </button>
      </div><!-- /.qwp-header-03__bottom__flex -->
    </div><!-- /.container -->
  </div><!-- /.qwp-header-03__bottom -->
</header><!-- /.qwp-header qwp-header-03 -->
