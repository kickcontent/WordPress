<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
</div>

<div id="footer">
    
    	<div id="footer-inside">
        
       		<p id="copy">&copy; 2014 DevPoint. All rights reserved.</p>
            
            	<?php wp_nav_menu( array('menu' => 'Footer','menu_class' => 'footer-links'));  ?>
             
            <div class="clear"></div>
        
        </div>
    
    </div>
    
</body>

<?php wp_footer(); ?>

</html>
