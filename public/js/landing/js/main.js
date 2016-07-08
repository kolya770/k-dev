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
});
