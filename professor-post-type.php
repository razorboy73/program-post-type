<?php
/*
Plugin Name: Custom Post for Professors
Plugin URI: 
Description: A custom post for professors
Author: Josh Kerbel
Author URI: www.google.com
Version: 1.0.0
License: GPLv2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domanin: 
Domain Path: 
*/
// //Plugin URL
// define('_PLUGIN_URL', plugins_url(''));
// //Plugin Path
// define('_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));


// Register Custom Post Type Professor
function create_professor_cpt()
{

    $labels = array(
        'name' => _x('Professors', 'Post Type General Name', 'alpha-tech'),
        'singular_name' => _x('Professor', 'Post Type Singular Name', 'alpha-tech'),
        'menu_name' => _x('Professors', 'Admin Menu text', 'alpha-tech'),
        'name_admin_bar' => _x('Professor', 'Add New on Toolbar', 'alpha-tech'),
        'archives' => __('Professor Archives', 'alpha-tech'),
        'attributes' => __('Professor Attributes', 'alpha-tech'),
        'parent_item_colon' => __('Parent Professor:', 'alpha-tech'),
        'all_items' => __('All Professors', 'alpha-tech'),
        'add_new_item' => __('Add New Professor', 'alpha-tech'),
        'add_new' => __('Add New', 'alpha-tech'),
        'new_item' => __('New Professor', 'alpha-tech'),
        'edit_item' => __('Edit Professor', 'alpha-tech'),
        'update_item' => __('Update Professor', 'alpha-tech'),
        'view_item' => __('View Professor', 'alpha-tech'),
        'view_items' => __('View Professors', 'alpha-tech'),
        'search_items' => __('Search Professor', 'alpha-tech'),
        'not_found' => __('Not found', 'alpha-tech'),
        'not_found_in_trash' => __('Not found in Trash', 'alpha-tech'),
        'featured_image' => __('Featured Image', 'alpha-tech'),
        'set_featured_image' => __('Set featured image', 'alpha-tech'),
        'remove_featured_image' => __('Remove featured image', 'alpha-tech'),
        'use_featured_image' => __('Use as featured image', 'alpha-tech'),
        'insert_into_item' => __('Insert into Professor', 'alpha-tech'),
        'uploaded_to_this_item' => __('Uploaded to this Professor', 'alpha-tech'),
        'items_list' => __('Professors list', 'alpha-tech'),
        'items_list_navigation' => __('Professors list navigation', 'alpha-tech'),
        'filter_items_list' => __('Filter Professors list', 'alpha-tech'),
    );


    $args = array(
        'public' => true,
        'labels' => $labels,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'show_in_rest' => true,

        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),


    );
    register_post_type('professor', $args);
}
add_action('init', 'create_professor_cpt', 10);
// Register Custom Post Type Event



// Register the custom post type template
function my_custom_post_type_professor_template($template)
{
    global $post;

    if ($post->post_type == 'program') {
        if (is_single()) {
            return plugin_dir_path(__FILE__) . '/templates/single-program.php';
        } elseif (is_archive()) {
            return plugin_dir_path(__FILE__)  . '/templates/archive-program.php';
        }
    }

    return $template;
}

add_filter('template_include', 'my_custom_post_type_program_template');
