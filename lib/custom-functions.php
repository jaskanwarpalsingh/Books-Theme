<?php

/**
 * Function used to filter the books as per the search, filtering and load more functionality
 * 
 * filter_books_ajax_handler
 *
 * @return void
 */
function filter_books_ajax_handler(){

	// verify the nonce
	if(wp_verify_nonce( $_POST['ajax_nonce'] , 'books_nonce')) {

		// prepare our arguments for the query
		$args = json_decode( stripslashes( $_POST['query'] ), true );

		// arguments for the fetch books query
		$args_books = array(
			'paged' => $_POST['page'] + 1,
			'post_status' => 'publish',
			'post_type' => array('books'),
			's' => esc_attr( $_POST['keyword'] ),
			'order' => 'ASC',
			'orderby' => 'title',
		);

		// append taxonomy related arguments in the array if the request is coming to filter by genre
		if(!empty($_POST['genre'])) {
			$g_array = explode(',',$_POST['genre']);
			$args_books['tax_query'] = array(
				array(
				'taxonomy' => 'genres',
				'field' => 'term_id',
				'terms' => $g_array
				)
			);
		}

		// execute the query
		$books = query_posts( $args_books );

		// call the template part and pass the data to display
		get_template_part( 'template-parts/post/content', 'books',array('posts'=>$books) );
	}

	// terminate the process
	die; 
}

// actions used to handle filter books functionality
add_action('wp_ajax_filter_books', 'filter_books_ajax_handler');
add_action('wp_ajax_nopriv_filter_books', 'filter_books_ajax_handler');