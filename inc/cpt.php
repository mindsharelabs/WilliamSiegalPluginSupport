<?php
/*------------------------------------*\
Custom Post Types
\*------------------------------------*/

add_action('init', 'create_post_type_mind'); // Add our mind Blank Custom Post Type
function create_post_type_mind() {
  register_post_type('objects', array(
    'labels' => array(
      'name' => __('Objects', 'mindblank'), // Rename these to suit
      'singular_name' => __('Object', 'mindblank'),
      'add_new' => __('Add New Object', 'mindblank'),
      'add_new_item' => __('Add New Object', 'mindblank'),
      'edit' => __('Edit Object', 'mindblank'),
      'edit_item' => __('Edit Object', 'mindblank'),
      'new_item' => __('New Object', 'mindblank'),
      'view' => __('View Object', 'mindblank'),
      'view_item' => __('View Object', 'mindblank'),
      'search_items' => __('Search Objects', 'mindblank'),
      'not_found' => __('No Objects found', 'mindblank'),
      'not_found_in_trash' => __('No Objects found in Trash', 'mindblank')
    ),
    'public' => true,
    'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => 'objects',
    'show_in_rest' => true,
    'supports' => array(
      'title',
      'editor',
      'thumbnail',
    ), // Go to Dashboard Custom mind Blank post for supports
    'can_export' => true, // Allows export in Tools > Export
    'taxonomies' => array(
      'region',
      'cultures'
    ) // Add Category and Post Tags support
  ));
}




// Register Custom Taxonomy
add_action( 'init', 'create_taxonomy_mind', 0 );
function create_taxonomy_mind() {

	register_taxonomy( 'regions', array( 'objects' ), array(
		'labels'                     => array(
  		'name'                       => _x( 'Regions', 'Taxonomy General Name', 'text_domain' ),
  		'singular_name'              => _x( 'Region', 'Taxonomy Singular Name', 'text_domain' ),
  		'menu_name'                  => __( 'Regions', 'text_domain' ),
  		'all_items'                  => __( 'All Regions', 'text_domain' ),
  		'parent_item'                => __( 'Parent Region', 'text_domain' ),
  		'parent_item_colon'          => __( 'Parent Region:', 'text_domain' ),
  		'new_item_name'              => __( 'New Region Name', 'text_domain' ),
  		'add_new_item'               => __( 'Add New Region', 'text_domain' ),
  		'edit_item'                  => __( 'Edit Region', 'text_domain' ),
  		'update_item'                => __( 'Update Region', 'text_domain' ),
  		'view_item'                  => __( 'View Region', 'text_domain' ),
  		'separate_items_with_commas' => __( 'Separate regions with commas', 'text_domain' ),
  		'add_or_remove_items'        => __( 'Add or remove regions', 'text_domain' ),
  		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
  		'popular_items'              => __( 'Popular Region', 'text_domain' ),
  		'search_items'               => __( 'Search Region', 'text_domain' ),
  		'not_found'                  => __( 'Not Found', 'text_domain' ),
  		'no_terms'                   => __( 'No Region', 'text_domain' ),
  		'items_list'                 => __( 'Regions list', 'text_domain' ),
  		'items_list_navigation'      => __( 'Regions list navigation', 'text_domain' ),
  	),
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	));

  register_taxonomy( 'cultures', array( 'objects' ), array(
		'labels'                     => array(
  		'name'                       => _x( 'Cultures', 'Taxonomy General Name', 'text_domain' ),
  		'singular_name'              => _x( 'Culture', 'Taxonomy Singular Name', 'text_domain' ),
  		'menu_name'                  => __( 'Cultures', 'text_domain' ),
  		'all_items'                  => __( 'All Cultures', 'text_domain' ),
  		'parent_item'                => __( 'Parent Culture', 'text_domain' ),
  		'parent_item_colon'          => __( 'Parent Culture:', 'text_domain' ),
  		'new_item_name'              => __( 'New Culture Name', 'text_domain' ),
  		'add_new_item'               => __( 'Add New Culture', 'text_domain' ),
  		'edit_item'                  => __( 'Edit Culture', 'text_domain' ),
  		'update_item'                => __( 'Update Culture', 'text_domain' ),
  		'view_item'                  => __( 'View Culture', 'text_domain' ),
  		'separate_items_with_commas' => __( 'Separate Cultures with commas', 'text_domain' ),
  		'add_or_remove_items'        => __( 'Add or remove Cultures', 'text_domain' ),
  		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
  		'popular_items'              => __( 'Popular Culture', 'text_domain' ),
  		'search_items'               => __( 'Search Culture', 'text_domain' ),
  		'not_found'                  => __( 'Not Found', 'text_domain' ),
  		'no_terms'                   => __( 'No Culture', 'text_domain' ),
  		'items_list'                 => __( 'Cultures list', 'text_domain' ),
  		'items_list_navigation'      => __( 'Cultures list navigation', 'text_domain' ),
  	),
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	));

  register_taxonomy( 'types', array( 'objects' ), array(
		'labels'                     => array(
  		'name'                       => _x( 'Object Types', 'Taxonomy General Name', 'text_domain' ),
  		'singular_name'              => _x( 'Object Type', 'Taxonomy Singular Name', 'text_domain' ),
  		'menu_name'                  => __( 'Object Types', 'text_domain' ),
  		'all_items'                  => __( 'All Types', 'text_domain' ),
  		'parent_item'                => __( 'Parent Type', 'text_domain' ),
  		'parent_item_colon'          => __( 'Parent Type:', 'text_domain' ),
  		'new_item_name'              => __( 'New Type Name', 'text_domain' ),
  		'add_new_item'               => __( 'Add New Type', 'text_domain' ),
  		'edit_item'                  => __( 'Edit Type', 'text_domain' ),
  		'update_item'                => __( 'Update Type', 'text_domain' ),
  		'view_item'                  => __( 'View Type', 'text_domain' ),
  		'separate_items_with_commas' => __( 'Separate Types with commas', 'text_domain' ),
  		'add_or_remove_items'        => __( 'Add or remove Types', 'text_domain' ),
  		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
  		'popular_items'              => __( 'Popular Type', 'text_domain' ),
  		'search_items'               => __( 'Search Type', 'text_domain' ),
  		'not_found'                  => __( 'Not Found', 'text_domain' ),
  		'no_terms'                   => __( 'No Type', 'text_domain' ),
  		'items_list'                 => __( 'Types list', 'text_domain' ),
  		'items_list_navigation'      => __( 'Types list navigation', 'text_domain' ),
  	),
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	));

}
