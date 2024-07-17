<?php
$today = current_time('Ymd');
$args = array(	'post_type'		=>		'event',
				'post_status'	=>		'publish',
				'orderby'		=>		'meta_value',
				'order'			=>		'ASC',
				'meta_key'		=>		'event_start_date',
				'posts_per_page'=>		-1,
				'meta_query'	=>		array(
									        'key'		=> 'event_end_date',
									        'compare'	=> '>=',
									        'value'		=> $today,
									    ),
						);
$loop = new WP_Query($args); ?>
	
<section class="archive-title">
	<div class="inner">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</div>
</section>

<section class="builder-block">
	<div class="inner">
		<?php
		if($loop->have_posts()) : ?>
			<div class="flex-cards">
				<?php
				/* Start the Loop */
				while ( $loop->have_posts() ) : $loop->the_post();
	
					get_template_part( 'template-parts/card', get_post_type() );
	
				endwhile;
				wp_reset_query(); ?>
			</div>
		<?php
		else : ?>
			<p class="large"><?php _e('No upcoming events at this time, please check back later.', 'basistechllc'); ?></p>
		<?php
		endif; ?>
	</div>
</section>

<?php
$args = array(	'post_type'		=>		'event',
				'post_status'	=>		'publish',
				'orderby'		=>		'meta_value',
				'meta_key'		=>		'event_start_date',
				'order'			=>		'DESC',
				'posts_per_page'=>		-1,
				'meta_query'	=>		array(
									        'key'		=> 'event_end_date',
									        'compare'	=> '<',
									        'value'		=> $today,
									    ),
		);
$loop = new WP_Query($args); ?>
<section class="builder-block additional-title">
	<div class="inner">
		<h2><?php _e('Past Events', 'basistechllc'); ?></h2>
	</div>
</section>
<section class="builder-block">
	<div class="inner">
		<?php
		if($loop->have_posts()) : ?>
			<div class="flex-cards">
				<?php
				/* Start the Loop */
				while ( $loop->have_posts() ) : $loop->the_post();
	
					get_template_part( 'template-parts/card', get_post_type() );
	
				endwhile;
				wp_reset_query(); ?>
			</div>
		<?php
		else : ?>
			<p class="large"><?php _e('No past events.', 'basistechllc'); ?></p>
		<?php
		endif; ?>
	</div>
</section>