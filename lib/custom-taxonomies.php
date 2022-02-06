<?php

//create a custom taxonomy name it subjects for your posts
function create_genres_hierarchical_taxonomy()
{
// Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI
    $labels = array(
        'name' => _x('Genres', 'taxonomy general name'),
        'singular_name' => _x('Genre', 'taxonomy singular name'),
        'search_items' => __('Search Genres'),
        'all_items' => __('All Genres'),
        'parent_item' => __('Parent Genre'),
        'parent_item_colon' => __('Parent Genre:'),
        'edit_item' => __('Edit Genre'),
        'update_item' => __('Update Genre'),
        'add_new_item' => __('Add New Genre'),
        'new_item_name' => __('New Genre Name'),
        'menu_name' => __('Genres'),
    );
// Now register the taxonomy
    register_taxonomy('genres', array('books'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'genre'),
    ));
}

//hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'create_genres_hierarchical_taxonomy', 0);
