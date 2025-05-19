(function ($) {
 wp.customize('setting', function (value) {
  value.bind(function (newval) {
   $('.').text(newval);
   $('.').html(newval);
   $('.').css('color', newval);
  });
 });
 // wp.customize('setting', function (value) {
 //  value.bind(function (newval) {
 //   $('.').text(newval);
 //   $('.').html(newval);
 //   $('.').css('color', newval);
 //  });
 // });
})(jQuery);

