<?php

add_action( 'init', 'create_post_type_news' );

function create_post_type_news() {
	register_post_type( 'news',
		array(
			'labels' => array(
				'name' => __( 'News' ),
				'add_new_item' => __( 'Add a New' ),
				'new_item' => __( 'New' ),
				'edit_item' => __( 'Edit New' ),
				'view_item' => __( 'View News' ),
				'singular_name' => __( 'New' )
			),
			'menu_icon' => 'dashicons-format-aside',
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'news'),
			'supports' => array( 'revisions','title')
		)
	);

	add_post_type_support('news', 'page-attributes' );
}

function get_news($posts_per_page = -1){
	$args = array(
	'post_type'  	  => 'news',
	'posts_per_page'  => $posts_per_page,
	'order'           => 'DESC',
	'orderby' 		  => 'meta_value',
	'meta_key'        => 'news_date',
	'meta_value'      => '',
	'post_status'     => 'publish',
	'suppress_filters' => true );

	$data = get_posts($args);
	$items = array();

	foreach($data as $new) {
		$id = $new->ID;

		$item['id'] = $id;
		$item['title'] = $new->post_title;
		$item['permalink'] = get_permalink($id);
		$item['newsdate'] = get_field('news_date',$id);
		$item['image'] = get_field('news_image',$id);
		$item['details'] = get_field('news_details',$id);
		
		$items[] = $item;
	}


	return $items;
}


function get_new($id){
  	$new = get_post($id);
  	$items = NULL;

	$item['id'] = $id;
	$item['title'] = $new->post_title;
	$item['permalink'] = get_permalink($id);
	$item['newsdate'] = get_field('news_date',$id);
	$item['image'] = get_field('news_image',$id);
	$item['details'] = get_field('news_details',$id);

	return $item;
}

add_filter('manage_news_posts_columns', 'get_news_columns');
function get_news_columns($columns) {
    $columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'newsdate' => __( 'Publish Date' ),
		'date' => __( 'Create Date' ),
		'author' => __( 'Author' )
	);

	return $columns;
}

add_action('manage_news_posts_custom_column', 'news_columns_content', 10, 2);
function news_columns_content($column_name, $post_ID) {
	$new = get_new($post_ID);

	if ($column_name == 'newsdate') {
		$newsdate = $new['newsdate'];
		if ($newsdate) {
			$date = DateTime::createFromFormat('Ymd', $newsdate);
			echo $date->format('M j, Y');
		}
	}

	
}


add_filter('manage_edit-news_sortable_columns', 'news_sortable_columns' );
function news_sortable_columns( $columns ) {

	return $columns;
}

add_action('load-edit.php', 'edit_news_load');
function edit_news_load() {
	add_filter( 'request', 'sort_news' );
}

function sort_news( $vars ) {
	if ( isset( $vars['post_type'] ) && 'news' == $vars['post_type'] ) {

		if ( isset( $vars['orderby'] ) && 'newsdate' == $vars['orderby'] ) {
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => 'news_date',
					'orderby' => 'meta_value'
				)
			);
		}

	}

	return $vars;
}


function news_script_header(){ ?>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/news.js"></script>
<?php 
} 