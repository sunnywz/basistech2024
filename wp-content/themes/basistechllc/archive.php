<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Basis_Tech_2024
 */

get_header();
?>

	<main id="primary" class="site-main">
		
		<?php
		if ( have_posts() ) : ?>
			
			<section class="archive-title">
				<div class="inner">
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				</div>
			</section>
			
			<section class="builder-block">
				<div class="inner">
					<div class="flex-cards">
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
			
							get_template_part( 'template-parts/card', get_post_type() );
			
						endwhile; ?>
					</div>
				</div>
			</section>

		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
