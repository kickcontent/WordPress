<?php
/**
 * Template Name: Home Page 2
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */


get_header(); ?>

 <div id="slideshow">
        	
            <img id="prev" src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.png" width="35" height="35" border="0"  />
            <img id="next" src="<?php echo get_template_directory_uri(); ?>/images/arrow-right.png"  width="35" height="35" border="0"  />
            
            <div id="pager"></div>
    
            <div id="slides">
            
            	<?php if(get_field('slides')): ?>
 
    				<?php while(the_repeater_field('slides')): ?>
                    
                     <?php if (get_sub_field('url') == "") { ?>
                     
                     	<div class="slide"><img src="<?php the_sub_field('image'); ?>" title="<?php the_sub_field('title'); ?>" alt="<?php the_sub_field('title'); ?>" width="954" height="359" border="0"  /></div>            
                    
                    <?php } else if (get_sub_field('new_window')) { ?>
                    	
                         <div class="slide"><a href="<?php the_sub_field('url'); ?>" target="_blank"><img src="<?php the_sub_field('image'); ?>" title="<?php the_sub_field('title'); ?>" alt="<?php the_sub_field('title'); ?>" width="954" height="359" border="0"  /></a></div>
                                        
                    <?php } else { ?>
                    
                    	<div class="slide"><a href="<?php the_sub_field('url'); ?>"><img src="<?php the_sub_field('image'); ?>" title="<?php the_sub_field('title'); ?>" alt="<?php the_sub_field('title'); ?>" width="954" height="359" border="0"  /></a></div>
                          
                    <?php } ?>
                    
                       
                       
                    <?php endwhile; ?>
 
 				<?php endif; ?>
         
            </div>
            
        </div>
        
        <div id="home">
        
            <div id="home-text">
            
                <?php if (get_the_post_thumbnail() != ""){ ?>
                
                	 <?php $pieces = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full' ); ?>
                     
                     <div class="thumbs"><img src="<?php echo $pieces[0]; ?>" width="275" border="0" /></div>
                
                <?php } ?>
            
           		<?php while ( have_posts() ) : the_post(); ?>
            
            		<?php the_content(); ?>
                    
                 <?php endwhile;  ?>
           
                <div class="clear"></div>
                
            </div>
            
            <div id="home-right">
          		<?php get_sidebar(); ?>
            </div>
            
            <div class="clear"></div>
        
        </div>

<?php get_footer(); ?>
