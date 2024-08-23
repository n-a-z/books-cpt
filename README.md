# Twenty-Twenty Child theme for Books custom post type

## Styling
Insert your custom CSS rules in style.css.

## JS
Custom JavaScript file is located in assets/js/scripts.js.

## CPT and Taxonomy
This adds custom post type "Books" with taxonomy "Genre".
Custom post type has "library" slug.
Taxonomy has "book-genre" slug.

## Custom templates
Single Book page can be found in single-books.php.
Genre page (taxonomy) can be found in taxonomy-genre.php.

## Shortcodes
There are two custom shortcodes:
### recent_book_title
Shortcode to display the title of the most recent book.

### books_by_genre genre_id=""
Shortcode to display a list of 5 books from a given genre using taxonomy ID.

## AJAX callback
In assets/js/scripts.js there's an AJAX callback returning 20 books in JSON format.
