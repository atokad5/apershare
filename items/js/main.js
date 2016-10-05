$(function(){
  $('#create-account').click(function(){
  $('#sign-in-box').hide();
  $('#sign-up-box').show();
  });
  $('#go-sign-in').click(function(){
  $('#sign-in-box').show();
  $('#sign-up-box').hide();
  });
    $('#edit-trigger').click(function(){
      $('.overlay').fadeIn();
    });
    $('.edits .fa-times').click(function(){
      $('.overlay,.bg-header-form ,#bio-image-change').fadeOut();
      $('.changer-nest').fadeIn();
    });
  // to select between the bio changer and header changer
  $('#change-bio-tab').click(function(){
    $('.changer-nest').hide();
    $('#bio-image-change').fadeIn();
  });
  $('#change-header-tab').click(function(){
    $('.changer-nest').hide();
    $('.bg-header-form').fadeIn();
  });
});
