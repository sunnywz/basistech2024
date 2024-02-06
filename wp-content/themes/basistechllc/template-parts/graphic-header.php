<?php 
$header = get_field( 'page_header' );
if ( !$header ) :
	$post_type = get_post_type();
	switch($post_type) :
		case 'post' :
			if ( have_rows( 'post_imagery', 'option' ) ) :
				while ( have_rows( 'post_imagery', 'option' ) ) : the_row(); 
					$header = get_sub_field( 'default_post_header' );
				endwhile;
			endif;
		break;
		
		case 'event' :
			if ( have_rows( 'event_imagery', 'option' ) ) :
				while ( have_rows( 'event_imagery', 'option' ) ) : the_row(); 
					$header = get_sub_field( 'default_event_header' );
				endwhile;
			endif;
		break;
		
		case 'team-member' :
			if ( have_rows( 'team_imagery', 'option' ) ) :
				while ( have_rows( 'team_imagery', 'option' ) ) : the_row(); 
					$header = get_sub_field( 'default_team_header' );
				endwhile;
			endif;
		break;
		
		case 'page' :
		default : 
			if ( have_rows( 'page_imagery', 'option' ) ) :
				while ( have_rows( 'page_imagery', 'option' ) ) : the_row(); 
					$header = get_sub_field( 'default_page_header' );
				endwhile;
			endif;
		break;
	
	endswitch;
endif;

if($header) : ?>
	<div class="graphic-header">
		 <img class="simple-parallax" src="<?php echo $header['url']; ?>" alt="<?php echo $header['alt']; ?>">
	</div>
<?php
endif; ?>