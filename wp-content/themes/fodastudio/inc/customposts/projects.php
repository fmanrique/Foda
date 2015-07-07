<?php

add_action( 'init', 'create_post_type_projects' );

function create_post_type_projects() {
	register_post_type( 'projects',
		array(
			'labels' => array(
				'name' => __( 'Projects' ),
				'add_new_item' => __( 'Add a Project' ),
				'new_item' => __( 'New' ),
				'edit_item' => __( 'Edit Project' ),
				'view_item' => __( 'View Projects' ),
				'singular_name' => __( 'Project' )
			),
			'menu_icon' => 'dashicons-portfolio',
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'projects'),
			'supports' => array( 'revisions','title')
		)
	);

	add_post_type_support('projects', 'page-attributes' );
}

function get_projects($posts_per_page = -1){
	$args = array(
	'post_type'  => 'projects',
	'posts_per_page'  => $posts_per_page,
	'order'           => 'ASC',
	'orderby' 		  => 'menu_order',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_status'     => 'publish',
	'suppress_filters' => true );

	$data = get_posts($args);
	$items = array();

	foreach($data as $project) {
		$id = $project->ID;

		$item['id'] = $id;
		$item['title'] = $project->post_title;
		$item['permalink'] = get_permalink($id);
		$item['image'] = get_field('projects_preview_image',$id);
		$item['description'] = get_field('projects_description',$id);
		$item['principalservice'] = get_field('projects_principal_service',$id);
		$item['brief'] = get_field('projects_brief',$id);
		$item['services'] = get_field('projects_services',$id);
		$item['team'] = get_field('projects_team',$id);
		$item['gallery'] = get_field('projects_gallery',$id);

		
		$items[] = $item;
	}


	return $items;
}


function get_project($id){
  	$project = get_post($id);
  	$items = NULL;

	$item['id'] = $id;
	$item['title'] = $project->post_title;
	$item['permalink'] = get_permalink($id);
	$item['image'] = get_field('projects_preview_image',$id);
	$item['description'] = get_field('projects_description',$id);
	$item['principalservice'] = get_field('projects_principal_service',$id);
	$item['brief'] = get_field('projects_brief',$id);
	$item['services'] = get_field('projects_services',$id);
	$item['team'] = get_field('projects_team',$id);
	$item['gallery'] = get_field('projects_gallery',$id);

	return $item;
}

add_filter('manage_projects_posts_columns', 'get_projects_columns');
function get_projects_columns($columns) {
    $columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Project' ),
		'service' => __( 'Service' ),
		'description' => __( 'Description' ),
		'date' => __( 'Create Date' ),
		'author' => __( 'Author' )
	);

	return $columns;
}

add_action('manage_projects_posts_custom_column', 'projects_columns_content', 10, 2);
function projects_columns_content($column_name, $post_ID) {
	$project = get_project($post_ID);

	if ($column_name == 'service') {
		$service = $project['principalservice']->post_title;
		if ($service) {
			echo $service;
		}
	}

	if ($column_name == 'description') {
		$description = $project['description'];
		if ($description) {
			echo substr($description, 0, 50) . '...';
		}
	}
}


add_filter('manage_edit-projects_sortable_columns', 'projects_sortable_columns' );
function projects_sortable_columns( $columns ) {

	return $columns;
}

add_action('load-edit.php', 'edit_projects_load');
function edit_projects_load() {
	add_filter( 'request', 'sort_projects' );
}

function sort_projects( $vars ) {
	if ( isset( $vars['post_type'] ) && 'projects' == $vars['post_type'] ) {
		if ( isset( $vars['orderby'] ) && 'description' == $vars['orderby'] ) {
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => 'projects_description',
					'orderby' => 'meta_value'
				)
			);
		}

		if ( isset( $vars['orderby'] ) && 'service' == $vars['orderby'] ) {
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => 'projects_principal_service',
					'orderby' => 'meta_value'
				)
			);
		}

	}

	return $vars;
}


function projects_script_header(){ ?>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/projects.js"></script>
<?php 
} 