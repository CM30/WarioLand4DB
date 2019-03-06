<?php 
/**
* Plugin Name: Mod Database
* Plugin URL: https://warioforums.com
* Description: Adds a level database for Wario Land levels
* Version: 1.0
* Author: CM30
* Author URL: https://warioforums.com
**/

namespace modDB;

class mainModDB {
    public function __construct() {
        add_action( 'init', array($this, 'register_levels'));
    }
    public function register_levels() {

        $labels = array(
            'name'                  => _x( 'Mods', 'Post Type General Name', 'mod-db' ),
            'singular_name'         => _x( 'Mod', 'Post Type Singular Name', 'mod-db' ),
            'menu_name'             => __( 'Mods and Levels', 'mod-db' ),
            'name_admin_bar'        => __( 'Mod', 'mod-db' ),
            'archives'              => __( 'Mod Archives', 'mod-db' ),
            'attributes'            => __( 'Mod Attributes', 'mod-db' ),
            'parent_item_colon'     => __( 'Parent Mod:', 'mod-db' ),
            'all_items'             => __( 'All Mods', 'mod-db' ),
            'add_new_item'          => __( 'Add New Mod', 'mod-db' ),
            'add_new'               => __( 'Add New', 'mod-db' ),
            'new_item'              => __( 'New Mod', 'mod-db' ),
            'edit_item'             => __( 'Edit Mod', 'mod-db' ),
            'update_item'           => __( 'Update Mod', 'mod-db' ),
            'view_item'             => __( 'View Mod', 'mod-db' ),
            'view_items'            => __( 'View Mods', 'mod-db' ),
            'search_items'          => __( 'Search Mods', 'mod-db' ),
            'not_found'             => __( 'Not found', 'mod-db' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'mod-db' ),
            'featured_image'        => __( 'Featured Image', 'mod-db' ),
            'set_featured_image'    => __( 'Set featured image', 'mod-db' ),
            'remove_featured_image' => __( 'Remove featured image', 'mod-db' ),
            'use_featured_image'    => __( 'Use as featured image', 'mod-db' ),
            'insert_into_item'      => __( 'Insert into item', 'mod-db' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Mod', 'mod-db' ),
            'items_list'            => __( 'Mods list', 'mod-db' ),
            'items_list_navigation' => __( 'Mods list navigation', 'mod-db' ),
            'filter_items_list'     => __( 'Filter Mods list', 'mod-db' ),
        );
        $args = array(
            'label'                 => __( 'Mod', 'mod-db' ),
            'description'           => __( 'Mods for Wario Land 4', 'mod-db' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'comments' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'mod', $args );
    
    }
}

new mainModDB;

?>