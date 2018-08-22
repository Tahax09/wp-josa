<?php

add_action( 'init', function() {
  register_activites();
  register_publications();
  register_organizations();
  register_events();
	register_social();
  register_taxonomies();

});

// articles

function register_activites() {
  register_post_type( 'activity',
		array(
			'labels' => array(
				'name' => __( 'Activites' ),
				'singular_name' => __( 'Activity' )
			),
			'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'thumbnail', 'excerpt', 'comments', 'editor', 'revisions' ),
      'taxonomies'  => array( 'programs', 'projects', 'topics' )
		)
	);
}


// Publications

function register_publications() {
  register_post_type( 'publication',
		array(
			'labels' => array(
				'name' => __( 'Publications' ),
				'singular_name' => __( 'Publication' )
			),
			'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'thumbnail', 'excerpt', 'comments', 'editor', 'revisions' ),
      'taxonomies'  => array( 'programs', 'projects' ,'publication-types', 'topics' )
		)
	);
}

// Organizations

function register_organizations() {
  register_post_type( 'organization',
		array(
			'labels' => array(
				'name' => __( 'Organizations' ),
				'singular_name' => __( 'Organization' )
			),
			'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'thumbnail', 'excerpt', 'editor', 'revisions' ),
      'taxonomies'  => array( 'organization-types' )
		)
	);
}

// Events

function register_events() {
  register_post_type( 'event',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' )
			),
			'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'thumbnail', 'excerpt', 'comments', 'editor', 'revisions' ),
      'taxonomies'  => array( 'programs', 'projects', 'topics', 'custom-fields' )
		)
	);
}

function register_social() {
  register_post_type( 'social',
		array(
			'labels' => array(
				'name' => __( 'Social' ),
				'singular_name' => __( 'Social posts' )
			),
			'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'thumbnail', 'excerpt', 'comments', 'editor', 'revisions' ),
      'taxonomies'  => array( 'category' )
		)
	);
}

// Taxonomies

function register_taxonomies() {

  // topics
  $labels = array(
		'name'              => _x( 'Topics', 'taxonomy general name', 'understrap-child' ),
		'singular_name'     => _x( 'Topic', 'taxonomy singular name', 'understrap-child' ),
		'menu_name'         => __( 'Topics', 'understrap-child' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'topics' ),
	);

  register_taxonomy( 'topics', array( 'event', 'post', 'publication', 'activity' ), $args );

  // programs
  $labels = array(
		'name'              => _x( 'Programs', 'taxonomy general name', 'understrap-child' ),
		'singular_name'     => _x( 'Program', 'taxonomy singular name', 'understrap-child' ),
		'menu_name'         => __( 'Programs', 'understrap-child' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'programs' ),
	);

  register_taxonomy( 'programs', array( 'activity', 'post', 'publication' ), $args );

  // projects
  $labels = array(
		'name'              => _x( 'Projects', 'taxonomy general name', 'understrap-child' ),
		'singular_name'     => _x( 'Project', 'taxonomy singular name', 'understrap-child' ),
		'menu_name'         => __( 'Projects', 'understrap-child' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'projects' ),
	);

  register_taxonomy( 'projects', array( 'activity', 'post', 'publication' ), $args );

  // Publication Types
  $labels = array(
		'name'              => _x( 'Publication Types', 'taxonomy general name', 'understrap-child' ),
		'singular_name'     => _x( 'Publication Type', 'taxonomy singular name', 'understrap-child' ),
		'search_items'      => __( 'Search Publication Types', 'understrap-child' ),
		'all_items'         => __( 'All Publication Types', 'understrap-child' ),
		'parent_item'       => __( 'Parent Publication Type', 'understrap-child' ),
		'parent_item_colon' => __( 'Parent Publication Type:', 'understrap-child' ),
		'edit_item'         => __( 'Edit Publication Type', 'understrap-child' ),
		'update_item'       => __( 'Update Publication Type', 'understrap-child' ),
		'add_new_item'      => __( 'Add New Publication Type', 'understrap-child' ),
		'new_item_name'     => __( 'New Publication Type Name', 'understrap-child' ),
		'menu_name'         => __( 'Publication Types', 'understrap-child' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'publication-types' ),
	);

  register_taxonomy( 'publication-types', array( 'publication' ), $args );

  // Organization Type
  $labels = array(
		'name'              => _x( 'Organization Types', 'taxonomy general name', 'understrap-child' ),
		'singular_name'     => _x( 'Organization Type', 'taxonomy singular name', 'understrap-child' ),
		'search_items'      => __( 'Search Organization Types', 'understrap-child' ),
		'all_items'         => __( 'All Organization Types', 'understrap-child' ),
		'parent_item'       => __( 'Parent Organization Typ', 'understrap-child' ),
		'parent_item_colon' => __( 'Parent Organization Type:', 'understrap-child' ),
		'edit_item'         => __( 'Edit Organization Type', 'understrap-child' ),
		'update_item'       => __( 'Update Organization Type', 'understrap-child' ),
		'add_new_item'      => __( 'Add New Organization Type', 'understrap-child' ),
		'new_item_name'     => __( 'New Organization Type Name', 'understrap-child' ),
		'menu_name'         => __( 'Organization Types', 'understrap-child' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'organization-types' ),
  );

  register_taxonomy( 'organization-types', array( 'organization' ), $args );

}

