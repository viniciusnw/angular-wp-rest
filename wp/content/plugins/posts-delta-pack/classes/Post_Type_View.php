<?php
//Dependencies
require_once 'Post_Type_Message.php';
require_once 'Settings.php';

/*
 *
 * Post_Type_View: classe destinada ao tratamento dos métodos relacionados às views
 *
 */

class Post_Type_View {

    private static $component;

    public function __construct() {

        /*
         * Cria a action para a chamada ajax da paginação da ARCHIVE
         */
        add_action('wp_ajax_posts_ajax_archive', array(__CLASS__, 'posts_ajax_archive'));
        add_action('wp_ajax_nopriv_posts_ajax_archive', array(__CLASS__, 'posts_ajax_archive'));
    }

    /**
     *
     * Lista os posts com base nas configurações passadas
     * @param mixed $args: argumentos para configurar a listagem dos posts
     *
     */
    public static function get_component($args = array()) {
        $plugin_slug = Settings::$plugin_slug;

        //Argumentos default
        $defaults = array(
            'component' => 'component-post-01',
            'featured_image' => 'thumbnail',
            'featured_image_classes' => 'media-object img-responsive',
            'show_terms' => '',
            'show_tags' => '',
            'show_date' => true,
            'show_comments' => true,
            'button_text' => 'Saiba mais'
        );

        $args = wp_parse_args(
                $args, apply_filters('get_component_defaults', $defaults)
        );

        $component_path = POST_TYPE_PLUGIN_PATH . '/views/components/' . $args['component'] . '.php';

        //Caso o arquivo do componente não exista
        $glob = glob($component_path);
        if (empty($glob)) {
            Post_Type_Message::error_message('Componente não encontrado');
            return;
        } else {
            include $component_path;
        }
    }

    public static function get_terms_of_tax($tax) {
        $categories = get_the_terms(get_the_ID(), $tax);
        if ($categories) :
            $count = 0;
            foreach ($categories as $cat):
                $count++;
                $cat = sanitize_term($cat, $tax);
                $term_link = get_term_link($cat, $tax);

                // Se ocorrer algum erro, pula para o próximo item
                if (is_wp_error($term_link))
                    continue;

                // Se estiver correto, mostra o termo com o link.
                // Exibe com a vírgula se tiver mais de 1 categoria.
                echo ( count($categories) == $count ) ? ' <a href="' . $term_link . '">' . $cat->name . '</a> ' : ' <a href="' . $term_link . '">' . $cat->name . '</a>, ';
            endforeach;
        endif;
    }

    public static function get_post_type_tags($tax) {
        $categories = get_the_terms(get_the_ID(), $tax);
        if ($categories) :
            $count = 0;
            echo '<ul class="list-inline">';
            foreach ($categories as $cat):
                $count++;
                $cat = sanitize_term($cat, $tax);
                $term_link = get_term_link($cat, $tax);

                // Se ocorrer algum erro, pula para o próximo item
                if (is_wp_error($term_link))
                    continue;

                // Se estiver correto, mostra o termo com o link.
                // Exibe com a vírgula se tiver mais de 1 categoria.
                echo '<li><a href="' . $term_link . '">' . $cat->name . '</a></li>';
            endforeach;
            echo '</ul>';
        endif;
    }

