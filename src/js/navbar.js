$(document).ready(function() {

  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the
      //nav bar to stick.
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 80) {
      $('#header').addClass('navbar-inverse');
    }
    if ($(window).scrollTop() < 81) {
      $('#header').removeClass('navbar-inverse');
    }
  });
});
