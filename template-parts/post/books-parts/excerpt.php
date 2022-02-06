<?php
/**
 * code used to display the exerpt of the book
 */

// assign the book id value to the variable
$book_id = $args['book_id'];
?>

<p class="card-text"><?php echo get_the_excerpt($book_id);?></p>