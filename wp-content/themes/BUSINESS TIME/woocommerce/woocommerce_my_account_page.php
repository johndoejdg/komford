<?php get_header(); ?>
 <div class="units-row" style="padding: 50px 25px 0 25px;">
    <div class="unit-65" >
   <ul class="blocks preds" style="margin:0; padding:0; list-style:none;">
  
   <li>  
   
   <?php woocommerce_content(); ?>
 
   </li>
  
   
 
 
 
    
    
</ul>

       


<?php comments_template( '', true ) ?>


   </div>
   
   <div class="unit-35">
 
 
   <div class="blok">
   <?php /* Widgetized sidebar */
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('woocommerce Сайтбар') ) : ?>
<?php endif; ?> 
    
    </div>
   </div>  
   
   
</div>
<?php get_footer(); ?>
