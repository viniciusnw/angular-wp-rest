<?php
/**
 *
 * Page Template
 * Template Name: Sem Sidebar
 *
 */

// Header
get_header(); ?>

<div class="container">
  <?php
  // Loop
  if( have_posts() ):
    while( have_posts() ): the_post();

      // Conteúdo
      get_template_part('templates/content', 'single');

    endwhile;
  else:
    get_template_part( 'templates/content', '404' );
  endif; ?>
</div><!-- /.container -->

<?php
// Footer
get_footer(); ?>
