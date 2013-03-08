<?php

// REGISTER DISCOGRAPHY POST TYPE

add_action('init', 'posttype_galleries');

function posttype_galleries() {
        $labels = array(
                'name' => __('Galleries', 'bootstrapwp'),
                'singular_name' => __('Gallery', 'bootstrapwp'),
                'add_new' => __('Add Gallery', 'bootstrapwp'),
                'add_new_item' => __('Add New Gallery','bootstrapwp'),
                'edit_item' => __('Edit Gallery','bootstrapwp'),
                'new_item' => __('New Gallery','bootstrapwp'),
                'view_item' => __('View Details','bootstrapwp'),
                'search_items' => __('Search Galleries','bootstrapwp'),
                'not_found' =>  __('No Galleries were found with that criteria','bootstrapwp'),
                'not_found_in_trash' => __('No Galleries found in the Trash with that criteria','bootstrapwp'),
                'view' =>  __('View Gallery','bootstrapwp')
        );

        $imagepath =  get_stylesheet_directory_uri() . '/images/posttypeimg/';

        $args = array(
                'labels' => $labels,
                'description' => 'This is the holding location for all Galleries',
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'show_ui' => true,
                'rewrite' => true,
                'hierarchical' => true,
                'menu_position' => 5,
                'menu_icon' => $imagepath . '/gallery.png',
                'supports' => array('title','revisions', 'thumbnail', 'editor', 'comments'),
        );

register_post_type('Galleries',$args);
}

?>