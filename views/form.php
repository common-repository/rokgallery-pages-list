<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
	<input class="widefat" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" value="<?php echo $instance['title'] ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'excludes' ); ?>">Excludes</label>
	<input class="widefat" type="text" name="<?php echo $this->get_field_name( 'excludes' ); ?>" id="<?php echo $this->get_field_id( 'excludes' ); ?>" value="<?php echo $instance['excludes'] ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'orderby' ); ?>">Order by</label>
	<select class="widefat" name="<?php echo $this->get_field_name( 'orderby' ); ?>" id="<?php echo $this->get_field_id( 'orderby' ); ?>">
		<option value="ID" <?php selected( $instance['orderby'], 'ID' ); ?>>ID</option>
		<option value="title" <?php selected( $instance['orderby'], 'title' ); ?>>Title</option>
		<option value="rand" <?php selected( $instance['orderby'], 'rand' ); ?>>Random</option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'order' ); ?>">Order</label>
	<select class="widefat" name="<?php echo $this->get_field_name( 'order' ); ?>" id="<?php echo $this->get_field_id( 'order' ); ?>">
		<option value="ASC" <?php selected( $instance['order'], 'ASC' ); ?>>ASC</option>
		<option value="DESC" <?php selected( $instance['order'], 'DESC' ); ?>>DESC</option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'menu_class' ); ?>">Menu class</label>
	<input class="widefat" type="text" name="<?php echo $this->get_field_name( 'menu_class' ); ?>" id="<?php echo $this->get_field_id( 'menu_class' ); ?>" value="<?php echo $instance['menu_class'] ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'show_count' ); ?>">Show images count</label>
	<select class="widefat" name="<?php echo $this->get_field_name( 'show_count' ); ?>" id="<?php echo $this->get_field_id( 'show_count' ); ?>">
		<option value="1" <?php selected( $instance['show_count'], 1 ); ?>>Yes</option>
		<option value="0" <?php selected( $instance['show_count'], 0 ); ?>>No</option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'show_bar' ); ?>">Show ratio bar</label>
	<select class="widefat" name="<?php echo $this->get_field_name( 'show_bar' ); ?>" id="<?php echo $this->get_field_id( 'show_bar' ); ?>">
		<option value="1" <?php selected( $instance['show_bar'], 1 ); ?>>Yes</option>
		<option value="0" <?php selected( $instance['show_bar'], 0 ); ?>>No</option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'rokbox_popup' ); ?>">Open galleries in RokBox popups</label>
	<select class="widefat" name="<?php echo $this->get_field_name( 'rokbox_popup' ); ?>" id="<?php echo $this->get_field_id( 'rokbox_popup' ); ?>">
		<option value="1" <?php selected( $instance['rokbox_popup'], 1 ); ?>>Yes</option>
		<option value="0" <?php selected( $instance['rokbox_popup'], 0 ); ?>>No</option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'rokbox_size' ); ?>">RokBox size</label>
	<input class="widefat" type="text" name="<?php echo $this->get_field_name( 'rokbox_size' ); ?>" id="<?php echo $this->get_field_id( 'rokbox_size' ); ?>" value="<?php echo $instance['rokbox_size'] ?>" />
</p>
