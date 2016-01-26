		
		<?php 

		//video, globe, page, twitter, download
			
			if(get_field('choose_icon') == "video") {
			    
			    echo '<i class="fi-play-video"></i>';

			} elseif(get_field('choose_icon') == "globe") {

				echo '<i class="fi-web"></i>';

			} elseif(get_field('choose_icon') == "page") {

				echo '<i class="fi-page"></i>';

			} elseif(get_field('choose_icon') == "twitter") {

				echo '<i class="fi-social-twitter"></i>';

			} elseif(get_field('choose_icon') == "download") {

				echo '<i class="fi-arrow-down"></i>';

			} else {

			}

		 ?>
