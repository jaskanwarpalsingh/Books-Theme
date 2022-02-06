<?php 
/**
 * code used to display the thumbnail of the book
 */

// assign the book id value to the variable
$book_id = $args['book_id'];

// fetch thumbnail url by book id
$featuredImageURL = wp_get_attachment_url( get_post_thumbnail_id($book_id), 'thumbnail' ); 

// if thumbnail exists
if($featuredImageURL) { ?>

    <img src="<?php echo $featuredImageURL; ?>" class="rounded shadow-sm overflow-hidden const-wh" />

<?php } else { ?>

    <svg class="rounded shadow-sm overflow-hidden const-wh bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

<?php } ?>