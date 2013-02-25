/* ------------------------------------------------------------------------ */
/* Javascripts
/* ------------------------------------------------------------------------ */

jQuery(document).ready(function($){
	
	/* ------------------------------------------------------------------------ */
	/* Image Hovers */
	/* ------------------------------------------------------------------------ */

	$(".post-image a").hover(function(){
		$(this).has('img').append('<div class="overlay"></div>');
		$(this).find('.overlay').animate({opacity : '1'}, 300);
	}, function(){
		$(this).find('.overlay').animate({opacity : '0'}, 300 ,function(){ 
			$(this).remove(); 
		});
	});
	
});

// Self-hosted Audio Player
function setupjw(playerID,track) {
	jwplayer(playerID).setup({
		autostart: false,
		file: track,
		flashplayer: template_dir + '/includes/jwplayer/jwplayer.flash.swf',
		width: "100%",
		height:"65",
		events: {
				onPlay: function(event)
				{
					if(this.id != idPlayer)
					{
						jwplayer(idPlayer).stop();
						idPlayer = this.id;
					}
					console.log("Play: " + playerID + " " + this.id + " " + idPlayer);
				}
        }
	});
}

// Self-hosted Video Player
function setupvjw(playerID,track) {
	jwplayer(playerID).setup({
		'autostart': 	false,
		'file': 		track,
		'width'	:		'100%',
		'flashplayer': 	template_url + '/includes/jwplayer/jwplayer.flash.swf',
		'controlbar':	'bottom',
		'id'			: playerID
	});
}
