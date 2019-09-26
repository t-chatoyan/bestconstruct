"use strict";
$(document).ready(function() {
    $(".lightgallery").lightGallery();
  
  "use strict";

/* 
   CounterUp
   ========================================================================== */
    $('.counter').counterUp({
      time: 500
    });

/* 
   MixitUp
   ========================================================================== */
  $('#portfolio').mixItUp();


    /*
       Clients Sponsor
       ========================================================================== */
    var teamSlider = $("#teamSlider");
    teamSlider.owlCarousel({
        items: 4,
        itemsTablet: 2,
        margin:90,
        stagePadding:90,
        smartSpeed:450,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [980,3],
        itemsTabletSmall: [480,2],
        itemsMobile : [479,1],
    });

/* 
   Clients Sponsor 
   ========================================================================== */
    var clientsScroller = $("#clients-scroller");
    clientsScroller.owlCarousel({
      items: 3,
      itemsTablet: 3,
      margin: 90,
      stagePadding:90,
      smartSpeed:450,
      itemsDesktop : [1199,4],
      itemsDesktopSmall : [980,3],
      itemsTabletSmall: [480,2],
      itemsMobile : [479,1],
    });

  /* Testimonials Carousel 
  ========================================================*/
    var testimonials = $("#testimonials");
    testimonials.owlCarousel({
        navigation: false,
        pagination: true,
        slideSpeed: 1000,
        stopOnHover: true,
        autoPlay: true,
        items: 2,
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [980,2],
        itemsTabletSmall: [480,1],
        itemsMobile : [479,1],
      });   

/* 
   Touch Owl Carousel
   ========================================================================== */
    var touchSlider = $(".touch-slider");
    touchSlider.owlCarousel({
      navigation: false,
      pagination: true,
      slideSpeed: 1000,
      stopOnHover: true,
      autoPlay: true,
      items: 1,
      itemsDesktopSmall: [1024, 1],
      itemsTablet: [600, 1],
      itemsMobile: [479, 1]
    });

    $('.touch-slider').find('.owl-prev').html('<i class="lni-chevron-left"></i>');
    $('.touch-slider').find('.owl-next').html('<i class="lni-chevron-right"></i>');

/* 
   Sticky Nav
   ========================================================================== */
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 200) {
            $('.header-top-area').addClass('menu-bg');
        } else {
            $('.header-top-area').removeClass('menu-bg');
        }
    });

/* 
   VIDEO POP-UP
   ========================================================================== */
    $('.video-popup').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });

/* 
   Back Top Link
   ========================================================================== */
    var offset = 200;
    var duration = 500;
    $(window).scroll(function() {
      if ($(this).scrollTop() > offset) {
        $('.back-to-top').fadeIn(400);
      } else {
        $('.back-to-top').fadeOut(400);
      }
    });

    $('.back-to-top').on('click',function(event) {
      event.preventDefault();
      $('html, body').animate({
        scrollTop: 0
      }, 600);
      return false;
    })

/* 
   One Page Navigation & wow js
   ========================================================================== */
    //Initiat WOW JS
    new WOW().init();

    // one page navigation 
    $('.main-navigation').onePageNav({
            currentClass: 'active'
    }); 

    $(window).on('load', function() {
       
        $('body').scrollspy({
            target: '.navbar-collapse',
            offset: 195
        });

        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 200) {
                $('.fixed-top').addClass('menu-bg');
            } else {
                $('.fixed-top').removeClass('menu-bg');
            }
        });

    });
/* Nivo Lightbox
  ========================================================*/   
   $('.lightbox').nivoLightbox({
    effect: 'fadeScale',
    keyboardNav: true,
  });


/* stellar js
  ========================================================*/
  $.stellar({
    horizontalScrolling: false,
    verticalOffset: 30,
    responsive: false
  });

