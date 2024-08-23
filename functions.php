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
