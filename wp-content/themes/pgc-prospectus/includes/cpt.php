<?php
/**
 * Functions for custom post types
 *
 * @link https://developer.wordpress.org/themes/basics/post-types/
 *
 * @package PGC Prospective 2023
 * @since 1.0.0
 */

add_action( 'init', 'register_cpt_program' );


function register_cpt_program() {
	// CPT Labels
	$cpt_singular_capital   = 'Programmes'; // Name of the post type shown in the menu
	$cpt_plural_capital     = 'Programmes';
	$cpt_singular_lowercase = 'programmes';
	$cpt_plural_lowercase   = 'programmes';

	// CPT Slug & Name
	$cpt_register_key = 'programmes';  // This is the registering name of the single CPT post. (Try to keep it singular).
	$cpt_slug         = 'programmes';  // This is the permalink slug of single CPT post. (Try to keep it singular).
	// The slug will become - www.website.com/programmes/single-programmes-name

	$labels = array(
		'name'                  => _x( $cpt_plural_capital, 'Post type general name', 'pgcpp_td' ),
		'singular_name'         => _x( $cpt_singular_capital, 'Post type singular name', 'pgcpp_td' ),
		'menu_name'             => _x( $cpt_plural_capital, 'Admin Menu text', 'pgcpp_td' ),
		'name_admin_bar'        => _x( $cpt_singular_capital, 'Add New on Toolbar', 'pgcpp_td' ),
		'add_new'               => __( 'Add New ', 'pgcpp_td' ),
		'add_new_item'          => __( 'Add New ' . $cpt_singular_capital, 'pgcpp_td' ),
		'new_item'              => __( 'New ' . $cpt_singular_capital, 'pgcpp_td' ),
		'edit_item'             => __( 'Edit ' . $cpt_singular_capital, 'pgcpp_td' ),
		'update_item'           => __( 'Update ' . $cpt_singular_capital, 'pgcpp_td' ),
		'view_item'             => __( 'View  ' . $cpt_singular_capital, 'pgcpp_td' ),
		'view_items'            => __( 'View  ' . $cpt_plural_capital, 'pgcpp_td' ),
		'all_items'             => __( 'All ' . $cpt_plural_capital, 'pgcpp_td' ),
		'search_items'          => __( 'Search ' . $cpt_plural_capital, 'pgcpp_td' ),
		'parent_item_colon'     => __( 'Parent: ' . $cpt_singular_capital, 'pgcpp_td' ),
		'not_found'             => __( 'No ' . $cpt_plural_lowercase . ' found.', 'pgcpp_td' ),
		'not_found_in_trash'    => __( 'No ' . $cpt_plural_lowercase . ' found in Trash.', 'pgcpp_td' ),
		'featured_image'        => _x( $cpt_singular_capital . ' Featured Image', 'Overrides the “Featured Image” phrase.', 'pgcpp_td' ),
		'set_featured_image'    => _x( 'Set featured image', 'Overrides the “Set featured image” phrase.', 'pgcpp_td' ),
		'remove_featured_image' => _x( 'Remove ' . $cpt_singular_lowercase . ' image', 'Overrides the “Remove featured image” phrase.', 'pgcpp_td' ),
		'use_featured_image'    => _x( 'Use as ' . $cpt_singular_lowercase . ' image', 'Overrides the “Use as featured image” phrase.', 'pgcpp_td' ),
		'archives'              => _x( $cpt_singular_capital . ' archives', 'The post type archive label used in nav menus.', 'pgcpp_td' ),
		'attributes'            => _x( $cpt_singular_capital . ' attributes', 'The post type attributes label.', 'pgcpp_td' ),
		'insert_into_item'      => _x( 'Insert into ' . $cpt_singular_lowercase, 'Overrides the “Insert into post” phrase.', 'pgcpp_td' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this ' . $cpt_singular_lowercase, 'Overrides the “Uploaded to this post” phrase.', 'pgcpp_td' ),
		'filter_items_list'     => _x( 'Filter ' . $cpt_plural_lowercase . ' list', 'Screen reader text for the filter links.', 'pgcpp_td' ),
		'items_list_navigation' => _x( $cpt_plural_capital . ' list navigation', 'Screen reader text for the pagination.', 'pgcpp_td' ),
		'items_list'            => _x( $cpt_plural_capital . ' list', 'Screen reader text for the items list.', 'pgcpp_td' ),
	);
	$args   = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_position'      => null,
		'map_meta_cap'       => true,
		'show_in_rest'       => true,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'capability_type'    => 'page', // Set this value for each CPT.
		'has_archive'        => false, // Set this value for each CPT.
		'hierarchical'       => true, // Set this value for each CPT.
		'menu_icon'          => 'dashicons-welcome-learn-more', // Set this value for each CPT.
		'rewrite'            => array(
			'slug'       => $cpt_slug,
			'with_front' => true, // If required only then set this value for each CPT.
		),
	);
	register_post_type( $cpt_register_key, $args );
}



