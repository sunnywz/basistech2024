<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
			
			<?php 
			$page_for_posts = get_option( 'page_for_posts' );
			if($page_for_posts) :
				$title = get_the_title($page_for_posts);
			endif;
			if($title) : ?>
				<section class="archive-title">
					<div class="inner">
						<h1 class="page-title">
							<?php echo $title; ?>
						</h1>
					</div>
				</section>
			<?php
			endif; ?>
			
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
