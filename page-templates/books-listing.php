<?php
/**
 * Template Name: Books Listing Template
 */
get_header();

// include the genres fetching loop
require get_stylesheet_directory() . '/page-templates/books-listing-template-parts/genres.php';

// include the books fetching loop
require get_stylesheet_directory() . '/page-templates/books-listing-template-parts/books.php';

// define the custom body classes we want to add
$classes = 'custom-body-class';

?>
<section class="container my-4">
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">

        <?php
        // call the thumbnail template part and pass the data to display
        get_template_part( 'page-templates/books-listing-template-parts/title');

        // call the thumbnail template part and pass the data to display
        get_template_part( 'page-templates/books-listing-template-parts/description');
        ?>

</div>
  </div>
</section>
<!-- Validate if the records are existing in the custom post type 'book' -->
<?php if(count($books)>0): ?>
    <section class="page-content my-4">
        <div class="container">

            <?php
            // call the thumbnail template part and pass the data to display
            get_template_part( 'page-templates/books-listing-template-parts/headings');
            ?>
            
            <div class="row">
                
                <?php
                // call the thumbnail template part and pass the data to display
                get_template_part( 'page-templates/books-listing-template-parts/filter-box','',array('genres'=>$genres) );
                
                // call the thumbnail template part and pass the data to display
                get_template_part( 'page-templates/books-listing-template-parts/listing','',array('books'=>$books) );
                ?>
                
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
</body>
</html>
