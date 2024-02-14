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
$loop = new WP_Query($args);
if ( $loop->have_posts() ) : ?>
	
	<section class="archive-title">
		<div class="inner">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</div>
	</section>
	
	<section class="builder-block">
		<div class="inner">
			<div class="flex-cards">
				<?php
				/* Start the Loop */
				while ( $loop->have_posts() ) : $loop->the_post();
	
					get_template_part( 'template-parts/card', get_post_type() );
	
				endwhile;
				wp_reset_query(); ?>
			</div>
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
	$loop = new WP_Query($args);
	if($loop->have_posts()) : ?>
		<section class="builder-block additional-title">
			<div class="inner">
				<h2><?php _e('Past Events', 'basistechllc'); ?></h2>
			</div>
		</section>
		<section class="builder-block">
			<div class="inner">
				<div class="flex-cards">
					<?php
					/* Start the Loop */
					while ( $loop->have_posts() ) : $loop->the_post();
		
						get_template_part( 'template-parts/card', get_post_type() );
		
					endwhile;
					wp_reset_query(); ?>
				</div>
			</div>
		</section>
	<?php
	endif;

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>