(function($) {
  //  $(document).ready(function() {
	  $(window).on('load', function() {
// init Isotope
		var $grid = $('#collection-items').isotope({
		  itemSelector: '.isocollect',
		  layoutMode: 'fitRows',
 		  getSortData: {
    			itmname: '.itmname' }
		 });
		 // bind sort button click
		$('.sort-button-group').on( 'click', 'button', function() {
		 var sortValue = $( this ).attr('data-sort');
		  $grid.isotope({ sortBy : sortValue });
		});
		// bind filter button click
		$('.filters-button-group').on( 'click', 'button', function() {
		  var filterValue = $( this ).attr('data-filter');
		  $grid.isotope({ filter: filterValue });
		});
		
		// change is-checked class on buttons
		$('.button-group').each( function( i, buttonGroup ) {
		  var $buttonGroup = $( buttonGroup );
		  $buttonGroup.on( 'click', 'button', function() {
			$buttonGroup.find('.is-checked').removeClass('is-checked');
			$( this ).addClass('is-checked');
		  });
		});
});
})(jQuery)
	