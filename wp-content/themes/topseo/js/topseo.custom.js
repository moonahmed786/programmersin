// @codingStandardsIgnoreStart

(function($) {

    "use strict";
    var TOPSEO = {};
    // menu
    $('.sticky-menu').headroom({
        "offset": 46,
        "classes": {
            "initial": "topseo",
            // when at top of scroll area
            "pinned": "topseo-pinned",
            // when scrolling down
            "unpinned": "topseo-unpinned",
            // when above offset
            "top": "topseo-top",
            // when below offset
            "notTop": "topseo-not-top",
            // when at bottom of scoll area
            "bottom": "topseo-bottom",
            // when not at bottom of scroll area
            "notBottom": "topseo-not-bottom"
        }
    });

    TOPSEO.media = function(){

        enquire.register("screen and (max-width:992px)", {
            match: function() {
                $('.menu-box-right').topseo_menu({
                    resizeWidth: '992',
                    initiallyVisible: false,
                    collapserTitle: '',
                    animSpeed: 'fast',
                    easingEffect: null,
                    indentChildren: false,
                    childrenIndenter: '&nbsp;&nbsp;',
                    expandIcon: '',
                    collapseIcon: ''
                });
            }
        });
    };

    // Partner carousel
    $(".partner").owlCarousel({
        autoPlay: false,
        items: 5,
        scrollPerPage: false,
        loop: false,
        center: true,
        navigation: false,
        pagination: false,
        slideSpeed: 900,
        goToFirstSpeed: 1300,
        rewindNav: false,
        responsive: true,
        responsiveRefreshRate: 200
    });

    // Partner with pagination
    $(".partner-pagination").owlCarousel({
        autoPlay: false,
        items: 5,
        scrollPerPage: false,
        loop: false,
        center: true,
        navigation: false,
        pagination: true,
        slideSpeed: 900,
        goToFirstSpeed: 1300,
        rewindNav: false,
        responsive: true,
        responsiveRefreshRate: 200
    });

    // accordion
    $(".seo-accordion").smk_Accordion({
        closeAble: true,
    });

    // Reputation Management carousel
    $(".reputation-crs").owlCarousel({
        items: 1,
        autoPlay: 55000,
        stopOnHover: true,
        center: true,
        navigation: false,
        pagination: true,
        singleItem: true,
        autoHeight: false,
        responsive: true,
        responsiveRefreshRate: 200,
    });

    // Perfect SEO Expert carousel
    $(".perfect-seo-crs").owlCarousel({
        items: 1,
        autoPlay: 5500,
        stopOnHover: true,
        center: true,
        navigation: true,
        pagination: false,
        rewindNav: false,
        singleItem: true,
        autoHeight: true,
        responsive: true,
        slideSpeed: 700,
        responsiveRefreshRate: 200,
    });

    // Full Services carousel
    $(".services-crs").owlCarousel({
        autoPlay: false,
        items: 4,
        scrollPerPage: true,
        loop: false,
        center: true,
        navigation: true,
        pagination: true,
        slideSpeed: 900,
        goToFirstSpeed: 1300,
        rewindNav: false,
        responsive: true,
        responsiveRefreshRate: 200,
        itemsDesktop: [1340, 3],
        itemsDesktopSmall: [992, 2],
        itemsTablet: [768, 1],
        itemsTabletSmall: !1,
        itemsMobile: [479, 1]
    });

    // TABS
    $(".seo-tabs").organicTabs({
        "speed": 200
    });
    // Our partients speak carousel
    $(".our-partient-speak").owlCarousel({
        autoPlay: false,
        items: 1,
        loop: false,
        center: true,
        navigation: true,
        pagination: true,
        singleItem: true,
        autoHeight: false,
        slideSpeed: 300,
        goToFirstSpeed: 1300,
        rewindNav: false,
        responsive: true,
        responsiveRefreshRate: 200,
    });

    //...ver2
    $(".our-partient-speak-ver2").owlCarousel({
        autoPlay: false,
        items: 1,
        loop: false,
        center: true,
        navigation: false,
        pagination: false,
        singleItem: true,
        autoHeight: true,
        slideSpeed: 300,
        goToFirstSpeed: 1300,
        rewindNav: false,
        responsive: true,
        responsiveRefreshRate: 200,
    });

    // Full Range carousel
    $(".full-range-crs").slick({
        dots: true,
        arrows: false,
        vertical: true,
        infinite: true,
        // centerMode: true,
        // autoplay: true,
        verticalSwiping: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    // Client carousel
    $(".client").slick({
        dots: true,
        arrows: false,
        vertical: true,
        infinite: false,
        // centerMode: true,
        // autoplay: true,
        verticalSwiping: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    // Services testimonals carousel
    $(".services-testimonials").owlCarousel({
        autoPlay: false,
        items: 1,
        loop: false,
        center: true,
        navigation: true,
        pagination: false,
        singleItem: true,
        autoHeight: true,
        slideSpeed: 300,
        goToFirstSpeed: 1300,
        rewindNav: false,
        responsive: true,
        responsiveRefreshRate: 200,
    });

    // Pricing REAL RESULTS carousel
    $(".pricing-results-crs").owlCarousel({
        autoPlay: false,
        items: 4,
        loop: false,
        center: true,
        navigation: false,
        pagination: true,
        slideSpeed: 400,
        goToFirstSpeed: 1300,
        rewindNav: false,
        responsive: true,
        responsiveRefreshRate: 200,
    });

    // ISOTOPE
    // quick search regex
    TOPSEO.isotope = function(){
        var qsRegex;
        var buttonFilter;
        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.element-item',
            layoutMode: 'fitRows',
            percentPosition: true,
            filter: function() {
                var $this = $(this);
                var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
                var buttonResult = buttonFilter ? $this.is(buttonFilter) : true;
                return searchResult && buttonResult;
            }
        });
        $('.project-nav').on('click', 'button', function() {
            buttonFilter = $(this).attr('data-filter');
            $grid.isotope();
        });
        // use value of search field to filter
        var $quicksearch = $('#quicksearch').keyup(debounce(function() {
            qsRegex = new RegExp($quicksearch.val(), 'gi');
            $grid.isotope();
        }));
        // change is-checked class on buttons
        $('.project-nav').each(function(i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });
        // debounce so filtering doesn't happen every millisecond
        function debounce(fn, threshold) {
            var timeout;
            return function debounced() {
                if (timeout) {
                    clearTimeout(timeout);
                }

                function delayed() {
                    fn();
                    timeout = null;
                }
                setTimeout(delayed, threshold || 100);
            };
        }
    };

    // Case Detail more item crs
    $(".case-detail-more-crs").owlCarousel({
        autoPlay: false,
        items: 3,
        loop: false,
        center: true,
        navigation: false,
        pagination: true,
        autoHeight: false,
        slideSpeed: 500,
        goToFirstSpeed: 1300,
        rewindNav: false,
        responsive: true,
        responsiveRefreshRate: 200,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [979, 2],
        itemsTablet: [768, 1],
        itemsTabletSmall: !1,
        itemsMobile: [479, 1]
    });
    // PROJECT STYLE 3
    $(".project-large-thumbnail-crs").owlCarousel({
        autoPlay: false,
        items: 3,
        loop: false,
        center: true,
        navigation: false,
        pagination: true,
        autoHeight: false,
        slideSpeed: 500,
        goToFirstSpeed: 1300,
        rewindNav: false,
        responsive: true,
        responsiveRefreshRate: 200,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [979, 2],
        itemsTablet: [768, 1],
        itemsTabletSmall: !1,
        itemsMobile: [479, 1]
    });

    // blog post ver 4
    $(".blog-post-crs-s4").owlCarousel({
        autoPlay: false,
        items: 2,
        loop: false,
        center: false,
        scrollPerPage: false,
        navigation: true,
        pagination: false,
        autoHeight: false,
        slideSpeed: 500,
        goToFirstSpeed: 1300,
        rewindNav: false,
        responsive: true,
        responsiveRefreshRate: 200,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        itemsTabletSmall: !1,
        itemsMobile: [479, 1]
    });

    // BLOG
    TOPSEO.postGallery = function() {
        $(".blog-post-gallery").owlCarousel({
            autoPlay: false,
            items: 1,
            loop: false,
            center: true,
            navigation: true,
            singleItem: true,
            pagination: false,
            slideSpeed: 300,
            goToFirstSpeed: 1300,
            rewindNav: false,
            responsive: true,
            responsiveRefreshRate: 200,
        });
    };

    // couter up
    $(".counter-number, .ht_prog_label_number").counterUp({
        delay: 10,
        time: 1000
    });
    
    // search form effect
    $('.search-form-button').on('click', function() {
        $('.box-form-top').show();
        $('.menu-box-left, .menu-box-right').css('opacity', '0');
        $('.close-form-btn').on('click', function() {
            $('.box-form-top').hide();
            $('.menu-box-left, .menu-box-right').css('opacity', '1');
        })
    });

    // wow js
    new WOW({
        mobile: false
    }).init();

    // Scroll to top
    $(".scroll-to-top").on('click', function() {
        $('html, body').animate({
            scrollTop: $("html").offset().top
        }, 500);
    });

    // fadeout page when click
    TOPSEO.fade = function () {
        var b = $(".topseo-animation");
        b.length && (
            b.fadeOut(500),
            $(window).bind("pageshow", function($) {
                $.originalEvent.persisted && b.fadeOut(500)
            }),
            $("a").click(function(c) {
                var d = $(this);
                (!$(this).parent().hasClass('essb_item') ) && 
                (!$(this).hasClass('no-fade') ) &&
                (1 == c.which) &&
                (d.attr("href").indexOf(window.location.host) >= 0) &&
                (!$(this).hasClass('responsive_lightbox')) &&
                //("undefined" == typeof d.data("rel")) &&
                //("undefined" == typeof d.attr("rel")) &&
                ("undefined" == typeof d.attr("target") ||
                ("_self" === d.attr("target"))) &&
                (d.attr("href").split("#")[0]) !==
                (window.location.href.split("#")[0]) &&
                (c.preventDefault(),
                    b.fadeIn(500, function() {
                        window.location = d.attr("href")
                    })
                )
            })
        )
    }
    // post type video blog post
    TOPSEO.video = function(){
        var plyrEl = document.querySelectorAll( '.use-plyr-render' );
        if( ! plyrEl.length ) {
        	return;
        }

        plyrEl.forEach( function( ele ) {
        	plyr.setup( ele );
        } );
    }
    // page loader effect
    $(window).load(function() {
        $("#preloader").fadeOut("slow");
        $(".img-preloader").fadeOut();
        TOPSEO.isotope();
        TOPSEO.video();
    });
     // enable parallax page header
    $(window).on("mousemove",function(a){
        var n=$(window).width(),
            o=$(window).height(),
            t=.5-a.pageX/n,
            r=.5-a.pageY/o;
        if($('.breadcrumb-animate').length && (n > 991)){
            $(".prl").each(function(a,n){
                var o=parseInt($(n).data("offset")),
                e="translate3d("+Math.round(t*o)+"px,"+Math.round(r*o)+"px, 0px)";
                $(n).css({"-webkit-transform":e,transform:e,"moz-transform":e})
            })
        }
    });

    $('.add_to_wishlist').on('click', function(){
        $(this).parents('.product-action-button').addClass('topseo-box-show-wishlist');
        $(this).parents('.yith-wcwl-add-to-wishlist').addClass('topseo-show-wishlist');
    });

    $(document).ready(function() {
        TOPSEO.postGallery();
        TOPSEO.media();
        TOPSEO.fade();
    });

})(jQuery);
