<article id="<?php echo 'qwp-' .$plugin_slug. '-component-post-single-01-' .get_the_ID(); ?>" class="qwp-component qwp-component-post-single-01 <?php echo 'qwp-' .$plugin_slug. '-component qwp-' .$plugin_slug. '-component-post-single-01'; ?>">
  <?php
  if( has_post_thumbnail() ): ?>
    <figure class="qwp-component-post-single-01__thumbnail">
      <?php the_post_thumbnail($args['featured_image'], array('class' => $args['featured_image_classes'])) ?>
    </figure>
    <?php
  endif; ?>
  <div class="qwp-component-post-single-01__post-infos">
    <h1><?php the_title(); ?></h1>
    <div class="qwp-component-post-single-01__post-infos__meta">
      <ul class="list-inline">
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
      <div class="share-bar" data-title="Título da postagem aqui" data-url="http://quarteldesign.com" data-image-url="http://placehold.it/870x360"></div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="qwp-component-post-single-01__content">
    <?php the_content(); ?>
  </div>
  <div class="qwp-component-post-single-01__footer">
    <?php
    if ( $args['show_tags'] ) : ?>
      <!--
      *
      * Post tags
      *
      -->
      <div class="qwp-component-post-single-01__footer__tags">
        <span>TAGS: </span>
        <?php Post_Type_View::get_post_type_tags($args['show_tags']); ?>
      </div>
      <?php
    endif; ?>
  </div>
</article>
<div class="qwp-component-post-single-01__see-too">
  <h3>Veja também</h3>
  <div class="qwp-component-post-single-01__see-too__container">
    <div class="row">
      <?php
      global $post;
      $args = array(
        'post_type' => get_post_type(),
        'numberposts' => 2,
        'post__not_in' => array(get_the_ID())
      );

      $posts_data = get_posts($args);
      if ( $posts_data ) :
        foreach ( $posts_data as $post ) : setup_postdata($post); ?>
          <div class="col-sm-6">
            <article class="qwp-component-post-single-01__see-too__post">
              <div class="media">
                <figure class="pull-left">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail', array('class' => 'media-object img-responsive')); ?>
                  </a>
                </figure>
                <div class="media-body">
                  <div class="qwp-component-post-single-01__see-too__post-infos">
                    <time><?php echo get_the_date('d/m/Y'); ?></time>
                    <h4 class="media-heading">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                  </div>
                </div>
              </div>
            </article>
          </div>
          <?php
        endforeach;
      endif; ?>
    </div>
  </div>
</div>
<div class="qwp-component__comments qwp-component-post-single-01__comments">
  <?php comments_template(); ?>
</div>
