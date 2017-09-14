$(document).ready(function() {
	$('.fadein img:gt(0)').hide();
	setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
	$(window).on('resize', function() {
		event.preventDefault();
		$(".fadein").height($(".fadein img").height());
	});	
	//Giver div "fadein" samme højde som billede
	$(".fadein").height($(".fadein img").height());

	//Checks screen size
	if ($(window).width() < 690) {
		$('nav').children().next().hide();
	}

	//Resize event
	$(window).resize(function () { 
		if ($(window).width() > 690) {
			$('nav').children().next().slideDown();
		}
		else{
			$('nav').children().next().slideUp();
		}
	});

	//Click event
	$('nav').children().first().click(function () { 
		$('nav').children().next().slideToggle();
	});

	//Hide new user form
	$('#newUser').hide();

	//Sjow new user form on click
	$('#newUserLink').click(function (e) { 
		e.preventDefault();
		$('#newUser').slideToggle();
	});
});