<?php
/**
 * The template for displaying all single team members
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Basis_Tech_2024
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/hero', 'team' );

			get_template_part( 'template-parts/content', 'team' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
