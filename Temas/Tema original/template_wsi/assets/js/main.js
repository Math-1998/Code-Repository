jQuery(document).ready(function($){
    "use strict";

    /* Scroll to top 
    $('.scrollToTop').on('click',function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });*/

    /* Nav smooth scroll */
    $('#site-navigation .menu, .widget_nav_menu .menu, .rt-wid-menu .menu').onePageNav({
        extraOffset: SEOEngineObj.extraOffset,
    });

    /* Search Box */
    $(".search-box-area").on('click', '.search-button, .search-close', function(event){
        event.preventDefault();
        if($('.search-text').hasClass('active')){
            $('.search-text, .search-close').removeClass('active');
        }
        else{
            $('.search-text, .search-close').addClass('active');
        }
        return false;
    });

    /* Sticky Menu */
    if ( SEOEngineObj.stickyMenu == 1 || SEOEngineObj.stickyMenu == 'on' ) {
        $(window).scroll(function() {
            var s = $("body");
            var windowpos = $(window).scrollTop();
            if(windowpos > 0){
                s.removeClass("non-stick");
                s.addClass("stick");
            } 
            else {
                s.removeClass("stick");
                s.addClass("non-stick");
            }
        });
    }

    /* MeanMenu - Mobile Menu */
    $('#site-navigation nav').meanmenu({
        meanMenuContainer: '#meanmenu',
        meanScreenWidth: SEOEngineObj.meanWidth,
        removeElements: "#masthead",
        appendHtml: SEOEngineObj.appendHtml,
        siteLogo: SEOEngineObj.siteLogo
    }); 

    /* Header Right Menu */
    $('.additional-menu-area').on('click', '.side-menu-trigger', function (e) {
        e.preventDefault();
        $('.sidenav').width(280);

    });
    $('.additional-menu-area').on('click', '.closebtn', function (e) {
        e.preventDefault();
        $('.sidenav').width(0);
    });

    /* Mega Menu */
    $('.site-header .main-navigation ul > li.mega-menu').each(function() {
        // total num of columns
        var items = $(this).find(' > ul.sub-menu > li').length;
        // screen width
        var bodyWidth = $('body').outerWidth();
        // main menu link width
        var parentLinkWidth = $(this).find(' > a').outerWidth();
        // main menu position from left
        var parentLinkpos = $(this).find(' > a').offset().left;

        var width = items * 220;
        var left  = (width/2) - (parentLinkWidth/2);

        var linkleftWidth  = parentLinkpos + (parentLinkWidth/2);
        var linkRightWidth = bodyWidth - ( parentLinkpos + parentLinkWidth );

        // exceeds left screen
        if( (width/2)>linkleftWidth ){
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                right: 'inherit',
                left:  '-' + parentLinkpos + 'px'
            });        
        }
        // exceeds right screen
        else if ( (width/2)>linkRightWidth ) {
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                left: 'inherit',
                right:  '-' + linkRightWidth + 'px'
            }); 
        }
        else{
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                left:  '-' + left + 'px'
            });            
        }
    });

    /* Owl Custom Nav */
    if ( typeof $.fn.owlCarousel == 'function') { 

        $(".owl-custom-nav .owl-next").on('click',function(){
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('next.owl.carousel');
        });
        $(".owl-custom-nav .owl-prev").on('click',function(){
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('prev.owl.carousel');
        });

        $(".rt-owl-carousel").each(function() {
            var options = $(this).data('carousel-options');
            $(this).owlCarousel(options);
        });
    }

    /* Woocommerce Shop change view */
    $('#shop-view-mode li a').on('click',function(){
        $('body').removeClass('product-grid-view').removeClass('product-list-view');

        if ( $(this).closest('li').hasClass('list-view-nav')) {
            $('body').addClass('product-list-view');
            Cookies.set('shopview', 'list');
        }
        else{
            $('body').addClass('product-grid-view');
            Cookies.remove('shopview');
        }
        return false;
    });

    /* Visual Composer */
    // Pricing Box 2
    $(".rt-pricing-box-2").on({
        mouseenter: function(){
            var bghover = $(this).data('bghover');
            $(this).css('background-color', bghover);
            $(this).find(".rt-btn a").css('color', bghover);
        },
        mouseleave: function(){
            var bgcolor = $(this).data('bgcolor');
            $(this).css('background-color', bgcolor);
            $(this).find(".rt-btn a").css('color', '');          
        }
    }, this);

    // CTA - Verticle align middle
    $(".rt-cta-1").each(function() {
        var mt,
        $parent = $(this).find('.row'),
        $child1 = $(this).find('.rt-cta-contents'),
        $child2 = $(this).find('.rt-cta-button'),
        pHeight = $parent.height(),
        c1Height = $child1.height(),
        c2Height = $child2.height();
        if ( pHeight > c1Height ) {
            mt = (pHeight-c1Height)/2;
            $child1.css('margin-top', mt+'px');
        }
        if ( pHeight > c2Height ) {
            mt = (pHeight-c2Height)/2;
            $child2.css('margin-top', mt+'px');
        }
    });

    // Info Text hover 
    $(".rt-info-text.layout1, .rt-info-text.layout3").on({
        mouseenter: function(){
            var hoverColor = $(this).data('hover');
            $(this).find("i").css('background-color', hoverColor);
            $(this).find(".media-heading, .media-heading a").css('color', hoverColor);
        },
        mouseleave: function(){
            var color = $(this).data('color');
            $(this).find("i").css('background-color', color);
            $(this).find(".media-heading, .media-heading a").css('color', "");            
        }
    }, this);

    $(".rt-info-text.layout2").on({
        mouseenter: function(){
            var hoverColor = $(this).data('hover');
            $(this).find("i").css('color', hoverColor);
            $(this).find(".media-heading, .media-heading a").css('color', hoverColor);
        },
        mouseleave: function(){
            var color = $(this).data('color');
            $(this).find("i").css('color', color);
            $(this).find(".media-heading, .media-heading a").css('color', "");            
        }
    }, this);

    // Counter
    if ( typeof $.fn.counterUp == 'function') { 
        $('.rt-counter-2 .rt-counter-num').counterUp({
            delay: $(this).data('rtSteps'),
            time: $(this).data('rtSpeed')
        });
    }

    // Testimonial
    $(".rt-owl-testimonial-2").each(function() {
        var color = $(this).data('color');
        $(this).find(".owl-nav > div").css({
            'color': color,
            'border-color': color,
        });
    });
    $(".rt-owl-testimonial-2 .owl-nav > div").on({
        mouseenter: function(){
            var color = $(this).closest('.rt-owl-testimonial-2').data('color');
            $(this).css({
                'color': '',
            });
            this.style.setProperty( 'background-color', color, 'important' );
        },
        mouseleave: function(){
            var color = $(this).closest('.rt-owl-testimonial-2').data('color');
            $(this).css({
                'color': color,
                'background-color': ''
            });          
        }
    }, this);

    // Button
    $(".rt-vc-button-1").on({
        mouseenter: function(){
            var txtHover = $(this).data('txthover');
            var bgHover  = $(this).data('bghover');
            $(this).css({
                'color': txtHover,
                'background-color': bgHover
            });
        },
        mouseleave: function(){
            var txtColor = $(this).data('txtcolor');
            var bgColor  = $(this).data('bgcolor');
            if ( bgColor == '' ) {
                bgColor = 'transparent';
            }
            $(this).css({
                'color': txtColor,
                'background-color': bgColor
            });
        }
    }, this);

});

(function($){
    "use strict";

    // Window Load+Resize
    $(window).on('load resize', function () {
        // Define the maximum height for mobile menu
        var wHeight = $(window).height();
        wHeight = wHeight - 50;
        $('.mean-nav > ul').css('max-height', wHeight + 'px');
    });

    // Window Load
    /*$(window).on('load', function () {
        // Preloader
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
        
        // Onepage Nav on meanmenu
        $('#meanmenu .menu').onePageNav({
            extraOffset: SEOEngineObj.extraOffsetMobile,
            end: function() {
                $('.meanclose').trigger('click');
            } 
        });
    });*/

})(jQuery);