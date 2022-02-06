<?php
/**
 * Template Name: Book Template
 */

echo get_header();

$genres = get_terms([
    'taxonomy' => 'genres',
]);

$books = query_posts(
    array(
        'orderby'     => 'title',
        'order'       => 'ASC',
        'post_status' => 'any',
        'posttype'    => array('book'),
    )
);
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/partials/_head'); ?>
<body <?php body_class($classes); ?>>

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 col-xl-10 mx-auto">
                <h1>List of Books</h1>

                <?php foreach ($books as $book) : ?>
                    <div id="#book-<?php echo $book->id ?>" class="book">
                        <a href="<?php the_permalink_rss(); ?>" cass="book-link">
                            <h2 class="book-title"><?php get_the_title(); ?></h2>
                            <div class="book-excerpt"><?php the_excerpt(); ?></div>
                            <div class="book-genre">
                                <?php echo $genres[0] + ', ' + $genres[1] + ', ' + $genres[2] ?>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php include('/home/users/tester/wordpress/wp-content/themes/test-theme/footer.php'); ?>
</body>
</html>
