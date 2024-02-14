<?php
$args = array(	'post_type'		=>		'team-member',
				'post_status'	=>		'publish',
				'orderby'		=>		'menu_order',
				'order'			=>		'ASC',
				'posts_per_page'=>		9,
				'facetwp'		=>		true
			);
if(is_singular( 'team-member' )) :
	$args['posts_per_page'] = 6;
endif;
$loop = new WP_Query($args);
if ( $loop->have_posts() ) : ?>
	
	<section class="builder-block background-blue">
		<div class="inner">
			<div class="team-flex">
				<?php
				/* Start the Loop */
				while ( $loop->have_posts() ) : $loop->the_post();
					$headshot = get_field('management_headshot');
					$position = get_field('management_title'); ?>
					<div class="team-item clickable-div">
						<?php
						if($headshot) : ?>
							<div class="team-headshot">
								<img src="<?php echo $headshot['url']; ?>" alt="<?php echo $headshot['alt']; ?>" />
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
								<h3><?php echo $position; ?></h3>
							<?php
							endif; ?>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_query(); ?>
			</div>
		</div>
	</section>

<?php	
endif;
?>