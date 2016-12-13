jQuery(document).ready(function($) {

  /*=================================
  =            Push Menu            =
  =================================*/

  $('.qwp-header [class*="__toggle"]').jPushMenu();

  /*=====  End of Push Menu  ======*/

  /*===================================
  =            Scrollpanel            =
  ===================================*/

  $('.qwp-scrollpanel').scrollpanel({
    prefix: 'sp-',
  });

  /*=====  End of Scrollpanel  ======*/

  /*==============================
  =            Scroll            =
  ==============================*/

  // $(document).on("click", ".qwp-scroll", function() {
  //   event.preventDefault();
  //   var distance = $(this.hash).offset().top;

  //   $('html,body').animate({ scrollTop: distance }, 1000);
  // });

  /*=====  End of Scroll  ======*/

  /*==============================
  =            Select            =
  ==============================*/

  // $('select').customSelect();

  /*=====  End of Select  ======*/

});
