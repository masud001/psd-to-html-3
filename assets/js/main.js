$(document).ready(function(){


// try now button click to heide and show
  $("#heder-try-now").click(function(e){
    e.preventDefault();
    $("#trynow-form").toggle();
  });




    // Add smooth scrolling to all links
    $("a").on('click', function(event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    }); //end click function


window.onscroll = function() {myFunction()};
var navbar = document.getElementById("header");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}



// back to top


if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}

  });



  // mobile menu show hide toggle 

  $('.cansel-btn').on('click', function(){
    $('#mobile-menu-area').removeClass("mobile-menu-show");
    $('#mobile-menu-area').addClass("mobile-menu-hide");
  })


  $('.burger-menu i').on('click', function(){
    $('#mobile-menu-area').addClass("mobile-menu-show");
    $('#mobile-menu-area').removeClass("mobile-menu-hide");
  })


