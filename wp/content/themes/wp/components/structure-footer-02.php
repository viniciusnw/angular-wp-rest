<!--
*
* FOOTER 02
*
-->

<h1>Modelo Footer 02:</h1>

<footer class="qwp-footer qwp-footer-02 qwp-bg-color-primary">
  <div class="qwp-footer-02__top">
    <div class="container">
      <div class="qwp-footer-02__top__newsletter">
        <?php
        // Newsletter
        if ( class_exists( "QNWPNewsletter" ) ) {
          $newsletter = new QNWPNewsletter();
          $newsletter->qnwp_the_newsletter_form();
        } ?>
      </div><!-- /.qwp-footer-02__top__newsletter -->
      <div class="qwp-footer-02__top__socials">
        <?php
        // Redes Sociais
        foundation_q_the_social_links( true, false ); ?>
      </div><!-- /.qwp-footer-02__top__socials -->
    </div><!-- /.container -->
  </div><!-- /.qwp-footer-02__top -->
</footer><!-- /.qwp-footer qwp-footer-02 -->

<div class="qwp-footer__bottom">
  <div class="container">
    <div class="qwp-footer__bottom__flex">
      <div class="qwp-footer__bottom__flex__copyright">
        <?php echo wpautop( foundation_q_get_option('footer_text') ); ?>
      </div><!-- /.qwp-footer__bottom__flex__copyright -->
      <a href="http://www.quarteldesign.com" class="qwp-footer__bottom__flex__quartel"><i class="qicon-quartel"></i></a><!-- /.qwp-footer__bottom__quartel -->
    </div><!-- /.qwp-footer__bottom__flex -->
  </div><!-- /.container -->
</div><!-- /.qwp-footer__bottom -->
