<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Basis_Tech_2024
 */

?>

	<?php get_template_part( 'template-parts/graphic', 'footer' ); ?>

	<footer id="colophon" class="site-footer">
		<div class="inner">
		
			<div class="footer-flex footer-top">
				<div class="footer-menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'menu_id'        => 'footer-menu',
							'depth'			 => 2
						)
					);
					?>
				</div>
				<div class="footer-colophon">
					<?php echo get_field( 'footer_colophon', 'option' ); ?>
				</div>
			</div>
			
			<div class="footer-flex footer-bottom">
				<div class="footer-copyright">
					<?php echo get_field( 'footer_copyright', 'option' ); ?>
				</div>
				<div class="footer-logo">
					<?php 
					$footer_logo = get_field( 'footer_logo', 'option' );
					if ( $footer_logo ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( $footer_logo['alt'] ); ?>" />
						</a>
					<?php 
					endif; ?>
				</div>
			</div>
		
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
