// JavaScript Document
	jQuery(document).ready(function($){
		$('.error').click(function(){
			$(this).fadeOut();
		});
		$('input[type="submit"]').click(function(){
			$(this).parent().find('.error').fadeIn();
		});
		
		$("img.scrolltop").click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
    });
    $('.flexslider').flexslider();
	});