function register_cpt_achievers() {
	// CPT Labels
	$cpt_singular_capital   = 'Achiever'; // Name of the post type shown in the menu
	$cpt_plural_capital     = 'Achievers';
	$cpt_singular_lowercase = 'achiever';
	$cpt_plural_lowercase   = 'achievers';

	// CPT Slug & Name
	$cpt_register_key = 'achiever';  // This is the registering name of the single CPT post. (Try to keep it singular).
	$cpt_slug         = 'achiever';  // This is the permalink slug of single CPT post. (Try to keep it singular).
	// The slug will become - www.website.com/achiever/single-achiever-name

	$labels = array(
		'name'                  => _x( $cpt_plural_capital, 'Post type general name', 'basetheme_td' ),
		'singular_name'         => _x( $cpt_singular_capital, 'Post type singular name', 'basetheme_td' ),
		'menu_name'             => _x( $cpt_plural_capital, 'Admin Menu text', 'basetheme_td' ),
		'name_admin_bar'        => _x( $cpt_singular_capital, 'Add New on Toolbar', 'basetheme_td' ),
		'add_new'               => __( 'Add New ', 'basetheme_td' ),
		'add_new_item'          => __( 'Add New ' . $cpt_singular_capital, 'basetheme_td' ),
		'new_item'              => __( 'New ' . $cpt_singular_capital, 'basetheme_td' ),
		'edit_item'             => __( 'Edit ' . $cpt_singular_capital, 'basetheme_td' ),
		'update_item'           => __( 'Update ' . $cpt_singular_capital, 'basetheme_td' ),
		'view_item'             => __( 'View  ' . $cpt_singular_capital, 'basetheme_td' ),
		'view_items'            => __( 'View  ' . $cpt_plural_capital, 'basetheme_td' ),
		'all_items'             => __( 'All ' . $cpt_plural_capital, 'basetheme_td' ),
		'search_items'          => __( 'Search ' . $cpt_plural_capital, 'basetheme_td' ),
		'parent_item_colon'     => __( 'Parent: ' . $cpt_singular_capital, 'basetheme_td' ),
		'not_found'             => __( 'No ' . $cpt_plural_lowercase . ' found.', 'basetheme_td' ),
		'not_found_in_trash'    => __( 'No ' . $cpt_plural_lowercase . ' found in Trash.', 'basetheme_td' ),
		'featured_image'        => _x( $cpt_singular_capital . ' Featured Image', 'Overrides the “Featured Image” phrase.', 'basetheme_td' ),
		'set_featured_image'    => _x( 'Set featured image', 'Overrides the “Set featured image” phrase.', 'basetheme_td' ),
		'remove_featured_image' => _x( 'Remove ' . $cpt_singular_lowercase . ' image', 'Overrides the “Remove featured image” phrase.', 'basetheme_td' ),
		'use_featured_image'    => _x( 'Use as ' . $cpt_singular_lowercase . ' image', 'Overrides the “Use as featured image” phrase.', 'basetheme_td' ),
		'archives'              => _x( $cpt_singular_capital . ' archives', 'The post type archive label used in nav menus.', 'basetheme_td' ),
		'attributes'            => _x( $cpt_singular_capital . ' attributes', 'The post type attributes label.', 'basetheme_td' ),
		'insert_into_item'      => _x( 'Insert into ' . $cpt_singular_lowercase, 'Overrides the “Insert into post” phrase.', 'basetheme_td' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this ' . $cpt_singular_lowercase, 'Overrides the “Uploaded to this post” phrase.', 'basetheme_td' ),
		'filter_items_list'     => _x( 'Filter ' . $cpt_plural_lowercase . ' list', 'Screen reader text for the filter links.', 'basetheme_td' ),
		'items_list_navigation' => _x( $cpt_plural_capital . ' list navigation', 'Screen reader text for the pagination.', 'basetheme_td' ),
		'items_list'            => _x( $cpt_plural_capital . ' list', 'Screen reader text for the items list.', 'basetheme_td' ),
	);
	$args   = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_position'      => null,
		'map_meta_cap'       => true,
		'show_in_rest'       => true,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'capability_type'    => 'page', // Set this value for each CPT.
		'has_archive'        => false, // Set this value for each CPT.
		'hierarchical'       => true, // Set this value for each CPT.
		'menu_icon'          => 'dashicons-groups', // Set this value for each CPT.
		'rewrite'            => array(
			'slug'       => $cpt_slug,
			'with_front' => true, // If required only then set this value for each CPT.
		),
	);
	register_post_type( $cpt_register_key, $args );
}

