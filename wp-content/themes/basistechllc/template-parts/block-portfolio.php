<?php
$bgcolor = get_sub_field( 'block_basics_background_color' );
$classes = get_sub_field( 'block_basics_custom_classes' );
$anchor = get_sub_field( 'block_basics_section_anchor' ); ?>
<section class="builder-block block-portfolio background-<?php echo $bgcolor . ' ' . $classes; ?>" <?php if($anchor) echo 'id="' . $anchor . '"'; ?>>
	<div class="inner">
	
		<?php
		$section_title = get_sub_field( 'pb_section_title' );
		$title_size = get_sub_field( 'pb_title_size' );
		if($section_title) : ?>
			<h2 class="section-title <?php echo $title_size; ?>">
				<?php echo $section_title; ?>
			</h2>
		<?php
		endif;
		?>
		
		<div class="portfolio-wall">
			<?php
			$args = array(	'post_type'			=>	'portfolio',
							'posts_per_page'	=>	-1,
							'orderby'			=>	'menu_order',
							'order'				=>	'ASC'
					);
			$loop = new WP_Query($args);
			while($loop->have_posts()) : $loop->the_post();
				$portfolio_link = get_field('portfolio_link'); ?>
				<div class="portfolio-item <?php if($portfolio_link) echo 'clickable-div'; ?>">
					<?php
					if($portfolio_link) : ?>
						<a href="<?php echo $portfolio_link; ?>">
					<?php
					endif;
					
					if(has_post_thumbnail()) : 
						the_post_thumbnail();
					else :
						echo '<p>' . get_the_title() . '</p>';
					endif;
					
					if($portfolio_link) : ?>
						</a>
					<?php
					endif; ?>
				</div>
			<?php
			endwhile;
			wp_reset_query();
			?>
		</div>
	</div>
</section>