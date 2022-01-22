
$(document).ready(function(){
    var testH = $(window).height();
    var navH = $('.navbar').innerHeight();
 $('.header,.offcanvas-body,.carousel-inner .one,.carousel-inner .two,.carousel-inner .three,.head-login,.head-login .row,.announce-head,.contact,.contact .row').height(testH-navH);
$('.header,.head-login,.announce-head,.search-head,.search2-head,.contact,.form1,.vag1,.xa,.ba,.za').css({marginTop: $('.navbar').innerHeight()});
$('.section-two,.header,.products1-head,.products1-read,.products2-read,.products3-read,.products4-read,.products2-head,.products3-head,.products4-head,.products5-head,.products6-head').css({marginTop: $('.navbar').innerHeight()});


})


$(".dropdown").click(function(){

$(".dropdown .dropdown-menu").slideToggle(500);

})


$(document).ready(function(){

$('.contact1').click(function(){

$('body,html').animate({scrollTop: $("#contact").offset().top})



})



})

function Search(){

location.assign("search2.html");

}

function Real(){

location.assign("search.html");
}

function Login(){

location.assign("login.html")

}
