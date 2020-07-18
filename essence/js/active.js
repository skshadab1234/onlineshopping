(function ($) {
    'use strict';

    var $window = $(window);

    // :: Nav Active Code
    if ($.fn.classyNav) {
        $('#essenceNav').classyNav();
    }

    // :: Sliders Active Code
    if ($.fn.owlCarousel) {
        $('.popular-products-slides').owlCarousel({
            items: 4,
            margin: 30,
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 5000,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 5
                }
            }
        });
        $('.product_thumbnail_slides').owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            nav: true,
            navText: ["<img src='img/core-img/long-arrow-left.svg' alt=''>", "<img src='img/core-img/long-arrow-right.svg' alt=''>"],
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1000
        });
    }

    // :: Header Cart Active Code
    var cartbtn1 = $('#essenceCartBtn');
    var cartOverlay = $(".cart-bg-overlay");
    var cartWrapper = $(".right-side-cart-area");
    var cartbtn2 = $("#rightSideCart");
    var cartOverlayOn = "cart-bg-overlay-on";
    var cartOn = "cart-on";

    cartbtn1.on('click', function () {
        cartOverlay.toggleClass(cartOverlayOn);
        cartWrapper.toggleClass(cartOn);
    });
    cartOverlay.on('click', function () {
        $(this).removeClass(cartOverlayOn);
        cartWrapper.removeClass(cartOn);
    });
    cartbtn2.on('click', function () {
        cartOverlay.removeClass(cartOverlayOn);
        cartWrapper.removeClass(cartOn);
    });



    // :: Header Cart Active Code
    var profilebtn1 = $('#profilecart');
    var profileOverlay = $(".profile-overlay");
    var profileWrapper = $(".right-side-profile-area");
    var profilebtn2 = $("#profilerightSide");
    var profileOverlayOn = "profile-overlay-on";
    var profileOn = "profile-on";

    profilebtn1.on('click', function () {
        profileOverlay.toggleClass(profileOverlayOn);
        profileWrapper.toggleClass(profileOn);
    });
    profileOverlay.on('click', function () {
        $(this).removeClass(profileOverlayOn);
        profileWrapper.removeClass(profileOn);
    });
    profilebtn2.on('click', function () {
        profileOverlay.removeClass(profileOverlayOn);
        profileWrapper.removeClass(profileOn);
    });

        // :: Header Cart Active Code
    var profilebtn2 = $('#profilecart1');
    var profileOverlay2 =$(".profile-overlay1");
    var profileWrapper2 =  $(".right-side-profile-area1");
    var profilebtn3 = $("#profilerightSide1");
    var profileOverlayOn2 = "profile-overlay1-on";
    var profileOn2 = "login-on";

    profilebtn2.on('click', function () {
        profileOverlay2.toggleClass(profileOverlayOn2);
        profileWrapper2.toggleClass(profileOn2);
    });
    profileOverlay2.on('click', function () {
        $(this).removeClass(profileOverlayOn2);
        profileWrapper2.removeClass(profileOn2);
    });
    profilebtn3.on('click', function () {
        profileOverlay2.removeClass(profileOverlayOn2);
        profileWrapper2.removeClass(profileOn2);
    });


    // :: Header Cart Active Code
    var profilebtn3 = $('#wishlist_pop');
    var profileOverlay3 = $(".wishlist-bg-overlay");
    var profileWrapper3 = $(".right-side-wishlist-area");
    var profilebtn4 = $("#wishlistrightSide");
    var profileOverlayOn3 = "wishlist-bg-overlay-on";
    var profileOn3 = "wishlist-on";

    profilebtn3.on('click', function () {
        profileOverlay3.toggleClass(profileOverlayOn3);
        profileWrapper3.toggleClass(profileOn3);
    });
    profileOverlay3.on('click', function () {
        $(this).removeClass(profileOverlayOn3);
        profileWrapper3.removeClass(profileOn3);
    });
    profilebtn4.on('click', function () {
        profileOverlay3.removeClass(profileOverlayOn3);
        profileWrapper3.removeClass(profileOn3);
    });

    // :: ScrollUp Active Code
    if ($.fn.scrollUp) {
        $.scrollUp({
            scrollSpeed: 1000,
            easingType: 'easeInOutQuart',
            scrollText: '<i class="fa fa-angle-up" aria-hidden="true"></i>'
        });
    }

    // :: Sticky Active Code
    $window.on('scroll', function () {
        if ($window.scrollTop() > 0) {
            $('.header_area').addClass('sticky');
        } else {
            $('.header_area').removeClass('sticky');
        }
    });

    // :: Nice Select Active Code
    if ($.fn.niceSelect) {
        $('select').niceSelect();
    }

    // :: Slider Range Price Active Code
    $('.slider-range-price').each(function () {
        var min = jQuery(this).data('min');
        var max = jQuery(this).data('max');
        var unit = jQuery(this).data('unit');
        var value_min = jQuery(this).data('value-min');
        var value_max = jQuery(this).data('value-max');
        var label_result = jQuery(this).data('label-result');
        var t = $(this);
        $(this).slider({
            range: true,
            min: min,
            max: max,
            values: [value_min, value_max],
            slide: function (event, ui) {
                var result = label_result + " " + unit + ui.values[0] + ' - ' + unit + ui.values[1];
                console.log(t);
                t.closest('.slider-range').find('.range-price').html(result);
            }
        });
    });

    // :: Favorite Button Active Code
    var favme = $(".favme");

    favme.on('click', function () {
        $(this).toggleClass('active');
    });

    favme.on('click touchstart', function () {
        $(this).toggleClass('is_animating');
    });

    favme.on('animationend', function () {
        $(this).toggleClass('is_animating');
    });

    // :: Nicescroll Active Code
    if ($.fn.niceScroll) {
        $(".cart-list, .cart-content").niceScroll();
    }

    // :: wow Active Code
    if ($window.width() > 767) {
        new WOW().init();
    }

    // :: Tooltip Active Code
    if ($.fn.tooltip) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    // :: PreventDefault a Click
    $("a[href='#']").on('click', function ($) {
        $.preventDefault();
    });

})(jQuery);