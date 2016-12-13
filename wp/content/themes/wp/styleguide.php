<?php
/**
 *
 * Styleguide
 *
 * Este arquivo contém componentes que podem ser úteis para o seu desenvolvimento.
 * Edite-os, estilize-os conforme o seu layout proposto, e utilize um padrão
 * para todos os elementos do seu site.
 *
 * @package WordPress
 * @subpackage Baby Boomer
 */

$part = 'components/example'; ?>

<div class="container">
  <div class="row">

    <div class="col-md-4">

      <?php
      // Delta Post Type
      get_template_part( $part, 'featured' ); ?>

    </div><!-- /.col-md-4 -->
    <div class="col-md-4">

      <?php
      // Labels
      get_template_part( $part, 'labels' ); ?>

      <hr />

      <?php
      // Nav Pills
      get_template_part( $part, 'pills' ); ?>

      <hr />

      <?php
      // Setinhas
      get_template_part( $part, 'arrows' ); ?>

    </div><!-- /.col-md-4 -->
    <div class="col-md-4">

      <?php
      // Colors and background-colors
      get_template_part( $part, 'colors' ); ?>

    </div><!-- /.col-md-4 -->
    <div class="col-xs-12">

      <hr />

    </div><!-- /.col-xs-12 -->
    <div class="col-md-6">

      <?php
      // Tabs
      get_template_part( $part, 'tabs' ); ?>

    </div><!-- /.col-md-6 -->
    <div class="col-md-6">

      <?php
      // Paginação
      get_template_part( $part, 'pagination' ); ?>

      <hr />

      <?php
      // Depoimentos
      get_template_part( $part, 'author-blockquote' ); ?>

    </div><!-- /.col-md-6 -->
    <div class="col-xs-12">

      <hr />

    </div><!-- /.col-xs-12 -->

    <?php
    // Cabeçalhos - Títulos
    get_template_part( $part, 'titles' ); ?>

    <div class="col-xs-12">

      <hr />

    </div><!-- /.col-xs-12 -->
    <div class="col-md-4">

      <?php
      // Sidebar
      get_sidebar(); ?>

    </div><!-- /.col-md-4 -->
    <div class="col-md-8">

      <?php
      // Conteúdo de Texto
      get_template_part( $part, 'text' ); ?>

    </div><!-- /.col-md-8 -->
    <div class="col-xs-12">

      <hr />

    </div><!-- /.col-xs-12 -->

    <?php
    // Botões
    get_template_part( $part, 'buttons' ); ?>

  </div><!-- /.row -->
</div><!-- /.container -->
