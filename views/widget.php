<?php

echo $before_widget;

if( $title ) echo $before_title . $title . $after_title;

	?><ul class="<?php echo $instance['menu_class']; ?>">
		<?php foreach( $galleries as $gallery ) { ?>
			<li class="<?php echo ( $gallery['current'] ) ? 'active' : '' ?>">
				<a href="<?php echo $gallery['permalink']; ?>">
					<?php echo $gallery['title']; ?>
					<?php if( $instance['show_count'] ) : ?><span class="gallery-count">(<?php echo $gallery['count']; ?>)</span><?php endif; ?>
				</a>
				<a class="rokbox_trigger" style="display: none !important;" href="<?php echo $gallery['rokbox_url'] ?>" rel="rokbox[<?php echo $instance['rokbox_size'] ?>]"></a>
				<?php if( $instance['show_bar'] ) : ?>
					<div class="progress progress-striped <?php echo ( $gallery['current'] ) ? 'active' : '' ?>">
						<div class="bar" style="width: <?php echo ( $gallery['count'] / $total_images ) * 100 ?>%;"></div>
					</div>
				<?php endif; ?>
			</li>
		<?php } ?>
	</ul><?php

echo $after_widget;

// a simple hack to make sure both clicking the gallery link and opening it in new tab works! :)
if( $instance['rokbox_popup'] ) : ?>
<script>
	$$('#<?php echo $this->id ?> a').addEvent('click', function(){
		this.getNext().fireEvent('click');
		return false;
	});
</script>
<?php endif; ?>