<?php
global $user;

if(!$user){
  $user = get_users( array('include'=>array(get_the_author_meta('ID') ) ) );
  if(count($user)>0) $user=$user[0];
}
?>

<article class="author-bio author-excerpt">
    <div class="author-photo">
        <?php
            $photo_url='';
            $photo = get_field('user-photo', 'user_'.$user->ID);

            if( array_key_exists('sizes', $photo)){
                $photo_url=$photo['sizes']['square'];
            }else{
                $photo_url="http://fpoimg.com/960x960?text=Placeholder";
            }
        ?>
        <img class='square' src="<?php echo $photo_url; ?>">
    </div>

    <div class="author-info">
        <h2 class="author-name"><?php echo $user->display_name; ?></h2>
        <p class='author-location'><span>From</span> <strong><?php echo get_field('user-location', 'user_'.$user->ID); ?></strong></p>
        <p class='author-year'><strong>Author since <?php echo get_field('user-year', 'user_'.$user->ID); ?></strong></p>

        <p class="author-link"><a href="<?php echo get_author_posts_url( $user->ID ); ?>">See all articles</a></p>
    </div>
    
</article>
