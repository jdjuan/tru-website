$(function () {

	//NAVBAR COLLAPSE
	$("ul.navbar-nav li").click(function() {
		$(".navbar-collapse").collapse('hide');
	});

	//NAVBAR
	$('ul.navbar-nav li').click(function(e) {
		$('.navbar-nav li.active').removeClass('active');
		var $this = $(this);
		if (!$this.hasClass('active')) {
			$this.addClass('active');
		}
		e.preventDefault();
	});

	$('li.proyectosLi').click(function(){
		$('li.proyectosLi').removeClass('active');
	});

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

	$(".owl-next, .owl-prev").on('touchstart', function(){
		$(".owl-item.active").next().children(":first").children(":first").trigger( "click" );
	});

	// $("#owl-example2").owlCarousel({
	// 	items : 4,
	// 	navigation : true,
	// 	navigationText : ["",""],
	// 	pagination : false, 
	// 	rewindSpeed : 2000
	// });

	$(".owl-prev").addClass('glyphicon glyphicon-chevron-left');
	$(".owl-next").addClass('glyphicon glyphicon-chevron-right');
	$(".owl-prev").css('color','#6CA31C');
	$(".owl-next").css('color','#6CA31C');
});

function displayServicio(n){
	if ($("#serviciosMas"+n).text() === "+") {
		$(".mas").text("+");
		$("#serviciosMas"+n).text("-");
	}else{
		$("#serviciosMas"+n).text("+");
	}
	if($('#servicio'+n+':visible').length != 0){
		$('.serviciosText').hide();
		$('.overlay').hide();
	}else{
		$('.serviciosText').hide();
		$('.overlay').hide();
		$('#servicio'+n).show();
		$('#overlay'+n).show();
	}
}