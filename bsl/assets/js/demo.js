(function($) {
    "use strict"
    $('.icon-cog').on('click', function() {
        $(".layout-options").toggleClass("show");
    });
    $('#layoutOption').on('change', function() {
    	if ($(this).is(':checked')) {
			$("body").addClass("boxed-layout");
		} else {
			$("body").removeClass("boxed-layout");
		}
        
    });
})(jQuery);