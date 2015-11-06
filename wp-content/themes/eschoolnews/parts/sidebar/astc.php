<!-- atsc -->
<?php $astcset = $_GET['astc'];
	if(!filter_var($astcset, FILTER_VALIDATE_INT))
	{//reserved for default ad set
		$astc = 1;
	} else {
	// Retrieve adset info from url
		$astc = $astcset;	
	}	
	echo '<!-- '.$astc. ' -->';
	 if($astc > 1){

			$e = 1; $query5 = new WP_Query();$query5->query('cat='.$astc);
			while ($query5->have_posts()) : $query5->the_post(); 
			if(e ==1){ ?>
				
            <article>
            <section>
            <h4>Table of Contents</h4>	
                <ul>				
				
			<?php	}
			$toc = $toc . '<li><a href="'. get_permalink(). '?ast='.$astused.'&astc='.$astc.'" rel="bookmark">'. get_the_title() .'</a></li>';
			
			 $e++; endwhile; wp_reset_query(); 

	if(e ==1){ ?>
        </ul>	
	</section>
	</article> 
<?php } 
} ?>