add_action( 'init', 'register_cpt_achievers' );


/**
 * Register custom tags for Achievers cpt
 */
function achievers_taxonomy() {

	// CPT Slug & Name
	$tax_parent       = 'achiever'; // This is registering name of respective CPT.
	$tax_register_key = 'achievers-board';  // This is the registering name of the taxonomy (Try to keep it plural).
	$tax_slug         = 'achievers-board'; // This is the permalink slug of taxonomy archive (Try to keep it plural).
	// The slug will become - www.website.com/achievers/single-achiever-category

	$labels = array(
		'name'                       => _x( 'Board', 'Taxonomy General Name', 'basetheme_td' ),
		'singular_name'              => _x( 'Board', 'Taxonomy Singular Name', 'basetheme_td' ),
		'menu_name'                  => __( 'Boards', 'basetheme_td' ),
		'all_items'                  => __( 'All Items', 'basetheme_td' ),
		'parent_item'                => __( 'Parent Item', 'basetheme_td' ),
		'parent_item_colon'          => __( 'Parent Item:', 'basetheme_td' ),
		'new_item_name'              => __( 'New Item Name', 'basetheme_td' ),
		'add_new_item'               => __( 'Add New Item', 'basetheme_td' ),
		'edit_item'                  => __( 'Edit Item', 'basetheme_td' ),
		'update_item'                => __( 'Update Item', 'basetheme_td' ),
		'view_item'                  => __( 'View Item', 'basetheme_td' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'basetheme_td' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'basetheme_td' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'basetheme_td' ),
		'popular_items'              => __( 'Popular Items', 'basetheme_td' ),
		'search_items'               => __( 'Search Items', 'basetheme_td' ),
		'not_found'                  => __( 'Not Found', 'basetheme_td' ),
		'no_terms'                   => __( 'No items', 'basetheme_td' ),
		'items_list'                 => __( 'Items list', 'basetheme_td' ),
		'items_list_navigation'      => __( 'Items list navigation', 'basetheme_td' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug'       => $tax_slug,
			'with_front' => false, // If required only then set this for each taxonomy.
		),
	);
	register_taxonomy( $tax_register_key, array( $tax_parent ), $args );

}

add_action( 'init', 'achievers_taxonomy', 0 );

/**
 * Register custom tags for Achievers cpt
 */
