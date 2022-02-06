<?php
/**
 * code used to display the title of the book
 */

// assign the book id value to the variable
$book_id = $args['book_id'];
?>

<a href="<?php echo get_the_permalink($book_id);?>" cass="book-link">
    <h5 class="book-title"><?php echo get_the_title($book_id);?></h5>
</a>