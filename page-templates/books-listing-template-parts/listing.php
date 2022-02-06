<?php
/**
 * code used to display the listing of the books
 */
// assign the books value to the variable
$books = $args['books'];
?>

<div class="col-md-8">
    <div class="books-list-sub-container">
        <div class="books-list">
            <?php get_template_part( 'template-parts/post/content', 'books',array('posts'=>$books) ); ?>
        </div>
    </div>
    <?php if (  $wp_query->max_num_pages > 1 ) { ?>
        <div class="load-more-container">
            <a href="javascript:void(0)" class="loadmore_btn">Load More</a>
            <input type="hidden" value="<?php echo $wp_query->max_num_pages ?>" id="max-pages" />
        </div>
    <?php } ?>  
</div>