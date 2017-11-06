$(function() {
  var $f1 = $('.form1');
  var $f2 = $('.form2');
  var $na = $('#name');
  var $em = $('#email');
  var $field1 = $('.field1 label');
  var $field2 = $('.field2 label');

  $('#next').on('click', function() {
    $f2.show();
    $f1.hide();
  });

  $('#return').on('click', function() {
    $f1.show();
    $f2.hide();
  });

  $('#submit').on('click', function() {
    if ($na, 'required' && $em, 'required') {
      $f1.show();
      $f2.hide();
    }
  });

  $na.on('keyup', function() {
    $field1.addClass('active');
  });

  $na.on('keyup', function() {
    if ($(this).val().length === 0) {
      $field1.removeClass('active');
    }
  });

  $em.on('keyup', function() {
    $field2.addClass('active');
  });

  $em.on('keyup', function() {
    if ($(this).val().length === 0) {
      $field2.removeClass('active');
    }
  });

  $('#question_area').on('keyup', function() {
    $('#question').addClass('active');
  });

  $('#question_area').on('keyup', function() {
    if ($(this).val().length === 0) {
      $('#question').removeClass('active');
    }
  });

  $('.checkbox').on('keydown keyup keypress change', function() {
    var len = $('input[name="interest[]"]:checked').length;
    if (len >= 1) {
      $('#submit').prop('disabled', false).
      addClass('on');
    } else {
      $('#submit').prop('disabled', true).
      removeClass('on');
    }
  });

  $na.add($em).on('keyup', function() {
    if ($('#name').val().length > 0 && $('#email').val().length > 0) {
      $('#next').prop('disabled', false).
      addClass('on');
    } else {
      $('#next').prop('disabled', true).
      removeClass('on');
    }
  });

  //ham_menu

  var $hamBtn = $('.ham_menu');
  var $top = $('.top');
  var $middle = $('.middle');
  var $bottom = $('.bottom');
  var $mobNav = $('.mobile_nav');
  var $layer = $('.layer1');

  $hamBtn.on('click', function() {
    $top.toggleClass('on');
    $bottom.toggleClass('on');
    $middle.fadeToggle(.25, 'linear');
    $mobNav.toggleClass('on');
    $layer.fadeToggle();
  });

});
