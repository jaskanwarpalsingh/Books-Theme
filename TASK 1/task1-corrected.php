<?php
/**
 * Template Name: Book Template
 */
get_header();

// Fetch 'genres' taxonomy entries
$genres = array();
$taxonomy_name = 'genres';
if (taxonomy_exists($taxonomy_name)) {
    $genres = get_terms([
        'taxonomy' => $taxonomy_name,
        'hide_empty' => 1,
    ]);
}

// Fetch custom post type 'book' records
$books = array();
$post_type_name = 'book';
if (post_type_exists($post_type_name)) {
    $books = query_posts(
        array(
            'orderby' => 'title',
            'order' => 'ASC',
            'post_status' => 'any',
            'post_type' => array($post_type_name),
        )
    );
}

// define the custom body classes we want to add
$classes = 'custom-body-class';

?>
<!doctype html>
<html <?php language_attributes();?>>
<?php get_template_part('templates/partials/_head');?>
<body <?php body_class($classes);?>>

<!-- Validate if the records are existing in the custom post type 'book' -->
<?php if(count($books)>0): ?>
    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-xl-10 mx-auto">
                    <h1>List of Books</h1>
                    <!-- Loop to display the list of books -->
                    <?php foreach ($books as $book): ?>
                        <!-- Assign Book ID value to a variable -->
                        <?php $book_id = $book->ID; ?>
                        <!-- Append a unique Book ID to the element's id string -->
                        <div id="#book-<?php echo $book_id; ?>" class="book">
                            <a href="<?php echo get_the_permalink($book_id);?>" cass="book-link">
                                <h2 class="book-title"><?php echo get_the_title($book_id);?></h2>
                                <div class="book-excerpt"><?php echo get_the_excerpt($book_id);?></div>
                                <div class="book-genre">
                                    <?php
                                        // Fetch the list of associated genres based on book ID
                                        $term_obj_list = get_the_terms( $book_id, $taxonomy_name );
                                        if(!empty($term_obj_list)) {
                                            echo join(', ', wp_list_pluck($term_obj_list, 'name'));
                                        }
                                    ?>
                                </div>
                            </a>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
</body>
</html>
