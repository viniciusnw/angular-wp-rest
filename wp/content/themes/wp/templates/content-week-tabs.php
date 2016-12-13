<?php   
/**
*
* Show week content type for tab mode
*
**/

$current_day = (int)date('N'); ?>

<ul class="week-tabs">
	<li id="seg" class="no-ml <?php if($current_day == 1){ echo 'active'; } ?>">Seg</li>
	<li id="ter" class="<?php if($current_day == 2){ echo 'active'; } ?>">Ter</li>
	<li id="qua" class="<?php if($current_day == 3){ echo 'active'; } ?>">Qua</li>
	<li id="qui" class="<?php if($current_day == 4){ echo 'active'; } ?>">Qui</li>
	<li id="sex" class="<?php if($current_day == 5){ echo 'active'; } ?>">Sex</li>
	<li id="sab" class="<?php if($current_day == 6){ echo 'active'; } ?>">Sáb</li>
	<li id="dom" class="no-mr  <?php if($current_day == 7){ echo 'active'; } ?>">Dom</li>
</ul>

<?php the_programming( $week_day = 1 ); ?>
<?php the_programming( $week_day = 2 ); ?>
<?php the_programming( $week_day = 3 ); ?>
<?php the_programming( $week_day = 4 ); ?>
<?php the_programming( $week_day = 5 ); ?>
<?php the_programming( $week_day = 6 ); ?>
<?php the_programming( $week_day = 7 ); ?>

<?php
function the_programming($week_day = 1){
	$current_day = (int)date('N');
	$args = array(
	'post_type' => 'qd_week',
	'numberposts' => -1,
	'meta_query' => array(
		array(
			'key' => 'qd_programacao_dia_semana',
			'value' => $week_day,
			'compare' => '=='
		)
	),
	'meta_key' => 'qd_programacao_hora_inicio',
	'orderby' => 'meta_value',
	'order' => 'ASC'
	);
	$programacao = get_posts($args);
  	switch ($week_day) {
		case 1:
			$sigla = 'seg';
			break;
		case 2:
			$sigla = 'ter';
			break;
		case 3:
			$sigla = 'qua';
			break;
		case 4:
			$sigla = 'qui';
			break;	
		case 5:
			$sigla = 'sex';
			break;
		case 6:
			$sigla = 'sab';
			break;
		case 7:
			$sigla = 'dom';
			break;						
	}
  	?>	
	<div class="week-content week-<?php echo $week_day; ?>" <?php if($current_day == $week_day){ echo 'style="display:block"'; }else{ echo 'style="display:none"'; } ?>>
	<?php
	if($programacao):
	?>
		<ul>
	  	<?php
	    foreach($programacao as $programa):
	    	$post_id = $programa->ID;
			$start_time = get_post_meta($post_id, 'qd_programacao_hora_inicio', true);
			$end_time = get_post_meta($post_id, 'qd_programacao_hora_termino', true);
	    ?>
	    <li>
			<div class="horario-culto"><?php echo $start_time; ?> - <?php echo $end_time; ?></div>
			<div class="info-culto">
				<span class="vermelho bold uppercase"><?php echo $programa->post_title; ?></span><br />
				<span class="cinza"><?php echo $programa->post_excerpt; ?></span>
			</div>
		</li>
	    <?php
	    endforeach;
	    ?>
	</ul>
	<?php
	else:
	echo 'Não há programações para este dia.';
	endif; 
	?>
	</div><!-- .programacao -->
  <?php 
}
?>