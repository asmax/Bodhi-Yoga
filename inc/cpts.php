<?php
// Register Custom Post Type
function bodhi_yoga_gallery_cpt() {
	$gallery_labels = array(
		'name'                => _x( 'Galleries', 'Post Type General Name', 'bodhi-yoga' ),
		'singular_name'       => _x( 'Gallery', 'Post Type Singular Name', 'bodhi-yoga' ),
		'menu_name'           => __( 'Gallery', 'bodhi-yoga' ),
		'name_admin_bar'      => __( 'Gallery', 'bodhi-yoga' ),
		'parent_item_colon'   => __( 'Parent Gallery Item:', 'bodhi-yoga' ),
		'all_items'           => __( 'All Photos', 'bodhi-yoga' ),
		'add_new_item'        => __( 'Add New Photo', 'bodhi-yoga' ),
		'add_new'             => __( 'Add New', 'bodhi-yoga' ),
		'new_item'            => __( 'New Photo', 'bodhi-yoga' ),
		'edit_item'           => __( 'Edit Photo', 'bodhi-yoga' ),
		'update_item'         => __( 'Update Photo', 'bodhi-yoga' ),
		'view_item'           => __( 'View Photo', 'bodhi-yoga' ),
		'search_items'        => __( 'Search Photos', 'bodhi-yoga' ),
		'not_found'           => __( 'No Photos Found', 'bodhi-yoga' ),
		'not_found_in_trash'  => __( 'No Photo Found in Trash', 'bodhi-yoga' ),
	);
	$gallery_args = array(
		'label'               => __( 'Gallery', 'bodhi-yoga' ),
		'description'         => __( 'Gallery for displaying images', 'bodhi-yoga' ),
		'labels'              => $gallery_labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
        
        
        $training_labels = array(
		'name'                => _x( 'Trainings', 'Post Type General Name', 'bodhi-yoga' ),
		'singular_name'       => _x( 'Training', 'Post Type Singular Name', 'bodhi-yoga' ),
		'menu_name'           => __( 'Trainings', 'bodhi-yoga' ),
		'name_admin_bar'      => __( 'Trainings', 'bodhi-yoga' ),
		'parent_item_colon'   => __( 'Parent Training Item:', 'bodhi-yoga' ),
		'all_items'           => __( 'All Training', 'bodhi-yoga' ),
		'add_new_item'        => __( 'Add New', 'bodhi-yoga' ),
		'add_new'             => __( 'Add New', 'bodhi-yoga' ),
		'new_item'            => __( 'New Training', 'bodhi-yoga' ),
		'edit_item'           => __( 'Edit Training', 'bodhi-yoga' ),
		'update_item'         => __( 'Update Training', 'bodhi-yoga' ),
		'view_item'           => __( 'View Training', 'bodhi-yoga' ),
		'search_items'        => __( 'Search Trainings', 'bodhi-yoga' ),
		'not_found'           => __( 'No Trainings Found', 'bodhi-yoga' ),
		'not_found_in_trash'  => __( 'No Training Found in Trash', 'bodhi-yoga' ),
	);
	$training_args = array(
		'label'               => __( 'Trainings', 'bodhi-yoga' ),
		'description'         => __( 'Trainings for displaying become a teacher', 'bodhi-yoga' ),
		'labels'              => $training_labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
        
	register_post_type( 'training', $training_args );
	register_post_type( 'gallery', $gallery_args );
}
add_action( 'init', 'bodhi_yoga_gallery_cpt', 0 );