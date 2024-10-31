<!DOCTYPE html>
<html>
<head>
	<?php wp_head(); ?>
</head>
<body>

	<div style="margin: 0 25px;"><!-- the margin removes the unnecessary scrollbars -->
	<?php
		if( have_posts() ) : while( have_posts() ) : the_post();

			the_content();

		endwhile; endif;
	?>
	</div>

<?php wp_footer(); ?>
</body>
</html>