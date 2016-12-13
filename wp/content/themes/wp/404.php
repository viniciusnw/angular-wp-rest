<?php
/**
 *
 * 404 Template
 *
 * @package WordPress
 * @subpackage Baby Boomer
 */

// Header
get_header(); ?>

<div class="container">
  <?php
  // Conteúdo 404
  get_template_part( 'templates/content', '404' ); ?>
</div><!-- /.container -->

<?php
//Footer
get_footer(); ?>
