<?php
/**
 *
 * Sidebar - Template da Barra Lateral
 *
 * @package Wordpress
 * @subpackage Baby Boomer
 *
 */
?>
<aside class="qwp-sidebar">

  <?php if ( is_active_sidebar( 'main-sidebar' ) ): ?>

    <div class="fq-sidebar-container" role="complementary">
      <div class="fq-widget-area">
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
      </div>
    </div>

  <?php endif; ?>

</aside><!-- /.qwp-sidebar -->
