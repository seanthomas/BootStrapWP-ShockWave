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

	$('.post-image a').hover(function() {
		$(this).find('.post-icon').stop().animate({'top' : 50, 'opacity' : 1}, 160, 'easeOutSine');
	}, function(){
		$(this).find('.post-icon').stop().animate({'top' : -25, 'opacity' : 0}, 260, 'easeOutSine');
	});
	
});