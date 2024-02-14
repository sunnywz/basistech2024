<div class="card clickable-div">
	<h3><?php echo get_the_title(); ?></h3>
	<p class="post-date">
		<?php echo get_field('event_display_date'); ?>
	</p>
	<p><?php echo get_the_excerpt(); ?></p>
	<p><a href="<?php echo get_the_permalink(); ?>" class="more"><?php _e('Learn more'); ?></a></p>
</div>