//Check For cookie on index page

$(function() {
        var COOKIE_NAME = 'squeeze-cookie';
        $go = $.cookie(COOKIE_NAME);
        if ($go == null) {
				//Show Email Link (DEFAULT)		
				$('#home_squeeze').show();
        }
        else {
				//Show Link
				
				$('#home_squeeze2').show();
        }
});