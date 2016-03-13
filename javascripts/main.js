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