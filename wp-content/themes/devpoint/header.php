<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php
session_start();
require_once("/twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "kickcontent";
$notweets = 3;
$consumerkey = "PIKTD1DHNTv6uTV1yFT3Zg";
$consumersecret = "IUjgDG221uz4eXndAO0VWYvOWt2g9jrGPjCztUc5v4";
$accesstoken = "1965563251-ysNNn9vdtYxfH7FNaemWD6KFn0uigHHV8f3DMez";
$accesstokensecret = "C7hR1nqfPgSXF016hiTofyJFuDpPQyQLSFydmfDnZM";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
global $tweets;
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
//echo json_encode($tweets);
//print_r($tweets);
?>



<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="1024">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
    
    <?php wp_head(); ?>
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/cycle.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
    
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/forms/mailing-list.js"></script>
    
     <?php if (is_page('Contact')) { ?>
    
   		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/forms/form.js"></script>
    
    <?php } ?>


	<?php 
	global $upload_dir;
	$upload_dir = wp_upload_dir(); ?>
    <?php //echo $upload_dir['baseurl']; ?>


</head>

<body>

	<div id="top">
    
    	<div id="top-inside">
        
        	<ul id="social">
            
             	<?php if(get_field('social_media',2)): ?>
 
    				<?php while(the_repeater_field('social_media',2)): ?>
                    
                    	<?php $new_window = ""; ?>
                        
                        <?php if (get_sub_field('new_window')) { ?>
                        	<?php $new_window = 'target="_blank"'; ?>
                        <?php } ?>
                    
                    	<?php if (get_sub_field('name') == "Facebook") { ?>
                        
                        	<li><a <?php echo $new_window; ?> href="<?php the_sub_field('url'); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/icon-facebook.jpg" width="35" height="35" border="0"  /></a></li>
                        
                        <?php } ?>
                        
                      	<?php if (get_sub_field('name') == "Twitter") { ?>
                        
                        	<li><a <?php echo $new_window; ?> href="<?php the_sub_field('url'); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/icon-twitter.jpg" width="35" height="35" border="0"  /></a></li>
                        
                        <?php } ?>
                        
                        <?php if (get_sub_field('name') == "Tumblr") { ?>
                        
                        	<li><a <?php echo $new_window; ?> href="<?php the_sub_field('url'); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/icon-tumblr.jpg" width="35" height="35" border="0"  /></a></li>
                        
                        <?php } ?> 
                        
                        <?php if (get_sub_field('name') == "Instagram") { ?>
                        
                        	<li><a <?php echo $new_window; ?> href="<?php the_sub_field('url'); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/icon-instagram.jpg" width="35" height="35" border="0"  /></a></li>
                        
                        <?php } ?>
                        
                        <?php if (get_sub_field('name') == "Pinterest") { ?>
                        
                        	<li><a <?php echo $new_window; ?> href="<?php the_sub_field('url'); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/icon-pinterest.jpg" width="35" height="35" border="0"  /></a></li>
                        
                        <?php } ?>
                        
                        <?php if (get_sub_field('name') == "Google Plus") { ?>
                        
                        	<li><a <?php echo $new_window; ?> href="<?php the_sub_field('url'); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/icon-google-plus.jpg" width="35" height="35" border="0"  /></a></li>
                        
                        <?php } ?>
                        
                         <?php if (get_sub_field('name') == "LinkedIn") { ?>
                        
                        	<li><a <?php echo $new_window; ?> href="<?php the_sub_field('url'); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/icon-linked-in.jpg" width="35" height="35" border="0"  /></a></li>
                        
                        <?php } ?>
                        
                        <?php if (get_sub_field('name') == "YouTube") { ?>
                        
                        	<li><a <?php echo $new_window; ?> href="<?php the_sub_field('url'); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/icon-youtube.jpg" width="35" height="35" border="0"  /></a></li>
                        
                        <?php } ?>
                        
                         <?php if (get_sub_field('name') == "Newsletter") { ?>
                        
                        	<li><a <?php echo $new_window; ?> href="<?php the_sub_field('url'); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/icon-email.jpg" width="35" height="35" border="0"  /></a></li>
                        
                        <?php } ?>
                        
                         <?php if (get_sub_field('name') == "RSS") { ?>
                        
                        	<li><a <?php echo $new_window; ?> href="<?php the_sub_field('url'); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/icon-rss.jpg" width="35" height="35" border="0"  /></a></li>
                        
                        <?php } ?>
                
                      
                    <?php endwhile; ?>
 
 				<?php endif; ?>
           	</ul> 
            
            <?php wp_nav_menu( array('menu' => 'Top','menu_class' => 'top-nav'));  ?>
            
            <div class="clear"></div>
        
        </div>
    
    </div>
    
    <div id="container">
    
    	<div id="header">
        
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="logo"><img src="<?php echo $upload_dir['baseurl']; ?>/logo.jpg" width="175" border="0"  /></a>
            
            <div id="mailing-list">
            
            	 <span>Email Newsletter</span><form id="newsletter"><input name="mailing-list" placeholder="Email" type="text" value=""  /> <input name="submit" type="submit" value="GO" /></form>
            
            </div>
            
            <div class="clear"></div>
            
            <!--<php get_search_form(); ?>-->
            
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
            
            <div class="clear"></div>
        
        </div>
        