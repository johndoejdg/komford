<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 1 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>



<ul class="blocks" >





<li style="border:1px solid #eaeaea; padding:7px; overflow:hidden;">

	

	<h2><?php the_title(); ?></h2>
    
  

		<span class="produ" style="display:block; width:38%; float:left; margin:0 20px 20px 0;">
        
        <?php if ( $price_html = $product->get_price_html() ) : ?>
	<span class="price" style="background-color:rgba(255,255,255,.83); padding:5px; position:absolute; margin:4px 0 0 4px;font-size:22px;color:#de462a;"><?php echo $price_html; ?></span>
<?php endif; ?>
        
         <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&h=350&w=470&zc=1" alt="" title="<?php the_title(); ?>" border="0" style="border:1px solid #eaeaea; padding:3px;" />
        
   
        
       <ul style="margin:10px 0 5px 0 !important; font-size:14px;">
       
       <li style="padding:0; margin:0">Рейтинг:<span style="color:#de462a"><?php if ( $rating_html = $product->get_rating_html() ) : ?>
	<?php echo $rating_html; ?>
<?php endif; ?></span>  </li> 

 <li style="padding:0; margin:0">Дата: <?php the_time('j F, Y'); ?> в <?php the_time('G:i'); ?></li> 
 <li style="padding:0; margin:0">Просмотров товара: <?php echo get_post_meta ($post->ID,'views',true); ?></li> 


        
        </ul>
 
 
 
 
 
 
 
 <a href="<?php the_permalink(); ?>" class="btn"> Полное описание &rarr;</a>     
        </span>

		
       <?php 
$content = get_the_content();
$content = strip_tags($content);
echo mb_substr($content, 0, 470). '';
?>  





</li>

</ul>

