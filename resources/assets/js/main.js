(function ($) {
	"use strict";


/*===========================================
	=            Windows Load          =
=============================================*/
$(window).on('load', function () {
    preloader();
    sal();
});


/*===========================================
	=            Preloader          =
=============================================*/
function preloader() {
	$('#preloader').delay(0).fadeOut();
};



/*===========================================
	=    		Mobile Menu			      =
=============================================*/
//SubMenu Dropdown Toggle
if ($('.tgmenu__wrap li.menu-item-has-children ul').length) {
	$('.tgmenu__wrap .navigation li.menu-item-has-children').append('<div class="dropdown-btn"><span class="plus-line"></span></div>');
}

//Mobile Nav Hide Show
if ($('.tgmobile__menu').length) {

	var mobileMenuContent = $('.tgmenu__wrap .tgmenu__main-menu').html();
	$('.tgmobile__menu .tgmobile__menu-box .tgmobile__menu-outer').append(mobileMenuContent);

	//Dropdown Button
	$('.tgmobile__menu li.menu-item-has-children .dropdown-btn').on('click', function () {
		$(this).toggleClass('open');
		$(this).prev('ul').slideToggle(300);
	});
	//Menu Toggle Btn
	$('.mobile-nav-toggler').on('click', function () {
		$('body').addClass('mobile-menu-visible');
	});

	//Menu Toggle Btn
	$('.tgmobile__menu-backdrop, .tgmobile__menu .close-btn, .tgmobile__menu .section-link').on('click', function () {
		$('body').removeClass('mobile-menu-visible');
	});
};


/*===========================================
	=     Menu sticky & Scroll to top      =
=============================================*/
$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 245) {
		$("#sticky-header").removeClass("sticky-menu");
		$('.scroll-to-target').removeClass('open');
        $("#header-fixed-height").removeClass("active-height");

	} else {
		$("#sticky-header").addClass("sticky-menu");
		$('.scroll-to-target').addClass('open');
        $("#header-fixed-height").addClass("active-height");
	}
});


/*===========================================
	=           Scroll Up  	         =
=============================================*/
if ($('.scroll-to-target').length) {
  $(".scroll-to-target").on('click', function () {
    var target = $(this).attr('data-target');
    // animate
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 0);

  });
}


/*===========================================
	=          Data Background    =
=============================================*/
$("[data-background]").each(function () {
	$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
});

$("[data-bg-color]").each(function () {
	$(this).css("background-color", $(this).attr("data-bg-color"));
});


/*=============================================
	=            Header Search            =
=============================================*/
$(".search-open-btn").on("click", function () {
    $(".search__popup").addClass("search-opened");
    $(".search-popup-overlay").addClass("search-popup-overlay-open");
});
$(".search-close-btn").on("click", function () {
    $(".search__popup").removeClass("search-opened");
    $(".search-popup-overlay").removeClass("search-popup-overlay-open");
});

/*=============================================
	=          OffCanvas Active            =
=============================================*/
$('.navSidebar-button').on('click', function () {
	$('body').addClass('offcanvas-menu-visible');
	return false;
});

$('.offCanvas-overlay, .offCanvas-toggle').on('click', function () {
	$('body').removeClass('offcanvas-menu-visible');
});


/*=============================================
	=          Header Cart Active            =
=============================================*/
$('.headerCart__button').on('click', function () {
	$('body').addClass('headerCart__menu-visible');
	return false;
});

$('.headerCart__overlay, .mini__cart-toggle').on('click', function () {
	$('body').removeClass('headerCart__menu-visible');
});



/*===========================================
      =       Coupon Active    =
=============================================*/
$('#coupon-element').on('click', function () {
    $('.coupon__code-form').slideToggle(500);
    return false
});


/*=============================================
	=          One page Menu               =
=============================================*/
var scrollLink = $('.section-link');
// Active link switching
$(window).on('scroll', function () {
	var scrollbarLocation = $(this).scrollTop();

	scrollLink.each(function () {

		var sectionOffset = $(this.hash).offset().top - 120;

		if (sectionOffset <= scrollbarLocation) {
			$(this).parent().addClass('active');
			$(this).parent().siblings().removeClass('active');
		}
	});
});
//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
	$('a.section-link[href*="#"]:not([href="#"])').on('click', function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: (target.offset().top - 50)
				}, 100, "easeInOutExpo");
				return false;
			}
		}
	});
});



