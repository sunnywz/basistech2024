<section class="archive-title">
	<div class="inner">
		<?php 
		$team_title = get_field('team_page_title', 'option');
		if($team_title) : ?>
			<h1 class="page-title">
				<?php echo $team_title; ?>
			</h1>		
			<?php
		endif; ?>
	</div>
</section>

<section class="builder-block">
	<div class="inner">
		<?php
		$headshot = get_field('management_headshot');
		$position = get_field('management_title'); ?>
		<div class="team-hero-flex">
			<?php
			if($headshot) : ?>
				<div class="team-hero-headshot">
					<img src="<?php echo $headshot['url']; ?>" alt="<?php echo $headshot['alt']; ?>" />
					<h2><?php echo get_the_title(); ?></h2>
					<?php
					if($position) :	?>
						<h3><?php echo $position; ?></h3>
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
				</div>
			<?php
			endif; ?>
			<div class="team-hero-content">
				<h2><small><?php echo get_the_title(); ?></small></h2>
				<?php
				if($position) :	?>
					<h3><small><?php echo $position; ?></small></h3>
				<?php
				endif; ?>
				<?php the_content(); ?>
			</div>
		</div>
		
	</div>
</section>