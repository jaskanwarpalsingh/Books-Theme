# Task One :
------------------
**Task Description :** The first is to test your attention to detail, ability to spot mistakes and also suggest improvements. 

**Solution:** I've checked the code and it seems like we want display the list of books in a loop along with associated genres. I have fixed the issue and suggestion in my template file, You can check below.

**Path :** `https://github.com/jaskanwarpalsingh/Books-Theme/src/master/TASK%201/task1-corrected.php`

[CLICK HERE TO VIEW THE FILE](https://github.com/jaskanwarpalsingh/Books-Theme/src/master/TASK%201/task1-corrected.php)

**Suggessions:**

* I believe that executing the **get terms()** method will display all of the terms, but we need to display the genres based on a book, thus the call should be in the loop and the function will be **get the terms($post id, $taxonomy name)**.
* We should cross check the **post_type** and **taxonomy** existence before calling them. We can use the functions (**taxonomy_exists()** and **post_type_exists()**)
* Before executing the loop to display the list of books, we can just check that the books count should be more than 0 to avoid errors.
* In case of **get_terms()** function call, if we don't want to fetch the **empty taxonomies** so we have to pass one additional parameter in the array **('hide_empty' => 1)**

**Issues:**

* No need to add **echo** before **header()** function call.
* In **query_posts()** function call, **'posttype'** parameter is incorrect, and it should be **'post_type'**.
* **$classes** variable is undefined, so if want to pass any class then we can define before the **body_class()** function call
* **$book->id** (In this code, the **"id"** should be in capital like **"ID"**)
* Instead using **"the_permalink_rss()"** function we should use **"get_the_permalink($book_id)"** 
* **get_the_title()** (In this code, there are 2 errors, first we need to add **"echo"** for the function call, and another one is we must pass the **Book ID** or otherwise it will fetch the **Page Title**)
* **the_excerpt()** (In this code, we should use **get_the_excerpt()** function by passing Book ID)
* echo $genres[0]+', '+$genres[1]+', '+$genres[2] (This code will not work out, becuase we're trying to print objects)
* **get_footer()** will be used to fetch the footer section instead of file path

# Task Two :
------------------
**Task Description:** The second will be a small competency test to determine your skills in developing a bespoke piece of code. 
Please create a sample WordPress site that achieves the following: 

* Uses custom post type for books 
* Uses a custom taxonomy for book genres 
* Features a template to list all published books with the following features: 
* Must show 8-10 results per page 
* Load more books using AJAX 
* Ability to filter books by genre 

No other templates are required, but the template above should produce a full valid HTML page with no JavaScript errors. 
Please include any credentials, files and databases required to test your code. 

**Solution:** I've created a custom theme with basic bootstrap template to represent in best way. You can access the code from the above repository.

**Directory Details :**

* assets/ : This directory contain all css, js and images
* database/ : This directory contains .sql file that will help to import the DB.
* lib/ : This direcory contains **custom functions**, **custom post type**, **custom taxonomy** and **enqueuing**.