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
	<?php
	$news_type = get_field('news_type');
	if( $news_type == 'external' ) :
		$link = get_field('news_external_link');
		$target = "_blank";
	elseif( $news_type == 'download' ) :
		$link = get_field('news_document');
		$target = "_self";
	else :
		$link = get_the_permalink();
		$target = "_self";
	endif; ?>
	<p>
		<a href="<?php echo $link; ?>" class="more" target="<?php echo $target; ?>">
			<?php _e('Continue reading'); ?>
		</a>
	</p>
</div>