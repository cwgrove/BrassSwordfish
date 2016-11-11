<?php
/*
 * Plugin Name: Woo Store Discount (20%)
 * Plugin URI:
 * Description: This plugin overwrites all woocommerce prices on the cart/checkout page
 * Version: 1.0.0
 * Author: Christopher Grove
 * Author URI:
 * License: GPL v2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: https://sapphirebd.com
 */

//
//add_action( 'woocommerce_before_calculate_totals', 'sapphire_change_price' );
add_action( 'woocommerce_calculate_totals', 'sapphire_change_price', 10 );

function sapphire_change_price( $cart_object ) {
		global $woocommerce;
		$items = $woocommerce->cart->get_cart(); //Grab cart contents

	?><pre><?php print_r($items); ?></pre><?php

/*
		if ($items

			foreach($items as $item => $values) {
				if ($values['quantity'] >= 1){
					$price = get_post_meta($values['product_id'] , '_price', true); //Get price of cart items
					//Edit the percent section to whatever you would like
					$price = $price * 0.80; //Finds what 20% of the total cost is
					$price = ceil( $price );
					$values['data']->price = $price; //Set new price
				}
			}
*/
}?>
