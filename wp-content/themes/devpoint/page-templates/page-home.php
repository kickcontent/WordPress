<?php
/**
 * Template Name: Home Page
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
        
            <div id="boxes">
            
            
            	<?php if(get_field('boxes')): ?>
 
    				<?php while(the_repeater_field('boxes')): ?>
                    
                      	<div class="box">
                            <img src="<?php the_sub_field('image'); ?>" width="200" border="0"  /> 
                            <h3><?php the_sub_field('title'); ?></h3>             
                            <p><?php the_sub_field('text'); ?></p>  
                            
                            <?php if (get_sub_field('url') != "") { ?>
                            
                            	<?php if (get_sub_field('new_window')) { ?>
                              
                            		<a href="<?php the_sub_field('url'); ?>" target="_blank">More</a> 
                                
                                <?php } else { ?>
                                
                                	<a href="<?php the_sub_field('url'); ?>">More</a> 
                                    
                                <?php } ?>
                            
                            <?php } ?>
                                      
                		</div>
                    
                    <?php endwhile; ?>
 
 				<?php endif; ?>

                <div class="clear"></div>
                
            </div>
            
            <div id="home-right">
          		<?php get_sidebar(); ?>
            </div>
            
            <div class="clear"></div>
        
        </div>

<?php get_footer(); ?>
