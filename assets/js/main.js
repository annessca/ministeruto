(function ($) {
  "use strict";
  // TOP Menu Sticky
  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    if (scroll < 400) {
      $("#sticky-header").removeClass("sticky");
      $('#back-top').fadeIn(500);
    } else {
      $("#sticky-header").addClass("sticky");
      $('#back-top').fadeIn(500);
    }
  }); 

  jQuery(function(){
    var menu = jQuery('ul#navigation');
    if(menu.length){
	    menu.slicknav({
		    prependTo: ".mobile_menu",
		    closedSymbol: '+',
		    openedSymbol:'-'
	    });
    };
    // review-active
    jQuery('.slider_active').owlCarousel({
      navigation : true,
      loop:true,
      margin:0,
      items:1,
      autoplay:true,
      navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
      nav:true,
      dots:false,
      autoplayHoverPause: true,
      autoplaySpeed: 800,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      responsive:{
        0:{
          items:1,
          nav:false,
        },
        767:{
          items:1,
          nav:false,
        },
        992:{
          items:1
        }
      }
    });

    // Testimony
    jQuery('.carousel-testimony').owlCarousel({
      center: true,
      autoplay: true,
      loop: true,
      items:1,
      margin: 15,
      stagePadding: 0,
      nav: false,
      navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
      responsive:{
        0:{
          items: 1
        },
        600:{
          items: 1
        },
        1000:{
          items: 1
        }
      }
    });

    // for filter
    // init Isotope
    var $grid = jQuery('.grid').isotope({
      itemSelector: '.grid-item',
      percentPosition: true,

      masonry: {
        // use outer width of grid-sizer for columnWidth
        columnWidth: 1,
      },
    });
  
    // wow js
    new WOW().init();

    /* magnificPopup video view */
    $('.play-btn').magnificPopup({
      type: 'iframe'
    });
  });
  
  // scrollIt for smoth scroll
  jQuery.scrollIt({
    upKey: 38,             // key code to navigate to the next section
    downKey: 40,           // key code to navigate to the previous section
    easing: 'linear',      // the easing function for animation
    scrollTime: 600,       // how long (in ms) the animation takes
    activeClass: 'active', // class given to the active nav element
    onPageChange: null,    // function(pageIndex) that is called when page is changed
    topOffset: 0           // offste (in px) for fixed top navigation
  });

  // scrollup bottom to top
  $.scrollUp({
    scrollName: 'scrollUp', // Element ID
    topDistance: '4500', // Distance from top before showing element (px)
    topSpeed: 300, // Speed back to top (ms)
    animation: 'fade', // Fade, slide, none
    animationInSpeed: 200, // Animation in speed (ms)
    animationOutSpeed: 200, // Animation out speed (ms)
    scrollText: '<i class="fa fa-angle-double-up"></i>', // Text for element
    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
  });

})(jQuery);	