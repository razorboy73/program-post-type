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


add_filter('the_content', "addedToEndOfPost");

function addedToEndOfPost($content)
{
    return $content . '<p> My name is josh</p>';
}

// Register Custom Post Type Event
function create_event_cpt()
{

    $labels = array(
        'name' => _x('events', 'Post Type General Name', 'alpha-tech'),
        'singular_name' => _x('Event', 'Post Type Singular Name', 'alpha-tech'),
        'menu_name' => _x('Events', 'Admin Menu text', 'alpha-tech'),
        'name_admin_bar' => _x('Event', 'Add New on Toolbar', 'alpha-tech'),
        'archives' => __('Event Archives', 'alpha-tech'),
        'attributes' => __('Event Attributes', 'alpha-tech'),
        'parent_item_colon' => __('Parent Event:', 'alpha-tech'),
        'all_items' => __('All Events', 'alpha-tech'),
        'add_new_item' => __('Add New Event', 'alpha-tech'),
        'add_new' => __('Add New', 'alpha-tech'),
        'new_item' => __('New Event', 'alpha-tech'),
        'edit_item' => __('Edit Event', 'alpha-tech'),
        'update_item' => __('Update Event', 'alpha-tech'),
        'view_item' => __('View Event', 'alpha-tech'),
        'view_items' => __('View events', 'alpha-tech'),
        'search_items' => __('Search Event', 'alpha-tech'),
        'not_found' => __('Not found', 'alpha-tech'),
        'not_found_in_trash' => __('Not found in Trash', 'alpha-tech'),
        'featured_image' => __('Featured Image', 'alpha-tech'),
        'set_featured_image' => __('Set featured image', 'alpha-tech'),
        'remove_featured_image' => __('Remove featured image', 'alpha-tech'),
        'use_featured_image' => __('Use as featured image', 'alpha-tech'),
        'insert_into_item' => __('Insert into Event', 'alpha-tech'),
        'uploaded_to_this_item' => __('Uploaded to this Event', 'alpha-tech'),
        'items_list' => __('events list', 'alpha-tech'),
        'items_list_navigation' => __('events list navigation', 'alpha-tech'),
        'filter_items_list' => __('Filter events list', 'alpha-tech'),
    );
    $rewrite = array(
        'slug' => 'events'
        //     'with_front' => true,
        //     'pages' => true,
        //     'feeds' => true,
    );

    $args = array(
        'public' => true,
        'labels' => $labels,
        'menu_icon' => 'dashicons-calendar',
        'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => $rewrite,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),


    );
    register_post_type('event', $args);
}
add_action('init', 'create_event_cpt', 10);
