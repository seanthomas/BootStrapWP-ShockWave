<?php

add_action( 'admin_init', 'rw_register_meta_boxes' );
function rw_register_meta_boxes()
{
$prefix = 'gxg_';
$meta_boxes = array();

/** AUDIO **/
$meta_boxes[] = array(
        'id' => 'songs',
        'title' => __('SONGTITLES','gxg_textdomain'), 
        'pages' => array('discography'),
        'fields' => array(                
                array(
                        'name' => __('Add the Album\'s songtitles','gxg_textdomain'), 
                        'id' => $prefix . 'song',
                        'clone' => true,
                        'type' => 'text',
                        ), 
        )
);

$meta_boxes[] = array(
        'id' => 'soundcloud',
        'title' => __('SOUNDCLOUD PLAYER','gxg_textdomain'), 
        'pages' => array('discography'),
        'fields' => array(                
                array(
                        'name' => __('Paste Embed Code','gxg_textdomain'),              
                        'desc' => '',        
                        'id' => $prefix . 'soundcloud',      
                        'type' => 'textarea',               
                        'std' => '',                    
                ),            
        )
);


$meta_boxes[] = array(
        'id' => 'jwplayer',
        'title' => __('AUDIO PLAYER (requires JW Player)','gxg_textdomain'), 
        'pages' => array('discography'),
        'fields' => array(
                array(
                        'name' => __('Display Audio Player?','gxg_textdomain'),  
                        'id' => $prefix . 'audioplayer',
                        'type' => 'checkbox',
                        'desc' => __('Check if you would like to display an Audio Player','gxg_textdomain'), 
                        'std' => '' 
                ),  
                array( 
                                'name' => __('Upload music files. They will start uploading once you hit the <b>Publish / Update</b> button above. If you upload many songtitles at once, this might take a while.','gxg_textdomain'), 
                                'id' => $prefix . 'jwplayer',
                                'type' => 'file',
                ),             
        )
);


$meta_boxes[] = array(
        'id' => 'album-buy',
        'title' => __('BUY / DOWNLOAD LINKS','gxg_textdomain'), 
        'pages' => array('discography'),
        'fields' => array(   
                array(
                        'name' => __('Amazon','gxg_textdomain'),                      
                        'desc' => __('Enter the full URL to the album on Amazon','gxg_textdomain'),        
                        'id' => $prefix . 'amazon',                 
                        'type' => 'text',                        
                        'std' => '',                             
                ),
                array(
                        'name' => __('iTunes','gxg_textdomain'),                        
                        'desc' => __('Enter the full URL to the album on iTunes','gxg_textdomain'),          
                        'id' => $prefix . 'itunes',                 
                        'type' => 'text',                        
                        'std' => '',                             
                ),                
                array(
                        'name' => __('Other buying / downloading link','gxg_textdomain'),                       
                        'desc' => __('Enter the full URL to the album','gxg_textdomain'),         
                        'id' => $prefix . 'buy_other',                 
                        'type' => 'text',                        
                        'std' => '',
                ),      
                array(
                        'name' => __('Button Text for other buying / downloading link','gxg_textdomain'),                      
                        'desc' => '',      
                        'id' => $prefix . 'buy_other_text',                 
                        'type' => 'text',                        
                        'std' => '',                          
                ),                
        )
);


$meta_boxes[] = array(
        'id' => 'albums',
        'title' => __('ALBUM INFO','gxg_textdomain'), 
        'pages' => array('discography'),
        'fields' => array(                
                array(
                        'name' => __('Release Date','gxg_textdomain'),              
                        'desc' => '',        
                        'id' => $prefix . 'releasedate', 
                        'type' => 'date',
                        'format' => 'd M yy',                
                        'std' => '',                    
                ),  
                array(
                        'name' => __('Additional Info LEFT column','gxg_textdomain'),                          
                        'desc' =>  __('Enter any additional info about the Album. It will be displayed in the left column. You can use HTML too.','gxg_textdomain'),        
                        'id' => $prefix . 'albuminfo_left',                 
                        'type' => 'textarea',                        
                        'std' => '',                             
                ),                 
                array(
                        'name' => __('Additional Info CENTER column','gxg_textdomain'),                          
                        'desc' =>  __('Enter any additional info about the Album. It will be displayed in the center column. You can use HTML too.','gxg_textdomain'),        
                        'id' => $prefix . 'albuminfo_center',                 
                        'type' => 'textarea',                        
                        'std' => '',                             
                ),                    
                array(
                        'name' => __('Additional Info RIGHT column','gxg_textdomain'),                          
                        'desc' =>  __('Enter any additional info (Lyrics, etc...) about the Album. It will be displayed in the right column. You can use HTML too.','gxg_textdomain'),        
                        'id' => $prefix . 'albuminfo',                 
                        'type' => 'textarea',                        
                        'std' => '',                             
                )                
        )
);

 foreach ( $meta_boxes as $meta_box )
{
new RW_Meta_Box( $meta_box );
}
}