<?php
/*
The Authors Loop
===========================
Used by page-author.php

Bad Idea: Wrapping anything around the article-list here.
Another Bad Idea: Adding the Bootstrap class 'row' to the article-list itself.

*/
?>
<div class="article-list">
<?php
$user_args = array(
  'role'         => '',
  'meta_key'     => '',
  'meta_value'   => '',
  'meta_compare' => '',
  'meta_query'   => array(),
  'date_query'   => array(),
  'include'      => array(),
  'exclude'      => array(),
  'orderby'      => 'display_name',
  'order'        => 'ASC',
  'offset'       => '',
  'search'       => '',
  'number'       => '',
  'count_total'  => false,
  'fields'       => 'all',
  'who'          => 'authors'
);

$allUsers = get_users($user_args);
$userCount = 0;

foreach($allUsers as $user ){
  if($user->data->display_name !== $user->data->user_login ) { // only users with real names
    echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>";
      get_template_part('content-templates/author','content');
    echo "</div>";
      $userCount++;
  }
} // if

//echo wpb_author_info_box('');

?>
</div>
