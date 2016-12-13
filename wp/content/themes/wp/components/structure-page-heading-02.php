<!--
*
* HEADER TOP 02
*
-->

<h1>Modelo de Top 02:</h1>

<div class="qwp-top qwp-top-02">
  <div class="container">
    <div class="qwp-top__flex">
      <h2 class="qwp-top__flex__title">
        <?php
        if ( is_archive() ) {
          $obj = get_post_type_object( get_post_type() );
          echo $obj->labels->name;
        } else {
          if ( is_404() ) { echo 'Erro 404'; }
          else if ( is_search() ) { echo 'Resultados da pesquisa "' . $_GET['s'] . '"'; }
          else { echo get_the_title(); }
        } ?>
      </h2><!-- /.qwp-top__flex__title -->

      <div class="qwp-top__flex__breadcrumb">
        <?php foundation_q_the_breadcrumbs(); ?>
      </div><!-- /.qwp-top__flex__breadcrumb -->
    </div><!-- /.qwp-top__flex -->
  </div><!-- /.container -->
</div><!-- /.qwp-top qwp-top-02 -->
