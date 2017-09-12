$(document).ready(function() {
	$('.fadein img:gt(0)').hide();
	setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
	$(window).on('resize', function() {
		event.preventDefault();
		$(".fadein").height($(".fadein img").height());
	});	
	$(".fadein").height($(".fadein img").height());
});