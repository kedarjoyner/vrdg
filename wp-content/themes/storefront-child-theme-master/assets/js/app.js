$( document ).ready(function() {

/* slide down navigation on click of hamburger */
  $('#toggle').click(function() {
    $(this).toggleClass('active');
    if($(this).hasClass('active')) {
      $('.custom-menu-items').slideDown();
    } else {
      $('.custom-menu-items').slideUp("fast");
    }
  });

/* sub-menu drops down on click */
$('.custom-menu-items > li').click(function() {
  $(this).children('ul.sub-menu').slideToggle();
    // $('ul.sub-menu').not($(this).children("ul").toggleClass()).hide();
  });
});

console.log("test minification");
