// モーダル部分
$(function () {
  $('.edit-btn').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('toggle');
      var modal = document.getElementById(target);
      console.log(target);
      $(modal).fadeIn();
      return false;
    });
  });
  // $('.modalClose').on('click', function () {
  //   $('.js-modal').fadeOut();
  //   return false;
  // });
});
