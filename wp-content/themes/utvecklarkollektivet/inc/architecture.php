<?php

// Lägger till posttypen Projekt
$labels = array(
    'name' => 'Projekt',
    'singular_name' => 'Projekt',
    'add_new' => 'Skapa Projekt',
    'add_new_item' => 'Skapa nytt Projekt',
    'edit_item' => 'Redigera Projekt',
    'new_item' => 'Nytt Projekt',
    'all_items' => 'Alla Projekt',
    'view_item' => 'Visa Projekt',
    'search_items' => 'Sök Projekt',
    'not_found' =>  'Inga Projekt hittades',
    'not_found_in_trash' => 'Inga projekt i papperskorgen', 
    'menu_name' => 'Projekt'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 15,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 
register_post_type("Projekt", $args);


// Lägger till Medlemmar i projekt fieldgroup
function add_members_in_project_field_group() {
	simple_fields_register_field_group('medlemmar',
		array (
			'name' => 'Medlemmar i projekt',
			'description' => "Medlemmar i ett projekt",
			'repeatable' => 1,
			'fields' => array(
	  			array(
	    			'slug' => "medlem_fornamn",
					'name' => 'Förnamn',
	    			'description' => 'Förnamn på medlemmen',
	    			'type' => 'text'
	  			),
	  			array(
	    			'slug' => "medlem_efternamn",
	    			'name' => 'Efternamn',
	    			'description' => 'Efternamn på medlemmen',
	    			'type' => 'text'
	  			),
	  			array(
	    			'slug' => "medlem_roll",
	    			'name' => 'Roll',
	    			'description' => 'Rollen på medlemmen',
	    			'type' => 'text'
	  			)
			)
		)
	);
}
add_action('init', 'add_members_in_project_field_group');

function add_github_link_field_group() {
	simple_fields_register_field_group('github_link',
		array (
			'name' => 'Githublänk',
			'description' => "Länk till github repository",
			'repeatable' => 0,
			'fields' => array(
	  			array(
	    			'slug' => "github_link",
					'name' => 'Githublänk',
	    			'description' => 'Länk till github repository',
	    			'type' => 'text'
	  			)
			)
		)
	);
}
add_action('init', 'add_github_link_field_group');

function add_roles_needed_field_group() {
	simple_fields_register_field_group('roles_needed',
		array (
			'name' => 'Saknade roller',
			'description' => "Roller som behövs till projektet",
			'repeatable' => 1,
			'fields' => array(
	  			array(
	    			'slug' => "role_needed",
					'name' => 'Roll',
	    			'description' => 'Rollen som eftersöks',
	    			'type' => 'text'
	  			)
			)
		)
	);
}
add_action('init', 'add_roles_needed_field_group');

// Lägger till Projekt Post Connector
function add_project_post_connector() {
	simple_fields_register_post_connector('projekt',
		array (	
			'name' => "Projekt",
	    	'field_groups' => array(
	      		array(
	        		'slug' => 'medlemmar',
	        		'context' => 'normal',
	        		'priority' => 'high'
	      		),
	      		array(
	        		'slug' => 'github_link',
	        		'context' => 'normal',
	        		'priority' => 'low'
	      		),
	      		array(
	      			'slug' => 'roles_needed',
	      			'context' => 'normal',
	      			'priority' => 'high'
      			),
	    	),
	    	'post_types' => array('projekt')
	  	)
	);
}
add_action( 'init', 'add_project_post_connector' );

function add_project_default_connector() {
	simple_fields_register_post_type_default('projekt', 'project');
}
add_action('init', 'add_project_default_connector');
