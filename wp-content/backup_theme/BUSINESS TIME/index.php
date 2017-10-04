<?php get_header(); ?>





<div class="units-row">
    <div class="unit-100" style="padding: 0 25px 0 25px;">
    
    <div class="top_slogan">
<?php
				// Value from Text Area
				$welcome = get_option('BUSINESS_TIME_welcome');
                echo stripslashes(stripslashes( $welcome));
				?>	
  </div>
    </div>
   
</div>






<div class="sdf">
 
<ul class="blocks-3 predstop" style=" margin:0">



    <li>  <h3 style="margin:0 0 -20px 0"><?php echo get_option('BUSINESS_TIME_blok1title'); ?></h3>  <p><?php echo get_option('BUSINESS_TIME_blok1opis'); ?></p> <a href="<?php echo get_option('BUSINESS_TIME_link1'); ?>" class="more"> <?php echo get_option('BUSINESS_TIME_linktitle'); ?> <i class="fa fa-arrow-circle-o-right"></i></a></li>
 
 
 
 <li>  <h3 style="margin:0 0 -20px 0"><?php echo get_option('BUSINESS_TIME_blok2title'); ?></h3>  <p><?php echo get_option('BUSINESS_TIME_blok2opis'); ?></p> <a href="<?php echo get_option('BUSINESS_TIME_link2'); ?>" class="more"> <?php echo get_option('BUSINESS_TIME_linktitle2'); ?> <i class="fa fa-arrow-circle-o-right"></i></a></li>
 
 
  <li>  <h3 style="margin:0 0 -20px 0"><?php echo get_option('BUSINESS_TIME_blok3title'); ?></h3>  <p><?php echo get_option('BUSINESS_TIME_blok3opis'); ?></p> <a href="<?php echo get_option('BUSINESS_TIME_link3'); ?>" class="more"> <?php echo get_option('BUSINESS_TIME_linktitle3'); ?> <i class="fa fa-arrow-circle-o-right"></i></a></li>
    
</ul>


</div>













<?php get_footer(); ?>


