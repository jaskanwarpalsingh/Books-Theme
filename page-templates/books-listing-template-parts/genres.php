<?php
/**
 * code used to fetch the list of genres
 */

// Fetch 'genres' taxonomy entries
$genres = array();
$taxonomy_name = 'genres';
if (taxonomy_exists($taxonomy_name)) {
    $genres = get_terms([
        'taxonomy' => $taxonomy_name,
        'hide_empty' => 1,
    ]);
}
