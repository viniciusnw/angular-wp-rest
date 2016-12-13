<!--
*
* FOOTER 03
*
-->

<h1>Modelo Footer 03:</h1>

<footer class="qwp-footer qwp-footer-03 qwp-bg-color-primary">
  <div class="qwp-footer-03__top">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
          <h4>Grupo de Links</h4>
          <ul class="qwp-footer-03__top__links">
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
          </ul><!-- /.qwp-footer-03__top__links -->
        </div><!-- /.col-lg-2 col-md-3 col-sm-3 col-xs-6 -->
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
          <h4>Grupo de Links</h4>
          <ul class="qwp-footer-03__top__links">
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
          </ul><!-- /.qwp-footer-03__top__links -->
        </div><!-- /.col-lg-2 col-md-3 col-sm-3 col-xs-6 -->
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
          <h4>Grupo de Links</h4>
          <ul class="qwp-footer-03__top__links">
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
          </ul><!-- /.qwp-footer-03__top__links -->
        </div><!-- /.col-lg-2 col-md-3 col-sm-3 col-xs-6 -->
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
          <h4>Grupo de Links</h4>
          <ul class="qwp-footer-03__top__links">
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
          </ul><!-- /.qwp-footer-03__top__links -->
        </div><!-- /.col-lg-2 col-md-3 col-sm-3 col-xs-6 -->

        <div class="col-lg-4 col-md-12 col-xs-12">
          <h4>Fale Conosco</h4>

          <ul class="qwp-footer-03__top__list qwp-font-xs">
            <?php
            $phones = foundation_q_get_option('website_phones');
            if ( $phones ): ?>
              <li>
                <i class="fa fa-phone" aria-hidden="true"></i>
                <ul class="qwp-footer-03__top__list__phones">
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
          </ul><!-- /.qwp-footer-03__top__list__list -->

          <h4>Newsletter</h4>

          <?php
          // Newsletter
          if ( class_exists( "QNWPNewsletter" ) ) {
            $newsletter = new QNWPNewsletter();
            $newsletter->qnwp_the_newsletter_form();
          } ?>

        </div><!-- /.col-md-4 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.qwp-footer-03__top -->
</footer><!-- /.qwp-footer qwp-footer-03 -->

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
