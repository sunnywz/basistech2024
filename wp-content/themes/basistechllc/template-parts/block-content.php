<?php
$bgcolor = get_sub_field( 'cb_block_basics_background_color' );
$classes = get_sub_field( 'cb_block_basics_custom_classes' );
$anchor = get_sub_field( 'cb_block_basics_section_anchor' );
$mode = get_sub_field( 'cb_display_mode' );
$container_class = 'inner';
if($mode == 'narrow') :
	$container_class = 'inner-skinny';
elseif($mode == 'medium') :
	$container_class = 'inner-medium';
endif;
$order = get_sub_field( 'cb_mobile_order' ); ?>

<section class="builder-block block-content background-<?php echo $bgcolor . ' ' . $classes; ?>" <?php if($anchor) echo 'id="' . $anchor . '"'; ?>>
	<div class="<?php echo $container_class; ?>">
	
		<?php
		if(str_contains($classes, 'home-intro')) : ?>
			<div class="yellow-circle"></div>
		<?php
		endif; ?>
	
		<?php
		$section_title = get_sub_field( 'cb_section_title' );
		$title_size = get_sub_field( 'cb_title_size' );
		if($section_title) : ?>
			<h2 class="section-title <?php echo $title_size; ?> wow animate__fadeIn">
				<?php echo $section_title; ?>
			</h2>
		<?php
		endif;
		
		if($mode == 'single' || $mode == 'narrow' || $mode == 'medium') : ?>
			<div class="wow animate__fadeIn">
				<?php echo get_sub_field( 'cb_content' ); ?>
			</div>
		<?php
		elseif($mode == 'three') : ?>
			<div class="block-content-flex flex-<?php echo $mode; ?>">
				<div class="flex-item wow animate__fadeIn">
					<?php echo get_sub_field( 'cb_content' ); ?>
				</div>
				<div class="flex-item wow animate__fadeIn" data-wow-delay="0.1s">
					<?php echo get_sub_field( 'cb_content_column_2' ); ?>
				</div>
				<div class="flex-item wow animate__fadeIn" data-wow-delay="0.2s">
					<?php echo get_sub_field( 'cb_content_column_3' ); ?>
				</div>
			</div>
		<?php
		else : ?>
			<div class="block-content-flex flex-<?php echo $mode; ?> flex-<?php echo $order; ?>">
				<div class="flex-item wow animate__fadeIn">
					<?php echo get_sub_field( 'cb_content' ); ?>
				</div>
				<div class="flex-item wow animate__fadeIn" data-wow-delay="0.1s">
					<?php echo get_sub_field( 'cb_content_column_2' ); ?>
				</div>
			</div>
		<?php
		endif; ?>

	</div>
</section>