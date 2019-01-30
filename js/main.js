(function($) {
    "use strict";
    $(document).ready(function() {
        
    // Main Slider  
    $('.v-slider-active').owlCarousel({
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    margin:0,
    loop:true,
    dots:false,
    smartSpeed: 1000,
    nav:true,
    navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    autoplay:true,
    autoplayTimeout:7000,
    
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        },
        1200: {
            items: 1
        }
    }
    });
    
    $(".v-slider-active").on("translate.owl.carousel", function() {
        $(".v-slider-content h1, .v-slider-content p").removeClass("animated bounceInDown slow").css("opacity", "0");
        $(".v-slider-content p").removeClass("animated bounceInUp slow").css("opacity", "0");
        $(".v-slider-content .default-btn").removeClass("animated lightSpeedIn slow").css("opacity", "0");
    });
    $(".v-slider-active").on("translated.owl.carousel", function() {
        $(".v-slider-content h1, .v-slider-content p").addClass("animated bounceInDown slow").css("opacity", "1");
        $(".v-slider-content p").addClass("animated bounceInDown slow").css("opacity", "1");
        $(".v-slider-content .default-btn").addClass("animated lightSpeedIn").css("opacity", "1");
    });/*End of ready function*/
    
    // Counter Js
        $('.counter').counterUp({
            delay: 10,
            time: 5000
        });
    // Counter Background Parallax
        $('.v-counter-area-start').parallax({imageSrc: 'img/services.jpg'});
        
    });
}(jQuery));