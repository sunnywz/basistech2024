<section class="builder-block">
	<div class="inner">
		<?php
		$headshot = get_field('management_headshot');
		$position = get_field('management_title'); ?>
		<div class="team-hero-flex">
			<?php
			if($headshot) : ?>
				<div class="team-hero-headshot wow animate__fadeIn">
					<img src="<?php echo $headshot['url']; ?>" alt="<?php echo $headshot['alt']; ?>" />
				</div>
			<?php
			endif; ?>
			<div class="team-hero-content">
				<h1 class="page-title wow animate__fadeIn">
					<?php echo get_the_title(); ?>
				</h1>
				<?php
				if($position) :	?>
					<h2><?php echo $position; ?></h2>
				<?php
				endif; ?>
				<?php
				if(have_rows('social_media_channels')) : ?>
					<div class="social-links"><?php
						while(have_rows('social_media_channels')) : the_row();
							$icon = get_sub_field('social_media_icon');
							$link = get_sub_field('social_media_url');
							if($icon && $link) : ?>
								<a href="<?php echo $link; ?>" target="_blank">
									<?php echo $icon; ?>
								</a><?php
							endif;
						endwhile; ?>
					</div><?php
				endif; ?>
				<?php the_content(); ?>
			</div>
		</div>
		
	</div>
</section>