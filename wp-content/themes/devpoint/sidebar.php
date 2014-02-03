<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
 
	global $upload_dir;
	global $tweets;

?>




<ul id="tweets" style="background-image:url(<?php echo $upload_dir['baseurl']; ?>/twitter-feed-icon.png);">

	<?php
	
		
	$html = "";
    
    foreach ($tweets as $key => $value) {
		
	   $date = $value->created_at;
	   $date = explode(" ", $date);
	   $html .= '<li class="tweet"><img src="'.$value->user->profile_image_url.'" width="50" border="0" /><span>';
       $text = '<a target="_blank" href="https://twitter.com/'.$value->user->screen_name.'">'.$value->user->screen_name.'</a> '.$value->text;
       $urls = $value->entities->urls;
       $mentions = $value->entities->user_mentions;
       $hashtags = $value->entities->hashtags;
       
       foreach ($urls as $url) {
           //echo $url->url;
           $text = str_replace($url->url, '<a target="_blank" href="'.$url->url.'">'.$url->display_url.'</a>', $text);
       }
       
       foreach ($mentions as $mention) {
            //echo $mention->screen_name;
           $text = str_replace("@".strtolower($mention->screen_name), '<a target="_blank" href="https://twitter.com/'.strtolower($mention->screen_name).'">@'.$mention->screen_name.'</a>', $text);
         
           
       }
       
       foreach ($hashtags as $hashtag) {
          // echo $hashtag->text;
           $text = str_replace(strtolower($hashtag->text), '<a target="_blank" href="https://twitter.com/search?q=%23'.strtolower($hashtag->text).'&src=hash">'.strtolower($hashtag->text).'</a>', $text);
       }
       
	   $html .= $text.'<div class="date">'.$date[1].' '.$date[2].'</div></span><div class="tweet-clear"></div></li>';
	   
           
        //print_r($value->entities->urls);
    }
	
	echo $html;
	
    ?>

</ul>
