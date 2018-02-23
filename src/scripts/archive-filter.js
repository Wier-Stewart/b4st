jQuery(document).ready(function($){
  var scrollFaculty = new SmoothScroll( '.archive-filter .dropdown-item', {
      speed: 800,
      offset: jQuery(".site-header").height()+160,
      before: function (htmlTarget) {
        console.log("setting: ",htmlTarget);
        if(htmlTarget.id) window.location.hash = htmlTarget.id;
      }, // Callback to run before scroll
      after: function (htmlTarget) {
        console.log("now arriving..",htmlTarget);
//        if(htmlTarget.id) window.location.hash = htmlTarget.id;
      } // Callback to run after scroll
  });


  /**
   * Staff: Filtering
   */

  //onload:
  if( $('section.department').length && $(location.hash).length  ){  //arrived via a link with a #department-*
//    console.log( "Found id:", $(location.hash) );
    $('section.department').addClass('hidden');  //hide all other sections, early as possible to avoid flicker
    setActiveDepartment( $(location.hash) );
  }

  //actions:
    $('.department-filter .dropdown-item').on('click', function(event){
      event.preventDefault();
      setActiveDepartment( $(this) );
  });

  function setActiveDepartment( sectionObj ){  //with '#' already..

        // Display the clicked department
        var slug = sectionObj.attr('data-deptslug');

    /**
     * Change Menu:
     */
        // Add an .active class to the clicked item
        $(".department-filter .dropdown-item").removeClass('active');
        $(".department-filter .dropdown-item[data-deptslug='"+slug+"']").addClass('active');

        // Update the Filter Label
        var name = $(".department-filter .dropdown-item[data-deptslug='"+slug+"']").text();
        $('.department-filter .dropdown-label').html('<p>' + name + '</p>');

    /**
     * Change Page Content:
     */
        if( $('section.department').hasClass('dept-' + slug) ){
            $('section.department').addClass('hidden');  //hide all other sections
            $('.dept-' + slug).removeClass('hidden'); //show this one
        }

    //set the hash for copy-paste URL saving
    setTimeout(function(){
      scrollFaculty.animateScroll( document.querySelector("#department-" + slug) );
//            window.location.hash = "department-" + slug;
    }, 260);  //delay for animations. required alongside smoothScroll

    }


});

function parseQueryString( queryString ) {
    var params = {}, queries, temp, i, l;
    // Split into key/value pairs
    queries = queryString.split("&");
    // Convert the array of strings into an object
    for ( i = 0, l = queries.length; i < l; i++ ) {
        temp = queries[i].split('=');
        params[temp[0]] = temp[1];
    }
    return params;
}