/* 
   Page Loader
   ========================================================================== */
   $(window).on('load',function() {
      "use strict";
      $('#loader').fadeOut();
    });

    var input = document.querySelector("#phone_number");
    var iti = window.intlTelInput(input, {
        preferredCountries: ['ru'],
        separateDialCode: true,
        utilsScript: "js/utils.js",
    });

    // sendOffer

    $("#sendOffer").click(function( event ) {
        event.preventDefault();

        var regExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var name = $('#name').val().trim();
        var email = $('#email').val().trim();
        var message = $('#message').val().trim();
        var phone = $('#phone_number').val();
        var phoneNumber  = iti.getNumber();

        var isInvalidName = true;
        var isInvalidEmail = false;
        var isInvalidMessage = true;
        var isInvalidPhoneNumber = true;

        if (name === ''){
            $('#name').addClass('is-invalid');
            isInvalidName = true;
        } else {
            $('#name').removeClass('is-invalid');
            isInvalidName = false;
        }
        if (message === ''){
            $('#message').addClass('is-invalid');
            isInvalidMessage = true;
        } else {
            $('#message').removeClass('is-invalid');
            isInvalidMessage = false;
        }
        if (email !== '' ) {
            if (!regExp.test(String(email).toLowerCase())) {
                $('#email').addClass('is-invalid');
                isInvalidEmail = true;
            } else {
                $('#email').removeClass('is-invalid');
                isInvalidEmail = false;
            }
        }
        if (phone === ''){
            console.log(122);
            $('#phone_number').addClass('is-invalid');
            isInvalidPhoneNumber = true;
        } else {
            $('#phone_number').removeClass('is-invalid');
            if (!iti.isValidNumber()){
                isInvalidPhoneNumber = true;
                $('#phone_number').addClass('is-invalid');
            } else {
                $('#phone_number').removeClass('is-invalid');
                isInvalidPhoneNumber = false;
            }
        }


        if (!isInvalidName && !isInvalidPhoneNumber && !isInvalidEmail && !isInvalidMessage) {
            $('#loadOffer').addClass('load-btn');
            $('#sendOffer').attr('disabled','disabled');
            var form = document.querySelector("#offerForm");
            var formData = new FormData(form);
            formData.append('phone_number', phoneNumber);

            fetch("/offer/send",
                {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then(function(res){ return res.json(); })
                .then(function(data){
                    $('#loadOffer').removeClass('load-btn');
                    $('#sendOffer').removeAttr('disabled');
                    $('#thankYouModalOffer').modal('show');
                    form.reset();
                })
        }

    });

    // contactFormSubmit
    $("#contactFormSubmit").click(function( event ) {
        event.preventDefault();
        var regExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var name = $('#fullName').val().trim();
        var email = $('#contactEmail').val().trim();
        var subject = $('#msgSubject').val().trim();
        var message = $('#contactMessage').val().trim();

        var isInvalidName = true;
        var isInvalidEmail = false;
        var isInvalidMessage = true;
        var isInvalidSubject = true;

        if (name === ''){
            $('#fullName').addClass('is-invalid');
            isInvalidName = true;
        } else {
            $('#fullName').removeClass('is-invalid');
            isInvalidName = false;
        }

        if (subject === ''){
            $('#msgSubject').addClass('is-invalid');
            isInvalidSubject = true;
        } else {
            $('#msgSubject').removeClass('is-invalid');
            isInvalidSubject = false;
        }

        if (message === ''){
            $('#contactMessage').addClass('is-invalid');
            isInvalidMessage = true;
        } else {
            $('#contactMessage').removeClass('is-invalid');
            isInvalidMessage = false;
        }
        if (email !== '' ) {
            isInvalidEmail = true;
            if (!regExp.test(String(email).toLowerCase())) {
                $('#contactEmail').addClass('is-invalid');
                isInvalidEmail = true;
            } else {
                $('#contactEmail').removeClass('is-invalid');
                isInvalidEmail = false;
            }
        } else {
            $('#contactEmail').addClass('is-invalid');
        }

        if (!isInvalidName && !isInvalidEmail && !isInvalidMessage && !isInvalidSubject) {
            $('#loadContactForm').addClass('load-btn');
            $('#contactFormSubmit').attr('disabled','disabled');
            var form = document.querySelector("#contactForm");
            var formData = new FormData(form);

            fetch("/message/send",
                {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then(function(res){ return res.json(); })
                .then(function(data){
                    $('#loadContactForm').removeClass('load-btn');
                    $('#contactFormSubmit').removeAttr('disabled');
                    $('#thankYouModalContact').modal('show');
                    form.reset();
                })
        }
    });
});

