<?php
/**
 *
 * Single - Template de Página Interna
 *
 **/
?>

<article id="post-<?php echo get_the_ID(); ?>" class="qwp-post-single">
  <header class="qwp-post-single__header">
    <h2 class="qwp-post-single__header__title">
      <?php the_title(); ?>
    </h2><!-- /.qwp-post-single__header__title -->

    <hr>

    <ul class="qwp-post-single__header__info">
      <li class="qwp-post-single__header__info__date">
        <time><?php the_date(); ?></time>
      </li><!-- /.qwp-post-single__header__info__date -->

      <li class="qwp-post-single__header__info__comments">
        <?php comments_number('Nenhum comentário', '1 comentário', '% comentários'); ?>
      </li><!-- /.qwp-post-single__header__info__comments -->
    </ul><!-- /.qwp-post-single__header__info -->

    <div class="qwp-post-single__content">
      <?php the_content(); ?>
    </div><!-- /.qwp-post-single__content -->
  </header><!-- /.qwp-post-single__header -->
</article><!-- /.qwp-post-single -->

<div class="qwp-component-comments">
  <?php comments_template( 'comments.php', false ); ?>
</div>
