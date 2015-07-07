<?php


add_filter( 'enter_title_here', 'change_default_title' );
function change_default_title( $title ){
    $screen = get_current_screen();

    $title = 'Enter title here';
 
 	switch ($screen->post_type) {
 		case 'projects':
 			$title = 'Enter Project Name here';
 			break;
 		case 'services':
 			$title = 'Enter Service Name here';
 			break;
 		case 'news':
 			$title = 'Enter Title here';
 			break;
 	}
    
    return $title;
}



foreach (glob(get_template_directory() . '/inc/customposts/*.php') as $filename) {
    require $filename;
}