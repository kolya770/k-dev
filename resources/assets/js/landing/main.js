

window.onload = function() {
    
    var popup = $('#popup');
    var popup_success = $("#popup-success");
    var span_success = $(".closesuccess");

    span_success.on('click', function() {
      popup_success.css("display", "none");
    });

    var span = $(".closepopup");

    span.on('click', function() {
      popup.css("display", "none");
    });


    var popup_input_textarea =  $(".popup input, .popup textarea");
    //changing color of label in popup form
    popup_input_textarea.on("focus", function() {
        $(this).prev('label').css('color', '#7cc5e6');
    });

    popup_input_textarea.on("focusout", function() {
        $(this).prev('label').css('color', '#415058');
    });
};

$(document).ready(function() {

    $("#form-message").on('submit', function() {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'name'              : $('#name').val(),
            'email'             : $('#email').val(),
            'message'           : $('#message').val()
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '/messages-send', // the url where we want to POST
            data        : formData, // our data object
            // dataType    : 'json', // what type of data do we expect back from the server
            encode      : true,
            headers     : { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Something went to wrong.Please Try again later...');
                console.log(textStatus, errorThrown);
                console.warn(jqXHR.responseText);
            },
            success: thanksMessage()
        })
        // using the done promise callback
            .done(function(data) {
                // log data to the console so we can see
                console.log(data);

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    } );

    /**
     * BackgroundVideo
     */
    $($ ('#cover-video')).backgroundVideo();

    $("#myTab a").click(function(e){
        e.preventDefault();
        $(this).tab('show');
        /**
         * Script made for slider element in the landing page with kenwheeler/slick
         * tool.
         */
    });

    /**
     * Slick slider
     */
    $('.reviews').slick({
      dots: true,
      infinite:true,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 2000,
      responsive: [

            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });

    $('.images').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });

    /*
     * Script for modals in image gallery on portfolio-item page.
     */
    var modal = $('#myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var images = $('.image-item');
    var modalImg = $("#img01");
    var captionText = $("#caption");
    var i;

    for (i = 0; i < images.length; i++) {
        images[i].onclick = function(){
            modal.css('display', 'block');
            modalImg.src = this.src;
            modalImg.alt = this.alt;
            captionText.innerHTML = this.alt;
        }
    }

    // Get the <span> element that closes the modal
    var span = $(".closemodal");

    // When the user clicks on <span> (x), close the modal
    span.on('click', function() {
        modal.css('display', 'none');
    });

    $("#myTab a").click(function(e){
        e.preventDefault();
        $(this).tab('show');
    });

    /**
     * Swiper
     */

    var mySwiper = new Swiper ('.swiper-container', {

        loop: true,
        // If we need pagination
        pagination: '.swiper-pagination',
        paginationClickable: true,
        // Navigation arrows
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        autoplay: 2500,
        autoplayDisableOnInteraction: true,
        spaceBetween: 30
    });

    /**
     * Panel
     */
    $('.panel-heading a').click(function() {
        $('.panel-heading').removeClass('active');
        $(this).parents('.panel-heading').addClass('active');
    });
});

function thanksMessage() {

    $("#form-message").fadeOut();
    $("#thanks-message").fadeIn(3000);

    setTimeout(function () {
        $("#popup").modal('hide');
    }, 5000);
}