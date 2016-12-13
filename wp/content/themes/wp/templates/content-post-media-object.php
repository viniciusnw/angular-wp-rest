<?php
/**
*
* Post media content template
*
**/
?>

<div class="media">
  <?php if( has_post_thumbnail() ): ?>
  <div class="media-left">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail( 'thumbnail', array('class' => 'media-object thumbnail') ); ?>
    </a>
  </div>
  <?php endif; ?>
  <div class="media-body">
    <?php the_category( ', ' ); ?>
    <h3 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php the_excerpt(); ?>
  </div>
</div>
<hr />
