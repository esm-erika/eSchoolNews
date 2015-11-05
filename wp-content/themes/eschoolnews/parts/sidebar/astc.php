	<article>
	<section>
	<h4>Table of Contents</h4>	
        <ul>
         <?php

			$e = 1; $query5 = new WP_Query();$query5->query('cat='.$astc);
			while ($query5->have_posts()) : $query5->the_post(); 
			$toc = $toc . '<li><a href="'. get_permalink(). '?ast='.$astused.'&astc='.$astc.'" rel="bookmark">'. get_the_title() .'</a></li>';
			
			 $e++; endwhile; wp_reset_query(); 

			?>

        </ul>	
	</div>
	</section>
	</article>