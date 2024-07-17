<?php
$bgcolor = get_sub_field( 'pb_block_basics_background_color' );
$classes = get_sub_field( 'pb_block_basics_custom_classes' );
$anchor = get_sub_field( 'pb_block_basics_section_anchor' ); ?>
<section class="builder-block block-portfolio background-<?php echo $bgcolor . ' ' . $classes; ?>" <?php if($anchor) echo 'id="' . $anchor . '"'; ?>>
	<div class="inner">
	
		<?php
		$section_title = get_sub_field( 'pb_section_title' );
		$title_size = get_sub_field( 'pb_title_size' );
		if($section_title) : ?>
			<h2 class="section-title <?php echo $title_size; ?> wow animate__fadeIn">
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
			$i = 0;
			while($loop->have_posts()) : $loop->the_post();
				$portfolio_link = get_field('portfolio_link');
				$note = get_field('portfolio_highlight_note');
				$tagline = get_field('portfolio_tagline'); ?>
				<div class="portfolio-item-container clickable-div">
					
					<div class="portfolio-item wow animate__fadeIn" 
						 data-wow-delay="<?php echo $i * 0.1; ?>s">
							 
						<?php
						if($portfolio_link) : ?>
							<a href="<?php echo $portfolio_link; ?>" class="portfolio-link">
						<?php
						endif;
						
						if(has_post_thumbnail()) : ?>
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" />
						<?php
						else :
							echo '<p>' . get_the_title() . '</p>';
						endif;
						
						if($portfolio_link) : ?>
							</a>
						<?php
						endif; ?>
						
						<?php
						if($note) : ?>
							<p class="portfolio-note">
								<?php echo strip_tags($note); ?>
							</p>
						<?php
						endif; ?>
					</div>
					
					<?php
					if($tagline) : ?>
						<div class="portfolio-hover">
							<p class="portfolio-tagline">
								<?php echo $tagline; ?>
							</p>
						</div>
					<?php
					endif; ?>
					
				</div>
				<?php
				if($i % 3 == 2) :
					$i = 0;
				else :
					$i++;
				endif;
			endwhile;
			wp_reset_query();
			?>
		</div>
	</div>
</section>