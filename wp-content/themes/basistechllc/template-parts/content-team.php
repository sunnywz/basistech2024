<?php
$args = array(	'post_type'		=>		'team-member',
				'post_status'	=>		'publish',
				'orderby'		=>		'rand',
				'posts_per_page'=>		-1,
				'facetwp'		=>		true
			);
$loop = new WP_Query($args);
if ( $loop->have_posts() ) : ?>

	<section class="builder-block background-blue <?php if(is_page_template('template-team.php')) echo 'block-spacing-top-none'; ?>">
		<div class="inner">
			
			<?php
			if(get_post_type() == 'team-member') : ?>
				<?php 
				$team_title = get_field('team_page_title', 'option');
				if($team_title) : ?>
					<h1 class="page-title wow animate__fadeIn">
						<?php echo $team_title; ?>
					</h1>		
					<?php
				endif; ?>
			<?php
			endif; ?>
			
			<?php
			$team_page = get_field('all_team_page', 'option');
			$content = get_post_field('post_content', url_to_postid($team_page));
			if($content) : ?>
				<div class="team-intro" style="margin-bottom: 1.5rem;">
					<?php echo $content; ?>
				</div>
			<?php
			endif; ?>
			
			<div class="team-sort">
				<?php echo do_shortcode('[facetwp facet="team_sort"]'); ?>
			</div>
			
			<div class="team-flex <?php if($_GET['_team_sort'] == NULL) echo 'shuffle-team'; ?>">
				<?php
				$i = 1;
				/* Start the Loop */
				while ( $loop->have_posts() ) : $loop->the_post();
					$headshot = get_field('management_headshot');
					$position = get_field('management_title'); ?>
					<div class="team-item wow animate__fadeIn" data-wow-delay="<?php echo $i * 0.05; ?>s">
						<?php
						if($headshot) : ?>
							<div class="team-headshot">
								<a href="<?php echo get_the_permalink(); ?>">
									<img src="<?php echo $headshot['url']; ?>" alt="<?php echo $headshot['alt']; ?>" />
								</a>
							</div>
						<?php
						endif; ?>
						<div class="team-title">
							<h2>
								<a href="<?php echo get_the_permalink(); ?>">
									<?php echo get_the_title(); ?>
								</a>		
							</h2>
							<?php
							if($position) :	?>
								<h3>
									<a href="<?php echo get_the_permalink(); ?>">
										<?php echo $position; ?>
									</a>
								</h3>
							<?php
							endif; ?>
						</div>
					</div>
					<?php
					if($i % 4 == 0) :
						$i = 1;
					else :
						$i++;
					endif;
				endwhile;
				wp_reset_query(); ?>
			</div>
		</div>
	</section>

<?php	
endif;
?>