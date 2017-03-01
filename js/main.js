// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

$(document).ready(function() {
	// slickSlider
	$('.slider').slick({
    dots: true,
    fade: true,
    autoplay: true,
    autoplaySpeed: 5000,
    prevArrow: '<i class="fa fa-angle-left slick-prev" aria-hidden="true"></i>',
    nextArrow: '<i class="fa fa-angle-right slick-next" aria-hidden="true"></i>'
  });

  // matchHeight
  $('.mh').matchHeight();

  // mobile nav
	$('.mtoggle a').click(function(event) {
		event.preventDefault();
		$('.main-nav').stop().slideToggle();
	});

	// empty search
  $('.search-form').submit(function(e) { // run the submit function, pin an event to it
    var s = $( this ).find(".search-field").val($.trim($( this ).find(".search-field").val())); // find the .search-field, which is the search input id and trim any spaces from the start and end

    if (!s.val()) { // if search-field has no value, proceed
      e.preventDefault(); // prevent the default submission
      $('.search-field').focus(); // focus on the search input
    }
  });
});