function achievers_taxonomy_year() {

	// CPT Slug & Name
	$tax_parent       = 'achiever'; // This is registering name of respective CPT.
	$tax_register_key = 'achievers-year';  // This is the registering name of the taxonomy (Try to keep it plural).
	$tax_slug         = 'achievers-year'; // This is the permalink slug of taxonomy archive (Try to keep it plural).
	// The slug will become - www.website.com/achievers/single-achiever-category

	$labels = array(
		'name'                       => _x( 'Year', 'Taxonomy General Name', 'basetheme_td' ),
		'singular_name'              => _x( 'Year', 'Taxonomy Singular Name', 'basetheme_td' ),
		'menu_name'                  => __( 'Years', 'basetheme_td' ),
		'all_items'                  => __( 'All Items', 'basetheme_td' ),
		'parent_item'                => __( 'Parent Item', 'basetheme_td' ),
		'parent_item_colon'          => __( 'Parent Item:', 'basetheme_td' ),
		'new_item_name'              => __( 'New Item Name', 'basetheme_td' ),
		'add_new_item'               => __( 'Add New Item', 'basetheme_td' ),
		'edit_item'                  => __( 'Edit Item', 'basetheme_td' ),
		'update_item'                => __( 'Update Item', 'basetheme_td' ),
		'view_item'                  => __( 'View Item', 'basetheme_td' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'basetheme_td' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'basetheme_td' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'basetheme_td' ),
		'popular_items'              => __( 'Popular Items', 'basetheme_td' ),
		'search_items'               => __( 'Search Items', 'basetheme_td' ),
		'not_found'                  => __( 'Not Found', 'basetheme_td' ),
		'no_terms'                   => __( 'No items', 'basetheme_td' ),
		'items_list'                 => __( 'Items list', 'basetheme_td' ),
		'items_list_navigation'      => __( 'Items list navigation', 'basetheme_td' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug'       => $tax_slug,
			'with_front' => false, // If required only then set this for each taxonomy.
		),
	);
	register_taxonomy( $tax_register_key, array( $tax_parent ), $args );

}

add_action( 'init', 'achievers_taxonomy_year', 0 );



function register_cpt_campus_life() {
	// CPT Labels
	$cpt_singular_capital   = 'Campus Life'; // Name of the post type shown in the menu
	$cpt_plural_capital     = 'Campus Life';
	$cpt_singular_lowercase = 'campus life';
	$cpt_plural_lowercase   = 'campus life';

	// CPT Slug & Name
	$cpt_register_key = 'campus-life';  // This is the registering name of the single CPT post. (Try to keep it singular).
	$cpt_slug         = 'campus-life';  // This is the permalink slug of single CPT post. (Try to keep it singular).
	// The slug will become - www.website.com/campus-life/single-campus-life-name

	$labels = array(
		'name'                  => _x( $cpt_plural_capital, 'Post type general name', 'basetheme_td' ),
		'singular_name'         => _x( $cpt_singular_capital, 'Post type singular name', 'basetheme_td' ),
		'menu_name'             => _x( $cpt_plural_capital, 'Admin Menu text', 'basetheme_td' ),
		'name_admin_bar'        => _x( $cpt_singular_capital, 'Add New on Toolbar', 'basetheme_td' ),
		'add_new'               => __( 'Add New ', 'basetheme_td' ),
		'add_new_item'          => __( 'Add New ' . $cpt_singular_capital, 'basetheme_td' ),
		'new_item'              => __( 'New ' . $cpt_singular_capital, 'basetheme_td' ),
		'edit_item'             => __( 'Edit ' . $cpt_singular_capital, 'basetheme_td' ),
		'update_item'           => __( 'Update ' . $cpt_singular_capital, 'basetheme_td' ),
		'view_item'             => __( 'View  ' . $cpt_singular_capital, 'basetheme_td' ),
		'view_items'            => __( 'View  ' . $cpt_plural_capital, 'basetheme_td' ),
		'all_items'             => __( 'All ' . $cpt_plural_capital, 'basetheme_td' ),
		'search_items'          => __( 'Search ' . $cpt_plural_capital, 'basetheme_td' ),
		'parent_item_colon'     => __( 'Parent: ' . $cpt_singular_capital, 'basetheme_td' ),
		'not_found'             => __( 'No ' . $cpt_plural_lowercase . ' found.', 'basetheme_td' ),
		'not_found_in_trash'    => __( 'No ' . $cpt_plural_lowercase . ' found in Trash.', 'basetheme_td' ),
		'featured_image'        => _x( $cpt_singular_capital . ' Featured Image', 'Overrides the “Featured Image” phrase.', 'basetheme_td' ),
		'set_featured_image'    => _x( 'Set featured image', 'Overrides the “Set featured image” phrase.', 'basetheme_td' ),
		'remove_featured_image' => _x( 'Remove ' . $cpt_singular_lowercase . ' image', 'Overrides the “Remove featured image” phrase.', 'basetheme_td' ),
		'use_featured_image'    => _x( 'Use as ' . $cpt_singular_lowercase . ' image', 'Overrides the “Use as featured image” phrase.', 'basetheme_td' ),
		'archives'              => _x( $cpt_singular_capital . ' archives', 'The post type archive label used in nav menus.', 'basetheme_td' ),
		'attributes'            => _x( $cpt_singular_capital . ' attributes', 'The post type attributes label.', 'basetheme_td' ),
		'insert_into_item'      => _x( 'Insert into ' . $cpt_singular_lowercase, 'Overrides the “Insert into post” phrase.', 'basetheme_td' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this ' . $cpt_singular_lowercase, 'Overrides the “Uploaded to this post” phrase.', 'basetheme_td' ),
		'filter_items_list'     => _x( 'Filter ' . $cpt_plural_lowercase . ' list', 'Screen reader text for the filter links.', 'basetheme_td' ),
		'items_list_navigation' => _x( $cpt_plural_capital . ' list navigation', 'Screen reader text for the pagination.', 'basetheme_td' ),
		'items_list'            => _x( $cpt_plural_capital . ' list', 'Screen reader text for the items list.', 'basetheme_td' ),
	);
	$args   = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_position'      => null,
		'map_meta_cap'       => true,
		'show_in_rest'       => true,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'capability_type'    => 'page', // Set this value for each CPT.
		'has_archive'        => false, // Set this value for each CPT.
		'hierarchical'       => true, // Set this value for each CPT.
		'menu_icon'          => 'dashicons-clipboard', // Set this value for each CPT.
		'rewrite'            => array(
			'slug'       => $cpt_slug,
			'with_front' => true, // If required only then set this value for each CPT.
		),
	);
	register_post_type( $cpt_register_key, $args );
}

