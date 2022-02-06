<?php
    /**!
     * Enqueues
     */
	//enqueues style and scripts
	if ( ! function_exists('booksmod_enqueues') ) {
		
		add_action('wp_enqueue_scripts', 'booksmod_enqueues', 1000);
		function booksmod_enqueues() {
			global $wp_query;

			wp_register_style('rgs-font-awesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0', null);
			wp_enqueue_style('rgs-font-awesome-css');

            // Gogole fonts and bootstrap styles
			wp_register_style('booksmod-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css', false, null);
			wp_enqueue_style('booksmod-bootstrap');

			//Main Css
			$BooksModStyleTime = filemtime( get_stylesheet_directory() . '/assets/css/booksMod.css' );
			wp_register_style('booksmod-style', get_stylesheet_directory_uri() . '/assets/css/booksMod.css', false, $BooksModStyleTime, null);
			wp_enqueue_style('booksmod-style');	
			
			// register our main script but do not enqueue it yet
			wp_register_script( 'loadmore_js', get_stylesheet_directory_uri() . '/assets/js/loadmore.js', array('jquery') );
		
			wp_localize_script( 'loadmore_js', 'loadmore_params', array(
				'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', 
				'ajax_nonce' => wp_create_nonce('books_nonce'),
				'posts' => json_encode( $wp_query->query_vars ), 
				'current_page' =>  get_query_var( 'paged' ) ? get_query_var('paged') : 1,
				'max_page' => $wp_query->max_num_pages
			) );
		
			wp_enqueue_script( 'loadmore_js' );
			
		}
	}
?>