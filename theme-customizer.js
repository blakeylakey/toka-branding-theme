(function($){
	wp.customize("site_logo", function(value) {
		value.bind(function(newval) {
			$("#site-logo").html(newval);
		} );
	});
})(jQuery);