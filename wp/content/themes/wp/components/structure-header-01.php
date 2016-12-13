<!--
*
* HEADER 01
*
-->

<h1 class="qwp-title">Modelo Header 01:</h1>

<header class="qwp-header qwp-header-01">
  <div class="qwp-header-01__top">
    <div class="container">
      <div class="qwp-header-01__top__flex">

        <div class="qwp-header-01__top__flex__left">
          <a href="<?php echo home_url(); ?>" class="qwp-header-01__top__flex__left__logo">
            <?php foundation_q_the_logo('header'); ?>
          </a>
        </div>

        <div class="qwp-header-01__top__flex__right">
          <div class="qwp-header-01__top__flex__right__top hidden-sm hidden-xs">
            <div class="qwp-header-01__top__flex__right__top__socials">

              <?php
              // Redes Sociais
              foundation_q_the_social_links( true, false ); ?>

            </div><!--/.qwp-header-01__top__flex__right__top__socials-->
            <div class="qwp-header-01__top__flex__right__top__links">
              <a href="#" class="btn btn-link">Link superior</a>
            </div><!--/.qwp-header-01__top__flex__right__top__links-->
          </div><!--/.qwp-header-01__top__flex__right__top-->
          <div class="qwp-header-01__top__flex__right__bottom hidden-sm hidden-xs">

            <?php
            // Busca
            get_search_form(); ?>

          </div><!--/.qwp-header-01__top__flex__right__bottom-->

          <button class="qwp-header-01__top__flex__right__toggle--mobile menu-left pull-right push-body visible-sm visible-xs">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <span>Menu</span>
          </button><!--/.qwp-header-01__top__flex__right__toggle--mobile-->
        </div><!--/.qwp-header-01__top__flex__right-->
      </div><!--/.qwp-header-01__top__flex-->
    </div><!-- /.container -->
  </div><!--/.qwp-header-01__top-->

  <div class="qwp-header-01__bottom hidden-sm hidden-xs">
    <div class="container">
      <?php
      // Menu
      wp_nav_menu( array(
        'theme_location'  => 'primary_nav',
        'depth'           => 3,
        'container'       => 'div',
        'container_class' => 'qwp-header-01-header__bottom__menu',
        'container_id'    => 'qwp-header-01-header__bottom__menu',
        'menu_class'      => 'qwp-header-01-header__bottom__menu__list',
        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
        'walker'          =>  new wp_bootstrap_navwalker(), // Apply bootstrap menu mode
      ) ); ?>
    </div><!-- /.container -->
  </div><!-- /.qwp-header__bottom -->
</header><!--/.qwp-header qwp-header-01-->
