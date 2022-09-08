<?php
/**
 * @package Meme
 * @version 1.7.2
 */
/*
Plugin Name: Meme
Plugin URI: http://wordpress.org/plugins/Meme/
Description: this is a plugin to display Meme thumbnails into the wordpress pages
Author: Callens Johan
Version: 0.1
Author URI: none
*/

/*
* On utilise une fonction pour créer notre custom post type 'Meme'
*/

function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Meme', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Meme', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Meme'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Tous les Meme'),
		'view_item'           => __( 'Voir les Memes'),
		'add_new_item'        => __( 'Ajouter un nouveau Meme'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer la Meme'),
		'update_item'         => __( 'Modifier la Meme'),
		'search_items'        => __( 'Rechercher un Meme'),
		'not_found'           => __( 'Non trouvé'),
		'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Meme'),
		'description'         => __( 'Tous sur Meme'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'series-tv'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'seriestv', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );




//api

add_action('rest_api_init',function(){
    register_rest_route('meme/v1', 'post',[
        'methods' => 'GET',
        'callback' => function (){
            return ['success' => 'hello world'];
        }
    ]);
});
?>