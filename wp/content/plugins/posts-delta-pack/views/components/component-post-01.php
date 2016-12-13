<?php
/**
 *
 * Component Post 01
 *
 */

$post_id = get_the_ID();
?>

<article id="<?php echo 'qwp-' . $plugin_slug . '-component-01-' . $post_id; ?>" class="qwp-component qwp-component-01 <?php echo 'qwp-' . $plugin_slug . '-component qwp-' . $plugin_slug . '-component-01'; ?>">
	<!--
	*
	* Imagem destacada
	*
	-->
	<figure class="qwp-component__thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail( $args['featured_image'], array( 'class' => 'img-responsive' )); ?>
			<i></i>
		</a>

		<?php
		if( $args['show_terms'] ): ?>
			<!--
			*
			* Categorias
			*
			-->
			<div class="qwp-component__terms">
				<?php
				$terms = get_the_terms( $post_id, $args['show_terms'] );
				if ($terms && ! is_wp_error($terms)): ?>
			    <?php foreach($terms as $term): ?>
		        <a href="<?php echo get_term_link( $term->slug, $args['show_terms']); ?>" rel="tag" class="label label-primary"><?php echo $term->name; ?></a><div class="clearfix"></div>
			    <?php endforeach; ?>
				<?php endif; ?>
			<?php
		endif; ?>
	</figure>

	<!--
	*
	* Título da galeria
	*
	-->
	<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>

	<ul class="qwp-component__post-infos list-inline">
		<?php
		if( $args['show_date'] ): ?>
			<!--
			*
			* Data
			*
			-->
			<li><i class="fa fa-calendar"></i> <time><?php echo get_the_date( 'd/m/Y' ); ?></time></li>
			<?php
		endif;
		if( $args['show_comments'] ): ?>
			<!--
			*
			* Comentários
			*
			-->
			<li>
				<i class="fa fa-comments-o"></i>
				<?php comments_popup_link( 'Comentários', 'Comentários: 1', 'Comentários: %', 'comments-link', 'Comentários fechados'); ?>
			</li>
			<?php
		endif; ?>
	</ul>

	<div class="qwp-component-01__excerpt"><?php the_excerpt(); ?></div>

	<!--
	*
	* Botão
	*
	-->
	<p><a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm text-uppercase"><?php echo $args['button_text']; ?></a></p>

</article>
