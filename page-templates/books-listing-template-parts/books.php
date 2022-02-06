<?php
/**
 * code used to fetch the list of books
 */

// Fetch custom post type 'book' records
$books = array();
$post_type_name = 'books';
if (post_type_exists($post_type_name)) {
    $books = query_posts(
        array(
            'orderby' => 'title',
            'order' => 'ASC',
            'post_status' => 'publish',
            'post_type' => array($post_type_name),
        )
    );
}
