<?php

// REGISTER DISCOGRAPHY POST TYPE

add_action('init', 'posttype_discography');

function posttype_discography() {
        $labels = array(
                'name' => __('Discography', 'bootstrapwp'),
                'singular_name' => __('Discography Item', 'bootstrapwp'),
                'add_new' => __('Add Discography Item', 'bootstrapwp'),
                'add_new_item' => __('Add New Discography Item','bootstrapwp'),
                'edit_item' => __('Edit Discography Item','bootstrapwp'),
                'new_item' => __('New Discography Item','bootstrapwp'),
                'view_item' => __('View Discography Item','bootstrapwp'),
                'search_items' => __('Search Discography Items','bootstrapwp'),
                'not_found' =>  __('No Discography Items was found with that criteria','bootstrapwp'),
                'not_found_in_trash' => __('No Discography Items found in the Trash with that criteria','bootstrapwp'),
                'view' =>  __('View Album', 'bootstrapwp')
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
                'menu_icon' => $imagepath . '/discography.png',
                'supports' => array('thumbnail','title', 'editor', 'comments','revisions')
        );

register_post_type('Discography',$args);
}

?>