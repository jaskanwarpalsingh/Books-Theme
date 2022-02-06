jQuery(function ($) { 

    /**
     * On click event for the Load more button to fetch the books list
     */
    $('.loadmore_btn').click(function () {
    
        // element variable and data values to pass in the ajax request
        var button = $(this),
            data = {
                'action': 'filter_books',
                'query': loadmore_params.posts,
                'page': loadmore_params.current_page,
                'ajax_nonce': loadmore_params.ajax_nonce,
                keyword: jQuery('#keyword').val()
            };
    
        // ajax request to fetch the books list
        $.ajax({ 
            url: loadmore_params.ajaxurl,
            data: data,
            type: 'POST',
            beforeSend: function (xhr) {
                // change the text of load more button before sending the request
                button.text('Loading...');
            },
            success: function (data) {
                
                // trim the data to before validate that the response is coming or not
                data = data.trim();
                
                // validate the response length
                if (data) {

                    // assign response of books list in the html
                    $('.books-list').append(data);
    
                    // increement the current page to validate that we need to show the load more button or not
                    loadmore_params.current_page++;
    
                    // reset the button text
                    button.text('Load More');
    
                    // get the total number of pages
                    var maxPages = jQuery('#max-pages').val();
    
                    // if the logic reached up to limit and displayed all the books, then remove the button from the html
                    if (loadmore_params.current_page == maxPages)
                        button.remove();
    
                } else {
                    // remove the load more button if there is no books in the response
                    button.remove();
                }
            }
        });

    });

    /**
     * On click event to reset the filter books form
     */
    $('#reset-button').on('click', function() {
        $('#keyword').val('').trigger('keyup');
        $('.filters-box :checkbox').prop('checked',false);
    });

    /**
     * On change event to filter the books by genres
     */
    $('.genre-checkboxes').on('change', function() {
        var checkBoxes=[];
        $(".genre-checkboxes:checked").each(function(){
            checkBoxes.push($(this).val());
        });
        var genres = checkBoxes.toString();

        // function call to fetch the updated list of books
        fetch(genres);
    });
});

/**
 * Function used to filter the books list as per the genres
 * 
 * fetch
 * 
 * @param {string} genres 
 */
function fetch(genres) {

    // reset the load more button visibility
    jQuery('.loadmore_btn').show();

    // data to pass with ajax request
    var data = {
        action: 'filter_books',
        ajax_nonce: loadmore_params.ajax_nonce,
        keyword: jQuery('#keyword').val(),
        genre:genres
    };

    // ajax request to filter the books by genres
    jQuery.ajax({
        url: loadmore_params.ajaxurl,
        type: 'POST',
        data: data,
        success: function (data) {
            // trim the data to before validate that the response is coming or not
            data = data.trim();

            // validate the response length
            if (data.length > 0) {

                // assign response of books list in the html
                jQuery('.books-list').html(data);
            } else {

                // if no books found
                jQuery('.books-list').html('<p class="text-center">No Books found!</p>');
                // hide the load more button
                jQuery('.loadmore_btn').hide();
            }

            // the element is get set in the response if the count of posts is less than minimum quantity to validate that we need to show the load button or not
            if(jQuery('#hide-load-more').val() == '1') {
                
                // hide the load more button
                jQuery('.loadmore_btn').hide();
            }
        }
    });
}