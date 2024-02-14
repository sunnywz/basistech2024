<?php
$display_page_title = get_field('display_page_title');
if($display_page_title) :
	$title = get_field('alternate_page_title');
	if(!$title) $title = get_the_title();
	if($title) : ?>
	<section class="archive-title">
		<div class="inner">
			<h1 class="page-title">
				<?php echo $title; ?>
			</h1>
		</div>
	</section>
	<?php
	endif;
endif; ?>