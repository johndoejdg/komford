<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( $order ) : ?>

	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<p style="background:#d1e4c1;
	border:1px solid #C2E1AA;
	
	-moz-border-radius:4px;
   -webkit-border-radius:4px; text-align:center; display:block; margin-bottom:30px; padding:10px "> <?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>

		<p><?php
			if ( is_user_logged_in() )
				_e( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
			else
				_e( 'Please attempt your purchase again.', 'woocommerce' );
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>

		<p style="background:#d1e4c1;
	border:1px solid #C2E1AA;
	
	-moz-border-radius:4px;
   -webkit-border-radius:4px; text-align:center; display:block; margin-bottom:30px; padding:10px "><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>



<table class="table-bordered">
    <tr>
        <td><?php _e( 'Order:', 'woocommerce' ); ?></td>
         <td><?php _e( 'Date:', 'woocommerce' ); ?></td>
         <td><?php _e( 'Total:', 'woocommerce' ); ?></td>
         <td><?php _e( 'Payment method:', 'woocommerce' ); ?></td>
    </tr>
    
    
    <tr>
        <td><?php echo $order->get_order_number(); ?></td>
         <td><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></td>
         <td><?php echo $order->get_formatted_order_total(); ?></td>
         <td>
		 <?php if ( $order->payment_method_title ) : ?>
		 <?php echo $order->payment_method_title; ?>
         <?php endif; ?>
         
         </td>
    </tr>
    
</table>




		

	<?php endif; ?>

	<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
	<?php do_action( 'woocommerce_thankyou', $order->id ); ?>

<?php else : ?>

	<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

<?php endif; ?>