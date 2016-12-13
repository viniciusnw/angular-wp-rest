<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php
            /*
             *
             * Post Loop
             *
             */
            if (have_posts()) :
                while (have_posts()) : the_post();
                    //Default tax
                    $post_tax = get_post_taxonomies(get_the_ID());

                    $args = array(
                        'component' => 'component-post-single-01',
                        'show_terms' => ($post_tax) ? $post_tax[0] : false,
                        'featured_image' => 'full'
                    );

                    Post_Type_View::get_component($args);
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
