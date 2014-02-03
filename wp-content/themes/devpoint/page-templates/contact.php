<?php
/**
 * Template Name: Contact
 */


get_header(); 
global $upload_dir;

?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  
<script type="text/javascript">
	
$(document).ready(function () {
	
		// The following example creates complex markers to indicate beaches near
	// Sydney, NSW, Australia. Note that the anchor is set to
	// (0,32) to correspond to the base of the flagpole.
	
	function initialize() {
	  var mapOptions = {
		zoom: 10,
		center: new google.maps.LatLng(-33.9, 151.2)
	  }
	  var map = new google.maps.Map(document.getElementById('map'),mapOptions);
	
	  setMarkers(map, beaches);
	}
	
	/**
	 * Data for the markers consisting of a name, a LatLng and a zIndex for
	 * the order in which these markers should display on top of each
	 * other.
	 */
	var beaches = [
	  ['Bondi Beach', -33.890542, 151.274856, 4],
	  ['Coogee Beach', -33.923036, 151.259052, 5],
	  ['Cronulla Beach', -34.028249, 151.157507, 3],
	  ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
	  ['Maroubra Beach', -33.950198, 151.259302, 1]
	];
	
	function setMarkers(map, locations) {
	  // Add markers to the map
	
	  // Marker sizes are expressed as a Size of X,Y
	  // where the origin of the image (0,0) is located
	  // in the top left of the image.
	
	  // Origins, anchor positions and coordinates of the marker
	  // increase in the X direction to the right and in
	  // the Y direction down.
	  var image = {
		url: '<?php echo $upload_dir['baseurl']; ?>/map-marker.png',
		// This marker is 20 pixels wide by 32 pixels tall.
		size: new google.maps.Size(20, 32),
		// The origin for this image is 0,0.
		origin: new google.maps.Point(0,0),
		// The anchor for this image is the base of the flagpole at 0,32.
		anchor: new google.maps.Point(0, 32)
	  };
	  // Shapes define the clickable region of the icon.
	  // The type defines an HTML &lt;area&gt; element 'poly' which
	  // traces out a polygon as a series of X,Y points. The final
	  // coordinate closes the poly by connecting to the first
	  // coordinate.
	  var shape = {
		  coord: [1, 1, 1, 20, 18, 20, 18 , 1],
		  type: 'poly'
	  };
	  for (var i = 0; i < locations.length; i++) {
		var beach = locations[i];
		var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			icon: image,
			shape: shape,
			title: beach[0],
			zIndex: beach[3]
		});
	  }
	}

	//initialize();
google.maps.event.addDomListener(window, 'load', initialize);
			
	 	         
	  
		//initialize(["33.183680","33.145632","33.145719"], ["-117.256359","-117.047248","-117.119951"],33.183680 ,-117.256359,["835 Centennial Drive","539 N. Citrus Ave,","1731 Rock Springs Rd"],["Vista","Escondido","San Marcos"],["CA","CA","CA"],["Centennial","Campbell Place","Rock Springs"],[2,1,0],[]);
		
			
				
});
		
</script>



<div id="contact">

   <div id="contact-left">
   		
         <div id="map"></div>
  
   </div>
  
  <div id="contact-right">
   		
	  <?php while ( have_posts() ) : the_post(); ?>
          
      	<h2><?php the_title(); ?></h2> 
               
        <?php the_content(); ?>
        
        <form id="email-us" name="email-us">
        
        	<div class="input"><input name="first_name" placeholder="First Name" type="text" value="" data-required="true"  /></div>
            <div class="input"><input name="last_name" placeholder="Last Name" type="text" value="" data-required="true"  /></div>
            <div class="input"><input name="email" placeholder="Email" type="text" value="" data-required="true"  /></div>
            <div class="input"><input name="phone" placeholder="Phone" type="text" value=""  /></div>
            <div class="input"><textarea name="message" placeholder="Message" data-required="true" ></textarea>  </div>
            <div class="input"><input id="txtCaptcha" type="text" name="txtCaptcha" placeholder="Enter Code" value="" maxlength="10" size="32" data-required="true" />
            <img id="imgCaptcha" src="<?php echo get_template_directory_uri(); ?>/forms/ajax_captcha/create_image.php" /></div>
            <div class="clear"></div>
                
             <div id="result">&nbsp;</div>
             
            <input name="submit" type="submit" value="Submit" />
            
             <div class="clear"></div>
     
        </form>
                            
      <?php endwhile;  ?>
  
  </div>
           
  <div class="clear"></div>

</div>

<?php get_footer();  ?>