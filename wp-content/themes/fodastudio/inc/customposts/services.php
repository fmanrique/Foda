<?php

add_action( 'init', 'create_post_type_services' );

function create_post_type_services() {
	register_post_type( 'services',
		array(
			'labels' => array(
				'name' => __( 'Services' ),
				'add_new_item' => __( 'Add a Service' ),
				'new_item' => __( 'New' ),
				'edit_item' => __( 'Edit Service' ),
				'view_item' => __( 'View Services' ),
				'singular_name' => __( 'Service' )
			),
			'menu_icon' => 'dashicons-lightbulb',
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'services'),
			'supports' => array( 'revisions','title')
		)
	);

	add_post_type_support('services', 'page-attributes' );
}

function get_services($posts_per_page = -1){
	$args = array(
	'post_type'  => 'services',
	'posts_per_page'  => $posts_per_page,
	'order'           => 'ASC',
	'orderby' 		  => 'menu_order',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_status'     => 'publish',
	'suppress_filters' => true );

	$data = get_posts($args);
	$items = array();

	foreach($data as $service) {
		$id = $service->ID;

		$item['id'] = $id;
		$item['title'] = $service->post_title;
		$item['description'] = get_field('services_description',$id);

		
		$items[] = $item;
	}


	return $items;
}


function get_service($id){
  	$service = get_post($id);
  	$items = NULL;

	$item['id'] = $id;
	$item['title'] = $service->post_title;
	$item['description'] = get_field('services_description',$id);

	return $item;
}

add_filter('manage_services_posts_columns', 'get_services_columns');
function get_services_columns($columns) {
    $columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Service' ),
		'description' => __( 'Description' ),
		'date' => __( 'Create Date' ),
		'author' => __( 'Author' )
	);

	return $columns;
}
