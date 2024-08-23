<?php

/** Function to enqueue stylesheet from parent theme */
function child_enqueue_parent_scripts()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'child_enqueue_parent_scripts');

/** Function to enqueue custom js */
function enqueue_scripts()
{
    wp_enqueue_script('jquery'); // Enqueue jQuery
    wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.0', true);

    // Localize the script with new data
    wp_localize_script('custom-scripts', 'books_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('books_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

function cptui_register_my_cpts_books()
{

    /**
     * Post Type: Books.
     */

    $labels = [
        "name" => esc_html__("Books", "custom-post-type-ui"),
        "singular_name" => esc_html__("Book", "custom-post-type-ui"),
        "add_new" => esc_html__("Add New Book", "custom-post-type-ui"),
        "add_new_item" => esc_html__("Add New Book", "custom-post-type-ui"),
        "edit_item" => esc_html__("Edit Book", "custom-post-type-ui"),
        "new_item" => esc_html__("New Book", "custom-post-type-ui"),
        "view_item" => esc_html__("View Book", "custom-post-type-ui"),
        "view_items" => esc_html__("View Books", "custom-post-type-ui"),
        "search_items" => esc_html__("Search Books", "custom-post-type-ui"),
        "not_found" => esc_html__("No books found", "custom-post-type-ui"),
        "not_found_in_trash" => esc_html__("No books found in trash", "custom-post-type-ui"),
        "parent_item_colon" => esc_html__("Parent Book:", "custom-post-type-ui"),
        "all_items" => esc_html__("All Books", "custom-post-type-ui"),
        "archives" => esc_html__("Book Archives", "custom-post-type-ui"),
        "attributes" => esc_html__("Book Attributes", "custom-post-type-ui"),
        "insert_into_item" => esc_html__("Insert into book", "custom-post-type-ui"),
        "uploaded_to_this_item" => esc_html__("Uploaded to this book", "custom-post-type-ui"),
        "featured_image" => esc_html__("Featured Image", "custom-post-type-ui"),
        "set_featured_image" => esc_html__("Set featured image", "custom-post-type-ui"),
        "remove_featured_image" => esc_html__("Remove featured image", "custom-post-type-ui"),
        "use_featured_image" => esc_html__("Use as featured image", "custom-post-type-ui"),
        "menu_name" => esc_html__("Books", "custom-post-type-ui"),
        "filter_items_list" => esc_html__("Filter books list", "custom-post-type-ui"),
        "items_list_navigation" => esc_html__("Books list navigation", "custom-post-type-ui"),
        "items_list" => esc_html__("Books list", "custom-post-type-ui"),
        "name_admin_bar" => esc_html__("Book", "custom-post-type-ui"),
        "item_published" => esc_html__("Book published", "custom-post-type-ui"),
        "item_published_privately" => esc_html__("Book published privately", "custom-post-type-ui"),
        "item_reverted_to_draft" => esc_html__("Book reverted to draft", "custom-post-type-ui"),
        "item_scheduled" => esc_html__("Book scheduled", "custom-post-type-ui"),
        "item_updated" => esc_html__("Book updated", "custom-post-type-ui"),
    ];

    $args = [
        "label" => esc_html__("Books", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "library", "with_front" => true],
        "query_var" => true,
        "supports" => ["title", "editor", "thumbnail", "excerpt", "post_tag"],
        "show_in_graphql" => false,
        "taxonomies" => array("genre"),
    ];

    register_post_type("books", $args);
}

add_action('init', 'cptui_register_my_cpts_books');

function cptui_register_my_taxes_genre()
{

    /**
     * Taxonomy: Genre.
     */

    $labels = [
        "name" => esc_html__("Genre", "custom-post-type-ui"),
        "singular_name" => esc_html__("Genre", "custom-post-type-ui"),
        "menu_name" => esc_html__("Genre", "custom-post-type-ui"),
        "all_items" => esc_html__("All Genres", "custom-post-type-ui"),
        "edit_item" => esc_html__("Edit Genre", "custom-post-type-ui"),
        "view_item" => esc_html__("View Genre", "custom-post-type-ui"),
        "update_item" => esc_html__("Update Genre", "custom-post-type-ui"),
        "add_new_item" => esc_html__("Add New Genre", "custom-post-type-ui"),
        "new_item_name" => esc_html__("New Genre Name", "custom-post-type-ui"),
        "parent_item" => esc_html__("Parent Genre", "custom-post-type-ui"),
        "parent_item_colon" => esc_html__("Parent Genre:", "custom-post-type-ui"),
        "search_items" => esc_html__("Search Genres", "custom-post-type-ui"),
        "popular_items" => esc_html__("Popular Genres", "custom-post-type-ui"),
        "separate_items_with_commas" => esc_html__("Separate genres with commas", "custom-post-type-ui"),
        "add_or_remove_items" => esc_html__("Add or remove genres", "custom-post-type-ui"),
        "choose_from_most_used" => esc_html__("Choose from the most used genres", "custom-post-type-ui"),
        "not_found" => esc_html__("No genres found", "custom-post-type-ui"),
        "no_terms" => esc_html__("No genres", "custom-post-type-ui"),
        "items_list_navigation" => esc_html__("Genres list navigation", "custom-post-type-ui"),
        "items_list" => esc_html__("Genres list", "custom-post-type-ui"),
    ];

    $args = [
        "label" => esc_html__("Genre", "custom-post-type-ui"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => ['slug' => 'book-genre', 'with_front' => true],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "rest_base" => "book-genre",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("genre", ["books"], $args);
}
add_action('init', 'cptui_register_my_taxes_genre');

/**
 * Pagination fix for Genre Taxonomy
 */
function modify_genre_query($query)
{
    if (!is_admin() && $query->is_main_query() && is_tax('genre')) {
        $query->set('post_type', 'books');
        $query->set('posts_per_page', 5);
    }
}
add_action('pre_get_posts', 'modify_genre_query');

/**
 * Shortcode to display the title of the most recent book
 * [recent_book_title]
 */
function most_recent_book_title_shortcode()
{
    // Query the most recent book
    $recent_book = new WP_Query(array(
        'post_type' => 'books',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC'
    ));

    // Check if we have a post
    if ($recent_book->have_posts()) {
        // Start output buffering
        ob_start();

        while ($recent_book->have_posts()) {
            $recent_book->the_post();
            // Output the title of the book
            echo '<div class="book-list">';
            echo '<a href="' . get_permalink() . '">' . esc_html(get_the_title()) . '</a>';
            echo '</div>';
        }

        // Clean up after the query
        wp_reset_postdata();

        // Return the buffered content
        return ob_get_clean();
    } else {
        return esc_html__('No recent books found.', 'your-text-domain');
    }
}

// Register the shortcode
add_shortcode('recent_book_title', 'most_recent_book_title_shortcode');

/** 
 * Shortcode to display a list of 5 books from a given genre using taxonomy ID
 * [books_by_genre genre_id=”″]
 */
function books_by_genre_shortcode($atts)
{
    // Attributes to accept 'genre_id' as input
    $atts = shortcode_atts(
        array(
            'genre_id' => '', // Default genre ID
        ),
        $atts,
        'books_by_genre'
    );

    // Query the books based on the genre ID
    $books_query = new WP_Query(array(
        'post_type' => 'books',
        'posts_per_page' => 5,
        'orderby' => 'title',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'genre',
                'field'    => 'term_id',
                'terms'    => $atts['genre_id'],
            ),
        ),
    ));

    // Check if we have posts
    if ($books_query->have_posts()) {
        // Start output buffering
        ob_start();

        echo '<div class="book-list">';
        while ($books_query->have_posts()) {
            $books_query->the_post();
            // Output each book title as a list item with a link to the book
            echo '<a href="' . get_permalink() . '">' . esc_html(get_the_title()) . '</a><br />';
        }
        echo '</div>';

        // Clean up after the query
        wp_reset_postdata();

        // Return the buffered content
        return ob_get_clean();
    } else {
        return esc_html__('No books found for this genre.', 'your-text-domain');
    }
}

// Register the shortcode
add_shortcode('books_by_genre', 'books_by_genre_shortcode');

/** 
 * AJAX Handler for callback returning 20 books in JSON format
 */
function ajax_get_books()
{
    // Check for nonce security
    check_ajax_referer('books_nonce', 'security');

    // Query parameters for fetching 20 books
    $args = array(
        'post_type' => 'books',
        'posts_per_page' => 20,
    );

    $books_query = new WP_Query($args);

    $books = array();

    if ($books_query->have_posts()) {
        while ($books_query->have_posts()) {
            $books_query->the_post();

            // Get the genre terms
            $genres = wp_get_post_terms(get_the_ID(), 'genre', array('fields' => 'names'));

            // Append each book's details to the array
            $books[] = array(
                'name' => get_the_title(),
                'date' => get_the_date('Y-m-d'),
                'genre' => $genres,
                'excerpt' => get_the_excerpt(),
            );
        }
    }

    // Restore original Post Data
    wp_reset_postdata();

    // Return the books in JSON format
    wp_send_json($books);
}

// Register AJAX actions for logged-in and non-logged-in users
add_action('wp_ajax_get_books', 'ajax_get_books');
add_action('wp_ajax_nopriv_get_books', 'ajax_get_books');
