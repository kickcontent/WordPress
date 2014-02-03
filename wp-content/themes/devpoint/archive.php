<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id="blog">
    
        <div id="blog-left">
    
            <?php 
                          
                $paged = get_query_var('paged');
                query_posts('cat=-0&paged='.$paged);
                
                // make posts print only the first part with a link to rest of the post.
                global $more;
                $more = 0;
                          
                while (have_posts()) : the_post(); ?>
                
                    <div class="blog-row">
                    
                        <?php if (get_the_post_thumbnail() != "") { ?>
               
                            <?php $pieces =  wp_get_attachment_image_src(get_post_thumbnail_id(), 'full' ); ?>
                                                 
                            <div class="thumbs<?php echo $class; ?>"><img src="<?php echo $pieces[0]; ?>" width="200" border="0" /></div>
                           
                        <?php } ?>
                        
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                        
                        <a class="perml" href="<?php echo get_permalink(); ?>">Read More</a>
                        
                        <div class="clear"></div>
                    
                    </div>
       
                <?php endwhile; ?>      
                   
                
            <?php posts_nav_link('&nbsp;', __('<span class="nav-previous">« Newer Posts</span>'), __('<span class="nav-next">Older Posts »</span>')); ?>
          
            <div class="clear"></div>
            
       </div>
       
       <div id="blog-right">
       
       		<?php get_sidebar( 'blogroll' ); ?>
       
       </div>
       
        <div class="clear"></div>
        
   </div>
  

<?php get_footer(); ?>
