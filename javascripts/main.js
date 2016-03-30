$(function () {
	var scrolling=false;
	$(document).on("scroll", onScroll);

	//NAVBAR COLLAPSE
	$("ul.navbar-nav li").click(function() {
		$(".navbar-collapse").collapse('hide');
	});

	//NAV SCROLL
	navScroll("#linkSlider", ".slider", 70);
	navScroll("#linkNosotros", ".container.nosotros", 140);
	navScroll("#linkServicios", ".container.servicios", 70);
	navScroll("#linkProyectos", ".container.proyectos", 130);
	navScroll("#linkEquipo", ".container.miembros", 70);
	navScroll("#linkTrabajos", ".container.trabajos", 130);
	navScroll("#linkContacto", ".container.contacto", 90);

	//NAVBAR
	$('ul.navbar-nav li.navs').click(function(e) {
		$('.navbar-nav li.active').removeClass('active');
		var $this = $(this);
		if (!$this.hasClass('active')) {
			$this.addClass('active');
		}
		e.preventDefault();
	});

	//PROYECTOS
	$("#owl-example").owlCarousel({
		items : 5,
		navigation : true,
		navigationText : ["",""],
		pagination : false, 
		rewindSpeed : 2000,
		responsiveRefreshRate : 200,
		addClassActive : true
	});
	$(".owl-next, .owl-prev").click(function(){
		$(".owl-item.active").children(":first").children(":first").trigger( "click" );
	});

	$(".owl-next").on('touchstart', function(){
		var nextElement=$(".owl-item.active").next();
		if(nextElement.length){
			nextElement.children(":first").children(":first").trigger( "click" );
		}else{
			$(".owl-item").children(":first").children(":first").trigger( "click" );
		}
	});

	$(".owl-prev").on('touchstart', function(){
		var prevElement=$(".owl-item.active").prev();
		if(prevElement.length){
			prevElement.children(":first").children(":first").trigger( "click" );
		}else{
			$(".owl-item:last").children(":first").children(":first").trigger( "click" );
		}
		
	});

	$(".owl-prev").addClass('glyphicon glyphicon-chevron-left');
	$(".owl-next").addClass('glyphicon glyphicon-chevron-right');
	$(".owl-prev").css('color','#6CA31C');
	$(".owl-next").css('color','#6CA31C');

	$('li.proyecto').click(function(){
		$('li.proyecto').removeClass('active');
	});

	function navScroll(linkID, className, offset){
		$(linkID).click(function() {
			scrolling=true;
			$('html,body').animate({
				scrollTop: $(className).offset().top-offset},
				'slow', function(){
					scrolling=false;
					if ("#linkSlider" == linkID) {
						$('.navbar li.active').removeClass('active');
						$(".navLinks li:first").addClass('active');
					}
				});
		});
	}

	function onScroll(event){
		var scrollPos = $(document).scrollTop();
		$('.navbar li.active').removeClass('active');
		if (scrollPos > $(".container.contacto").offset().top-100) {
			$("li:has(#linkContacto)").addClass('active');
		}else if (scrollPos > $(".container.miembros").offset().top-100) {
			$("li:has(#linkEquipo)").addClass('active');
		}else if (scrollPos > $(".container.trabajos").offset().top-140) {
			$("li:has(#linkTrabajos)").addClass('active');
		}else if (scrollPos > $(".container.proyectos").offset().top-140) {
			$("li:has(#linkProyectos)").addClass('active');
		}else if (scrollPos > $(".container.servicios").offset().top-80) {
			$("li:has(#linkServicios)").addClass('active');
		}else {
			$("li:has(#linkNosotros)").addClass('active');
		}
	}

	//EQUIPO
	$(".overlayEquipo").hide();
	$(".equipo").hover(function() {
		$(this).children().first().stop(true, false).toggle("display");
	});

	// $.ajax({
	// 	url: 'https://randomuser.me/api/?results=10',
	// 	dataType: 'json',
	// 	success: function(data){
	// 		for (var i = 0; i <= 8; i++) {
				// $("#equipo"+i).css("background-image","url("+data.results[i].user.picture.large+")");
				// $(".overlay"+i+" .nombreEquipo").text(data.results[i].user.name.first +" "+ data.results[i].user.name.last);
				// $(".overlay"+i+" .descripcionEquipo").append("<br><br>"+data.results[i].user.email);
				// $(".overlay"+i+" .nombreEquipo").css('textTransform', 'capitalize');
				// $(".overlay"+i+" .descripcionEquipo").css('textTransform', 'capitalize');
	// 		}
	// 	}
	// });
	
});

function displayServicio(n){
	if ($("#serviciosMas"+n).text() === "+") {
		$(".mas").text("+");
		$("#serviciosMas"+n).text("-");
		$("#serviciosMas"+n).css("padding-left","2rem");
		$("#serviciosMas"+n).css("padding-right","2rem");

	}else{
		$("#serviciosMas"+n).text("+");
		$("#serviciosMas"+n).css("padding-left","1.6rem");
		$("#serviciosMas"+n).css("padding-right","1.6rem");
	}
	var selectedService='#servicio'+n;
	var selectedOverlay='#overlay'+n;
	$('.serviciosInfo:not('+selectedService+')').hide();
	$('.overlay:not('+selectedOverlay+')').hide();
	$(selectedService).toggle("display");
	$(selectedOverlay).toggle("display");
}
