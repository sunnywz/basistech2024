<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Basis_Tech_2024
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="archive-title">
		<div class="inner">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			<p class="post-date">
				<?php 
				if(function_exists('pll_current_language')) :
					$language = pll_current_language();	
					if($language == 'ja') :
						the_date( 'Y年n月j日' );
					else :
						the_date( 'F d, Y' ); 
					endif;
					
				else :
					the_date( 'F d, Y' ); 
					
				endif;
				?>
			</p>
		</div>
	</section>

	<?php 
	if ( have_rows( 'page_content_rows' ) ):
		while ( have_rows( 'page_content_rows' ) ) : the_row();
			
			if ( get_row_layout() == 'plain_content_block' ) :
				get_template_part( 'template-parts/block', 'content' );
			
			elseif ( get_row_layout() == 'portfolio_block' ) :
				get_template_part( 'template-parts/block', 'portfolio' );
			
			elseif ( get_row_layout() == 'events_block' ) :
				get_template_part( 'template-parts/block', 'events' );
			
			endif;
			
		endwhile;
	endif; ?>

	<?php
	$news_type = get_field('news_type');
	if( $news_type == 'external' || $news_type == 'download' ) : ?>
		<section class="builder-block">
			<div class="inner">
				<?php
				switch($news_type) :
					case 'external' :
						the_excerpt();
						$link = get_field('news_external_link');
						echo '<p><a href="' . $link . '" target="_blank" class="button">';
						_e('Learn More', 'basistechllc');
						echo '</a></p>';
						break;
					case 'download' :
						the_excerpt();
						$link = get_field('news_document');
						echo '<p><a href="' . $link . '" target="_blank" class="button">';
						_e('Download', 'basistechllc');
						echo '</a></p>';
						break;
				endswitch; ?>
			</div>
		</section>
	<?php
	endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
