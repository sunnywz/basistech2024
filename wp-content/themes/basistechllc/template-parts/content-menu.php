<section class="builder-block food-menu-container text-center flex-wrap justify-center wow animate__fadeIn">
	<div class="inner-skinny">
		<h1><?php echo get_the_title(); ?></h1>
		
		<?php		
		$featured = get_the_post_thumbnail_url();		
		if($featured) : ?>
			<div class="food-menu-image">
				<img src="<?php echo $featured; ?>" alt="<?php echo get_the_title(); ?>" />
			</div>
		<?php
		endif; ?>
		
		<?php 
		if ( have_rows( 'menu_sections' ) ) : 
			while ( have_rows( 'menu_sections' ) ) : the_row(); ?>
				<div class="food-menu-section">
					<?php
					$section_title = get_sub_field( 'menu_section_title' );
					if($section_title) : ?>
						<h2><?php echo $section_title; ?></h2>
					<?php
					endif; ?>
					
					<?php 
					if ( have_rows( 'menu_items' ) ) : ?>
						<div class="food-menu-items block-content-flex flex-50-50">
							<?php 
							while ( have_rows( 'menu_items' ) ) : the_row(); ?>
								<div class="flex-item food-menu-item">
									<?php echo get_sub_field( 'menu_item' ); ?>
								</div>
							<?php 
							endwhile; ?>
						</div>
					<?php 
					endif; ?>
				</div>
			<?php 
			endwhile;
		endif; ?>
	</div>
</section>


