(function($) {
    $(document).ready(function() {
		$( '.nav-toggle' ).click(function(e) {
			e.preventDefault();
			$( '.nav-toggle' ).toggleClass( 'active' );
			$( '#top-nav ul' ).toggleClass( 'active' );
		});

	});	
})(jQuery)