<?php
/*
Plugin Name:    RokGallery Pages List
Description:    A widget to list your RokGallery galleries.
Author:         Hassan Derakhshandeh
Version:        0.1.1

		This program is free software; you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation; either version 2 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program; if not, write to the Free Software
		Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class RokGallery_Pages_Lists extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'widget_rokgalleries_list', 'description' => __('List your RokGallery Pages.') );
		parent::__construct( 'rokgalleries_list', __('RokGallery Pages List'), $widget_ops, null );
		self::hooks();
	}

	public static function hooks() {
		add_action( 'template_redirect', array( __CLASS__, 'handle_rokbox_popup_view' ) );
	}

	function widget( $args, $instance ) {
		global $post, $wp;

		extract( $args );
		$instance = wp_parse_args( $instance, $this->get_defaults() );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$query = array( 'post_type' => 'rokgallery', 'posts_per_page' => -1, 'orderby' => $instance['orderby'], 'order' => $instance['order'] );
		$active_gallery = $post->ID;

		if( isset( $instance['excludes'] ) )
			$query['post__not_in'] = explode( ',', $instance['excludes'] );
		$query = new WP_Query( $query );

		$galleries = array();
		$total_images = 0;

		if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
			$gallery_id = get_post_meta( get_the_ID(), 'gallery_id', true );
			$count = $this->gallery_get_count( $instance, $gallery_id );
			$total_images += $count;
			$galleries[] = array(
				'id' => get_the_ID(),
				'title' => get_the_title(),
				'permalink' => get_permalink(),
				'rokbox_url' => add_query_arg( array( 'rokgallery_rokbox' => 1 ), get_permalink() ),
				'description' => get_the_content(),
				'gallery_id' => $gallery_id,
				'count' => $count,
				'current' => ( $wp->query_vars['post_type'] == 'rokgallery' && $active_gallery == get_the_ID() ) ? true : false,
			);
		endwhile; endif;
		wp_reset_postdata();

		include( $this->get_view( 'widget' ) );
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->get_defaults() );
		require( $this->get_view( 'form' ) );
	}

	function register() {
		register_widget( __CLASS__ );
	}

	function get_view( $template ) {
		// whether or not .php was added
		$template_slug = rtrim( $template, '.php' );
		$template = $template_slug . '.php';

		if ( $theme_file = locate_template( array( 'html/rokgallery-pages-list/' . $template ) ) ) {
			$file = $theme_file;
		} else {
			$file = dirname( __FILE__ ) . '/views/' . $template;
		}
		return $file;
	}

	function gallery_get_count( $instance, $gallery_id ) {
		$count = get_transient( "rokgallery_gallery_count_{$gallery_id}" );
		if( false == $count ) {
			$instance['gallery_id'] = $gallery_id;
			$instance['limit_count'] = 0;
			$widget_slices = new RokGallery_Widgets_Slices();
			$count = count( $widget_slices->getSlices( $instance ) );
			set_transient( "rokgallery_gallery_count_{$gallery_id}", $count, DAY_IN_SECONDS );
		}
		return $count;
	}

	function get_defaults() {
		return array(
			'title' => '',
			'menu_class' => 'menu',
			'orderby' => 'title',
			'order' => 'ASC',
			'show_count' => 1,
			'show_bar' => 1,
			'rokbox_popup' => 0,
			'rokbox_size' => '75% 85%',
		);
	}

	public static function handle_rokbox_popup_view() {
		if( isset( $_GET['rokgallery_rokbox'] ) && $_GET['rokgallery_rokbox'] == 1 ) {
			show_admin_bar( false );
			wp_enqueue_script( 'popup-fix', plugins_url( 'assets/popup_fix.js', __FILE__ ), array( 'rok_mootools_js' ), '0.1.1' );
			include( self::get_view( 'rokbox' ) );
			die;
		}
	}
}

add_action( 'widgets_init', array( 'RokGallery_Pages_Lists', 'register' ) );