window.onload = function() {
    //popup
    $("#send-message").on("click", function() {
      $(".popup").fadeIn("fast");

      $("#close-popup").on("click", function(){
        $(".popup").fadeOut("fast");
      });
    });

	  //changing color of label in popup form
		$(".popup input, .popup textarea").on("focus", function() {
			$(this).prev('label').css('color', '#7cc5e6');
		});

	  $(".popup input, .popup textarea").on("focusout", function() {
		  $(this).prev('label').css('color', '#415058');
	  });
};

$(document).ready(function() {
    $($ ('#cover-video')).backgroundVideo();
    $("#myTab a").click(function(e){
    e.preventDefault();
    $(this).tab('show');
    /**
     * Script made for slider element in the landing page with kenwheeler/slick
     * tool.
     */
    
  });
});

$(document).ready(function(){ 
  $('.reviews').slick({
      dots: true,
      infinite:true,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 2000
    });
});

$(document).ready(function(){
          $('.images').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: true
            });
        });


/*
 * Script for modals in image gallery on portfolio-item page.
 */
var modal = document.getElementById('myModal');

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var images = document.getElementsByClassName('image-item');
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  var i;
  for (i = 0; i < images.length; i++) {
    images[i].onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      modalImg.alt = this.alt;
      captionText.innerHTML = this.alt;
    }
  }
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() { 
      modal.style.display = "none";
  }



