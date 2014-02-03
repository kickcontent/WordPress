// JavaScript Document
	
	
$(document).ready(function() {
	
	$('#slides').cycle({
		fx: 'fade',
		timeout: 4000,
		containerResize:0,   
		pager:  '#pager', 		
		next: '#next',
		prev: '#prev'
		//before: onBefore,
		//after: onAfter,	
		//startingSlide: curSlide
	});
	
	function onBefore(options) {
					  
		//console.log($(this).index());
		
	}
		  
	function onAfter() {

	
	}
	
});

