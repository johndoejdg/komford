<?php get_header(); ?>
 <div class="units-row" style="padding: 50px 25px 0 25px;">
    <div class="unit-65" >
   <ul class="blocks preds" style="margin:0; padding:0; list-style:none;">
   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <li>  
   
   <h2><?php the_title(); ?></h2>
   
   
    
   <p class="imresp"><?php the_content(''); ?></p> 
   
 
   </li>
 <?php endwhile; else: ?>
<?php endif; ?>	   
   
 
 
 
    
    
</ul>

       


<?php comments_template( '', true ) ?>


   </div>
   
   <?php get_sidebar(); ?> 
<?php get_footer(); ?>
