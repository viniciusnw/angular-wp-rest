<?php
/**
 *
 * Search - Formulário de Busca
 *
 * @package WordPress
 * @subpackage Baby Boomer
 */

$text_placeholder = 'Buscar por';
$text_submit = 'Buscar'; ?>

<form action="<?php echo home_url( '/' ); ?>" role="search" method="get" id="qwp-search-form" class="qwp-search-form">
  <div class="qwp-search-form__container">
    <label class="qwp-search-form__container__label" for="s"><?php echo $text_submit; ?></label>
    <input type="search" id="qwp-search-form__container__input" class="qwp-search-form__container__input" value="<?php echo get_search_query() ?>" name="s" placeholder="<?php echo $text_placeholder; ?>">

    <button type="submit" id="qwp-search-form__container__submit" class="qwp-search-form__container__submit">
      <i class="fa fa-search" aria-hidden="true"></i>
      <span><?php echo $text_submit; ?></span>
    </button>
  </div>
</form>
