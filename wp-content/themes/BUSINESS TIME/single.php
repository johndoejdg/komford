<?php get_header(); ?>
 <div class="units-row" style="padding: 50px 25px 0 25px;">
    <div class="unit-65 sonyey" >
   <ul class="blocks preds" style="margin:0; padding:0; list-style:none;">
   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <li>  
   
   <h2><?php the_title(); ?></h2>
   
   <table width="100%" border="0" style="font-size:14px; margin-bottom:5px; color: #666; text-align:center">
  <tr>
    <td>Раздел: <?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></td>
    <td>Просмотров: <?php echo get_post_meta ($post->ID,'views',true); ?></td>
    <td>Комментрариев: <?php comments_number( '0', '1', '%' ); ?></td>
    <td>Дата: <?php the_time('j F, Y'); ?> в <?php the_time('G:i'); ?></td>
   
  </tr>
</table>
   
    
   <p class="imresp"><?php the_content('', FALSE, ''); ?></p> 
   
 <div align="center">
  
 <span id="nextt"><?php next_post_link ('%link', '&larr; Следующая запись', true) ?></span> 
 <span id="nextt"> <?php previous_post_link ('%link', 'Предыдущая запись &rarr;', true) ?></span> 
   </div>  
   </li>
 <?php endwhile; else: ?>
<?php endif; ?>	   
   
 
 
 
    
    
</ul>

<h3 style="margin:20px 0 -20px 0">Мы Вам также рекомендуем</h3>

<?php
$categories = get_the_category($post->ID);
if ($categories) {
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
 $args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'showposts'=>5, // Number of related posts that will be shown.
'caller_get_posts'=>1
);
// Rest is the same as the previous code
$my_query = new wp_query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) {
$my_query->the_post();
?>
<div class="rese">
<ul>

<li><i class="fa fa-angle-double-right" style="color:#de462a;"></i> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
</ul>
</div>
<?php
}

}
wp_reset_query();
}
?>        


<?php comments_template( '', true ) ?>


   </div>
   
   <?php get_sidebar(); ?> 
<?php get_footer(); ?>
