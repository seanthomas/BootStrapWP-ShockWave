/* ------------------------------------------------------------------------ */
	/* JW Player */
	/* ------------------------------------------------------------------------ */
jQuery(document).ready(function($){

		// Tracklisting
	if ($('.track-listen').exists()) {
		$('.track-listen').click(function(){
			var target 		= $(this).siblings('.track-audio');
			var siblings	= $(this).parents('.track').siblings().children('.track-audio');
			siblings.slideUp('fast');
			target.slideToggle('fast');
			return false;
		});
	}

// Self-hosted Audio Player
function setupjw(playerID,track) {
	jwplayer(playerID).setup({
		autostart: false,
		file: track,
		flashplayer: wnm_custom.template_url + '/includes/jwplayer/jwplayer.flash.swf',
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
		'flashplayer': 	wnm_custom.template_url + '/includes/jwplayer/jwplayer.flash.swf',
		'controlbar':	'bottom',
		'id'			: playerID
	});
}