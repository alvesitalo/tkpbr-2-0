if ( $('body').hasClass('home') ) {
  $('#sticky-posts').owlCarousel({
    autoHeight: true,
    autoplay: true,
    autoplaySpeed: 5000,
    animateOut: 'fadeOut',
    center: true,
    loop: true,
    responsive: {
      0: { items: 1 }
    }
  });
  
  $('#links-carousel').owlCarousel({
    autoplay: true,
    autoplaySpeed: 4000,
    animateOut: 'fadeOut',
    loop: true,
    responsive: {
      0: { items: 2 },
      768: { items: 4 },
      992: { items: 5 }
    }
  });
}

if ( $('body').hasClass('page') ) {
  $('.lazy').lazy({
    effect: "fadeIn",
    effectTime: 2000,
    threshold: 0
  });
}

if ( $('.widget').hasClass('jetpack_subscription_widget') ) {
  $('p#subscribe-email input').addClass('form-control');
}