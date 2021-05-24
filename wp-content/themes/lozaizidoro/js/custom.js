var $ = jQuery.noConflict();
// for nav
$('.hamburger').click(function () {
  $(this).toggleClass("click");
  $('.sidebar').toggleClass('show');
  if ($(".sidebar").hasClass("show")) {
    $('#filtros').delay(2000).hide();
  }else{
    $('#filtros').delay(2000).show();
  }
});

// this if for menu after slide 

$(function () {
  'use strict';
  var navBar = $('.top-sec'); //Targets nav element
  var myWindow = $(window);
  myWindow.on('scroll', function () {
    if ($(this).scrollTop() > 200) { //height from top to trigger slideDown
      setTimeout(function() {
        navBar.addClass('scroll-nav');
      }, 1000);

    } else if ($(this).scrollTop() < 200) {
      navBar.removeClass('scroll-nav');
    }
  });
});


// sub menu js
$('.menu-item-has-children').click(function (){
  $('nav ul .sub-menu').toggleClass("show");
});


// home slider
$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  autoplay:true,
  autoplayTimeout: 5000,
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

  /****************filter*****************/
  $('.filtros').click(function(){
    $(this).parent().toggleClass('active');

  });

  $( "a.woocommerce-terms-and-conditions-link" ).unbind( "click" );
  $( "body" ).on('click', 'a.woocommerce-terms-and-conditions-link', function( event ) {

    $(this).attr("target", "_blank");
    window.open( $(this).attr("href"));

    return false;
  });

  $("#searchicon").click(function(e){

    var searchtext = $('input[name=s]').val();
    if(searchtext ===""){
      $('#search-wrapper').find('.js-dgwt-wcas-enable-mobile-form').click();
      $('#search-wrapper').slideToggle();
    }else{
      $('#search-wrapper').find('form').submit();
    }
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



function toggleChevron(e) {
  $(e.target)
    .prev('.panel-heading')
    .find("i.indicator")
    .toggleClass('fa-caret-up');


}
$('#accordion').on('hidden.bs.collapse', toggleChevron);
$('#accordion').on('shown.bs.collapse', toggleChevron);

$('#accordion1').on('hidden.bs.collapse', toggleChevron);
$('#accordion1').on('shown.bs.collapse', toggleChevron);

$('#accordion2').on('hidden.bs.collapse', toggleChevron);
$('#accordion2').on('shown.bs.collapse', toggleChevron);


