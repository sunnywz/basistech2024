 <div class="card clickable-div wow animate__fadeIn">
	<h3><?php echo get_the_title(); ?></h3>
	<p><?php echo get_the_excerpt(); ?></p>
	<p><a href="<?php echo get_the_permalink(); ?>" class="more"><?php _e('Continue reading'); ?></a></p>
</div>