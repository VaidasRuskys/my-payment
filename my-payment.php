<?php
/**
 * Plugin Name: My Payment
 * Plugin URI: http://www.mywebsite.com/my-first-plugin
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: Vaidas Ruskys
 * Author URI: http://www.mywebsite.com
 */

 add_action( 'the_content', 'my_payment_content' );

 function my_payment_content ( $content ) {
     return $content .= get_option('my_payment_key');
 }

add_action( 'admin_menu', 'my_payment_admin_menu' );  

function my_payment_admin_menu(){    
	$page_title = 'My payment';   
	$menu_title = 'My payment';   
	$capability = 'manage_options';   
	$menu_slug  = 'my-payment-info';   
	$function   = 'my_payment_admin_settings_page';
	$icon_url   = 'dashicons-cart';   
	$position   = 50;    
	
	add_menu_page( 
		$page_title,
		$menu_title,
		$capability,
		$menu_slug,
		$function,
		$icon_url,
		$position 
	); 
}

function my_payment_admin_settings_page() {

	if (!empty($_POST['my_payment_key'])) {
		delete_option('my_payment_key');
		add_option('my_payment_key', sanitize_text_field($_POST['my_payment_key']));
	}

	include('admin/views/settings.php');
}

add_action( 'plugins_loaded', 'my_payment_gateway_init', 11 );
function my_payment_gateway_init() {
	include('gateway/class-wc-gateway-mypayment.php');
}

function my_payment_add_to_gateways( $gateways ) {
	$gateways[] = 'WC_Gateway_MYPAYMENT';
	return $gateways;
}
add_filter( 'woocommerce_payment_gateways', 'my_payment_add_to_gateways' );