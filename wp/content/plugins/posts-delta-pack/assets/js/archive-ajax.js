jQuery(document).ready(function ($) {

    /*
     * Ajax de PAGINAÇÃO da ARCHIVE | TERM!
     */
    var content_loading = $('#qwp-posts__loading');
    var mobile = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ? true : false;
    
            
    $('.qwp-component-02__post-infos__meta a').on('click', function(e){
        e.preventDefault();
    });

    $('.qwp-archive-posts__ajax').each(function () {

        var this_ = $(this);

        var content_ajax_archive = $(this).find('.qwp-archive-posts__content-ajax');
        var content_ajax_posts = $(this).find('.qwp-archive-posts__content-ajax div.__content-posts');
        var pagination = $(this).find('.qwp-archive-posts__pagination');
        
        /*
         * ARCHIVE
         */
        pagination.twbsPagination({
            totalPages: content_ajax_archive.data('pages'),
            visiblePages: 5,
            prev: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
            next: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
            firstClass: 'hidden',
            lastClass: 'hidden',
            onPageClick: function (event, page) {

                // Url de action, montada no data-url do elemento
                var url = content_ajax_archive.data('url');

                // POST
                var parans = {
                    'per-page': content_ajax_archive.data('per-page'),
                    'page': page,
                    'post-type': content_ajax_archive.data('post-type'),
                    'cols': content_ajax_archive.data('cols'),
                    'component': content_ajax_archive.data('component')
                };

                // AJAX Call
                ajaxPosts('POST', url, parans)
                        .then(function (data) {

                            // Animação de saida!
                            content_ajax_posts.addClass('qwp-posts__animate-start');
                            content_ajax_posts.removeClass('qwp-posts__animate-end');

                            content_ajax_archive.css('min-height', content_ajax_posts.height());

                            // Animação de entrada
                            setTimeout(function () {
                                content_ajax_posts.html(data);
                                content_ajax_posts.addClass('qwp-posts__animate-end');
                            }, 300);
                        });
            }
        });
        
        /*
         * TERM
         */
        $(this).find('.qwp-posts-section__nav a').on('click', function (e) {

            e.preventDefault();

            $(this).parent().parent().find('li').each(function () {
                $(this).removeClass('active');
            });
            $(this).parent().addClass('active');

            var pages = $(this).data('pages');
            var total = $(this).data('total');
            var url   = $(this).data('url');

            pagination.removeData("twbs-pagination");
            pagination.empty();
            pagination.unbind("page");
            pagination.twbsPagination({
                totalPages: (mobile) ? total : pages,
                visiblePages: 5,
                prev: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
                next: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
                firstClass: 'hidden',
                lastClass: 'hidden',
                onPageClick: function (event, page) {

                    var parans = {
                        'page': page,
                        'per-page': content_ajax_archive.data('per-page'),
                        'cols': content_ajax_archive.data('cols'),
                        'post-type': content_ajax_archive.data('post-type'),
                        'component': content_ajax_archive.data('component')
                    };

                    console.log('teste');

                    ajaxPosts('POST', url, parans)
                            .then(function (data) {

                                // Animação de saida!
                                content_ajax_posts.addClass('qwp-posts__animate-start');
                                content_ajax_posts.removeClass('qwp-posts__animate-end');

                                // Animação de entrada
                                setTimeout(function () {
                                    content_ajax_posts.html(data);
                                    content_ajax_posts.addClass('qwp-posts__animate-end');
                                }, 300);
                            });
                }
            });
        });
    });

    /*
     * Função ajax DEFAULT
     */
    function ajaxPosts(method, url, parans) {

        // Start Loading :D
        content_loading.addClass('is-active');

        return $.ajax({
            type: method,
            url: url,
            data: parans,
            cache: false,
            success: function (data, textStatus, jqXHR) {
                console.log('success: posts');
            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.log('error posts: ' + textStatus + jqXHR.status + jqXHR.responseText);
            },
            complete: function (jqXHR, textStatus) {

                // End Loading after 500ms :S
                setTimeout(function () {
                    content_loading.removeClass('is-active');
                }, 500);
            }
        });
    }
});
