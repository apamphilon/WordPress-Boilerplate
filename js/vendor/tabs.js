// document ready
$(function() {
	// tab click function
	$('.tabs a').on('click', function(event) {
		// prevent default
		event.preventDefault();

		// hide all panels
		$(this).parents('.tabs').next('.panels').find('.panel').hide();

		// get clicked tab href
		var clickedLink = $(this).attr('href');

    //display corresponding tab
		$(clickedLink).show();

		// removes class active from all
		$('.tabs a').removeClass('active');

		// add class of active to this
		$(this).addClass('active');
	});
});
