<?php 

//load_theme_textdomain('foda');

/*** HIDE ADMIN BAR ***/

if ( ! function_exists( 'foda_setup' ) ) :
/**
 * Foda setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since FODA Studio Theme 1.0
 */
function foda_setup() {

	/*
	 * Make Foda available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	//load_theme_textdomain( 'foda', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css' ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'foda' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'foda' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	


}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'foda_setup' );

/*******************************************/


require get_template_directory() . '/inc/custom-libs.php';
require get_template_directory() . '/inc/custom-posts.php';
require get_template_directory() . '/inc/custom-taxonomies.php';
require get_template_directory() . '/lib/twitter.php';

/*** JS/CSS FILES ***/
add_action('wp_enqueue_scripts', 'initial_scripts_styles' );
function initial_scripts_styles() {
	wp_deregister_script( 'jquery' );
	
	wp_enqueue_script( 'jquery',  get_template_directory_uri() . '/js/vendor/jquery-1.9.1.min.js', array(), null, false );
	wp_enqueue_script( 'lazy',  get_template_directory_uri() . '/js/vendor/jquery.lazyload.min.js', array(), null, false );
	wp_enqueue_script( 'typekit',  'https://use.typekit.com/kxz0vdt.js', array(), null, false );
	wp_enqueue_script( 'tweet',  get_template_directory_uri() . '/js/vendor/jquery.tweet.min.js', array(), null, false );
	

	if ( is_admin() ) { wp_enqueue_script('require-post-title', get_template_directory_uri() . '/js/require-title.js', array(), null, false); }


}

add_action('admin_head', function()
{
	?>
	<style type="text/css">
	<!--
	#titlediv
	{
		margin-bottom: 10px;
	}
 
	#edit-slug-box
	{
		/*display: none;*/
	}
	-->
	</style>
	<?php
});



/*
* add a group of links under a parent link
*/

// Add a parent shortcut link


add_filter( 'acf/fields/wysiwyg/toolbars' , 'minimal_toolbar'  );
function minimal_toolbar( $toolbars )
{
	// Uncomment to view format of $toolbars
	/*
	echo '< pre >';
		print_r($toolbars);
	echo '< /pre >';
	die;
	*/



	// Add a new toolbar called "Very Simple"
	// - this toolbar has only 1 row of buttons
	$toolbars['Minimal'] = array();
	$toolbars['Minimal'][1] = array('bold' , 'italic' , 'underline', 'link', 'unlink', 'code' );


	// Edit the "Full" toolbar and remove 'code'
	// - delet from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
	/*if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
	{
		unset( $toolbars['Full' ][2][$key] );
	}*/

	// remove the 'Basic' toolbar completely
	//unset( $toolbars['Basic' ] );

	// return $toolbars - IMPORTANT!
	return $toolbars;
}


function array_sort($array, $on, $order=SORT_ASC)
{
	$new_array = array();
	$sortable_array = array();

	if (count($array) > 0) {
		foreach ($array as $k => $v) {
			if (is_array($v)) {
				foreach ($v as $k2 => $v2) {
					if ($k2 == $on) {
						$sortable_array[$k] = $v2;
					}
				}
			} else {
				$sortable_array[$k] = $v;
			}
		}

		switch ($order) {
			case SORT_ASC:
				asort($sortable_array);
			break;
			case SORT_DESC:
				arsort($sortable_array);
			break;
		}

		foreach ($sortable_array as $k => $v) {
			$new_array[$k] = $array[$k];
		}
	}

	return $new_array;
}


function multiarray_search($array, $key, $value) {
	$results = array(); 

	if (is_array($array)) 
	{ 
		if (isset($array[$key]) && $array[$key] == $value) 
			$results[] = $array; 

		foreach ($array as $subarray) 
			$results = array_merge($results, multiarray_search($subarray, $key, $value)); 
	} 

	return $results; 
} 

