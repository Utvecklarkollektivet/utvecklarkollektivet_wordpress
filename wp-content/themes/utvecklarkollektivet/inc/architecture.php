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
function add_members_in_projet_field_group() {
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
add_action('init', 'add_members_in_projet_field_group');

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
	      		)
	    	),
	    	'post_types' => array('projekt')
	  	)
	);
}
add_action( 'init', 'add_project_post_connector' );