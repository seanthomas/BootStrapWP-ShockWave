<?php

add_action( 'admin_init', 'rw_register_meta_boxes' );
function rw_register_meta_boxes()
{
$prefix = 'sw_';
$meta_boxes = array();

/** Audio **/
$meta_boxes[] = array(
        'id' => 'songs',
        'title' => __('Album Tracklisting','bootstrapwp'), 
        'pages' => array('discography'),
        'fields' => array(   
                array(
                        'name' => __('Display Tracklisting?','bootstrapwp'),  
                        'id' => $prefix . 'display_tracklisting',
                        'type' => 'checkbox',
                        'desc' => __('Check if you would like to display the Tracklisting','bootstrapwp'), 
                        'std' => '' 
                ),              
                array(
                        'name' => __('Add the Album\'s songs to show the Tracklisting','bootstrapwp'), 
                        'id' => $prefix . 'song',
                        'clone' => true,
                        'type' => 'text',
                        ), 
        )
);

$meta_boxes[] = array(
        'id' => 'soundcloud',
        'title' => __('Soundcloud Audio Player','bootstrapwp'), 
        'pages' => array('discography'),
        'fields' => array(                
                array(
                        'name' => __('Paste Embed Code','bootstrapwp'),              
                        'desc' => '',        
                        'id' => $prefix . 'soundcloud',      
                        'type' => 'textarea',               
                        'std' => '',                    
                ),            
        )
);


$meta_boxes[] = array(
        'id' => 'jwplayer',
        'title' => __('Jw Audio Player','bootstrapwp'), 
        'pages' => array('discography'),
        'fields' => array(
                array(
                        'name' => __('Display JW Audio Player?','bootstrapwp'),  
                        'id' => $prefix . 'jwaudioplayer',
                        'type' => 'checkbox',
                        'desc' => __('Check if you would like to display an Audio Player','bootstrapwp'), 
                        'std' => '' 
                ),  
                array( 
                                'name' => __('Upload music files. They will start uploading once you hit the <b>Publish / Update</b> button above. If you upload many songtitles at once, this might take a while.','bootstrapwp'), 
                                'id' => $prefix . 'jwplayer',
                                'type' => 'file',
                ),             
        )
);


$meta_boxes[] = array(
        'id' => 'album-buy',
        'title' => __('Buy & Download Links','bootstrapwp'), 
        'pages' => array('discography'),
        'fields' => array(   
                array(
                        'name' => __('Amazon','bootstrapwp'),                      
                        'desc' => __('Enter the full URL to the album on Amazon','bootstrapwp'),        
                        'id' => $prefix . 'amazon',                 
                        'type' => 'text',                        
                        'std' => '',                             
                ),
                array(
                        'name' => __('iTunes','bootstrapwp'),                        
                        'desc' => __('Enter the full URL to the album on iTunes','bootstrapwp'),          
                        'id' => $prefix . 'itunes',                 
                        'type' => 'text',                        
                        'std' => '',                             
                ),                
                array(
                        'name' => __('Other buying / downloading link','bootstrapwp'),                       
                        'desc' => __('Enter the full URL to the album','bootstrapwp'),         
                        'id' => $prefix . 'buy_other',                 
                        'type' => 'text',                        
                        'std' => '',
                ),      
                array(
                        'name' => __('Button Text for other buying / downloading link','bootstrapwp'),                      
                        'desc' => '',      
                        'id' => $prefix . 'buy_other_text',                 
                        'type' => 'text',                        
                        'std' => '',                          
                ),                
        )
);


$meta_boxes[] = array(
        'id' => 'albums',
        'title' => __('Album Information','bootstrapwp'), 
        'pages' => array('discography'),
        'fields' => array(                
                array(
                        'name' => __('Release Date','bootstrapwp'),              
                        'desc' => '',        
                        'id' => $prefix . 'release_date', 
                        'type' => 'date',
                        'format' => 'd M yy',                
                        'std' => '',                    
                ),  
                array(
                        'name' => __('Album Status','bootstrapwp'),              
                        'desc' => 'For example - Out Now',        
                        'id' => $prefix . 'Album_status', 
                        'type' => 'text',              
                        'std' => '',                    
                ),
                array(
                        'name' => __('Record label','bootstrapwp'),              
                        'desc' => 'For example - Universal Records',        
                        'id' => $prefix . 'record_label', 
                        'type' => 'text',              
                        'std' => '',                    
                ),                                 
        )
);

/** Events **/
$meta_boxes[] = array(
        'id' => 'events',
        'title' =>  __('Events','bootstrapwp'), 
        'pages' => array('events'),
        'fields' => array(                
                array(
                        'name' =>   __('Date','bootstrapwp'),             
                        'desc' => '',        
                        'id' => $prefix . 'date',      
                        'type' => 'date',
                        'format' => 'yy/mm/dd',               
                        'std' => '',                    
                ), 
                array(
                        'name' =>   __('Time','bootstrapwp'),             
                        'desc' => '',        
                        'id' => $prefix . 'time',      
                        'type' => 'time',
                        'format' => 'hh:mm',               
                        'std' => '',                    
                ),                 
                array(
                        'name' => __('Address','bootstrapwp'),          
                        'desc' => '',    
                        'id' => $prefix . 'address',            
                        'type' => 'text',                    
                        'std' => '',                         
                ),
                array(
                        'name' => __('Venue','bootstrapwp'),                     
                        'desc' => '',           
                        'id' => $prefix . 'venue',           
                        'type' => 'text',                    
                        'std' => '',                         
                ),                
                array(
                        'name' => __('Ticket URL','bootstrapwp'),                          
                        'desc' => __('Enter the full URL to the ticket sales website','bootstrapwp'),           
                        'id' => $prefix . 'url',                 
                        'type' => 'text',                        
                        'std' => '',                             
                ),
                array(
                        'name' => __('Ticket URL Button Text','bootstrapwp'),                          
                        'desc' => __('Enter Button Text','bootstrapwp'),           
                        'id' => $prefix . 'button_text',                 
                        'type' => 'text',                        
                        'std' => 'Buy Tickets',                             
                ),              
                array(
                        'name' => __('Sold Out?','bootstrapwp'),      
                        'id' => $prefix . 'soldout',
                        'type' => 'checkbox',
                        'desc' => __('Check if show is sold out.','bootstrapwp'),    
                        'std' => ''                      // Value can be 0 or 1
                ),
                array(
                        'name' => __('Cancelled?','bootstrapwp'),       
                        'id' => $prefix . 'cancelled',
                        'type' => 'checkbox',
                        'desc' => __('Check if show is cancelled.','bootstrapwp'),    
                        'std' => ''                      // Value can be 0 or 1
                ),                
        )
);

/** Events **/
$meta_boxes[] = array(
        'id' => 'artists',
        'title' =>  __('Artists','bootstrapwp'), 
        'pages' => array('artists'),
        'fields' => array(                
                array(
                        'name' =>   __('Artist Role','bootstrapwp'),             
                        'desc' => '',        
                        'id' => $prefix . 'artist_role',      
                        'type' => 'text',
                        'desc' => __('For example - Drummer','bootstrapwp'),              
                        'std' => '',                    
                ),  
                array(
                        'name' => __('Insert Description - This is displayed in the sidebar','bootstrapwp'),              
                        'desc' => '',        
                        'id' => $prefix . 'description',      
                        'type' => 'textarea',               
                        'std' => '',                    
                ),                                 
        )
);

/** Galleries **/
$meta_boxes[] = array(
        'id' => 'galleries',
        'title' =>  __('Galleries','bootstrapwp'), 
        'pages' => array('galleries'),
        'fields' => array(                
                array(
                        'name' => __('Upload Images for your Gallery. </br></br> Images can be dragged and dropped to re-arrange them.','bootstrapwp'), 
                        'desc' => '',
                        'id' => $prefix . 'gallery_images',
                        'type' => 'plupload_image'       
                ),
                array(
                        'name' =>   __('Caption','bootstrapwp'),             
                        'desc' => '',        
                        'id' => $prefix . 'galleries_caption',      
                        'type' => 'text',
                        'desc' => __('For example - London, UK or US Tour','bootstrapwp'),              
                        'std' => '',
                ),                             
        )
);

/** Video **/
$meta_boxes[] = array(
        'id' => 'videos',
        'title' => __('Youtube or Vimeo Videos', 'bootstrapwp'), 
        'pages' => array('videos'),
        'fields' => array(        
                array(
                        'name' => __('Enter the link to the video','bootstrapwp'),               
                        'desc' => __('It should look like this: http://vimeo.com/31956969 or http://youtu.be/nVssYUGs-R4','bootstrapwp'),  
                        'id' => $prefix . 'video_embed_code',      
                        'type' => 'text',               
                        'std' => '',                    
                ),                    
        )
);

 foreach ( $meta_boxes as $meta_box )
{
new RW_Meta_Box( $meta_box );
}
}