jQuery( document ).ready( function( $ ) {
	
	$('#site-nav > ul > li.menu-item-has-children > a').click(function (e){
		e.preventDefault();
		$(this).parent().children('ul.sub-menu').toggle();
		$(this).parent().siblings().children('ul.sub-menu').hide();
	});
	
	$('ul.sub-menu > li.menu-item-has-children > a').click(function (e) {
		e.preventDefault();
		$(this).parent().children('ul.sub-menu').toggle();
		$(this).parent().children('ul.sub-menu').find('ul.sub-menu').hide();
	});
	
	$('#site-nav li.menu-item-has-children').append('<span class="down-triangle"></span>');
	
	if (window.innerWidth < 631 ) {
		$("#site-nav").addClass("js").before('<div id="menu">&#9776;</div>');
		$("#menu").click(function(){
			$("#site-nav").toggle();
		});
	}
	
	$(window).resize(function(){
		if(window.innerWidth > 768) {
			$("#site-nav").removeAttr("style");
		}
	});	
} );