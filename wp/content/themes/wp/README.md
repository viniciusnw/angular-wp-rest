### Características do Baby Boomer ###

* Estruturado para temas construidos a partir do projeto de front-end [HTML Skeleton](https://github.com/samwx/html-skeleton)
* Integrado com o framework de opções de tema [Redux Theme Options Framework](https://github.com/ReduxFramework/redux-framework)
* Integrado com o framework de campos customizadas CMB2 [CMB2](https://github.com/WebDevStudios/CMB2)
* Integrado com a classe [wp-bootstrap-navwalker](https://github.com/twittem/wp-bootstrap-navwalker) para implementação do menu de navegação responsiva do Bootstrap com o menu gerado pelo gerenciador de menus do WordPress
* Integrado com a class [TGM-Plugin-Activation](https://github.com/thomasgriffin/TGM-Plugin-Activation) para o requerimento automático de instalação de plugins para o tema

### Iniciando um novo projeto ###

Se você esta iniciando um novo projeto com o starter theme Baby Boomer, precisa seguir os seguintes passos:

* Em seu arquivo arquivo functions.php incluia esta linha de código `<?php require_once "lib/foundation-q.php" ?>`, ou renomeie o arquivo functions-sample.php para functions.php

* É preciso renomear alguns arquivos responsáveis por algumas funções importantes do Baby Boomer, o motivo pelo qual não mantemos estes arquivos com seus nomes padrões é para o caso de estar atualizando a versão do Baby Boomer em algum tema que já utiliza o Baby Boomer, e não queremos reescrever estes arquivos que provavelmente foram modificados para seu tema.

Os arquivos que precisam ser renomeados, e os únicos recomendados a seren alterados para um novo projeto com o Baby Boomer são:

* `header-theme-sample.php` renomear para `header-theme.php`
* `footer-theme-sample.php` renomear para `footer-theme.php`
* `lib/config-sample.php` renomear para `lib/config.php`
* `lib/fields-sample.php` renomear para `lib/fields.php`
* `lib/options-sample.php` renomear para `lib/options.php`
* `lib/types-sample.php` renomear para `lib/types.php`

Agora com os arquivos renomeados abra o arquivo lib/config.php e o edite conforme as necessidades do seu projeto.

### Atualizando o Baby Boomer em um projeto existente ###

* Faça um backup dos arquivos do seu projeto antes de tudo

* Para atualizar a Baby Boomer para uma nova versão em seu projeto, basta substituir todos arquivos e pastas pelos arquivos e pastas da nova versão do Baby Boomer, se você somente alterou os arquivos permitidos no Baby Boomer, não haverá problemas.

### Funções customizadas ###

Todas funções customizadas do Baby Boomer se encontram no arquivo `lib/extras.php`

* `foundation_q_get_option( $option_key )` //Retorna o valor do campo especificado das opções do tema
* `foundation_q_the_social_links( $show_icons = false )` //Exibe uma lista de links das redes sociais das opções do tema
* `foundation_q_the_social_accounts( $show_icons = false )` //Exibe uma lista de contas das redes sociais que não possuem links
* `foundation_q_the_share_buttons($url, $title, $layout_default = false, $count = false)` //Exibe uma lista de botões para compartilhar a página nas redes sociais
* `foundation_q_get_youtube_ID( $youtube_url )` //Retorna o ID de um vídeo do YouTube
* `foundation_q_the_youtube_thumb( $youtube_url )` //Exibe a imagem de thumbnail de um vídeo do YouTube
* `foundation_q_get_vimeo_id( $vimeo_url )` //Retorna o ID de um vídeo do Vimeo
* `foundation_q_the_vimeo_thumb($vimeo_url, $info = 'thumbnail_medium')` //Exibe a imagem de thumbnail de um vídeo do Vimeo
* `foundation_q_the_posts_paginate($class = 'posts-paginate navigation')` //Páginação númerica de posts
* `foundation_q_the_excerpt_limit( $limit = 10 )` //Função alternativa a função the_excerpt() do WordPress
* `foundation_q_the_content_limit( $text = '', $limit = 10 )` //Exibe o valor de uma string limitada por número de caracteres
* `foundation_q_the_terms_dropdown($taxonomy = 'category', $label = null, $get_terms_args = null)` //Exibe um campo do tipo select com os termos de uma taxonomia com o value = url do termo
* `foundation_q_the_breadcrumbs( $args )` //Exibe uma navegação no modelo de migalhas
* `foundation_q_set_post_views( $post_id )` //Cria uma meta key relacionada ao post e toda vez que chamada soma mais um ao seu valor, para ser usada em templates do tipo page ou single
* `foundation_q_get_post_views( $post_id )` //Exibe a quantidade de vezes que um post foi acessado
* `foundation_q_get_title()` //Função alternativa a função wp_title() do WordPress
* `foundation_q_the_logo($param)` //Esta função exibe a imagem da logomarca inserida via opções do tema, sendo $param 'header' ou 'footer'
* `foundation_q_get_gallery_images( $gallery_limit = 999, $post_gallery_id = null, $thumbnail_size = 'thumbnail')` Retorna um array contendo informações de todas imagens atribuida a galeria de um post type
* `foundation_q_the_social_accounts( $show_icons = false, $outline = false )` // Exibe uma lista de contas de serviços sociais que não tenham link, se $outline = true, os ícones mudam para apenas os que contém apenas o contorno

### Carregando arquivos .js e .css adicionais ###

* Se precisar carregar outros arquivos .js ou .css edite o arquivo `lib/config.php` para incluir estes arquivos utilizando as variáveis de configuração

### Criando Post types e Campos personalizados ###

* Para criar novos posts types ou campos personalizados edite os arquivos `lib/types.php` e `lib/fields.php`

### Adicionando novas opções de tema ###

* Para incluir mais campos de opções de tema edite o arquivo `lib/options.php`

### Notas da versão ###

## Versão 1.0 ##

* Herdado do Foundation-Q, o Baby Boomer veio quente pra criação dos layouts da Quartel Design!

### Divirta-se!!! ###
