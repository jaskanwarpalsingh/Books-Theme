<?php
/**
 * code used to display the genres of the book
 */

// assign the book id value to the variable
$book_id = $args['book_id'];
?>

<div class="book-genre">
    <?php
        // Fetch the list of associated genres based on book ID
        $term_obj_list = get_the_terms( $book_id, 'genres' );

        // if genres exists
        if(!empty($term_obj_list)) { ?>
            <span class="my-2">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tags-grid.svg" alt="CatIcon">
            </span><?php 
            
            echo join(', ', wp_list_pluck($term_obj_list, 'name'));
        }
    ?>
</div>