<?php
/**
 * code used to display the filter box
 */

// assign the genres value to the variable
$genres = $args['genres'];
?>

<div class="col-md-4">
    <div class="book-list-container">
        <div class="search-box">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Books by Name" name="keyword" id="keyword" onkeyup="fetch('')"></input>
                <div class="input-group-append">
                    <span class="btn bg-white">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
            <div class="label-append">
                <a class="float-end" href="javascript:void(0);" id="reset-button">Clear All</a>
            </div>
        </div>
        <?php if(count($genres)>0) { ?>
            <div class="filters-box">
                <ul class="p-0">
                    <?php foreach($genres as $genre) {
                        echo '<li><label class="filter-checkbox-label form-check d-flex align-items-center"><input class="form-check-input genre-checkboxes mr-3" type="checkbox" value="'.$genre->term_id.'" />'.$genre->name.'</label></li>';
                    } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>