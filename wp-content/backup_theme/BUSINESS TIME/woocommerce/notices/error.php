<?php
/**
 * Show error messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return;
?>
<ul style="background:#FEF4F1;
	border:1px solid #F7A68A;
	
	padding:10px;
	-moz-border-radius:4px;
   -webkit-border-radius:4px; text-align:center; display:block; margin-bottom:30px;">
	<?php foreach ( $messages as $message ) : ?>
		<li><?php echo wp_kses_post( $message ); ?></li>
	<?php endforeach; ?>
</ul>