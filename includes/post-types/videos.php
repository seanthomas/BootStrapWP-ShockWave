<?php

// REGISTER VIDEO POST TYPE

add_action('init', 'posttype_videos');

function posttype_videos() {
        $labels = array(
                'name' => __('Videos', 'bootstrapwp'),
                'singular_name' => __('Video', 'bootstrapwp'),
                'add_new' => __('Add Video', 'bootstrapwp'),
                'add_new_item' => __('Add New Video','bootstrapwp'),
                'edit_item' => __('Edit Video','bootstrapwp'),
                'new_item' => __('New Video','bootstrapwp'),
                'view_item' => __('View Details','bootstrapwp'),
                'search_items' => __('Search Videos','bootstrapwp'),
                'not_found' =>  __('No Videos were found with that criteria','bootstrapwp'),
                'not_found_in_trash' => __('No Videos found in the Trash with that criteria','bootstrapwp'),
                'view' =>  __('View Video','bootstrapwp')
        );

        $imagepath =  get_stylesheet_directory_uri() . '/images/posttypeimg/';

        $args = array(
                'labels' => $labels,
                'description' => 'This is the holding location for all Videos',
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'show_ui' => true,
                'rewrite' => true,
                'hierarchical' => true,
                'menu_position' => 5,
                'menu_icon' => $imagepath . '/video.png',
                'supports' => array('title','revisions', 'thumbnail', 'editor', 'comments'),
        );

register_post_type('Videos',$args);
}

?>