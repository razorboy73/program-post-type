<?php
/*
Plugin Name: Custom Post for Events
Plugin URI: 
Description: A custom post for events 
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


// Register Custom Post Type Program
function create_program_cpt()
{

    $labels = array(
        'name' => _x('Programs', 'Post Type General Name', 'alpha-tech'),
        'singular_name' => _x('Program', 'Post Type Singular Name', 'alpha-tech'),
        'menu_name' => _x('Programs', 'Admin Menu text', 'alpha-tech'),
        'name_admin_bar' => _x('Program', 'Add New on Toolbar', 'alpha-tech'),
        'archives' => __('Program Archives', 'alpha-tech'),
        'attributes' => __('Program Attributes', 'alpha-tech'),
        'parent_item_colon' => __('Parent Program:', 'alpha-tech'),
        'all_items' => __('All Programs', 'alpha-tech'),
        'add_new_item' => __('Add New Program', 'alpha-tech'),
        'add_new' => __('Add New', 'alpha-tech'),
        'new_item' => __('New Program', 'alpha-tech'),
        'edit_item' => __('Edit Program', 'alpha-tech'),
        'update_item' => __('Update Program', 'alpha-tech'),
        'view_item' => __('View Program', 'alpha-tech'),
        'view_items' => __('View Programs', 'alpha-tech'),
        'search_items' => __('Search Program', 'alpha-tech'),
        'not_found' => __('Not found', 'alpha-tech'),
        'not_found_in_trash' => __('Not found in Trash', 'alpha-tech'),
        'featured_image' => __('Featured Image', 'alpha-tech'),
        'set_featured_image' => __('Set featured image', 'alpha-tech'),
        'remove_featured_image' => __('Remove featured image', 'alpha-tech'),
        'use_featured_image' => __('Use as featured image', 'alpha-tech'),
        'insert_into_item' => __('Insert into Program', 'alpha-tech'),
        'uploaded_to_this_item' => __('Uploaded to this Program', 'alpha-tech'),
        'items_list' => __('Programs list', 'alpha-tech'),
        'items_list_navigation' => __('Programs list navigation', 'alpha-tech'),
        'filter_items_list' => __('Filter Programs list', 'alpha-tech'),
    );
    $rewrite = array(
        'slug' => 'programs'
        //     'with_front' => true,
        //     'pages' => true,
        //     'feeds' => true,
    );

    $args = array(
        'public' => true,
        'labels' => $labels,
        'menu_icon' => 'dashicons-awards',
        'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => $rewrite,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),


    );
    register_post_type('program', $args);
}
add_action('init', 'create_program_cpt', 10);
// Register Custom Post Type Event



// Register the custom post type template
function my_custom_post_type_template($template)
{
    global $post;

    if ($post->post_type == 'program') {
        $template = dirname(__FILE__) . '/templates/single-program.php';
    }

    return $template;
}

add_filter('single_template', 'my_custom_post_type_template');
