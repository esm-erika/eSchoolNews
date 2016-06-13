
<?php


 $astcset = $_GET['astc'];
	if(!filter_var($astcset, FILTER_VALIDATE_INT))
	{//reserved for default ad set
		$astc = 1;
	} else {
	// Retrieve adset info from url
		$astc = $astcset;	
	}	
	 if($astc > 1){
			$e = 1; $query5 = new WP_Query();$query5->query('cat='.$astc);
			$count = $query5->post_count;
			while ($query5->have_posts()) : $query5->the_post(); 
			if($e == 1){ ?>
				
            <article>
            <section>
            <h4>Table of Contents</h4>	
                <ul>				
			<?php	} ?>
            
			<li><a href="<?php the_permalink();echo '?ast='.$astused.'&astc='.$astc; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a></li>
<?php			
			 $e++; endwhile; wp_reset_query(); 

	if($count >= 1){ ?>
                </ul>	
            </section>
            </article> 
<?php } 
} 

?>