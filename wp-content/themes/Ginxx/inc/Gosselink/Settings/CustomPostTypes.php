<?php

namespace Gosselink\Settings;
/**
 * Created by Jerome GROSDENIER <jerome.grosdenier@gosselink.fr>
 * User: studio21
 * Date: 19/04/2018
 * Time: 17:27
 */
class CustomPostTypes
{

    function __construct()
    {
        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_taxonomies'));
    }

    function register_post_types()
    {
        //this is where you can register custom post types

        $labels = array(
            'name' => _x('Formations', 'Post Type General Name', 'gosselink'),
            'singular_name' => _x('Formation', 'Post Type Singular Name', 'gosselink'),
            'menu_name' => __('Formations', 'gosselink'),
            'parent_item_colon' => __('Formation parent', 'gosselink'),
            'all_items' => __('Tous les formations', 'gosselink'),
            'view_item' => __('Voir le formation', 'gosselink'),
            'add_new_item' => __('Ajouter un nouveau formation', 'gosselink'),
            'add_new' => __('Ajouter', 'gosselink'),
            'edit_item' => __('Modifier le formation', 'gosselink'),
            'update_item' => __('Mettre à jour le formation', 'gosselink'),
            'search_items' => __('Rechercher un formation', 'gosselink'),
            'not_found' => __('Introuvable', 'gosselink'),
            'not_found_in_trash' => __('Introuvable dans la corbeille', 'gosselink'),
        );
        $args = array(
            'label' => __('formations', 'gosselink'),
            'description' => __('Formations', 'gosselink'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array(),
            'hierarchical' => false,
            'public' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 24,
            'menu_icon' => 'dashicons-images-alt',
            'can_export' => true,
            'has_archive' => false,
            'capability_type' => 'page',
            'show_in_rest' => true,
            'rewrite' => array(
                'with_front' => true
            ),
        );

        register_post_type('formation', $args);

        $labels = array(
            'name' => _x('Références', 'Post Type General Name', 'gosselink'),
            'singular_name' => _x('Référence', 'Post Type Singular Name', 'gosselink'),
            'menu_name' => __('Références', 'gosselink'),
            'parent_item_colon' => __('Référence parent', 'gosselink'),
            'all_items' => __('Toutes les références', 'gosselink'),
            'view_item' => __('Voir la référence', 'gosselink'),
            'add_new_item' => __('Ajouter une nouvelle référence', 'gosselink'),
            'add_new' => __('Ajouter', 'gosselink'),
            'edit_item' => __('Modifier la référence', 'gosselink'),
            'update_item' => __('Mettre à jour la référence', 'gosselink'),
            'search_items' => __('Rechercher une référence', 'gosselink'),
            'not_found' => __('Introuvable', 'gosselink'),
            'not_found_in_trash' => __('Introuvable dans la corbeille', 'gosselink'),
        );
        $args = array(
            'label' => __('références', 'gosselink'),
            'description' => __('Références', 'gosselink'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array(),
            'hierarchical' => false,
            'public' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 24,
            'menu_icon' => 'dashicons-images-alt',
            'can_export' => true,
            'has_archive' => false,
            'capability_type' => 'page',
            'show_in_rest' => true,
            'rewrite' => array(
                'with_front' => true
            ),
        );

        register_post_type('reference', $args);

        $labels = array(
            'name' => _x('Services', 'Post Type General Name', 'gosselink'),
            'singular_name' => _x('Service', 'Post Type Singular Name', 'gosselink'),
            'menu_name' => __('Services', 'gosselink'),
            'parent_item_colon' => __('Service parent', 'gosselink'),
            'all_items' => __('Tous les services', 'gosselink'),
            'view_item' => __('Voir le service', 'gosselink'),
            'add_new_item' => __('Ajouter un nouveau service', 'gosselink'),
            'add_new' => __('Ajouter', 'gosselink'),
            'edit_item' => __('Modifier le service', 'gosselink'),
            'update_item' => __('Mettre à jour le service', 'gosselink'),
            'search_items' => __('Rechercher un service', 'gosselink'),
            'not_found' => __('Introuvable', 'gosselink'),
            'not_found_in_trash' => __('Introuvable dans la corbeille', 'gosselink'),
        );
        $args = array(
            'label' => __('services', 'gosselink'),
            'description' => __('Services', 'gosselink'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array(),
            'hierarchical' => false,
            'public' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 24,
            'menu_icon' => 'dashicons-superhero-alt',
            'can_export' => true,
            'has_archive' => false,
            'capability_type' => 'page',
            'show_in_rest' => true,
            'rewrite' => array(
                'with_front' => true
            ),
        );

        register_post_type('service', $args);

        $labels = array(
            'name' => _x('Teams', 'Post Type General Name', 'gosselink'),
            'singular_name' => _x('Team', 'Post Type Singular Name', 'gosselink'),
            'menu_name' => __('Teams', 'gosselink'),
            'parent_item_colon' => __('Team parent', 'gosselink'),
            'all_items' => __('Toutes les teams', 'gosselink'),
            'view_item' => __('Voir le teams', 'gosselink'),
            'add_new_item' => __('Ajouter un nouveau teams', 'gosselink'),
            'add_new' => __('Ajouter', 'gosselink'),
            'edit_item' => __('Modifier le team', 'gosselink'),
            'update_item' => __('Mettre à jour le team', 'gosselink'),
            'search_items' => __('Rechercher un team', 'gosselink'),
            'not_found' => __('Introuvable', 'gosselink'),
            'not_found_in_trash' => __('Introuvable dans la corbeille', 'gosselink'),
        );

        $args = array(
            'label' => __('teams', 'gosselink'),
            'description' => __('Teams', 'gosselink'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array(),
            'hierarchical' => false,
            'public' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 24,
            'menu_icon' => 'dashicons-superhero-alt',
            'can_export' => true,
            'has_archive' => false,
            'capability_type' => 'page',
            'show_in_rest' => true,
            'rewrite' => array(
                'with_front' => true
            ),
        );

        register_post_type('team', $args);

        $labels = array(
            'name' => _x('Partenaires', 'Post Type General Name', 'gosselink'),
            'singular_name' => _x('Partenaire', 'Post Type Singular Name', 'gosselink'),
            'menu_name' => __('Partenaires', 'gosselink'),
            'parent_item_colon' => __('Partenaire parent', 'gosselink'),
            'all_items' => __('Tous les partenaires', 'gosselink'),
            'view_item' => __('Voir le partenaire', 'gosselink'),
            'add_new_item' => __('Ajouter un nouveau partenaire', 'gosselink'),
            'add_new' => __('Ajouter', 'gosselink'),
            'edit_item' => __('Modifier le partenaire', 'gosselink'),
            'update_item' => __('Mettre à jour le partenaire', 'gosselink'),
            'search_items' => __('Rechercher un partenaire', 'gosselink'),
            'not_found' => __('Introuvable', 'gosselink'),
            'not_found_in_trash' => __('Introuvable dans la corbeille', 'gosselink'),
        );
        $args = array(
            'label' => __('partenaires', 'gosselink'),
            'description' => __('Partenaires', 'gosselink'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array(),
            'hierarchical' => false,
            'public' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 24,
            'menu_icon' => 'dashicons-admin-users',
            'can_export' => true,
            'has_archive' => false,
            'capability_type' => 'page',
            'show_in_rest' => true,
            'rewrite' => array(
                'with_front' => true
            ),
        );

        register_post_type('partner', $args);

        $labels = array(
            'name' => _x('Témoignages', 'Post Type General Name', 'gosselink'),
            'singular_name' => _x('Témoignage', 'Post Type Singular Name', 'gosselink'),
            'menu_name' => __('Témoignages', 'gosselink'),
            'parent_item_colon' => __('Témoignage parent', 'gosselink'),
            'all_items' => __('Tous les témoignages', 'gosselink'),
            'view_item' => __('Voir le témoignage', 'gosselink'),
            'add_new_item' => __('Ajouter un nouveau témoignage', 'gosselink'),
            'add_new' => __('Ajouter', 'gosselink'),
            'edit_item' => __('Modifier le témoignage', 'gosselink'),
            'update_item' => __('Mettre à jour le témoignage', 'gosselink'),
            'search_items' => __('Rechercher un témoignage', 'gosselink'),
            'not_found' => __('Introuvable', 'gosselink'),
            'not_found_in_trash' => __('Introuvable dans la corbeille', 'gosselink'),
        );
        $args = array(
            'label' => __('témoignages', 'gosselink'),
            'description' => __('Témoignages', 'gosselink'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array(),
            'hierarchical' => false,
            'public' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 24,
            'menu_icon' => 'dashicons-testimonial',
            'can_export' => true,
            'has_archive' => false,
            'capability_type' => 'page',
            'show_in_rest' => true,
            'rewrite' => array(
                'with_front' => true
            ),
        );

        register_post_type('testimonial', $args);

        $labels = array(
            'name' => _x('Slides', 'Post Type General Name', 'gosselink'),
            'singular_name' => _x('Slide', 'Post Type Singular Name', 'gosselink'),
            'menu_name' => __('Slides', 'gosselink'),
            'parent_item_colon' => __('Slide parent', 'gosselink'),
            'all_items' => __('Tous les slides', 'gosselink'),
            'view_item' => __('Voir le slide', 'gosselink'),
            'add_new_item' => __('Ajouter un nouveau slide', 'gosselink'),
            'add_new' => __('Ajouter', 'gosselink'),
            'edit_item' => __('Modifier le slide', 'gosselink'),
            'update_item' => __('Mettre à jour le slide', 'gosselink'),
            'search_items' => __('Rechercher un slide', 'gosselink'),
            'not_found' => __('Introuvable', 'gosselink'),
            'not_found_in_trash' => __('Introuvable dans la corbeille', 'gosselink'),
        );
        $args = array(
            'label' => __('slides', 'gosselink'),
            'description' => __('Slides', 'gosselink'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail', 'author'),
            'taxonomies' => array(),
            'hierarchical' => false,
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 24,
            'menu_icon' => 'dashicons-format-image',
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'capability_type' => 'page',
            'rewrite' => array(
                'slug' => 'slides',
                'with_front' => false
            ),
        );

        register_post_type('slide', $args);
    }

    function register_taxonomies()
    {
        //this is where you can register custom taxonomies
        // Products certificating organisations
        $labels = array(
            'name' => _x('Organismes de prise en charge', 'taxonomy general name', 'gosselink'),
            'singular_name' => _x('Organisme de prise en charge', 'taxonomy singular name', 'gosselink'),
            'search_items' => __('Rechercher un organisme', 'gosselink'),
            'all_items' => __('Tous les organismes', 'gosselink'),
            'parent_item' => __('Organisme parent', 'gosselink'),
            'parent_item_colon' => __('Organisme parent :', 'gosselink'),
            'edit_item' => __('Modifier l\'organisme', 'gosselink'),
            'update_item' => __('Mettre à jour l\'organisme', 'gosselink'),
            'add_new_item' => __('Ajouter un nouvel organisme', 'gosselink'),
            'new_item_name' => __('Nouvel organisme', 'gosselink'),
            'menu_name' => __('Organismes de prise en charge', 'gosselink'),
        );
        $args = array(
            'labels' => $labels,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'rewrite' => false,
            'hierarchical' => true
        );
        register_taxonomy('support-organization', 'formation', $args);


        // Products certificating organisations
        $labels = array(
            'name' => _x('Catégories', 'taxonomy general name', 'gosselink'),
            'singular_name' => _x('Catégorie', 'taxonomy singular name', 'gosselink'),
            'search_items' => __('Rechercher une catégorie', 'gosselink'),
            'all_items' => __('Toutes les catégories', 'gosselink'),
            'parent_item' => __('Catégorie parent', 'gosselink'),
            'parent_item_colon' => __('Catégorie parent :', 'gosselink'),
            'edit_item' => __('Modifier la catégorie', 'gosselink'),
            'update_item' => __('Mettre à jour la catégorie', 'gosselink'),
            'add_new_item' => __('Ajouter un nouvelle catégorie', 'gosselink'),
            'new_item_name' => __('Nouvelle catégorie', 'gosselink'),
            'menu_name' => __('Catégorie', 'gosselink'),
        );
        $args = array(
            'labels' => $labels,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'rewrite' => false,
            'hierarchical' => true
        );
        register_taxonomy('cat-reference', 'reference', $args);

    }
}