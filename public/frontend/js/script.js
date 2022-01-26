// countDown1 = new CountDownObject(); //add countdown as object

// countDown1.TIME_ZONE = +4, // your time zone (-12 ... +14)

// // Your date and time
// countDown1.SET_YOUR_SEC = 0,
// countDown1.SET_YOUR_MIN = 0,
// countDown1.SET_YOUR_HOUR = 13,
// countDown1.SET_YOUR_DAY = 01,
// countDown1.SET_YOUR_MONTH = 04,
// countDown1.SET_YOUR_YEAR = 2021,

// countDown1.NUM_OF_ELEMENTS = 8, // number of flip-elements(from 1 to 9)
// countDown1.TIME_ANIMATION = 950, // time of flip animation in milliseconds(from 50 to 950)
// countDown1.BACK_COLOR = "#f07000", // flip-element back color
// countDown1.DIGITS_COLOR = "#f0d070", // digits color on flip-elements
// countDown1.TEXT_COLOR = "#e0e0e0", // text color under flip elements(seconds, minutes and etc.)
// countDown1.IS_DYNAMIC_COLOR = true, // back color will vary(true or false)

// countDown1.CANVAS_NAME = "CountDownCanvas";  //canvas name in html-code

// countDown1.Start(); //start countdown

$(document).ready(function () {
    
    $('.welcome-slider .slider').slick({
        rtl: true,
        arrows: false,
        dots: true
    });

    $('.statistics .slider').slick({
        rtl: true,
        arrows: false,
        dots: false,
        slidesToShow: 5,
        // variableWidth: true,
        // centerMode: true,
        infinite: true,
        responsive: [
            {
              breakpoint: 768,
              settings: {
                // arrows: false,
                // centerMode: true,
                // centerPadding: '40px',
                slidesToShow: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                // arrows: false,
                // centerMode: true,
                // centerPadding: '40px',
                slidesToShow: 1
              }
            }
          ]
    });

    $('.news-slider .slider').slick({
        rtl: true,
        arrows: false,
        dots: true
    });

    $('.services .slider').slick({
        rtl: true,
        arrows: false,
        dots: false,
        slidesToShow: 3,
        // variableWidth: true,
        // centerMode: true,
        infinite: true,
        responsive: [
            {
              breakpoint: 768,
              settings: {
                // arrows: false,
                // centerMode: true,
                // centerPadding: '40px',
                slidesToShow: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                // arrows: false,
                // centerMode: true,
                // centerPadding: '40px',
                slidesToShow: 1
              }
            }
        ]
    });

    $('.projects .slider').slick({
        rtl: true,
        arrows: false,
        dots: true,
        // appendDots: '.projects .slider .slide .project .desc'
    });

    $('.media .slider').slick({
        rtl: true,
        arrows: false,
        dots: false,
        slidesToShow: 3,
        // variableWidth: true,
        // centerMode: true,
        infinite: true,
        responsive: [
            {
              breakpoint: 768,
              settings: {
                // arrows: false,
                // centerMode: true,
                // centerPadding: '40px',
                slidesToShow: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                // arrows: false,
                // centerMode: true,
                // centerPadding: '40px',
                slidesToShow: 1
              }
            }
        ]
    });
  
  
  //toggle arrow rotation of FAQ page
  $('.question .head .btn').click(function () {
    $(this).children('img').toggleClass('rotate')
  })
  

});

$(function() {
    // ------------------------------------------------------- //
    // Multi Level dropdowns
    // ------------------------------------------------------ //
    $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
      event.preventDefault();
      event.stopPropagation();
  
      $(this).siblings().toggleClass("show");
  
  
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
      }
      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
      });
  
    });
  });

