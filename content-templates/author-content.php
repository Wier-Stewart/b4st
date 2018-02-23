<?php
global $user;

if(!$user){
  $user = get_users( array('include'=>array(get_the_author_meta('ID') ) ) );
  if(count($user)>0) $user=$user[0];
}
?>

<div class="author-bio author-content">
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
        <p class='author-title'><?php echo get_field('user-title', 'user_'.$user->ID); ?></p>
        <p class='author-location'><span>From</span> <strong><?php echo get_field('user-location', 'user_'.$user->ID); ?></strong></p>
        <p class='author-year'><strong>Author since <?php echo get_field('user-year', 'user_'.$user->ID); ?></strong></p>

        <p class="author-descrption"><?php echo get_user_meta($user->ID, 'description', true); ?></p>
        <p class="author-link"><a href="<?php echo get_author_posts_url( $user->ID ); ?>">See all articles</a></p>

        <!-- p class="social-icons">
            <ul>
                <?php
                    $website = $user->user_url;
                    if($user->user_url != '')
                    {
                        printf('<li><a href="%s">%s</a></li>', $user->user_url, 'Website');
                    }

                    $twitter = get_user_meta($user->ID, 'twitter_profile', true);
                    if($twitter != '')
                    {
                        printf('<li><a href="%s">%s</a></li>', $twitter, 'Twitter');
                    }

                    $facebook = get_user_meta($user->ID, 'facebook_profile', true);
                    if($facebook != '')
                    {
                        printf('<li><a href="%s">%s</a></li>', $facebook, 'Facebook');
                    }

                    $google = get_user_meta($user->ID, 'google_profile', true);
                    if($google != '')
                    {
                        printf('<li><a href="%s">%s</a></li>', $google, 'Google');
                    }

                    $linkedin = get_user_meta($user->ID, 'linkedin_profile', true);
                    if($linkedin != '')
                    {
                        printf('<li><a href="%s">%s</a></li>', $linkedin, 'LinkedIn');
                    }
                ?>
            </ul>
        </p -->
    </div>
</div>
