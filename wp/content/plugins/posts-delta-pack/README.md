# USAGE #


```
#!php

$args = array(
    'component' => 'component-post-01', //Tipo do componente
    'featured_image' => 'thumbnail', //Tamanho da imagem destacada
    'featured_image_classes' => 'media-object img-responsive', //Classes da imagem destacada, separadas por espaço
    'show_terms' => '', //Taxonomia dos termos a serem mostrados
    'show_tags' => '', //Taxonomia das tags a serem mostradas
    'show_date' => true, //Mostrar data de publicação (true ou false)
    'show_comments' => true, //Mostrar comentários (true ou false)
    'button_text' => 'Saiba mais' //Texto do botão que encaminha a página interna
);


/*
*
* Função para chamar o componente.
*
*/
Post_Type_View::get_component($args);
```

A função deve ser chamada dentro das colunas do bootstrap, e dentro do loop. Exemplo:


```
<section class="qwp-news-home">
  <div class="container">
    <div class="row">
      <?php
      //Posts array
      $args = array(
        'post_type' => 'qd_news',
        'numberposts' => '4'
      );

      $posts_data = get_posts($args);
      if($posts_data):
        foreach($posts_data as $post): setup_postdata( $post ); ?>
          <div class="col-sm-3">
            <?php
            $args = array(
              'component' => 'component-post-01', //Tipo do componente
              'featured_image' => 'thumbnail', //Tamanho da imagem destacada
              'featured_image_classes' => 'media-object img-responsive', //Classes da imagem destacada, separadas por espaço
              'show_terms' => '', //Taxonomia dos termos a serem mostrados
              'show_tags' => '', //Taxonomia das tags a serem mostradas
              'show_date' => true, //Mostrar data de publicação (true ou false)
              'show_comments' => true, //Mostrar comentários (true ou false)
              'button_text' => 'Saiba mais' //Texto do botão que encaminha a página interna
            );

            /*
            *
            * Função para chamar o componente.
            *
            */
            Post_Type_View::get_component($args); ?>
          </div>
          <?php
        endforeach;
      endif; ?>
    </div>
  </div>
</section>
```