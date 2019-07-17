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
