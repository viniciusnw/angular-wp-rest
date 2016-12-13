<?php
/**
 *
 * Archive - Template de Listagem
 *
 **/
?>

<article id="post-<?php echo get_the_ID(); ?>" class="qwp-post-loop">
  <header class="qwp-post-loop__header">
    <h2 class="qwp-post-loop__header__title">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h2><!-- /.qwp-post-loop__header__title -->

    <ul class="qwp-post-loop__header__info nav nav-pills">
      <li class="qwp-post-loop__header__info__date">
        <time class="qwp-post-loop__header__info__date">
          <?php the_date(); ?>
        </time>
      </li><!-- /.qwp-post-loop__header__info__date -->
      <li class="qwp-post-loop__header__info__comments">
        <?php comments_number('Nenhum comentário', '1 comentário', '% comentários'); ?>
      </li><!-- /.qwp-post-loop__header__info__comments -->
    </ul><!-- /.qwp-post-loop__header__info nav nav-pills -->
  </header><!-- /.qwp-post-loop__header -->

  <div class="qwp-post-loop__content qwp-content qwp-content--dark">
    <?php
    if ( has_excerpt() ):
      the_excerpt();
    else:
      foundation_q_the_content_limit( get_the_content(), $limit = 30 );
    endif; ?>
  </div><!-- /.qwp-post-loop__content qwp-content qwp-content--dark -->

  <a href="<?php the_permalink(); ?>" class="btn btn-default btn-sm">Saiba mais</a>
</article><!-- /.qwp-post-loop -->
