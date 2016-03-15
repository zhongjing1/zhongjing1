$(function() {

	if ($.browser.msie && parseInt($.browser.version, 10) === 6) {
        $('.row-fluid [class*="span"]').addClass('margin-left-20');
        $('.row-fluid div[class*="span"]:first-child').css("margin-left","0");
        $("#tips").show();
	}
}); 