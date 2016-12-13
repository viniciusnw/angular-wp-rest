<!--
*
* Posts em Destaque
*
-->

<div class="qwp-featured">
  <h4 class="qwp-featured__title">Listagem Lateral</h4>

  <?php
  // Contador provisório
  for ($i=0; $i < 3; $i++): ?>

    <article class="qwp-featured__item qwp-featured__item--half">
      <figure class="qwp-featured__item__thumbnail">
        <a href="#">
          <img src="https://placeholdit.imgix.net/~text?txtsize=15&txt=165%C3%97215&w=300&h=210">
        </a>
      </figure>

      <div class="qwp-featured__item__text">
        <time class="qwp-featured__item__text__date">
          31 de Dezembro de 2016
        </time><!-- /.qwp-featured__item__text__date -->

        <h5 class="qwp-featured__item__text__title">
          <a href="#">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          </a>
        </h5><!-- /.qwp-featured__item__text__title -->
      </div><!-- /.qwp-featured__item__text -->
    </article>

    <?php
  endfor; ?>
</div><!-- /.qwp-featured -->
