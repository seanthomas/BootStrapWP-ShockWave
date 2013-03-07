<?php

// REGISTER DISCOGRAPHY POST TYPE

add_action('init', 'posttype_events');

function posttype_events() {
        $labels = array(
                'name' => __('Events', 'bootstrapwp'),
                'singular_name' => __('Event', 'bootstrapwp'),
                'add_new' => __('Add Event', 'bootstrapwp'),
                'add_new_item' => __('Add New Event','bootstrapwp'),
                'edit_item' => __('Edit Event','bootstrapwp'),
                'new_item' => __('New Event','bootstrapwp'),
                'view_item' => __('View Details','bootstrapwp'),
                'search_items' => __('Search Events','bootstrapwp'),
                'not_found' =>  __('No Events were found with that criteria','bootstrapwp'),
                'not_found_in_trash' => __('No Events found in the Trash with that criteria','bootstrapwp'),
                'view' =>  __('View Event','bootstrapwp')
        );

        $imagepath =  get_stylesheet_directory_uri() . '/images/posttypeimg/';

        $args = array(
                'labels' => $labels,
                'description' => 'This is the holding location for all Events',
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'show_ui' => true,
                'rewrite' => true,
                'hierarchical' => true,
                'menu_position' => 5,
                'menu_icon' => $imagepath . '/event.png',
                'supports' => array('title','revisions', 'thumbnail', 'editor', 'comments'),
        );

register_post_type('events',$args);
}

?>