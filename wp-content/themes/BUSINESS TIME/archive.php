<?php get_header(); ?>
 <div class="units-row" style="padding: 50px 25px 0 25px;">
    <div class="unit-65" >
   <ul class="blocks preds" style="margin:0; padding:0; list-style:none;">
   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <li>  <h2><?php the_title(); ?></h2><span class="imreskat"> <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&h=350&w=470&zc=1" alt="" title="<?php the_title(); ?>" border="0" /></span> <p class="imresp"><?php 
$content = get_the_content();
$content = strip_tags($content);
echo mb_substr($content, 0, 670). '...';
?><?php  remove_header_admin ();?><a href="<?php the_permalink(); ?>" class="morekat"> Читать далее <i class="fa fa-arrow-circle-o-right"></i></a></p> 
   
  <table width="100%" border="0" style="font-size:14px; margin-top:10px; color: #666; text-align:center">
  <tr>
    <td>Раздел: <?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></td>
    <td>Просмотров: <?php echo get_post_meta ($post->ID,'views',true); ?></td>
    <td>Комментрариев: <?php comments_number( '0', '1', '%' ); ?></td>
    <td>Дата: <?php the_time('j F, Y'); ?> в <?php the_time('G:i'); ?></td>
   
  </tr>
</table>
 
   
   </li>
 <?php endwhile; else: ?>
<?php endif; ?>	   
   
 
 
 
 <span id="nextt"><?php next_posts_link('&larr; Следующая страница') ?></span>
<span id="nextt"><?php previous_posts_link('Предыдущая страница &rarr;') ?>
</span> 
   
    
    
</ul>
   </div>
   
   <?php get_sidebar(); ?> 
<?php get_footer(); ?>
