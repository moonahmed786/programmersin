/*
Template: Markethon - Digital Marketing Agency WordPress Theme
Author: iqonicthemes.in
Version: 1.0.0
Design and Developed by: iqonicthemes.in
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
1 Page Loader
2 Circle Progressbar
3 Isotope
4 filter items on button click
5 Progress Bar
6 Counter
7 Top Menu
8 Back To Top
9 Owl Carousel
10 Accordion
11 Magnific Popup
12 Header
13 Wow Animation
14 resize
15 Tabs

------------------------------------------------
Index Of Script
----------------------------------------------*/
(function(jQuery) {

    "use strict";
    jQuery(document).ready(function() {

        jQuery(window).on('load', function(e) {

            /*------------------------
            1 Page Loader
            --------------------------*/
            jQuery("#load").fadeOut();
            jQuery("#loading").delay(0).fadeOut("slow");

            /*------------------------
            2 Circle Progressbar
            --------------------------*/
            function animateElements() {

                jQuery('.progressbar').each(function () {
                    var elementPos = jQuery(this).offset().top;
                    var topOfWindow = jQuery(window).scrollTop();
                    var percent = jQuery(this).find('.circle').attr('data-percent');
                    var percentage = parseInt(percent, 10) / parseInt(100, 10);
                    var animate = jQuery(this).data('animate');
                    if (elementPos < topOfWindow + jQuery(window).height() - 30 && !animate) {
                        jQuery(this).data('animate', true);
                        jQuery(this).find('.circle').circleProgress({
                            startAngle: -Math.PI / 2,
                            value: percent / 100,
                            thickness: 9,

                        }).stop();

                    }
                });
            }
            animateElements();
            jQuery(window).scroll(animateElements);

            /*------------------------
            3 Isotope
            --------------------------*/
            jQuery('.isotope').isotope({
                itemSelector: '.iq-grid-item',
            });

            /*------------------------------
            4 filter items on button click
            -------------------------------*/
            jQuery('.isotope-filters').on('click', 'button', function() {
                var filterValue = jQuery(this).attr('data-filter');
                jQuery('.isotope').isotope({
                    resizable: true,
                    filter: filterValue
                });
                jQuery('.isotope-filters button').removeClass('show active');
                jQuery(this).addClass('show active');
            });

            /*------------------------
            5 Progress Bar
            --------------------------*/
            jQuery('.iq-progress-bar > span').each(function() {
                var jQuerythis = jQuery(this);
                var width = jQuery(this).data('percent');
                jQuerythis.css({
                    'transition': 'width 2s'
                });
                setTimeout(function() {
                    jQuerythis.appear(function() {
                        jQuerythis.css('width', width + '%');
                    });
                }, 500);
            });

            /*----------------
            6 Counter
            ---------------------*/
            jQuery('.timer').countTo();


            /*----------------
            7 Top Menu
            ---------------------*/
            jQuery('.sub-menu').css('display', 'none');
            jQuery('.sub-menu').prev().addClass('isubmenu');
            jQuery(".sub-menu").before('<i class="fa fa-angle-down toggledrop" aria-hidden="true"></i>');

            jQuery('.widget .fa.fa-angle-down, #main .fa.fa-angle-down').on('click', function() {
                jQuery(this).next('.children, .sub-menu').slideToggle();
            });

            jQuery("#top-menu .menu-item .toggledrop").off("click");
            if (jQuery(window).width() < 992) {
                jQuery('#top-menu .menu-item .toggledrop').on('click', function(e) {
                    e.preventDefault();
                    jQuery(this).next('.children, .sub-menu').slideToggle();
                });
            }

            /*------------------------
            8 Back To Top
            --------------------------*/
            jQuery('#back-to-top').fadeOut();
            jQuery(window).on("scroll", function() {
                if (jQuery(this).scrollTop() > 250) {
                    jQuery('#back-to-top').fadeIn(1400);
                } else {
                    jQuery('#back-to-top').fadeOut(400);
                }
            });

            // scroll body to 0px on click
            jQuery('#top').on('click', function() {
                jQuery('top').tooltip('hide');
                jQuery('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });

            /*------------------------
            9 Owl Carousel
            --------------------------*/
            jQuery('.owl-carousel').each(function() {

                var jQuerycarousel = jQuery(this);
                jQuerycarousel.owlCarousel({
                    items: jQuerycarousel.data("items"),
                    loop: jQuerycarousel.data("loop"),
                    margin: jQuerycarousel.data("margin"),
                    nav: jQuerycarousel.data("nav"),
                    dots: jQuerycarousel.data("dots"),
                    autoplay: jQuerycarousel.data("autoplay"),
                    autoplayTimeout: jQuerycarousel.data("autoplay-timeout"),
                    navText: ["<i class='ion-ios-arrow-left'></i>", "<i class='ion-ios-arrow-right'></i>"],
                    responsiveClass: true,
                    responsive: {
                        // breakpoint from 0 up
                        0: {
                            items: jQuerycarousel.data("items-mobile-sm"),
                            nav: false,
                            dots: true
                        },
                        // breakpoint from 480 up
                        480: {
                            items: jQuerycarousel.data("items-mobile"),
                            nav: false,
                            dots: true
                        },
                        // breakpoint from 786 up
                        786: {
                            items: jQuerycarousel.data("items-tab")
                        },
                        // breakpoint from 1023 up
                        1023: {
                            items: jQuerycarousel.data("items-laptop")
                        },
                        1199: {
                            items: jQuerycarousel.data("items")
                        }
                    }
                });
            });

            /*------------------------
            10 Accordion
            --------------------------*/
            // Accordion 1
            jQuery('.iq-accordion .iq-accordion-block .accordion-details').hide();
            jQuery('.iq-accordion .iq-accordion-block:first').addClass('accordion-active').children().slideDown('slow');
            jQuery('.iq-accordion .iq-accordion-block').on("click", function() {
                if (jQuery(this).children('div.accordion-details ').is(':hidden')) {
                    jQuery('.iq-accordion .iq-accordion-block').removeClass('accordion-active').children('div.accordion-details ').slideUp('slow');
                    jQuery(this).toggleClass('accordion-active').children('div.accordion-details ').slideDown('slow');
                }
            });

            // Accordion 2
            jQuery('.iq-faq .iq-block .iq-details').hide();
            jQuery('.iq-faq .iq-block:first').addClass('iq-active').children().slideDown('slow');
            jQuery('.iq-faq .iq-block').on("click", function() {
                if (jQuery(this).children('div').is(':hidden')) {
                    jQuery('.iq-faq .iq-block').removeClass('iq-active').children('div').slideUp('slow');
                    jQuery(this).toggleClass('iq-active').children('div').slideDown('slow');
                }
            });

            /*------------------------
            11 Magnific Popup
            --------------------------*/
            jQuery('.popup-gallery').magnificPopup({
                delegate: 'a.popup-img',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function(item) {
                        return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                    }
                }
            });

            jQuery('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });

            /*------------------------
            12 Header
            --------------------------*/


            function headerHeight() {
                var height = jQuery(".header1").height();
                jQuery('.iq-height').css('height', height + 'px');
            }
            jQuery(function() {
                var header = jQuery(".header1"),
                    yOffset = 0,
                    triggerPoint = 80;
                headerHeight();

                jQuery(window).resize(headerHeight);
                jQuery(window).on('scroll', function() {

                    yOffset = jQuery(window).scrollTop();

                    if (yOffset >= triggerPoint) {
                        header.addClass("menu-sticky animated slideInDown");
                    } else {
                        header.removeClass("menu-sticky animated slideInDown");
                    }

                });
            });

            if (jQuery('header').hasClass('has-sticky')) {
                jQuery(window).on('scroll', function() {

                    var height = jQuery('.navbar').outerHeight();
                    if (jQuery(this).scrollTop() > height) {
                        jQuery('.has-sticky .logo').addClass('logo-display');
                    } else if (jQuery(this).scrollTop() <= height) {
                        jQuery('.has-sticky .logo').removeClass('logo-display');
                    }
                });
            }

            /*------------------------
            13 Wow Animation
            --------------------------*/
            var wow = new WOW({
                boxClass: 'wow',
                animateClass: 'animated',
                offset: 0,
                mobile: false,
                live: true
            });
            wow.init();

            /*------------------------
            14 Masonry Block
            --------------------------*/
            if(jQuery(".iq-masonry-block").length){
                var $msnry = jQuery('.iq-masonry-block .iq-masonry');
                if ($msnry) {
                    var $filter = jQuery('.iq-masonry-block .isotope-filters');
                    $msnry.isotope({
                        percentPosition: true,
                        resizable: true,
                        itemSelector: '.iq-masonry-block .iq-masonry-item',
                        masonry: {
                            gutterWidth: 0
                        }
                    });
                    // bind filter button click
                    $filter.on('click', 'button', function() {
                        var filterValue = jQuery(this).attr('data-filter');
                        $msnry.isotope({
                            filter: filterValue
                        });
                    });

                    $filter.each(function(i, buttonGroup) {
                        var $buttonGroup = jQuery(buttonGroup);
                        $buttonGroup.on('click', 'button', function() {
                            $buttonGroup.find('.active').removeClass('active');
                            jQuery(this).addClass('active');
                        });
                    });
                }
            }

        });

        /*---------------------------
        14 resize
        ---------------------------*/
        jQuery(window).on('resize', function() {
            "use strict";
            jQuery('.widget .fa.fa-angle-down, #main .fa.fa-angle-down').on('click', function() {
                jQuery(this).next('.children, .sub-menu').slideToggle();
            });

            jQuery("#top-menu .menu-item .toggledrop").off("click");
            if (jQuery(window).width() < 992) {
                jQuery('#top-menu .menu-item .toggledrop').on('click', function(e) {
                    e.preventDefault();
                    jQuery(this).next('.children, .sub-menu').slideToggle();
                });
            }
        });

        /*---------------------------
        15 Tabs
        ---------------------------*/
        jQuery(document).ready(function(){
            var a=jQuery('#iq-features .nav.nav-tabs').each(function(){
            var b =jQuery(this).find('a.active').addClass('active');
            activaTab(b);
            })
        });

        function activaTab(pill){
            jQuery(pill).addClass('active show');
        };

    });
})(jQuery);