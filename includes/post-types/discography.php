<?php

// REGISTER DISCOGRAPHY POST TYPE

add_action('init', 'posttype_discography');

function posttype_discography() {
        $labels = array(
                'name' => __('Discography', 'gxg_textdomain'),
                'singular_name' => __('Discography Item', 'gxg_textdomain'),
                'add_new' => __('Add Discography Item', 'gxg_textdomain'),
                'add_new_item' => __('Add New Discography Item','gxg_textdomain'),
                'edit_item' => __('Edit Discography Item','gxg_textdomain'),
                'new_item' => __('New Discography Item','gxg_textdomain'),
                'view_item' => __('View Discography Item','gxg_textdomain'),
                'search_items' => __('Search Discography Items','gxg_textdomain'),
                'not_found' =>  __('No Discography Items was found with that criteria','gxg_textdomain'),
                'not_found_in_trash' => __('No Discography Items found in the Trash with that criteria','gxg_textdomain'),
                'view' =>  __('View Album', 'gxg_textdomain')
        );

        $imagepath =  get_stylesheet_directory_uri() . '/images/posttypeimg/';

        $args = array(
                'labels' => $labels,
                'description' => 'Displays Discography Items',
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'show_ui' => true,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => true,
                'menu_position' => 5,
                'menu_icon' => $imagepath . '/aud.png',
                'supports' => array('thumbnail','title', 'editor', 'comments','revisions')
        );

register_post_type('Discography',$args);
}

?>