<?php
$bgcolor = get_sub_field( 'block_basics_background_color' );
$classes = get_sub_field( 'block_basics_custom_classes' );
$anchor = get_sub_field( 'block_basics_section_anchor' ); ?>
<section class="builder-block block-events background-<?php echo $bgcolor . ' ' . $classes; ?>" <?php if($anchor) echo 'id="' . $anchor . '"'; ?>>
	<div class="inner">
	
		<?php
		$section_title = get_sub_field( 'eb_section_title' );
		if($section_title) : ?>
			<h2 class="section-title">
				<?php echo $section_title; ?>
			</h2>
		<?php
		endif;
		?>
		
		<div class="events-text-list">
			<?php
			$args = array(	'post_type'			=>	'event',
							'posts_per_page'	=>	2,
							'orderby'			=>	'meta_value',
							'order'				=>	'ASC',
							'meta_key'			=>	'event_date'
					);
			$loop = new WP_Query($args);
			while($loop->have_posts()) : $loop->the_post(); ?>
				<div class="event-text-list-item">
					<p>
						<a href="<?php echo get_the_permalink(); ?>">
							<?php echo get_the_title(); ?>
						</a>
					</p>
				</div>
			<?php
			endwhile;
			wp_reset_query();
			?>
		</div>
	</div>
</section>