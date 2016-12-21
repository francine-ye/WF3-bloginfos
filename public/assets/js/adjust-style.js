function adjust(){
	var asideHeight = $('aside').outerHeight();
	var titleHeight = $('aside h3').outerHeight();
	var buttonsHeight = $('#tchat-buttons').outerHeight();
	$('#menu-salons').css('max-height', asideHeight - titleHeight - buttonsHeight);
}

adjust();

$(window).resize(function() {
	adjust();
});