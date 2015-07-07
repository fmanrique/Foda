$(document).ready(function(){
	$(".lazy").lazyload({
		effect: "fadeIn"
	});
	 
	$('#project-thumbs li span').css({opacity: 0});
	 
	$('#project-thumbs li').hover(function(){
		$(this).css("background","#000");
		$('img', this).stop().animate({opacity: 0.4});
	   	$('span', this).stop().animate({opacity: 1});
	}, function() {
		$(this).css("background","#fff");
		$('img', this).stop().animate({opacity: 1});
	   	$('span', this).stop().animate({opacity: 0});
	});

	expandText();
	collapseText();
});


function expandText(){
	$('#col_content_extratxt_expand').click(
		function(){
			$('#col_content_extratxt').slideDown();
			$('#col_content_extratxt_expand').hide(0);
			$('#col_content_extratxt_collapse').show(0);
		}
	);
}

function collapseText(){
	$('#col_content_extratxt_collapse').click(
		function(){
			$('#col_content_extratxt').slideUp();
			$('#col_content_extratxt_expand').show(0);
			$('#col_content_extratxt_collapse').hide(0);
		}
	);
}