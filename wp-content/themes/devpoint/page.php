<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="sub">

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
  
  	<?php $i = 0; ?>
        
      	<?php if(get_field('row')): ?>
 
    		<?php while(the_repeater_field('row')): ?>
            
            	<div class="row">
                
            	<?php if ($i % 2 == 0) {    	
					
					$class = " rthumbs";
						
				} else { 
						
					$class = "";
						 
				} 
					
				?>
                
                	 <?php if (get_sub_field('image') != ""){ ?>
                                    
                     	<?php $pieces = wp_get_attachment_image_src(get_sub_field('image'), 'full' ); ?>
                                         
                        <div class="thumbs<?php echo $class; ?>"><img src="<?php echo $pieces[0]; ?>" width="275" border="0" /></div>
                                    
                    <?php } ?>
                    
                    <h3><?php the_sub_field('title'); ?></h3> 
          
                	<?php the_sub_field('text'); ?>
                  	
                    <div class="clear"></div>
                      
                </div>
                
      			<?php $i += 1; ?>
      			
            <?php endwhile; ?>
 
 		<?php endif; ?>     
           
  <div class="clear"></div>

</div>

<?php get_footer();  ?>
