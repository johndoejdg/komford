<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<div class="images">

	<?php
		if ( has_post_thumbnail() ) {

			$image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
			$image       = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title' => $image_title
				) );

			$attachment_count = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_title, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

		}
	?>

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>
    
    
    
   
   
   
   
   
   <ul style="margin:10px 0 5px 0 !important; font-size:14px;">
       
       <li style="padding:0; margin:0;">Рейтинг:<span style="color:#de462a;"><?php if ( $rating_html = $product->get_rating_html() ) : ?>
	<?php echo $rating_html; ?>
<?php endif; ?> </span> </li> 

 <li style="padding:0; margin:0">Дата: <?php the_time('j F, Y'); ?> в <?php the_time('G:i'); ?></li> 
 <li style="padding:0; margin:0">Просмотров товара: <?php echo get_post_meta ($post->ID,'views',true); ?></li> 


        
       
   
   
   
   
   
   
   
   <?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

 <li style="padding:0; margin:0">

		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span>.</span>

</li> 


	<?php endif; ?>
    
    
<li style="padding:0; margin:0">
	<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '.</span>' ); ?>
  </li> 
  
    
<li style="padding:0; margin:0">
	<?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '.</span>' ); ?>
</li>
	<?php do_action( 'woocommerce_product_meta_end' ); ?>
   
  <li style="padding:0; margin:0"><?php
	// Availability
	$availability      = $product->get_availability();
	$availability_html = empty( $availability['availability'] ) ? '' : ' <li style="padding:0; margin:0">Наличие товара: ' . esc_html( $availability['availability'] ) . '</li>';
	
	echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
?>
 
   

</div>
