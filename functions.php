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
        "rewrite" => ["slug" => "books", "with_front" => true],
        "query_var" => true,
        "supports" => ["title", "editor", "thumbnail", "excerpt", "post_tag"],
        "show_in_graphql" => false,
        "taxonomies" => array("category"),
    ];

    register_post_type("books", $args);
}

add_action('init', 'cptui_register_my_cpts_books');
