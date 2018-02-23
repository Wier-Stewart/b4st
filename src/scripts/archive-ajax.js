/**
 * Archive List:
 *
 * Scenarios:
 * - /campus-news/, no parameters: 12 PHP-loaded posts.
 * - /campus-news/#category=athletics: onload & on-click:
 *    - Posts Immediately Visible (from php): set offset = # visible.
 *    - No Posts Visible: immediately run AJAX.
 * - /campus-news/#category=athletics&offset=24
 *    - Load over ajax to 'catch up'
 *
 * Notes: 2 ways to check for visible articles:
      offset = $(container).children("article.category-"+slug).length;  // data-based: preferred.
      offset = $(container).children("article:not(.hidden)").length;  // presentation-based: dependent on show/hide timings.
 *
 *
 */

jQuery( function( $ ) {

// is_archive:
if( $('body.archive').length || $('body.blog').length || $("#content-archive").length ){

  var scroll = new SmoothScroll( 'a[href*="#"]', {
      speed: 800,
      offset: jQuery(".site-header").height()+60,
      before: function (htmlTarget) {
      }, // Callback to run before scroll
      after: function () {} // Callback to run after scroll
  });

  var container = "#content-archive";
  var offset = -1;
  var perPageUsually = perPage = 12;
  var slug="";
  var qs="";
  var categoryID=-1;
  // for embeds
  if( $(container).attr('data-term_id') )  categoryID = $(container).attr('data-term_id');

  // onload: hash
  if( location.hash.indexOf("category=") > -1 ){  //arrived via a link with a #department-*
    qs=parseQueryString(location.hash.replace("#",""));
    slug = qs.category;
    offset = parseInt(qs.offset);

    //translate from slug to id..
    if( $(".archive-filter .dropdown-item[data-slug='"+slug+"']").length ) categoryID = $(".archive-filter .dropdown-item[data-slug='"+slug+"']")[0].dataset.id;

    if( offset > -1 && categoryID > -1){
      offset = $(container).children("article.category-"+slug).length;
      $("#content-archive").append("<div id='offset-"+offset+"' class='clearfix page-index loading'></div>");
      gimmeSmore(categoryID, 'catagory' ,'post', offset, perPage);  //gimmeSmore(query_var_termID, query_var_taxonomy, query_var_post_type
    }

    //News Archive: Filtering
    if( $('.archive-filter').length ) setActiveCategory( $(".archive-filter .dropdown-item[data-slug='"+slug+"']") ); //defined in archive-filter.js
  }

  //actions:
    $('.news-filter .dropdown-item').on('click', function(event){
      event.preventDefault();
      setActiveCategory( $(this) );
  });

  //News Archive: Filtering
      function setActiveCategory( sectionObj ){  //with '#' already..
        $("#content-archive .page-index").remove(); //things get crazy when categories are changed after more-posts has been clicked.
        $("#get-another-post-button").show();

        var container = $('#content-archive');
            // Display the clicked department
            slug = sectionObj.attr('data-slug');

        /**
         * Change Menu:
         */
            // Add an .active class to the clicked item
            $(".archive-filter .dropdown-item").removeClass('active');
            $(".archive-filter .dropdown-item[data-slug='"+slug+"']").addClass('active');

            // Update the Filter Label
            var name = $(".archive-filter .dropdown-item[data-slug='"+slug+"']").text();
            $('.archive-filter .dropdown-label').html('<p>' + name + '</p>');

        /**
         * Change Page Content:
         */
                $('#content-archive article').addClass('hidden');  //hide all other sections
                $('#content-archive article.category-' + slug).removeClass('hidden'); //show these

        //set the hash for copy-paste URL saving
          if(slug) window.location.hash = "category=" + slug;

          $("#get-another-post-button").text("More "+name+" News");

          //TODO: i feel like I need a callback here..

          // Do what it takes to get more
          if($(".news-filter .dropdown-menu .active").length ){
            categoryID=$(".news-filter .dropdown-menu .active")[0].dataset.id;
            categoryName=$(".news-filter .dropdown-menu .active")[0].dataset.name;
            slug=$(".news-filter .dropdown-menu .active")[0].dataset.slug;
          }
          offset = $(container).children("article.category-"+slug).length;
          if( offset < 4 ){
//            console.log("Category changed "+slug+", have 0 articles.. getting more");
            $("#content-archive").append("<div id='offset-"+offset+"' class=' page-index loading'></div>");
            gimmeSmore(categoryID,  'catagory' ,'post', offset, perPage );
          }else{
//            console.log("Category changed "+slug+", have at least 3 articles.", $(container).children("article.category-"+slug) );
          }

        }// fx setActiveCategory


    //on-click:
    $("#get-another-post-button").on('click', function(evt){
      evt.preventDefault();

      //disable mutli-clicking
      $("#get-another-post-button").attr('disabled',true);

      if( $(".news-filter .dropdown-menu .active").length ){
         categoryID=$(".news-filter .dropdown-menu .active")[0].dataset.id;
         slug = $(".news-filter .dropdown-menu .active")[0].dataset.slug;
      }

      offset = $(container).children("article:not(.hidden)").length;
      $("#content-archive").append("<div id='offset-"+offset+"' class='clearfix page-index loading'></div>");
      gimmeSmore(categoryID,  'catagory' ,'post', offset, perPage );

      //only want to scroll for on-clicks, not first-loads..
      scroll.animateScroll( $('#offset-'+offset) );

    });

} //if is_archive



function gimmeSmore(query_var_termID, query_var_taxonomy, query_var_post_type, offset, perPage){
  var addedPosts=0; //per ajax
  var query=""
  query += "orderby=date";
  query += "&offset=" +offset;    //TODO: offset = 100 + offset?
  query += "&per_page=" +perPage; //Math.min (perPage, 100) ..since 100 = max?

  if( query_var_taxonomy.length > 0) query_var_taxonomy='category';
  if( query_var_termID.length > 0) query += "&"+query_var_taxonomy+"="+query_var_termID;  //name, slug or id?
  if( query_var_post_type.length > 0)  query_var_post_type='post';
console.log("AJAX: ",query_var_termID, query_var_taxonomy, query_var_post_type, offset, perPage);
  jQuery.ajax( {
    url: '/wp-json/wp/v2/'+query_var_post_type+'?'+query,  //get the next page beyond what we have
    error: function ( jqXHR,  textStatus,  errorThrown ) {
      $("#get-another-post-button").attr('disabled',false);
      $("div.ajax-alerts").append("<p class='alert error'>Something went wrong: "+textStatus+"</p>");
    },
    beforeSend: function ( posts ) {
      addedPosts=0;
      $("div.ajax-alerts").html("");
    },
    success: function ( posts ) {
      //disable the load-animation; enable the button again.
      $("#content-archive .page-index").removeClass('loading');
      $("#get-another-post-button").attr('disabled',false);

      //technically still the 'old' offset right now.
      $('#offset-'+offset).trigger( "focus" ); //steady...
      scroll.animateScroll( $('#offset-'+offset), $('#offset-'+offset).length );


//      var post = data.shift(); // The data is an array of posts. Grab the first one.
      for (var postIndex = 0, postCount = posts.length; postIndex < postCount; postIndex++) {

        var thispost=jQuery( postTemplate( posts[postIndex]) ); //not really using the data for now..
        thispost.attr('id','post-'+posts[postIndex].id);
        thispost.find( '.post-title a' ).attr( 'href', posts[postIndex].link );
        thispost.find( '.post-title a' ).html( posts[postIndex].title.rendered );
        thispost.find( '.content' ).append( posts[postIndex].excerpt.rendered );

        thispost.find( '.date-bar' ).html( '<p class="published">'+posts[postIndex].date_rendered+'</p>' );
        if ( posts[postIndex].featured_image.url_large ) thispost.find( '.bg' ).attr('style', "background-image:url("+posts[postIndex].featured_image.url_large[0] +");");
        thispost.find( 'a.block-link' ).attr( 'href', posts[postIndex].link );

        for (var catIndex = 0, catCount = posts[postIndex].categories_list.length; catIndex < catCount; catIndex++) {
          var cat_obj=posts[postIndex].categories_list[catIndex];
          thispost.addClass("category-"+cat_obj.slug);
          thispost.find( '.entry-meta' ).append( '<a href="'+cat_obj.link+'" title="">'+cat_obj.cat_name+'</a>' );
        }
        thispost.addClass('ajaxed');  //to animate in

        //Actually add the post
        if( jQuery( 'article#post-'+posts[postIndex].id).length == 0 ){
           jQuery('#content-archive').append(thispost);
           addedPosts++;
        }

      }//fe
    },
    complete: function (){
      jQuery('#content-archive article').removeClass('ajaxed'); //animate new articles in
      offset=$('#content-archive').children("article.category-"+slug).length;
      if( slug ) window.location.hash = '#category='+slug+'&offset='+offset;  //and set the proper page
      if( addedPosts == 0 ){
        $("div.ajax-alerts").append("<h4 class='no-more-posts'>No more "+categoryName+" posts.</h4><p><a class='btn btn-wide button' href='/campus-news/'>Show All</a></p>");
        $("#get-another-post-button").hide();
      }
      //jQuery('#content-archive article').matchHeight();
    },
    cache: false
  } );

}

var postTemplate = function (data) {
  //  var html='<article class="post post-ajax"><h3 class="post-title"></h3><div class="post-content"></div></article>';
  var html=jQuery('.ajax-templates .article-excerpt').prop('outerHTML');
  return html;
};


});
