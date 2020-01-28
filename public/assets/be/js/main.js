'use strict';

$(document).ready(function () {

    /* row height vertical dynamic height*/
    var header_height = $('.header').outerHeight();
    var footer_height = $('.footer').outerHeight();
    if (header_height !== null && header_height != undefined) {
        $('.row-height').css('height', ($(window).height() - header_height - footer_height));
    } else {
        $('.row-height').css('height', ($(window).height() - footer_height));
    }

    /* background image inline to background set */
    $('.background').each(function () {
        $(this).css('background-image', 'url(' + $(this).children('img').attr('src') + ')');
        $(this).children('img').hide();
    })

    /* sidebar navigation dropdown */
    $('.sidebar .nav .nav-link').on('click', function () {
        if ($(this).hasClass('dropdown-nav') === true) {
            if ($(this).hasClass('active') === true) {
                $(this).removeClass('active');
                $(this).next('.nav').slideUp();
            } else {
                $('.sidebar .nav .dropdown-nav.active').next('.nav').slideUp();
                $('.sidebar .nav .nav-link.dropdown-nav').removeClass('active');
                $(this).addClass('active').next('.nav').slideDown().mCustomScrollbar({
                    axis: "y",
                });;
            }
        } else {
            $('.sidebar .nav .dropdown-nav.active').next('.nav').slideUp();
            $('.sidebar .nav .nav-link.dropdown-nav').removeClass('active');
        }
    });

    /* Hide dropdown menu on out side click left sidebar */
    $(document).click(function (e) {
        e.stopPropagation();
        var container = $(".sidebar");
        if (container.has(e.target).length === 0) {
            $('.sidebar .nav .dropdown-nav.active').next('.nav').slideUp();
            $('.sidebar .nav .nav-link.dropdown-nav').removeClass('active');
        }
    });

    /* menu sidebar toggle */
    $('.menu-btn').on('click', function (e) {
        e.stopPropagation();
        $('body').toggleClass('menu-close');
    });

    /* menu sidebar toggle */
    $('.scroll-y').mCustomScrollbar({
        axis: "y",
    });

    /* chat user preview close */
    $('.button-preview-close').on('click', function () {
        $(this).closest('.preview-profile').addClass('active');
    });

    $('.view-profile').on('click', function () {
        $('.preview-profile').removeClass('active');
    });

    /* right sidebar open close */
    $('.sidebar-right-btn').on('click', function () {
        $('.sidebar-right').addClass('open-sidebar-right');
    });
    $('.sidebar-right .btn-close').on('click', function () {
        $('.sidebar-right').removeClass('open-sidebar-right');
    });


    /* close menu if small device */
    if ($(window).width() <= 1023) {
        $('body').addClass('menu-close');

        $(document).on('click', function (e) {
            if ($('body').hasClass('menu-close') !== true) {
                var container = $(".sidebar");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    $('body').addClass('menu-close');
                }
            }
        });

    } else {
        $('body').removeClass('menu-close');
    }


});


$(window).on('load', function () {
    /*loader hide */
    setTimeout(function () {
        $('.loader').fadeOut();
    }, 500);

    /* fixed header specific style */
    if ($('.header').hasClass('fixed-top') === true) {
        $('main').css('padding-top', $('.fixed-top').outerHeight());

        $(window).on('scroll', function () {
            if ($(this).scrollTop() >= 100) {
                $('.header').addClass('fill-header shadow-sm')
            } else {
                $('.header').removeClass('fill-header shadow-sm')
            }
        });

    }
});

$(window).on('resize', function () {

    /* close menu if small device */
    if ($(window).width() <= 1023) {
        $('body').addClass('menu-close');

        $(document).on('click', function (e) {
            if ($('body').hasClass('menu-close') !== true) {
                var container = $(".sidebar");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    $('body').addClass('menu-close');
                }
            }
        });
    } else {
        $('body').removeClass('menu-close');
    }
});
