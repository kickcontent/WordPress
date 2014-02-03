			<h3>Recent Posts</h3>
    

			<ul>
				<?php
                    $recent_posts = wp_get_recent_posts();
                    foreach( $recent_posts as $recent ){
                        echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="'.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
                    }
                ?>
            </ul>
					
                    
    		<h3>By Date</h3>	
                    
            <ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>