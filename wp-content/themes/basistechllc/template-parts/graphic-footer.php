<?php 
$footer = get_field( 'page_footer' );
if ( !$footer ) :
	$post_type = get_post_type();
	switch($post_type) :
		case 'post' :
			if ( have_rows( 'post_imagery', 'option' ) ) :
				while ( have_rows( 'post_imagery', 'option' ) ) : the_row(); 
					$footer = get_sub_field( 'default_post_footer' );
				endwhile;
			endif;
		break;
		
		case 'event' :
			if ( have_rows( 'event_imagery', 'option' ) ) :
				while ( have_rows( 'event_imagery', 'option' ) ) : the_row(); 
					$footer = get_sub_field( 'default_event_footer' );
				endwhile;
			endif;
		break;
		
		case 'team-member' :
			if ( have_rows( 'team_imagery', 'option' ) ) :
				while ( have_rows( 'team_imagery', 'option' ) ) : the_row(); 
					$footer = get_sub_field( 'default_team_footer' );
				endwhile;
			endif;
		break;
	endswitch;
endif;

if ( !$footer ) :
	if ( have_rows( 'page_imagery', 'option' ) ) :
		while ( have_rows( 'page_imagery', 'option' ) ) : the_row(); 
			$footer = get_sub_field( 'default_page_footer' );
		endwhile;
	endif;
endif;

if($footer) : ?>
	<div class="graphic-footer">
		<?php
		if ( is_home() || is_search() || is_archive() ) : ?>
			<div class="footer-cta">
				<?php echo do_shortcode( '[facetwp facet="blog_load_more"]' ); ?>
			</div>
		<?php
		elseif ( is_page_template( 'template-team.php' ) ) : ?>
			<div class="footer-cta">
				<?php echo do_shortcode( '[facetwp facet="team_load_more"]' ); ?>
			</div>
		<?php
		else :
			$footer_cta = get_field('footer_cta');
			if ( $footer_cta ) :
				$cta = $footer_cta['cta_text'];
				$link = $footer_cta['cta_link'];
				if($cta && $link) : 
					$is_new = $footer_cta['new_window'];
					if($is_new) :
						$target = "_blank";
					else :
						$target = "_self";
					endif;
					?>
						<div class="footer-cta">
							<a href="<?php echo $link; ?>" target="<?php echo $target; ?>" class="button button-large">
								<?php echo $cta; ?>
							</a>
						</div>
					<?php
				else :
					if( is_singular('post') ) :
						$page_for_posts = get_option( 'page_for_posts' );
						if($page_for_posts) : ?>
							<div class="footer-cta">
								<a href="<?php echo get_the_permalink($page_for_posts); ?>" class="button button-large">
									<?php _e('All News', 'basistechllc'); ?>
								</a>
							</div>
						<?php
						endif;
					elseif( is_singular('event') ) :
						$events_page = get_field('all_events_page', 'option');
						if($events_page) : ?>
							<div class="footer-cta">
								<a href="<?php echo $events_page; ?>" class="button button-large">
									<?php _e('All Events', 'basistechllc'); ?>
								</a>
							</div>
						<?php
						endif;
					elseif( is_singular('team-member') ) :
						$team_page = get_field('all_team_page', 'option');
						if($team_page) : ?>
							<div class="footer-cta">
								<a href="<?php echo $team_page; ?>" class="button button-large">
									<?php _e('View All', 'basistechllc'); ?>
								</a>
							</div>
						<?php
						endif;
					endif;
				endif;
			endif;
		endif; ?>
		<img src="<?php echo $footer['url']; ?>" alt="<?php echo $footer['alt']; ?>">
		<?php
		if($footer['caption']) : ?>
			<p class="graphic-caption">
				<?php echo $footer['caption']; ?>
			</p>
		<?php
		endif; ?> 
	</div>
<?php
endif; ?>