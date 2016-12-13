<?php
/**
 *
 * Comments - Template de Comentários
 *
 * @package WordPress
 * @subpackage Foundation-Q
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
  return;
?>

<div id="qwp-comments" class="qwp-comments-area">
  <?php if ( have_comments() ) : ?>
    <h2 class="qwp-comments-title">
      <?php comments_number( 'Nenhum comentário', '1 comentário', '% comentários' ); ?>
    </h2>

    <ol class="qwp-comment-list">
      <?php
        wp_list_comments( array(
          'style'       => 'ol',
          'short_ping'  => true,
          'avatar_size' => 74,
        ) );
      ?>
    </ol><!-- .comment-list -->

    <?php
      // Are there comments to navigate through?
      if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
    <nav class="navigation qwp-comment-navigation" role="navigation">
      <h1 class="qwp-screen-reader-text qwp-section-heading">Comentários</h1>
      <div class="nav-previous"><?php previous_comments_link( '&larr; Comentários antigos' ); ?></div>
      <div class="nav-next"><?php next_comments_link( 'Comentários mais novos &rarr;' ); ?></div>
    </nav><!-- .comment-navigation -->
    <?php endif; // Check for comment navigation ?>

    <?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="qwp-no-comments">Os comentários estão fechados</p>
    <?php endif; ?>

  <?php endif; // have_comments() ?>

  <?php comment_form(); ?>
</div><!-- #qwp-comments -->
