<?php
$bgcolor = get_sub_field( 'ai_block_basics_background_color' );
$classes = get_sub_field( 'ai_block_basics_custom_classes' );
$anchor = get_sub_field( 'ai_block_basics_section_anchor' );
$mode = get_sub_field( 'ai_display_mode' );
$container_class = 'inner'; ?>

<section class="builder-block block-accent background-<?php echo $bgcolor . ' ' . $classes; ?>" <?php if($anchor) echo 'id="' . $anchor . '"'; ?>>
	<div class="<?php echo $container_class; ?>">
	
		<?php
		if(str_contains($classes, 'home-intro') || str_contains($classes, 'intro-circle')) : ?>
			<div class="yellow-circle"></div>
		<?php
		endif; ?>
	
		<?php
		$section_title = get_sub_field( 'ai_section_title' );
		$title_size = get_sub_field( 'ai_title_size' );
		if($section_title) : ?>
			<h2 class="section-title <?php echo $title_size; ?> wow animate__fadeIn">
				<?php echo $section_title; ?>
			</h2>
		<?php
		endif; ?>
		
		
		<?php
		$image = get_sub_field( 'ai_image' );
		$alignment = get_sub_field( 'ai_image_alignment' ); 
		$is_round = get_sub_field( 'ai_is_round' );
		$circle = get_sub_field( 'ai_circle' );
		?>
		<div class="block-content-flex block-accent-flex flex-<?php echo $mode; ?> accent-<?php echo $alignment; ?>">
			<?php
			if($alignment == 'right') : ?>
				<div class="flex-item accent-content-col wow animate__fadeIn">
					<?php echo get_sub_field( 'ai_content' ); ?>
				</div>
				<div class="flex-item accent-image-col">
					<?php
					if($is_round) : ?>
						<div class="accent-image" style="background-image: url(<?php echo $image['url']; ?>)">
						</div>
						<?php
						if($circle) :
							get_template_part( 'template-parts/svg', $circle );
						endif;
	
					else : ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php
					endif; ?>
				</div>
			<?php
			else : ?>
				<div class="flex-item accent-image-col">
					<?php
					if($is_round) : ?>
						<div class="accent-image" style="background-image: url(<?php echo $image['url']; ?>)">
						</div>
						<?php
						if($circle) :
							get_template_part( 'template-parts/svg', $circle );
						endif;
	
					else : ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php
					endif; ?>
				</div>
				<div class="flex-item accent-content-col wow animate__fadeIn">
					<?php echo get_sub_field( 'ai_content' ); ?>
				</div>
			<?php
			endif; ?>	
		</div>

	</div>
</section>