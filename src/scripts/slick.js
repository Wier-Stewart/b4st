jQuery(document).ready(function(){

//Turn Section into Slideshow of components
  jQuery('.slick-slider>.section-column>.row').slick({
      dots: false,
      arrows: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
    slide: '.component',
    centerMode: true,
    centerPadding: '20%',
    mobileFirst: false,
    responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: '2%',
            centerMode: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: '0%',
            centerMode: true,
          }
        },
        /*
        {
          breakpoint: 480,
          settings: "unslick" //turn off
        }
        */
      ],
    prevArrow: '<svg class="arrow slick-arrow arrow-prev" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><g id="arrow"><g id="SLIDER"><g id="np_square-arrow-right_744354_FFFFFF-Copy" data-name="np square-arrow-right 744354 FFFFFF-Copy"><polygon id="Shape" class="cls-1" points="14.47 30.82 24.94 20.82 14.47 10.89 16.07 9.36 28.09 20.83 16.07 32.34 14.47 30.82"/><path id="Shape-2" data-name="Shape" class="cls-1" d="M0,40V0H40V40ZM2.13,2.13V37.82H37.82V2.13Z"/></g></g></g></svg>',
    nextArrow: '<svg class="arrow slick-arrow arrow-next" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><g id="arrow"><g id="SLIDER"><g id="np_square-arrow-right_744354_FFFFFF-Copy" data-name="np square-arrow-right 744354 FFFFFF-Copy"><polygon id="Shape" class="cls-1" points="14.47 30.82 24.94 20.82 14.47 10.89 16.07 9.36 28.09 20.83 16.07 32.34 14.47 30.82"/><path id="Shape-2" data-name="Shape" class="cls-1" d="M0,40V0H40V40ZM2.13,2.13V37.82H37.82V2.13Z"/></g></g></g></svg>'
  });
  jQuery('.slick-slider>.section-column>.row .component').addClass('matchIt');

//Turn Component: Custom Template post-list into slideshow:
  jQuery('.section .component.slick-slider>.inner-wrapper>.row').slick({
      dots: false,
      arrows: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
    slide: '.slide',
    centerMode: true,
    centerPadding: '20%',
    mobileFirst: false,
    responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: '2%',
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: '0%',
            centerMode: false,
          }
        },
        /*
        {
          breakpoint: 480,
          settings: "unslick" //turn off
        }
        */
      ],
    prevArrow: '<svg class="arrow slick-arrow arrow-prev" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><g id="arrow"><g id="SLIDER"><g id="np_square-arrow-right_744354_FFFFFF-Copy" data-name="np square-arrow-right 744354 FFFFFF-Copy"><polygon id="Shape" class="cls-1" points="14.47 30.82 24.94 20.82 14.47 10.89 16.07 9.36 28.09 20.83 16.07 32.34 14.47 30.82"/><path id="Shape-2" data-name="Shape" class="cls-1" d="M0,40V0H40V40ZM2.13,2.13V37.82H37.82V2.13Z"/></g></g></g></svg>',
    nextArrow: '<svg class="arrow slick-arrow arrow-next" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><g id="arrow"><g id="SLIDER"><g id="np_square-arrow-right_744354_FFFFFF-Copy" data-name="np square-arrow-right 744354 FFFFFF-Copy"><polygon id="Shape" class="cls-1" points="14.47 30.82 24.94 20.82 14.47 10.89 16.07 9.36 28.09 20.83 16.07 32.34 14.47 30.82"/><path id="Shape-2" data-name="Shape" class="cls-1" d="M0,40V0H40V40ZM2.13,2.13V37.82H37.82V2.13Z"/></g></g></g></svg>'
  });
  jQuery('.slick-slider.component .slide').addClass('matchIt');

  jQuery('.slick-home-slider').slick({
      dots: false,
      arrows: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
    prevArrow: '<svg class="arrow slick-arrow arrow-prev" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><g id="arrow"><g id="SLIDER"><g id="np_square-arrow-right_744354_FFFFFF-Copy" data-name="np square-arrow-right 744354 FFFFFF-Copy"><polygon id="Shape" class="cls-1" points="14.47 30.82 24.94 20.82 14.47 10.89 16.07 9.36 28.09 20.83 16.07 32.34 14.47 30.82"/><path id="Shape-2" data-name="Shape" class="cls-1" d="M0,40V0H40V40ZM2.13,2.13V37.82H37.82V2.13Z"/></g></g></g></svg>',
    nextArrow: '<svg class="arrow slick-arrow arrow-next" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><g id="arrow"><g id="SLIDER"><g id="np_square-arrow-right_744354_FFFFFF-Copy" data-name="np square-arrow-right 744354 FFFFFF-Copy"><polygon id="Shape" class="cls-1" points="14.47 30.82 24.94 20.82 14.47 10.89 16.07 9.36 28.09 20.83 16.07 32.34 14.47 30.82"/><path id="Shape-2" data-name="Shape" class="cls-1" d="M0,40V0H40V40ZM2.13,2.13V37.82H37.82V2.13Z"/></g></g></g></svg>'
  });


  jQuery('.slick-home-features-slider').slick({
      dots: false,
      arrows: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
    prevArrow: '<svg class="arrow slick-arrow arrow-prev" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><g id="arrow"><g id="SLIDER"><g id="np_square-arrow-right_744354_FFFFFF-Copy" data-name="np square-arrow-right 744354 FFFFFF-Copy"><polygon id="Shape" class="cls-1" points="14.47 30.82 24.94 20.82 14.47 10.89 16.07 9.36 28.09 20.83 16.07 32.34 14.47 30.82"/><path id="Shape-2" data-name="Shape" class="cls-1" d="M0,40V0H40V40ZM2.13,2.13V37.82H37.82V2.13Z"/></g></g></g></svg>',
    nextArrow: '<svg class="arrow slick-arrow arrow-next" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><g id="arrow"><g id="SLIDER"><g id="np_square-arrow-right_744354_FFFFFF-Copy" data-name="np square-arrow-right 744354 FFFFFF-Copy"><polygon id="Shape" class="cls-1" points="14.47 30.82 24.94 20.82 14.47 10.89 16.07 9.36 28.09 20.83 16.07 32.34 14.47 30.82"/><path id="Shape-2" data-name="Shape" class="cls-1" d="M0,40V0H40V40ZM2.13,2.13V37.82H37.82V2.13Z"/></g></g></g></svg>'
  });

  jQuery('.slick-home-staff-slider').slick({
      dots: true,
      arrows: false,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
    centerMode: true,
    centerPadding: '20%',
    mobileFirst: false,
    responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: '2%',
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: '2%',
            centerMode: false,
          }
        },
        /*
        {
          breakpoint: 480,
          settings: "unslick" //turn off
        }
        */
      ]
  });
});
