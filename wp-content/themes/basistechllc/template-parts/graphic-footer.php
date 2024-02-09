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