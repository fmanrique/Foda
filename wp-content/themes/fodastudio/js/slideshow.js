var isAnimationRunning = false;
var slideshowautorun = 0;

$(document).ready(function(){
	mouseSlideSwitch();
	autoSlideSwitch();

});


function autoSlideSwitch() {
   slideshowautorun = setInterval( "slideSwitchForward()", 6500 );
}

function mouseSlideSwitch() {
	//iPhone/iPad Swipes
	$("#slideshow_proper").touchwipe({
        wipeLeft: function() {
			clearInterval(slideshowautorun);
            slideSwitchForward();
			autoSlideSwitch();
        },
        wipeRight: function() {
			clearInterval(slideshowautorun);
            slideSwitchBackward();
			autoSlideSwitch();
        }
    });
	
	//Mouse actions
	$('#slideshow_back_button').click(slideSwitchBackward);
	$('#slideshow_forward_button').click(slideSwitchForward);
	
	$('#slideshow_back_button').mouseenter(function(){clearInterval(slideshowautorun);});
	$('#slideshow_forward_button').mouseenter(function(){clearInterval(slideshowautorun);});
	
	$('#slideshow_back_button').mouseleave(function(){autoSlideSwitch();});
	$('#slideshow_forward_button').mouseleave(function(){autoSlideSwitch();});
	
	
	  
	  
	$('#slideshow_back_button').mouseover(function(){
		$('#arrow_backward').attr('src', 'http://www.fodastudio.com/images/arrow_backward.png');
	});
	$('#slideshow_forward_button').mouseover(function(){
		$('#arrow_forward').attr('src', 'http://www.fodastudio.com/images/arrow_forward.png');
	});
	
	$('#slideshow_back_button').mouseout(function(){
		$('#arrow_backward').attr('src', 'http://www.fodastudio.com/images/arrow_backward_light.png');
	});
	$('#slideshow_forward_button').mouseout(function(){
		$('#arrow_forward').attr('src', 'http://www.fodastudio.com/images/arrow_forward_light.png');
	});

	


}

//ONCLICK FUNCTIONS

function slideSwitchForward() {
		if(isAnimationRunning==false){
			isAnimationRunning=true;
			var $active = $('#slideshow_proper div.active');
		
			if ( $active.length == 0 ) $active = $('#slideshow_proper div:last');
		
			// use this to pull the images in the order they appear in the markup
			var $next =  $active.next().length ? $active.next()
				: $('#slideshow_proper div:first');
		
			// uncomment the 3 lines below to pull the images in random order
			
			// var $sibs  = $active.siblings();
			// var rndNum = Math.floor(Math.random() * $sibs.length );
			// var $next  = $( $sibs[ rndNum ] );
		
		
			$active.addClass('last-active');
		
			$next.css({opacity: 0.0})
				.removeClass('notactive')
				.addClass('active')
				.animate({opacity: 1.0}, 350, function() {
					$active.removeClass('active last-active');
					$active.addClass('notactive');
					isAnimationRunning=false;
				});
		}
}

function slideSwitchBackward() {
	
	if(isAnimationRunning==false){
		isAnimationRunning=true;
		var $active = $('#slideshow_proper div.active');
	
		if ( $active.length == 0 ) $active = $('#slideshow_proper div:first');
	
		// use this to pull the images in the order they appear in the markup
		var $prev =  $active.prev().length ? $active.prev()
			: $('#slideshow_proper div:last');
	
		// uncomment the 3 lines below to pull the images in random order
		
		// var $sibs  = $active.siblings();
		// var rndNum = Math.floor(Math.random() * $sibs.length );
		// var $next  = $( $sibs[ rndNum ] );
	
	
		$active.addClass('last-active');
	
		$prev.css({opacity: 0.0})
			.removeClass('notactive')
			.addClass('active')
			.animate({opacity: 1.0}, 350, function() {
				$active.removeClass('active last-active');
				$active.addClass('notactive');
				isAnimationRunning=false;
			});
		
	}
}
