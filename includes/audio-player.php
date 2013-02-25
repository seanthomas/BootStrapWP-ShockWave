

<!-- Button to trigger modal -->
<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    <div id="playlist" class="span9">
            <script type='text/javascript'>
            
            jwplayer('playlist').setup({
                    
                    'flashplayer': '<?php bloginfo('template_directory'); ?>/includes/jwplayer/jwplayer.flash.swf',  
                    'playlist':

                    [
                            <?php
                            $attachs2 = get_posts(array(
                            'post_type' => 'attachment',
                            'post_parent' => get_the_ID(),
                            'numberposts' => -1, // Get all the attachments for this post - See http://codex.wordpress.org/Template_Tags/get_posts example
                            'order' => 'ASC'
                            ));
                            if (!empty($attachs2)) {
                            foreach ($attachs2 as $att2) {
                            if (wp_attachment_is_image($att2->ID)) continue; // Remove attached images such as featured image
                            echo // Echo the rest of the JW Player script
                            "{
                            'file': '" . wp_get_attachment_url($att2->ID) . "',
                            'title': '" . apply_filters('the_title', $att2->post_title) . "'
                            },";
                            }
                            }
                            ?>    
                    ],

                    'skin': '<?php bloginfo('template_directory'); ?>/includes/jwplayer/jwplayer6/sixplaylist.xml',
                    'controlbar': 'top',
                    'repeat': 'always',
                    'width': '310',
                    'height': '220', 
                    'listbar': {
                            position: 'bottom',
                            size: 192
                        },
            });
            
            </script>  
        </div>  
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>