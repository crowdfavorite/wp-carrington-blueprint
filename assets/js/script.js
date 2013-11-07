(function($) {

	window.Site = {
		init: function() {
			// Requires jquery.placeholder.min.js
			// Add support for placeholder attribute in older browsers.
			$('input[placeholder]').placeholder();
		}
	};

	$(document).ready(function() {
		Site.init();
	});

})(jQuery);
