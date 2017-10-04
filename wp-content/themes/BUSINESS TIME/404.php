<?php get_header(); ?>
 <div class="units-row" style="padding: 50px 25px 0 25px;">
    <div class="unit-65" >
   <ul class="blocks preds" style="margin:0; padding:0; list-style:none;">
   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <li>  
   
   <span style=" display:block;"><img src="<?php bloginfo('template_directory'); ?>/img/18493511.png" width="930" height="730" /></span>
   
 
   </li>
 <?php endwhile; else: ?>
<?php endif; ?>	   
   