    public static function posts_paginate_nav() {
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        $pages = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type' => 'array',
            'prev_next' => TRUE,
            'prev_text' => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
            'next_text' => '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
        ));

        if (is_array($pages)) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="pagination-sm pagination">';
            foreach ($pages as $page) {
                echo '<li class="page-item">' . $page . '</li>';
            }
            echo '</ul>';
        }
    }

    static function category_nav_pills( $args = array() ) {
        
        if (taxonomy_exists( $args['taxonomy'] )):
            $terms = get_terms( $args['taxonomy'], array(
                'hide_empty' => false,
            ));
            if ($terms):
                ?>
                <ul class="nav nav-pills qwp-posts-section__nav">

                    <?php
                        $total = wp_count_posts( $args['post_type'])->publish;
                    ?>

                    <li role="presentation" class="active">
                        <a href=""
                           data-total="<?= $total ?>"
                           data-pages="<?= ceil($total / $args['per-page']) ?>"
                           data-url="<?= admin_url("admin-ajax.php?action=posts_ajax_archive") ?>"
                           data-per-page="<?= $args['per-page'] ?>"
                           data-component="<?= $args['component'] ?>">
                            Todos
                        </a>
                    </li>

                    <?php
                    foreach ($terms as $term):

                        $query = new WP_Query(array(
                            'post_type' => $args['post_type'],
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $args['taxonomy'],
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                ),
                            ),
                        ));
                        ?>
                        <li role="presentation">
                            <a href="<?= get_term_link($term->slug, $args['taxonomy']); ?>"
                               data-total="<?= $query->post_count ?>"
                               data-pages="<?= ceil($query->post_count / $args['per-page']) ?>"
                               data-url="<?= admin_url("admin-ajax.php?action=posts_ajax_archive&term={$term->slug}&taxonomy={$args['taxonomy']}") ?>"
                               data-per-page="<?= $args['per-page'] ?>"
                               data-component="<?= $args['component'] ?>">

                                <?php echo $term->name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php
            endif;
        endif;
    }

    /*
     * Ajax para a PAGINAÇÃO do ARCHIVE!!
     */

    static function posts_ajax_archive() {

        $args = array(
            'post_type' => $_POST['post-type'],
            'posts_per_page' => $_POST['per-page'],
            'paged' => $_POST['page'],
        );

        if (isset($_GET['taxonomy'])) {

            $args = array(
                'post_type' => $_POST['post-type'],
                'posts_per_page' => $_POST['per-page'],
                'paged' => $_POST['page'],
                'tax_query' => array(
                    array(
                        'taxonomy' => $_GET['taxonomy'],
                        'field' => 'slug',
                        'terms' => $_GET['term'],
                    ),
                ),
            );
        }

        $postslist = new WP_Query($args);

        if ($postslist->have_posts()) :
            ?>
            <div class="row">
                <?php
                while ($postslist->have_posts()) : $postslist->the_post();
                    ?>
                    <div class="col-xs-12 col-sm-<?= $_POST['cols'] ?>">
                        <?php
                        //Default tax
                        $post_tax = get_post_taxonomies(get_the_ID());
                        $defined_feat_image = Default_Post_Type_Custom_Fields::get_post_type_option(get_post_type(), 'qpwp_post_type_thumbnail_archive_size');

                        /* Component */
                        $args = array(
                            'component' => $_POST['component'],
                            'show_terms' => ($post_tax) ? $post_tax[0] : false,
                            'featured_image' => $defined_feat_image,
                            'ajax' => true
                        );

                        Post_Type_View::get_component($args);
                        ?>
                    </div>
                    <?php
                endwhile;
                ?>
            </div> 
            <?php
            Post_Type_View::posts_paginate_nav();
        endif;

        die();
    }

    /*
     * Lista os POSTS e pagina via ajax
     */

    static function list_posts_ajax($args = array()) {

        $defaults = array(
            'post_type' => 'page',
            'taxonomy' => '',
            'per-page' => 5,
            'cols' => 12,
            'component' => 'component-post-02'
        );

        $args = wp_parse_args($args, apply_filters('list_posts_ajax_defaults', $defaults));

        # Total de itens do post type
        $total = wp_count_posts($args['post_type'])->publish;
        ?>
        <!-- Loader -->
        <div id="qwp-posts__loading" class="loader loader-default" data-text=" " blink></div>

        <div class="qwp-archive-posts__ajax">

            <header class="qwp-posts-header">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- 
                        *
                        * Categorias
                        *
                        -->
                        <?=Post_Type_View::category_nav_pills(array(
                            'post_type' => $args['post_type'], 
                            'taxonomy' => $args['taxonomy'], 
                            'per-page'  => $args['per-page'], 
                            'component' => $args['component']
                        ));
                        ?>
                    </div>
                </div>
            </header>

            <div class="qwp-archive-posts__content-ajax"
                 data-total="<?= $total ?>"
                 data-pages="<?= ceil($total / $args['per-page']) ?>"
                 data-url="<?= admin_url('admin-ajax.php?action=posts_ajax_archive') ?>"
                 data-per-page="<?= $args['per-page'] ?>"
                 data-post-type="<?= $args['post_type'] ?>"
                 data-cols="<?= $args['cols'] ?>"
                 data-component="<?= $args['component'] ?>">
                <!--
                *
                * Content
                *
                -->

                <div class="__content-posts clearfix" style="transition: all ease .3s;">

                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 text-center">
                    <ul class="pagination-sm pagination qwp-archive-posts__pagination"></ul>
                </div>
            </div>
        </div>

        <?php
    }
}
?>
