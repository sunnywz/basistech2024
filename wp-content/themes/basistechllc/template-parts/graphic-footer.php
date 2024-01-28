<?php $page_footer = get_field( 'page_footer' ); ?>
<?php if ( $page_footer ) : ?>
	<img src="<?php echo esc_url( $page_footer['url'] ); ?>" alt="<?php echo esc_attr( $page_footer['alt'] ); ?>" />
<?php endif; ?>

<?php if ( have_rows( 'page_imagery', 'option' ) ) : ?>
	<?php while ( have_rows( 'page_imagery', 'option' ) ) : the_row(); ?>
	<?php endwhile; ?>
<?php endif; ?>
<?php if ( have_rows( 'event_imagery', 'option' ) ) : ?>
	<?php while ( have_rows( 'event_imagery', 'option' ) ) : the_row(); ?>
	<?php endwhile; ?>
<?php endif; ?>
<?php if ( have_rows( 'team_imagery_copy', 'option' ) ) : ?>
	<?php while ( have_rows( 'team_imagery_copy', 'option' ) ) : the_row(); ?>
		<?php $default_portfolio_header = get_sub_field( 'default_portfolio_header' ); ?>
		<?php if ( $default_portfolio_header ) : ?>
			<img src="<?php echo esc_url( $default_portfolio_header['url'] ); ?>" alt="<?php echo esc_attr( $default_portfolio_header['alt'] ); ?>" />
		<?php endif; ?>
		<?php $default_portfolio_footer = get_sub_field( 'default_portfolio_footer' ); ?>
		<?php if ( $default_portfolio_footer ) : ?>
			<img src="<?php echo esc_url( $default_portfolio_footer['url'] ); ?>" alt="<?php echo esc_attr( $default_portfolio_footer['alt'] ); ?>" />
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
