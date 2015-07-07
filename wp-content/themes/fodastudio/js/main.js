$(document).ready(function(){
	$('.buttonmenu img').hover(function(){
			$(this).attr('src', $(this).attr('src').split('.gif').join('_r.gif'));
					}, function(){
			$(this).attr('src', $(this).attr('src').split('_r.gif').join('.gif'));				
	});
	

	if( $("#header .btn-contact").hasClass("active") ) {$("#header").css("background","#008ECE");}
	else {
		$("#header .btn-contact").hover(
			function () {$("#header").css("background","#008ECE");},
			function () {$("#header").css("background","#fff");}
			);
	}	
    $('.twitter_box').tweet({
	    modpath: '?feed=twitter',
        username: 'FODA_studio',
	    count: 6,
        loading_text: 'loading tweets...'
	});
});

