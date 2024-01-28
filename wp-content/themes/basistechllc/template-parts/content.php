<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Basis_Tech_2024
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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

</article><!-- #post-<?php the_ID(); ?> -->
