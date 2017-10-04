<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
?>
<li itemprop="reviews" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

	<div id="comment-<?php comment_ID(); ?>" class="comment_container">

		<?php echo get_avatar($comment,$size='35'); ?>
        
        
        
        

		<div class="comment-texter" style=" margin-left:60px; border:1px solid #eaeaea; margin-bottom:7px;margin-top:7px; padding:7px;-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px; ">

			<?php if ( $rating && get_option( 'woocommerce_enable_review_rating' ) == 'yes' ) : ?>

				<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf( __( 'Rated %d out of 5', 'woocommerce' ), $rating ) ?>" style="color:#de462a; font-size:12px;">
					<span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"><strong itemprop="ratingValue"><?php echo $rating; ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?></span>
                    
                    
                    
                    
                    
				</div>

			

			
            
            
            
            
            
            
            
            

				 <div class="comment-meta commentmetadata" style="margin-bottom:-5px">
                 <span style="font-weight:bold; font-size:16px;"><?php printf(__('%s'), get_comment_author_link()) ?> </span>
		 <?php if($isByAuthor) { ?><span class="author-tag"><?php _e('(Автор)') ?></span><?php } ?> 
                 
	  	<?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
		<?php edit_comment_link(__('(Редактировать)'),'  ','') ?> &middot; 
		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
      
      <?php if ($comment->comment_approved == '0') : ?>
<em class="moderation"><?php _e('Ваш комментарий отправлен на проверку.') ?></em>
<br />
<?php endif; ?>
<span style="font-size:14px; "><?php comment_text() ?></span>

      

			<?php endif; ?>

			

		</div>
	</div>
