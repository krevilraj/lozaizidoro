var $ = jQuery.noConflict();
// for nav
$('.hamburger').click(function () {
  $(this).toggleClass("click");
  $('.sidebar').toggleClass('show');
});

// this if for menu after slide 

$(function () {
  'use strict';
  var navBar = $('.top-sec'); //Targets nav element
  var myWindow = $(window);
  myWindow.on('scroll', function () {
    if ($(this).scrollTop() > 200) { //height from top to trigger slideDown
      navBar.addClass('scroll-nav');
    } else if ($(this).scrollTop() < 200) {
      navBar.removeClass('scroll-nav');
    }
  });
});


// home slider
$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  autoplay:true,
  autoplayTimeout: 2000,
  autoplayHoverPause: false,

  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  }


});


new WOW().init();

$(document).ready(function () {
  var value = $('.quantity>.qty').val();
  $('#qty-minus').click(function () {
    if (value == 0) return;
    value--;
    $('.quantity>.qty').val(value);
  });

  $('#qty-plus').click(function () {
    value++;
    $('.quantity>.qty').val(value);
  });


});


$('body').on('added_to_cart',function(){
  $('.cart-mini').addClass('active');
});


$('.cart-img').click(function(){
  if ($(".cart-mini").hasClass("active")) {
    $('.cart-mini').addClass('in-active');
    $('.cart-mini').removeClass('active');
  }
});


$(document).on({
  mouseenter: function(){
    $('.cart-mini').addClass('active');
  },
  mouseleave: function(){
    $('.cart-mini').removeClass('active');
  }
}, '.mini-wrapper');