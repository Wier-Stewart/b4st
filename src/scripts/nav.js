
jQuery(document).ready(function($){

  $(window).scroll(function() {
      var scrollPos = $(window).scrollTop();
    var topMargin = parseInt($('.site-header .header-offset').css('paddingTop'));

    // Main Nav shrinking/full-height.
    // WARNING: affix *must not* be on the same element as *position: sticky*
    $('.site-header > .container-responsive').toggleClass('affix', (scrollPos > topMargin));

  });

});
