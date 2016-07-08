/**
 * Script made for slider element in the landing page with kenwheeler/slick
 * tool.
 */

$(document).ready(function(){
    $('.reviews').slick({
    	dots: true,
    	infinite:true,
    	autoplay: true,
  		autoplaySpeed: 2000,
  		speed: 2000
    });
});
        