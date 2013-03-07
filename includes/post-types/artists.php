<?php

// REGISTER DISCOGRAPHY POST TYPE

add_action('init', 'posttype_artists');

function posttype_artists() {
        $labels = array(
                'name' => __('Artists', 'bootstrapwp'),
                'singular_name' => __('Artist', 'bootstrapwp'),
                'add_new' => __('Add Artist', 'bootstrapwp'),
                'add_new_item' => __('Add New Artist','bootstrapwp'),
                'edit_item' => __('Edit Artist','bootstrapwp'),
                'new_item' => __('New Artist','bootstrapwp'),
                'view_item' => __('View Details','bootstrapwp'),
                'search_items' => __('Search Artists','bootstrapwp'),
                'not_found' =>  __('No Artists were found with that criteria','bootstrapwp'),
                'not_found_in_trash' => __('No Artists found in the Trash with that criteria','bootstrapwp'),
                'view' =>  __('View Artist','bootstrapwp')
        );

        $imagepath =  get_stylesheet_directory_uri() . '/images/posttypeimg/';

        $args = array(
                'labels' => $labels,
                'description' => 'This is the holding location for all Artists',
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'show_ui' => true,
                'rewrite' => true,
                'hierarchical' => true,
                'menu_position' => 5,
                'menu_icon' => $imagepath . '/Artist.png',
                'supports' => array('title','revisions', 'thumbnail', 'editor', 'comments'),
        );

register_post_type('artists',$args);
}

?>