$(document).on('click', '.close-button', () => {
  $('.form-overlay').removeClass('active');
});

$(document).on('click', '.newsletter-button', e => {
  e.preventDefault();
  $('.form-overlay').addClass('active');
});
