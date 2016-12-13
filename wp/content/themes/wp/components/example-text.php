<?php
$args = array(
  'post_type' => 'page',
  'pagename' => 'pagina-exemplo',
);

$posts_data = get_posts( $args );
if( $posts_data ):
  foreach( $posts_data as $post ): setup_postdata( $post );
    /**
     *
     * Box de Texto Corrido
     *
     */
    ?>

    <h1>Página de Exemplo</h1>
    <div class="qwp-content qwp-scrollpanel">
      <?php the_content(); ?>
    </div><!-- /.qwp-content -->

    <?php
  endforeach;
endif; ?>