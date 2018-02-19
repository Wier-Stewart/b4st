<?php

// Extending the WP-API Responses:
add_action( "rest_api_init", function () {

    //add  date_rendered
    register_rest_field( "post", "date_rendered", array(
        "get_callback" => function( $post ) {
            return get_the_date('', $post);
        },
        "schema" => array(
            "description" => __( "Pretty Date." ),
            "type"        => "string"
        ),
    ) );

    //add  category info, not just the cat_ids :/
    register_rest_field( "post", "categories_list", array(
        "get_callback" => function( $post ) {
            $cats=array();
            foreach((get_the_category($post['id'])) as $category) {
                $cats[] = array_merge( (array)$category, array('link'=>get_category_link($category->term_id))  );
            }
            return $cats; //get_the_category($post['id']); //$cats; //get_the_category($post['id']);
        },
        "schema" => array(
            "description" => __( "Categories Detail" ),
            "type"        => "object"
        ),
    ) );


    //add  featured_image
    register_rest_field( "post", "featured_image", array(
        "get_callback" => function( $post ) {
            return (object) array(
                "html"=>get_the_post_thumbnail( $post['id'], 'large' ),
                "url"=>wp_get_attachment_image_src( get_post_thumbnail_id( $post['id']), 'full', false  ),
                "url_large"=>wp_get_attachment_image_src( get_post_thumbnail_id( $post['id']), 'large'  , false),
                "url_square"=>wp_get_attachment_image_src( get_post_thumbnail_id( $post['id']), 'square' , false ),
//                "image_sizes"=>get_intermediate_image_sizes()
              );
        },
        "schema" => array(
            "description" => __( "Featured Image HTML." ),
            "type"        => "object"
        ),
    ) );


} );



/**
* Add REST API support to *ALL* already registered post types.
*/
add_action( 'init', 'my_custom_post_type_rest_support', 25 );
function my_custom_post_type_rest_support() {
  global $wp_post_types;

  foreach($wp_post_types as $post_type_name =>$post_type){
    if( isset( $wp_post_types[ $post_type_name ] ) ) {
      $wp_post_types[$post_type_name]->show_in_rest = true;
      $wp_post_types[$post_type_name]->rest_base = $post_type_name;
      $wp_post_types[$post_type_name]->rest_controller_class = 'WP_REST_Posts_Controller';
    }
  }

}


/**
* Add REST API support to *ALL* already registered taxonomies.
*/
add_action( 'init', 'my_custom_taxonomy_rest_support', 25 );
function my_custom_taxonomy_rest_support() {
  global $wp_taxonomies;

  foreach($wp_taxonomies as $taxonomy_name =>$taxonomy){
    if ( isset( $wp_taxonomies[ $taxonomy_name ] ) ) {
      $wp_taxonomies[ $taxonomy_name ]->show_in_rest = true;
      $wp_taxonomies[ $taxonomy_name ]->rest_base = $taxonomy_name;
      $wp_taxonomies[ $taxonomy_name ]->rest_controller_class = 'WP_REST_Terms_Controller';
    }
  }

}