/*=============================================
    =          Swiper active              =
=============================================*/
$('.tg__slider-active, .brand__active, .instagram__active, .features__active, .testimonial__active-two, .instagram__active-two, .testimonial__active-three, .rp__active ').each(function () {
    var thSlider = $(this);
    var settings = $(this).data('swiper-options') || {};

    // Store references to the navigation buttons
    var prevArrow = thSlider.find('.slider-prev');
    var nextArrow = thSlider.find('.slider-next');
    var paginationEl1 = thSlider.find('.slider-pagination').get(0);
    var paginationEl2 = thSlider.find('.slider-pagination2');
    var progressBarEl = thSlider.find('.slider-pagination-progressbar2 .slider-progressbar-fill');

    var sliderDefault = {
        slidesPerView: 1,
        spaceBetween: settings.spaceBetween || 24,
        loop: settings.loop !== false,
        speed: settings.speed || 1000,
        autoplay: settings.autoplay || { delay: 6000, disableOnInteraction: false },
        navigation: {
            prevEl: prevArrow.get(0),
            nextEl: nextArrow.get(0),
        },
        pagination: {
            el: paginationEl1,
            type: settings.paginationType || 'bullets',
            clickable: true,
            renderBullet: function (index, className) {
                var number = index + 1;
                var formattedNumber = number < 10 ? '0' + number : number;
                return '<span class="' + className + '" aria-label="Go to Slide ' + formattedNumber + '"></span>';
            },
        },
        on: {
            init: function () {
                updatePagination(this);
                updateProgressBar(this);
            },
            slideChange: function () {
                updatePagination(this);
                updateProgressBar(this);
            },
        },
    };

    var options = $.extend({}, sliderDefault, settings);
    var swiperInstance = new Swiper(thSlider.get(0), options);

    // Update Pagination and other UI elements
    function updatePagination(swiper) {
        var activeIndex = swiper.realIndex + 1;
        var totalSlides = swiper.slides.length;
        paginationEl2.html(
            '<span class="current-slide">' +
            (activeIndex < 10 ? '0' + activeIndex : activeIndex) +
            '</span> <span class="divider">/</span> <span class="total-slides">' +
            (totalSlides < 10 ? '0' + totalSlides : totalSlides) +
            '</span>'
        );
    }

    function updateProgressBar(swiper) {
        var progress = ((swiper.realIndex + 1) / swiper.slides.length) * 100;
        progressBarEl.css('height', progress + '%');
    }

    if ($('.slider-area').length > 0) {
        $('.slider-area').closest(".container").parent().addClass("arrow-wrap");
    }

});

// Function to add animation classes
function animationProperties() {
    $('[data-ani]').each(function () {
        var animationName = $(this).data('ani');
        $(this).addClass(animationName);
    });

    $('[data-ani-delay]').each(function () {
        var delayTime = $(this).data('ani-delay');
        $(this).css('animation-delay', delayTime);
    });
}
animationProperties();

// Add click event handlers for external slider arrows based on data attributes
$('[data-slider-prev], [data-slider-next]').on('click', function () {
    var sliderSelector = $(this).data('slider-prev') || $(this).data('slider-next');
    var targetSlider = $(sliderSelector);

    if (targetSlider.length) {
        var swiper = targetSlider[0].swiper;

        if (swiper) {
            if ($(this).data('slider-prev')) {
                swiper.slidePrev();
            } else {navigator,
                swiper.slideNext();
            }
        }
    }
});




/*=============================================
	=          testimonial active              =
=============================================*/
$('.testimonial__active').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: false,
    asNavFor: '.testimonial__avatar-active'
});
$('.testimonial__avatar-active').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.testimonial__active',
    dots: false,
    centerMode: true,
    centerPadding: '0px',
    prevArrow: '<button type="button" class="slick-prev"><img src="assets/img/icons/left_arrow01.svg" alt="icon"></button>',
    nextArrow: '<button type="button" class="slick-next"><img src="assets/img/icons/right_arrow01.svg" alt="icon"></button>',
    focusOnSelect: true,
    responsive: [
        {
            breakpoint: 500,
            settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            },
        },
    ],
});

/*=============================================
	=         Cart Active           =
=============================================*/
$(".quickview-cart-plus-minus").append('<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>');
$(".qtybutton").on("click", function () {
	var $button = $(this);
	var oldValue = $button.parent().find("input").val();
	if ($button.text() == "+") {
		var newVal = parseFloat(oldValue) + 1;
	} else {
		// Don't allow decrementing below zero
		if (oldValue > 0) {
			var newVal = parseFloat(oldValue) - 1;
		} else {
			newVal = 0;
		}
	}
	$button.parent().find("input").val(newVal);
});

/*===========================================
	=         Marquee Active         =
=============================================*/
if ($(".marquee_mode").length) {
    $('.marquee_mode').marquee({
        speed: 20,
        gap: 25,
        delayBeforeStart: 0,
        direction: 'left',
        duplicated: true,
        pauseOnHover: true,
        startVisible:true,
    });
}




/*=============================================
	=        Counter Up 	       =
=============================================*/
$(".counter-number").counterUp({
    delay: 20,
    time: 3000,
});



/*===========================================
	=        Magnific Popup    =
=============================================*/
$('.popup-image').magnificPopup({
	type: 'image',
	gallery: {
		enabled: true
	}
});

/* magnificPopup video view */
$('.popup-video').magnificPopup({
	type: 'iframe'
});



})(jQuery);