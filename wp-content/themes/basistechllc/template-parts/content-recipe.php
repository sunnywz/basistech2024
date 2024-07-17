<?php
$featured = get_the_post_thumbnail_url();
?>

<section class="builder-block background-pale-blue block-spacing-bottom-double recipe-hero-container <?php if(!$featured) echo 'no-image'; ?> wow animate__fadeIn">
	<div class="inner">
		<h1><?php echo get_the_title(); ?></h1>
		<div class="recipe-hero-flex block-content-flex flex-50-50">
			<?php				
			if($featured) : ?>
				<div class="flex-item recipe-hero-image">
					<svg id="uuid-42432556-bd3e-48b6-9fc5-9107b868596f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 394 350" preserveAspectRatio="none">
					    <defs>
					        <style>.uuid-66b9f596-5904-41b1-9b61-569f5e0a0816{fill:#fff;stroke-width:0px;}</style>
					    </defs>
					    <g id="uuid-f9776a83-c75f-493a-8c8b-3aef70c316a6">
					        <path class="uuid-66b9f596-5904-41b1-9b61-569f5e0a0816" d="M1.69,13.72C3.74,10.33,6.31,6.08,9.98,0c1.1,4.77,1.77,7.64,2.81,12.17h383.75c.47,1.08.95,2.16,1.42,3.23-11.89,1.62-9.41,9.9-9.41,16.84-.05,101.13-.03,202.27-.06,303.4,0,4.03-.42,8.06-.65,12.09-.88.16-1.77.32-2.65.48-.75-2.32-2.02-4.62-2.17-6.98-2.77-45.26-7.14-90.5-7.64-135.78-.67-60.25,1.71-120.53,2.77-180.8.03-1.87,0-3.75,0-7.01-4.7,0-8.78-.02-12.86,0-108.91.65-217.81,1.34-326.72,1.88-5.39.03-10.8-1.24-16.19-1.95-7.46-.98-11.01.97-10.89,9.76.52,37.27.29,74.55.34,111.83.08,59.96.3,119.92.06,179.89-.04,8.65,3.2,11.46,11.3,11.47,30.47.06,60.93.51,91.4.68,84.88.45,169.77.81,254.65,1.29,2.79.02,5.58.94,8.36,1.45-.1,1.17-.2,2.34-.3,3.51-125.65,2.52-251.29,5.05-376.94,7.57-.13-1.47-.26-2.95-.38-4.42,6.59-.58,13.18-1.4,19.79-1.67,7.09-.29,14.21-.07,21.31-.07.06-1.05.13-2.1.19-3.14-12.87-.62-25.74-1.24-37.54-1.81,1.03-6.36,2.49-11.13,2.45-15.88-.66-90.4-1.53-180.8-2.26-271.19-.05-6.47,1.03-12.96.78-19.41-.17-4.21-1.8-8.36-3.04-13.71ZM380.89,235.21c.7,0,1.4,0,2.09,0v-126h-2.09v126Z"/>
					    </g>
					</svg>
					<img src="<?php echo $featured; ?>" alt="<?php echo get_the_title(); ?>" />
				</div>
			<?php
			endif; ?>
			<div class="flex-item recipe-ingredients">
				<?php echo get_field( 'ingredients' ); ?>
			</div>
		</div>
	</div>
</section>

<section class="builder-block block-spacing-top-double recipe-instructions wow animate__fadeIn">
	<div class="inner">
		<?php echo get_field( 'instructions' ); ?>
	</div>
</section>