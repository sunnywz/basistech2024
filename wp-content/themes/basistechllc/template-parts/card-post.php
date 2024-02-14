<div class="card clickable-div">
	<h3><?php echo get_the_title(); ?></h3>
	<p class="post-date">
		<?php 
		if(function_exists('pll_current_language')) :
			$language = pll_current_language();	
			if($language == 'ja') :
				echo get_the_date( 'Y年n月j日' );
			else :
				echo get_the_date( 'F d, Y' ); 
			endif;
			
		else :
			echo get_the_date( 'F d, Y' ); 
			
		endif;
		?>
	</p>
	<p><?php echo get_the_excerpt(); ?></p>
	<p><a href="<?php echo get_the_permalink(); ?>" class="more"><?php _e('Continue reading'); ?></a></p>
</div>