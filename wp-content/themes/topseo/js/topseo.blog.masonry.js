(function ( $ ) {
    "use strict";
    var $ahihi = {
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
    };
    // global masonry variables
    var $masonry_container = $('.blog-masonry-grid');
    // masonry Init
    function masonryInit() {
        if ( $masonry_container.length ) {
            masonryRun();
            //tell infinite scroll to wait once content is loaded
            $masonry_container.imagesLoaded(function(){
                masonryInfiniteScrollingInit();
            });
        }
    }
    // masonry Update
    function masonryUpdateLayout() {
        if ( $masonry_container.length ) {
            $masonry_container.masonry();
        }
    }
    // Layout Refresh
    function layoutRefresh() {
        masonryUpdateLayout();
        if($(".blog-post-gallery").length){
            $(".blog-post-gallery").data('owlCarousel').destroy();
            $(".blog-post-gallery").owlCarousel($ahihi);
        }else{
            $(".blog-post-gallery").owlCarousel($ahihi);
        }
    }
    // masonry Run
    function masonryRun() {
        if ( $masonry_container.length ) {
            // masonry init
            $masonry_container.masonry({
                itemSelector: '.blog-masonry-item',
            });
        }
    }
    // masonry Infinite Scrolling Initialization
    function masonryInfiniteScrollingInit() {
        $masonry_container.infinitescroll({
            navSelector : '.page-numbers',
            nextSelector : '.page-numbers a.next',
            itemSelector : '.blog-masonry-item',
            debug: false,
            prefill: false,
            loading: {
                msgText: '<span class="blog-masonry-mstext">Loading post...</span>',
                finishedMsg: '<span class="blog-masonry-fsms">No more post</span>',
                img: ''
            },
            errorCallback: function(){}
        },
        // trigger masonry as a callback
        function( newElements ) {
            newElements.forEach(function(e){
                $(e).css('opacity', 0);
            });
            var $newElems = $( newElements );
            // load images before masonry
            $newElems.imagesLoaded(function(){
                $masonry_container.masonry('appended', $newElems);
                //refresh all there is to refresh
                layoutRefresh();
            });
            // re-run owl carousel
            $(".blog-post-gallery").owlCarousel($ahihi);
            // plyr setup
            plyr.setup();
        });
    }
    function loadInit() {
        masonryInit();
    }
    $(document).ready(function(){
        loadInit();
    });
    // Fire once loaded
    $(window).load(function(){
        masonryUpdateLayout();
    });
})(jQuery)