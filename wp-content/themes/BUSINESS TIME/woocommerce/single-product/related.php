<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	

		<h3 style="margin:30px 0 -10px 0">Рекомендуем похожие товары </h3>

		<?php woocommerce_product_loop_start(); ?>



<div class="content_5 content">


			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
  




<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
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






	
    
  

		<span style="display:block;  margin:0 0 20px 0; border:1px solid #eaeaea; width:250px; float:left; margin:0 10px 0 10px; padding:7px;">
        
        <h2 style="font-size:18px;  margin:0 0 -15px 0;"><?php the_title(); ?></h2>
        
        
        <?php if ( $price_html = $product->get_price_html() ) : ?>
	<span class="price" style="background-color:rgba(255,255,255,.83); padding:5px; position:absolute; margin:4px 0 0 4px;font-size:22px;color:#de462a;"><?php echo $price_html; ?></span>
<?php endif; ?>
         <a href="<?php the_permalink(); ?>">
         <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&h=350&w=470&zc=1" alt="" title="<?php the_title(); ?>" border="0" style="border:1px solid #eaeaea; padding:3px;" /></a>
        
   
        
       <span style="margin:10px 0 5px 0 !important; font-size:14px;">
       
<a href="#"><?php if ( $rating_html = $product->get_rating_html() ) : ?>
	<?php echo $rating_html; ?></a>
<?php endif; ?> <?php the_time('j F, Y'); ?> в <?php the_time('G:i'); ?>
</span>
     
        </span>

		
       




       
    
 
 
 
 
 
 
 
		
     






          
                
                
                
                
                
                
                
                
                
                
                

			<?php endwhile; // end of the loop. ?>
             
             </div> 

		<?php woocommerce_product_loop_end(); ?>

	

<?php endif;

wp_reset_postdata();