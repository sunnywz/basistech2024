<?php
$bgcolor = get_sub_field( 'eb_block_basics_background_color' );
$classes = get_sub_field( 'eb_block_basics_custom_classes' );
$anchor = get_sub_field( 'eb_block_basics_section_anchor' ); ?>
<section class="builder-block block-events background-<?php echo $bgcolor . ' ' . $classes; ?>" <?php if($anchor) echo 'id="' . $anchor . '"'; ?>>
	<div class="inner">
	
		<?php
		$section_title = get_sub_field( 'eb_section_title' );
		$title_size = get_sub_field( 'eb_title_size' );
		if($section_title) : ?>
			<h2 class="section-title <?php echo $title_size; ?> wow animate__fadeIn">
				<?php echo $section_title; ?>
			</h2>
		<?php
		endif;
		?>
		
		<div class="events-text-list">
			<?php
			$today = current_time('Ymd');
			$args = array(	'post_type'			=>	'event',
							'posts_per_page'	=>	5,
							'orderby'			=>	'meta_value',
							'order'				=>	'ASC',
							'meta_key'			=>	'event_start_date',
							'meta_query'		=>	array(
													        'key'		=> 'event_end_date',
													        'compare'	=> '>=',
													        'value'		=> $today,
													    ),
					);
			$loop = new WP_Query($args);
			$i = 0;
			while($loop->have_posts()) : $loop->the_post(); ?>
				<div class="event-text-list-item wow animate__fadeIn" data-wow-delay="<?php echo $i; ?>s">
					<ul>
						<li class="event-list-title">
							<a href="<?php echo get_the_permalink(); ?>">
								<?php echo get_the_title(); ?>
							</a>
						</li>
						<li>
							<?php echo get_field( 'event_display_date' ); ?>
						</li>
						<li>
							<?php echo get_field( 'event_location_name' ); ?>
						</li>
					</ul>
				</div>
				<?php
				$i = $i + 0.1;
			endwhile;
			wp_reset_query();
			?>
		</div>
	</div>
</section>