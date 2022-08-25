// Requires jQuery



$(document).on('click', '.js-menu-toggle.closed', function (e) {

  e.preventDefault();

  $('.list-load, .menu-item').stop();

  $(this).removeClass('closed').addClass('opened');
  $('.side-menu').addClass('opened');
  $('.burger-box').css({
    'position': 'fixed'
  });

  $('.side-menu').css({
    'right': '0px'
});

  var count = $('.menu-item').length;
  $('.list-load').slideDown((count * .6) * 100);
  $('.menu-item').each(function (i) {
    var thisLI = $(this);
    timeOut = 100 * i;
    setTimeout(function () {
      thisLI.css({
        'opacity': '1',
        'margin-right': '0'
      });
    }, 100 * i);
  });
});


$(document).on('click', '.js-menu-toggle.opened', function (e) {
  e.preventDefault();
  $('.list-load, .menu-item').stop();
  $(this).removeClass('opened').addClass('closed');
  $('.side-menu').removeClass('opened');

  $('.burger-box').css({
    'position': 'absolute'
  });

  var mql = window.matchMedia('all and (max-width: 576px)');
  if (mql.matches) {
    $('.side-menu').css({
      'right': '-80vw'
    });
  } else {
    $('.side-menu').css({
      'right': '-315px'
    });
  }

  var count = $('.menu-item').length;
  $('.menu-item').css({
    'opacity': '0',
    'margin-right': '-20px'
  });
  $('.list-load').slideUp(300);
});