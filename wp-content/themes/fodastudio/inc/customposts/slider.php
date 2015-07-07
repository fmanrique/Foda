<?php

add_action( 'init', 'create_post_type_sliders' );

function create_post_type_sliders() {
	register_post_type( 'sliders',
		array(
			'labels' => array(
				'name' => __( 'Home Slider' ),
				'add_new_item' => __( 'Add a Slide' ),
				'new_item' => __( 'New' ),
				'edit_item' => __( 'Edit Slide' ),
				'view_item' => __( 'View Slide' ),
				'singular_name' => __( 'Slider' )
			),
			'menu_icon' => 'dashicons-images-alt',
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'sliders'),
			'supports' => array( 'revisions','title')
		)
	);

	add_post_type_support('sliders', 'page-attributes' );
}

function get_sliders($posts_per_page = -1){
	$args = array(
	'post_type'  => 'sliders',
	'posts_per_page'  => $posts_per_page,
	'order'           => 'ASC',
	'orderby' 		  => 'menu_order',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_status'     => 'publish',
	'suppress_filters' => true );

	$data = get_posts($args);
	$items = array();

	foreach($data as $slider) {
		$id = $slider->ID;

		$item['id'] = $id;
		$item['title'] = $slider->post_title;
		$item['header_title'] = get_field('sliders_title',$id);
		$item['header_subtitle'] = get_field('sliders_subtitle',$id);
		$item['header_color'] = get_field('sliders_fontcolor',$id);
		$item['header_color_hover'] = get_field('sliders_fontcolorhover',$id);
		$item['image'] = get_field('sliders_picture',$id);
		$item['url'] = get_field('sliders_url',$id);
		

		
		$items[] = $item;
	}


	return $items;
}


function get_slider($id){
  	$slider = get_post($id);
  	$items = NULL;

	$item['id'] = $id;
	$item['title'] = $slider->post_title;
	$item['header_title'] = get_field('sliders_title',$id);
	$item['header_subtitle'] = get_field('sliders_subtitle',$id);
	$item['header_color'] = get_field('sliders_fontcolor',$id);
	$item['header_color_hover'] = get_field('sliders_fontcolorhover',$id);
	$item['image'] = get_field('sliders_image',$id);
	$item['url'] = get_field('sliders_url',$id);

	return $item;
}

add_filter('manage_sliders_posts_columns', 'get_sliders_columns');
function get_sliders_columns($columns) {
    $columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Slider Name' ),
		'header_title' => __( 'Title' ),
		'header_subtitle' => __( 'Subtitle' ),
		'date' => __( 'Create Date' ),
		'author' => __( 'Author' )
	);

	return $columns;
}

add_action('manage_sliders_posts_custom_column', 'sliders_columns_content', 10, 2);
function sliders_columns_content($column_name, $post_ID) {
	$slider = get_slider($post_ID);

	if ($column_name == 'header_title') {
		$service = $slider['header_title'];
		if ($service) {
			echo $service;
		}
	}

	if ($column_name == 'header_subtitle') {
		$service = $slider['header_subtitle'];
		if ($service) {
			echo $service;
		}
	}

}


add_filter('manage_edit-sliders_sortable_columns', 'sliders_sortable_columns' );
function sliders_sortable_columns( $columns ) {

	return $columns;
}

add_action('load-edit.php', 'edit_sliders_load');
function edit_sliders_load() {
	add_filter( 'request', 'sort_sliders' );
}

function sort_sliders( $vars ) {
	if ( isset( $vars['post_type'] ) && 'sliders' == $vars['post_type'] ) {
		if ( isset( $vars['orderby'] ) && 'header_title' == $vars['orderby'] ) {
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => 'sliders_title',
					'orderby' => 'meta_value'
				)
			);
		}

		if ( isset( $vars['orderby'] ) && 'header_subtitle' == $vars['orderby'] ) {
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => 'sliders_subtitle',
					'orderby' => 'meta_value'
				)
			);
		}

	}

	return $vars;
}


