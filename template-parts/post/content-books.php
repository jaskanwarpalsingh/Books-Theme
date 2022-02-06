<?php
// fetch the values from the passed $args array and assign to variable
$books = $args['posts'];

// pre check the number of returned books before executing the loop
if(count($books)>0): ?>

    <div class="row mb-2">

        <?php foreach ($books as $book): ?>
        
            <!-- Assign Book ID value to a variable -->
            <?php $book_id = $book->ID; ?>
            
            <!-- Append a unique Book ID to the element's id string -->
            <div class="col-md-6">

                <div id="book-<?php echo $book_id; ?>" class="card border-0 mb-3">

                    <?php
                    // call the thumbnail template part and pass the data to display
	                get_template_part( 'template-parts/post/books-parts/thumbnail', '',array('book_id'=>$book_id) );
                    ?>

                    <div class="card-body px-0">
                        
                        <?php
                        // call the title template part and pass the data to display
                        get_template_part( 'template-parts/post/books-parts/title', '',array('book_id'=>$book_id) );
                        ?>

                        <?php
                        // call the genre template part and pass the data to display
                        get_template_part( 'template-parts/post/books-parts/genres', '',array('book_id'=>$book_id) );
                        ?>

                        <?php
                        // call the excerpt template part and pass the data to display
                        get_template_part( 'template-parts/post/books-parts/excerpt', '',array('book_id'=>$book_id) );
                        ?>

                    </div>
                </div>
            </div>

        <?php endforeach;?>

        <?php if(count($books)<10): ?>
            <input type="hidden" name="hide-load-more" value="1" id="hide-load-more" />
        <?php endif; ?>
        
    </div>
<?php endif; ?>