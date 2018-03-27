$(document).on('click', '.nav-item', function() {
  var id = `#${$('div', this).attr('data-menu')}`;
  $('.nav-link').removeClass('active');
  $('.nav-link', this).addClass('active');
  $('.player-menu').removeClass('active');
  $(id).addClass('active');
  if ($(this).is(':first-child')) {
    $('.player-menu').css('border-radius', '0px 7px 7px 7px');
  } else {
    $('.player-menu').css('border-radius', '7px 7px 7px 7px');
  }
});
