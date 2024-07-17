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
		
			<div class="footer-top footer-flex">
			
				<div class="footer-imagery">
					<div class="footer-logo">
						<?php 
						$footer_logo = get_field( 'footer_logo', 'option' );
						if ( $footer_logo && isset($footer_logo['url']) && isset($footer_logo['alt'] ) ) : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( $footer_logo['alt'] ); ?>" />
							</a>
						<?php 
						endif; ?>
					</div>
					<?php 
					if ( have_rows( 'social_channels', 'option' ) ) : ?>
						<div class="footer-social">
							<ul class="social-icons">
								<?php 
								while ( have_rows( 'social_channels', 'option' ) ) : the_row(); 
									$name = get_sub_field( 'social_name' );
									$icon = get_sub_field( 'social_icon' );
									$url = get_sub_field( 'social_url' );
									if($name && $icon && $url) : ?>
										<li>
											<a href="<?php echo $url; ?>" target="_blank">
												<?php echo $icon; ?>
												<span class="screen-reader-text">
													<?php echo $name; ?>
												</span>
											</a>
										</li>	
									<?php
									endif;
								endwhile; ?>
							</ul>
						</div>
					<?php 
					endif; ?>
				</div>

				<div class="footer-colophon">
					<?php echo get_field( 'footer_colophon', 'option' ); ?>
				</div>
				
			</div>
			
			<div class="footer-copyright">
				<?php echo get_field( 'footer_copyright', 'option' ); ?>
			</div>
				
		
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
