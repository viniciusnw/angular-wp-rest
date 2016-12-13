<article id="<?php echo 'qwp-' .$plugin_slug. '-component-02-' .get_the_ID(); ?>" class="qwp-component qwp-component-02 <?php echo 'qwp-' .$plugin_slug. '-component qwp-' .$plugin_slug. '-component-02'; ?>">
  <div class="media">
    <?php
    /* Post thumbnail */
    if( has_post_thumbnail() ) : ?>
      <figure class="qwp-component-02__thumbnail pull-left">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail($args['featured_image'], array('class' => $args['featured_image_classes'])) ?>
          <i></i>
        </a>
      </figure>
      <?php
    endif; ?>
    <div class="media-body">
      <div class="qwp-component-02__post-infos">
        <ul class="qwp-component-02__post-infos__meta list-inline">
          <?php
          if ( $args['show_date'] ) : ?>
            <!--
            *
            * Data de publicação
            *
            -->
            <li><i class="fa fa-calendar"></i> <time><?php echo get_the_date('d/m/Y'); ?></time></li>
            <?php
          endif;
          if ( $args['show_comments'] ) : ?>
            <!--
            *
            * Quantidade de comentários
            *
            -->
            <li><i class="fa fa-comments-o"></i> <a href="<?php the_permalink(); ?>"><?php comments_number('Nenhum comentário', '1 comentário', 'Comentários: %'); ?></a></li>
            <?php
          endif;
          if ( $args['show_terms'] ) : ?>
            <!--
            *
            * Termos do post
            *
            -->
            <li><i class="fa fa-list-ul"></i> <?php Post_Type_View::get_terms_of_tax($args['show_terms']); ?></li>
            <?php
          endif; ?>
        </ul>
        <h4 class="qwp-component-02__post-infos__title media-heading"><?php the_title(); ?></h4>
        <p><?php the_excerpt(); ?></p>
      </div>
      <a href="<?php the_permalink(); ?>" class="qwp-component-02__read-more btn btn-primary">Saiba mais</a>
    </div>
  </div>
</article>
