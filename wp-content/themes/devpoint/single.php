<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id="blog">
    
      <div id="blog-left">
      
      		<div id="page">
    
               <?php if (get_the_post_thumbnail() != ""){ ?>
                            
                 <?php $pieces = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full' ); ?>
                                 
                 <div class="thumbs"><img src="<?php echo $pieces[0]; ?>" width="275" border="0" /></div>
                            
              <?php } ?>
                        
              <?php while ( have_posts() ) : the_post(); ?>
              
                 <h2><?php the_title(); ?></h2> 
                   
                 <?php the_content(); ?>
                                
              <?php endwhile;  ?>
          
          </div>
       	
      </div>
      
      <div id="blog-right">
        	<?php get_sidebar( 'blogroll' ); ?>
      </div>
      
      <div class="clear"></div>
        
    </div>

<?php get_footer();  ?>

