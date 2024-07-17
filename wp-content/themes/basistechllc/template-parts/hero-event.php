<section class="builder-block event-hero-container wow animate__fadeIn">
	<div class="inner">
		<h1><?php echo get_the_title(); ?></h1>
		<div class="event-hero-flex block-content-flex flex-67-33">
			<?php
			$event_image = get_field( 'event_logo' );
			if($event_image) :
				$event_image = $event_image['url'];
			else :
				$event_image = get_the_post_thumbnail_url();	
			endif;
			if($event_image) : ?>
				<div class="flex-item event-hero-image">
					<img src="<?php echo $event_image; ?>" alt="<?php echo get_the_title(); ?>" />
				</div>
			<?php
			endif; ?>
			<div class="flex-item event-hero-details">
				<?php echo get_field( 'event_location' ); ?>
				<hr />
				<p><?php echo get_field( 'event_display_date' ); ?></p>
				<?php 
				$event_btn_text = get_field('event_btn_text');
				$event_url = get_field('event_url'); 
				if($event_btn_text && $event_url) : ?>
					<hr />
					<p class="text-center" style="margin-bottom: 0.5rem;">
						<a class="button" href="<?php echo $event_url; ?>" target="_blank">
							<?php echo $event_btn_text; ?>
						</a>
					</p>
				<?php 
				endif; ?>
			</div>
		</div>
	</div>
</section>