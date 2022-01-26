$(document).ready(function(){

    //News slider    
    $('.owl-one').owlCarousel({
        rtl:true,
        loop: true,
        margin: 25,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

        //Services slider    
        $('.owl-two').owlCarousel({
            rtl:true,
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            dotsEach: 2,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 5
                }
            }
        });

        //video slider
        $('.owl-three').owlCarousel({
            rtl:true,
            videoWidth: 300,
            videoHeight: 330,
            items:1,
            //merge:true,
            loop:true,
            margin:80,
            video:true,
            //lazyLoad:true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            center:true,
            dots: false,
            nav:true,
            responsive:{
                600:{
                    items:2
                },
                1000:{
                    items:5
                }
            }
        });

        //Gallery slider    
        $('.owl-four').owlCarousel({
            rtl:true,
            loop: true,
            margin: 25,
            nav: true,
            dots: false,
            //dotsEach: 2,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 5
                }
            }
        });

        //websites slider    
        $('.owl-five').owlCarousel({
            rtl:true,
            loop: true,
            margin: 25,
            nav: true,
            dots: false,
            //dotsEach: 2,
            //autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });

        // video slider

        $('.video-popup-single').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            rtl: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 5000,
            asNavFor: '.video-popup-multi'
        })

        $('.video-popup-multi').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            rtl: true,
            autoplay: true,
            autoplaySpeed: 5000,
            asNavFor: '.video-popup-single',
            focusOnSelect: true
        })

  });