<!--
*
* FOOTER 01
*
-->

<h1>Modelo Footer 01:</h1>

<footer class="qwp-footer qwp-footer-01 qwp-bg-color-primary">
  <div class="qwp-footer-01__top">
    <div class="container">
      <div class="qwp-footer-01__top__flex">
        <div class="qwp-footer-01__top__flex__box--blog">

          <a href="<?php echo home_url(); ?>" class="qwp-footer-01__top__flex__box--blog__logo">
            <?php foundation_q_the_logo('footer'); ?>
          </a>

          <div class="qwp-footer-01__top__flex__box--blog__description">
            <div class="qwp-content qwp-content--dark">
              <?php echo foundation_q_get_option('website_description'); ?>
            </div><!-- /.qwp-content qwp-content--dark -->
          </div><!-- /.qwp-footer-01__top__flex__box--blog__description -->

        </div><!-- /.qwp-footer-01__top__flex__box--blog -->
        <div class="qwp-footer-01__top__flex__box--info">
          <h3 class="qwp-footer-01__top__flex__box--info__title qwp-color-secondary">
            Fale Conosco
          </h3><!-- /.qwp-footer-01__top__flex__box--info__title -->

          <ul class="qwp-footer-01__top__flex__box--info__list qwp-font-xs">
            <?php
            $phones = foundation_q_get_option('website_phones');
            if ( $phones ): ?>
              <li>
                <i class="fa fa-phone" aria-hidden="true"></i>
                <ul class="qwp-footer-01__top__flex__box--info__list__phones">
                  <?php
                  foreach ($phones as $phone):
                    echo '<li>' . $phone . '</li>';
                  endforeach; ?>
                </ul>
              </li>
              <?php
            endif;

            $email = foundation_q_get_option('website_email');
            if ( $email ): ?>
              <li>
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>
              </li>
              <?php
            endif;

            $address = foundation_q_get_option('website_address');
            if ( $address ): ?>
              <li>
                <i class="fa fa-home" aria-hidden="true"></i>
                <div>
                  <?php echo wpautop( foundation_q_get_option('website_address') ); ?>
                </div>
              </li>
              <?php
            endif; ?>
          </ul><!-- /.qwp-footer-01__top__flex__box--info__list -->

        </div><!-- /.qwp-footer-01__top__flex__box--info -->
        <div class="qwp-footer-01__top__flex__box--newsletter">
          <h3 class="qwp-footer-01__top__flex__box--newsletter__title qwp-color-secondary">
            Newsletter
          </h3><!-- /.qwp-footer-01__top__flex__box--newsletter__title -->

          <div class="qwp-footer-01__top__flex__box--newsletter__box">
            <?php
            // Newsletter
            if ( class_exists( "QNWPNewsletter" ) ) {
              $newsletter = new QNWPNewsletter();
              $newsletter->qnwp_the_newsletter_form();
            } ?>
          </div><!-- /.qwp-footer-01__top__flex__box--newsletter__box -->

          <div class="qwp-footer-01__top__flex__box--newsletter__socials">
            <?php
            // Redes Sociais
            foundation_q_the_social_links( true, false ); ?>
          </div><!-- /.qwp-footer-01__top__flex__box--newsletter__socials -->
        </div><!-- /.qwp-footer-01__top__flex__box--newsletter -->
      </div><!-- /.qwp-footer-01__top__flex -->
    </div><!-- /.container -->
  </div><!-- /.qwp-footer-01__top -->
</footer><!-- /.qwp-footer qwp-footer-01 -->

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
