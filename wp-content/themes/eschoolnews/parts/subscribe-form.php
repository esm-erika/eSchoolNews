
  <div class="row">
    <div class="medium-12 columns">

      <div class="row"> 
                     
  
  		<?php  
	$opt_val3 = get_option( 'esm_gravity_sf_subscribe' );				
				echo $opt_val3;
			gravity_form($opt_val3, false, true, false, $esnautofill, true); 
		
		?>
  
      </div>
    </div>
  </div>