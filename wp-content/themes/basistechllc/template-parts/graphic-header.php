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
		
		case 'recipes' :
			if ( have_rows( 'recipe_imagery', 'option' ) ) :
				while ( have_rows( 'recipe_imagery', 'option' ) ) : the_row(); 
					$header = get_sub_field( 'default_recipe_header' );
				endwhile;
			endif;
		break;
		
		case 'menus' :
			if ( have_rows( 'menu_imagery', 'option' ) ) :
				while ( have_rows( 'menu_imagery', 'option' ) ) : the_row(); 
					$header = get_sub_field( 'default_menu_header' );
				endwhile;
			endif;
		break;
			
	endswitch;
endif;

if ( !$header ) :
	if ( have_rows( 'page_imagery', 'option' ) ) :
		while ( have_rows( 'page_imagery', 'option' ) ) : the_row(); 
			$header = get_sub_field( 'default_page_header' );
		endwhile;
	endif;
endif;

if($header) : ?>
	<div class="graphic-header parallax" style="background-image: url(<?php echo $header['url']; ?>)">
		<?php
		$artist = get_field('artist_name', $header['id']);
		if($artist) :
			$artist_url = get_field('artist_url', $header['id']); ?>
			<p class="graphic-caption">
				<?php 
				if($artist_url) : ?>
					<a href="<?php echo $artist_url; ?>" target="_blank">
				<?php
				endif; ?>
						<?php echo $artist; ?>
				<?php 
				if($artist_url) : ?>
					</a>
				<?php
				endif; ?>
			</p>
		<?php
		endif; ?> 
	</div>
<?php
endif; ?>