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
    'name'              => _x( 'Topics', 'taxonomy general name', 'fortytwo' ),
    'singular_name'     => _x( 'Topic', 'taxonomy singular name', 'fortytwo' ),
    'menu_name'         => __( 'Topics', 'fortytwo' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'topics' ),
    'show_in_quick_edit' => true
  );

  register_taxonomy( 'topics', array( 'event', 'post', 'publication', 'activity' ), $args );

  // programs
  $labels = array(
    'name'              => _x( 'Programs', 'taxonomy general name', 'fortytwo' ),
    'singular_name'     => _x( 'Program', 'taxonomy singular name', 'fortytwo' ),
    'menu_name'         => __( 'Programs', 'fortytwo' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'programs' ),
  );

  register_taxonomy( 'programs', array( 'activity', 'post', 'publication' ), $args );

  // projects
  $labels = array(
    'name'              => _x( 'Projects', 'taxonomy general name', 'fortytwo' ),
    'singular_name'     => _x( 'Project', 'taxonomy singular name', 'fortytwo' ),
    'menu_name'         => __( 'Projects', 'fortytwo' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'projects' ),
  );

  register_taxonomy( 'projects', array( 'activity', 'post', 'publication' ), $args );

  // Publication Types
  $labels = array(
    'name'              => _x( 'Publication Types', 'taxonomy general name', 'fortytwo' ),
    'singular_name'     => _x( 'Publication Type', 'taxonomy singular name', 'fortytwo' ),
    'search_items'      => __( 'Search Publication Types', 'fortytwo' ),
    'all_items'         => __( 'All Publication Types', 'fortytwo' ),
    'parent_item'       => __( 'Parent Publication Type', 'fortytwo' ),
    'parent_item_colon' => __( 'Parent Publication Type:', 'fortytwo' ),
    'edit_item'         => __( 'Edit Publication Type', 'fortytwo' ),
    'update_item'       => __( 'Update Publication Type', 'fortytwo' ),
    'add_new_item'      => __( 'Add New Publication Type', 'fortytwo' ),
    'new_item_name'     => __( 'New Publication Type Name', 'fortytwo' ),
    'menu_name'         => __( 'Publication Types', 'fortytwo' ),
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
    'name'              => _x( 'Organization Types', 'taxonomy general name', 'fortytwo' ),
    'singular_name'     => _x( 'Organization Type', 'taxonomy singular name', 'fortytwo' ),
    'search_items'      => __( 'Search Organization Types', 'fortytwo' ),
    'all_items'         => __( 'All Organization Types', 'fortytwo' ),
    'parent_item'       => __( 'Parent Organization Typ', 'fortytwo' ),
    'parent_item_colon' => __( 'Parent Organization Type:', 'fortytwo' ),
    'edit_item'         => __( 'Edit Organization Type', 'fortytwo' ),
    'update_item'       => __( 'Update Organization Type', 'fortytwo' ),
    'add_new_item'      => __( 'Add New Organization Type', 'fortytwo' ),
    'new_item_name'     => __( 'New Organization Type Name', 'fortytwo' ),
    'menu_name'         => __( 'Organization Types', 'fortytwo' ),
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

  // user intrestes
  $labels = array(
    'name'              => _x( 'User interests', 'taxonomy general name', 'fortytwo' ),
    'singular_name'     => _x( 'User interests', 'taxonomy singular name', 'fortytwo' ),
    'search_items'      => __( 'Search User interests', 'fortytwo' ),
    'all_items'         => __( 'All User interests', 'fortytwo' ),
    'parent_item'       => __( 'Parent Organization Typ', 'fortytwo' ),
    'parent_item_colon' => __( 'Parent User interests:', 'fortytwo' ),
    'edit_item'         => __( 'Edit User interests', 'fortytwo' ),
    'update_item'       => __( 'Update User interests', 'fortytwo' ),
    'add_new_item'      => __( 'Add New User interests', 'fortytwo' ),
    'new_item_name'     => __( 'New User interests Name', 'fortytwo' ),
    'menu_name'         => __( 'User interests', 'fortytwo' ),
  );

  $args = array(
    'hierarchical'      => false,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'user-interests' ),
  );

  register_taxonomy( 'user-interests', array( ), $args );

  add_action("programs_edit_form_fields", 'add_form_fields_example', 10, 2);
  function add_form_fields_example($term, $taxonomy){
      ?>
      <tr valign="top">
          <th scope="row">Description</th>
          <td>
              <?php wp_editor(html_entity_decode($term->description), 'description', array('media_buttons' => false)); ?>
              <script>
                  jQuery(window).ready(function(){
                      jQuery('label[for=description]').parent().parent().remove();
                  });
              </script>
          </td>
      </tr>
      <?php
  }

}

