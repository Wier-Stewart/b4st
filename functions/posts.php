<?php
function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Replaces the excerpt "Read More"
function new_excerpt_more($more) {
  global $post;
    return '&hellip;';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * Placeholder / Default Featured Image
 * @var [type]
 */

add_filter( 'posts_where', function( $where, $q ){
    if( $name__like = $q->get( '_name__like' ) ){
        global $wpdb;
//wpdb->prepare is too stringent :/

        $where .= " AND {$wpdb->posts}.post_name LIKE '".mb_strtolower( $wpdb->esc_like( $name__like ))."%' ";

    }
    return $where;
}, 10, 2 );

function random_featured_placeholder( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    //$default_thumbnail_id = get_option( 'dfi_image_id' ); // do a query for all media that contains 'placeholder-*' ?
    $img_args = array(
        'post_type'=>'attachment',
        '_name__like'=>'placeholder',
        'post_status'=>array('inherit', 'publish')

    );
    $the_query = new WP_Query( $img_args );

    $random_placeholder_options=array_reduce ( $the_query->posts , function($out, $post){
        $out[]=$post->ID;
        return $out;
    } );

//    $random_placeholder_options = array(25, 45);
    $random_placeholder_id=-1;
    if(is_array($random_placeholder_options)){
        $random_placeholder_index = random_int(0, count($random_placeholder_options)-1 );
        $random_placeholder_id = $random_placeholder_options[$random_placeholder_index];
    }

    if( empty($post_thumbnail_id) ){
        $attr = array ('class' => " default-featured-img");
    }else if ( $random_placeholder_id != $post_thumbnail_id ) return $html;   //don't loop forever :/

    $html = wp_get_attachment_image( $random_placeholder_id, $size, false, $attr );

    return $html;
}
add_filter( 'post_thumbnail_html',  'random_featured_placeholder' , 20, 5 );
