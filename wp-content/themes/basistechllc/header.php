<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Basis_Tech_2024
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'basistechllc' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="inner">
			<div class="site-header-flex">
				<div class="site-branding">	
					<?php 
					$header_logo = get_field( 'header_logo', 'option' );
					if ( $header_logo ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo esc_url( $header_logo['url'] ); ?>" alt="<?php echo esc_attr( $header_logo['alt'] ); ?>" />
						</a>
					<?php 
					endif; ?>
				</div><!-- .site-branding -->
		
				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle hamburger hamburger--squeeze" aria-controls="primary-menu" aria-expanded="false">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
						<span class="screen-reader-text">
							<?php esc_html_e( 'Main Menu', 'basistechllc' ); ?>
						</span>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'depth'			 => 2
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->


	<?php get_template_part( 'template-parts/graphic', 'header' ); ?>