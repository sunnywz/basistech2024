<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Basis_Tech_2024
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="inner">

			<section class="archive-title error-404 not-found">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'basistechllc' ); ?></h1>
			</section><!-- .page-header -->
	
			<section class="builder-block page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'basistechllc' ); ?></p>
				<?php get_search_form();?>	
			</section><!-- .error-404 -->

		</div>
	</main><!-- #main -->

<?php
get_footer();