add_action( 'init', 'register_cpt_campus_life' );


// /**
//  * Register custom tags for Achievers cpt
//  */
// function campuslife_taxonomy_category() {

// 	// CPT Slug & Name
// 	$tax_parent       = 'campus-life'; // This is registering name of respective CPT.
// 	$tax_register_key = 'campuslife-category';  // This is the registering name of the taxonomy (Try to keep it plural).
// 	$tax_slug         = 'campuslife-category'; // This is the permalink slug of taxonomy archive (Try to keep it plural).
// 	// The slug will become - www.website.com/achievers/single-achiever-category

// 	$labels = array(
// 		'name'                       => _x( 'Category', 'Taxonomy General Name', 'basetheme_td' ),
// 		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'basetheme_td' ),
// 		'menu_name'                  => __( 'Categories', 'basetheme_td' ),
// 		'all_items'                  => __( 'All Items', 'basetheme_td' ),
// 		'parent_item'                => __( 'Parent Item', 'basetheme_td' ),
// 		'parent_item_colon'          => __( 'Parent Item:', 'basetheme_td' ),
// 		'new_item_name'              => __( 'New Item Name', 'basetheme_td' ),
// 		'add_new_item'               => __( 'Add New Item', 'basetheme_td' ),
// 		'edit_item'                  => __( 'Edit Item', 'basetheme_td' ),
// 		'update_item'                => __( 'Update Item', 'basetheme_td' ),
// 		'view_item'                  => __( 'View Item', 'basetheme_td' ),
// 		'separate_items_with_commas' => __( 'Separate items with commas', 'basetheme_td' ),
// 		'add_or_remove_items'        => __( 'Add or remove items', 'basetheme_td' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used', 'basetheme_td' ),
// 		'popular_items'              => __( 'Popular Items', 'basetheme_td' ),
// 		'search_items'               => __( 'Search Items', 'basetheme_td' ),
// 		'not_found'                  => __( 'Not Found', 'basetheme_td' ),
// 		'no_terms'                   => __( 'No items', 'basetheme_td' ),
// 		'items_list'                 => __( 'Items list', 'basetheme_td' ),
// 		'items_list_navigation'      => __( 'Items list navigation', 'basetheme_td' ),
// 	);
// 	$args   = array(
// 		'labels'            => $labels,
// 		'hierarchical'      => true,
// 		'public'            => true,
// 		'show_ui'           => true,
// 		'show_in_rest'      => true,
// 		'show_admin_column' => true,
// 		'show_in_nav_menus' => true,
// 		'query_var'         => true,
// 		'rewrite'           => array(
// 			'slug'       => $tax_slug,
// 			'with_front' => false, // If required only then set this for each taxonomy.
// 		),
// 	);
// 	register_taxonomy( $tax_register_key, array( $tax_parent ), $args );

// }

// add_action( 'init', 'campuslife_taxonomy_category', 0 );
