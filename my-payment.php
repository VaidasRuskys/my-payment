<?php
/**
 * Plugin Name: My Payment
 * Plugin URI: http://www.mywebsite.com/my-first-plugin
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: Vaidas Ruskys
 * Author URI: http://www.mywebsite.com
 */

 add_action( 'the_content', 'my_thank_you_text' );

 function my_thank_you_text ( $content ) {
     return $content .= '<p>my_thank_you_text</p>';
 }

add_action( 'admin_menu', 'my_payment_admin_menu' );  

function my_payment_admin_menu(){    
	$page_title = 'My payment';   
	$menu_title = 'My payment';   
	$capability = 'manage_options';   
	$menu_slug  = 'my-payment-info';   
	$function   = 'dashicons-cart';   
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
