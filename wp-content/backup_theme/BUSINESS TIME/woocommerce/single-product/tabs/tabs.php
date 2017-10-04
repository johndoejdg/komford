<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>














<div class="woocommerce-tabs">

 <div id="horizontalTab">
	
		 <ul class="resp-tabs-list">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<li>
					<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?>
				</li>

			<?php endforeach; ?>
		</ul>
		<?php foreach ( $tabs as $key => $tab ) : ?>

			  <div class="resp-tabs-container">
               <div>
				<?php call_user_func( $tab['callback'], $key, $tab ) ?>
                
                </div> 
			</div>

		<?php endforeach; ?>
	
    
     </div>
    
    
    
    
    
    
    
    
    

    
    
   
    
     </div> 
    
    
    

<?php endif; ?>