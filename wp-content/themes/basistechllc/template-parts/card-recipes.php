 <div class="card card-recipe clickable-div wow animate__fadeIn">
	<?php the_post_thumbnail(); ?>
	<p>
		<a href="<?php echo get_the_permalink(); ?>" class="button button-orange">
			<?php _e('See recipe'); ?>
		</a>
	</p>
	<div class="card-recipe-title">
		<h3><?php echo get_the_title(); ?></h3>
	</div>
</div>