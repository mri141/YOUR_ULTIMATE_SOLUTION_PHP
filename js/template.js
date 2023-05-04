(function($){
	$(document).ready(function(){

		//Owl carousel
		//-----------------------------------------------
		if ($('.owl-carousel').length>0) {
			$(".owl-carousel.content-slider").owlCarousel({
				items: 1,
				autoplay: true,
				autoplayTimeout: 5000,
				autoplaySpeed: 700,
				loop: true,
				nav: false,
				navText: false,
				dots: false
			});
			$(".owl-carousel.content-slider-with-large-controls").owlCarousel({
				items: 1,
				loop: true,
				autoplay: false,
				nav: true,
				dots: true
			});

		};


		$('.main-navigation:not(.onclick) .navbar-nav>li.dropdown, .main-navigation:not(.onclick) li.dropdown>ul>li.dropdown').hover(
			function(){
				var $this = $(this);
				$this.addClass('show');
			}, function(){
				$(this).removeClass('show');
		});

		$('.header [data-toggle=dropdown], .header-top [data-toggle=dropdown]').on('click', function(event) {
			// Avoid following the href location when clicking
			event.preventDefault();
			// Avoid having the menu to close when clicking
			event.stopPropagation();
			// close all the siblings
			$(this).parent().siblings().removeClass('show');
			// close all the submenus of siblings
			$(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('show');
			// opening the one you clicked on
			$(this).parent().toggleClass('show');
		});

		if ($(".stats [data-to]").length>0) {
			$(".stats [data-to]").each(function(options) {	
		        var $this = $(this);
		        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
		        $this.countTo(options);
							
			});
		};


		//Scroll totop
		//-----------------------------------------------
		$(window).scroll(function() {
			if($(this).scrollTop() != 0) {
				$(".scrollToTop").addClass("fadeToTop");
				$(".scrollToTop").removeClass("fadeToBottom");
			} else {
				$(".scrollToTop").removeClass("fadeToTop");
				$(".scrollToTop").addClass("fadeToBottom");
			}
		});

		$(".scrollToTop").click(function() {
			$("body,html").animate({scrollTop:0},800);
		});

		//Modal
		//-----------------------------------------------
		if($(".modal").length>0) {
			$(".modal").each(function() {
				$(".modal").prependTo( "body" );
			});
		}



		// Offcanvas side navbar
		//-----------------------------------------------
		if ($("#offcanvas").length>0) {
			$('#offcanvas').offcanvas({
				canvas: "body",
				disableScrolling: false,
				toggle: false
			});
		};

		if ($("#offcanvas").length>0) {
			$('#offcanvas [data-toggle=dropdown]').on('click', function(event) {
			// Avoid following the href location when clicking
			event.preventDefault();
			// Avoid having the menu to close when clicking
			event.stopPropagation();
			// close all the siblings
			$(this).parent().siblings().removeClass('open');
			// close all the submenus of siblings
			$(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
			// opening the one you clicked on
			$(this).parent().toggleClass('open');
			});
		};

		// product cart script
		if ($("span.addToCart").length>0) 
		$("span.addToCart").on("click",function(){
			var id = $(this).attr("data-id");
			$.ajax({
				type: "GET",
				url: "ajax.php?id="+id+"&action=add"
			})
			.done(function()
			{
				alert("Product have been added.");
			});
		});

		if ($("span.removeFromCart").length>0) 
		$("span.removeFromCart").on("click",function(){
			var id = $(this).attr("data-id");
			$.ajax({
				type: "GET",
				url: "ajax.php?id="+id+"&action=remove"
			})
			.done(function()
			{
				alert("Product have been removed.");
				location.reload();
			});
		});

		if ($("a.emptyCart").length>0)
		$("a.emptyCart").on("click",function(){
			$.ajax({
				type: "GET",
				url: "ajax.php?action=empty"
			})
			.done(function()
			{
				alert("Cart been emptied.");
				location.reload();
			});
		});

	}); // End document ready


})(this.jQuery);
