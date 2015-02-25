$(document).ready(function() {
	
    var height = $(window).height();
    var width = $('#logodiv').width();

    console.log(height);
    $('#logo').css('height', height - 20);
    $('.codeceptslogo').css('height', height * 0.7);
    var width1 = $('.codeceptslogo').width();

    var width2 = (width - width1) / 2;
    console.log(width);
    console.log(width1);
    console.log(width2);
    $('.codeceptslogo').css('left', width2);
});