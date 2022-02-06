<?php

/**
 * Creating a function to create our CPT
 */
function books_custom_post_type()
{
    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Books', 'Post Type General Name', 'twentytwenty'),
        'singular_name' => _x('Book', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name' => __('Books', 'twentytwenty'),
        'parent_item_colon' => __('Parent Book', 'twentytwenty'),
        'all_items' => __('All Books', 'twentytwenty'),
        'view_item' => __('View Book', 'twentytwenty'),
        'add_new_item' => __('Add New Book', 'twentytwenty'),
        'add_new' => __('Add New', 'twentytwenty'),
        'edit_item' => __('Edit Book', 'twentytwenty'),
        'update_item' => __('Update Book', 'twentytwenty'),
        'search_items' => __('Search Book', 'twentytwenty'),
        'not_found' => __('Not Found', 'twentytwenty'),
        'not_found_in_trash' => __('Not found in Trash', 'twentytwenty'),
    );
    // Set other options for Custom Post Type
    $args = array(
        'label' => __('books', 'twentytwenty'),
        'description' => __('Book news and reviews', 'twentytwenty'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-book-alt'
    );
    // Registering your Custom Post Type
    register_post_type('books', $args);
}
add_action('init', 'books_custom_post_type', 0);
