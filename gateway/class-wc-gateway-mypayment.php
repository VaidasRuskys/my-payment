<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class WC_Gateway_MYPAYMENT extends WC_Payment_Gateway {

	/**
	 * Constructor for the gateway.
	 */
	public function __construct() {

		$this->id                 = 'mypayment';
		$this->icon               = apply_filters( 'woocommerce_bacs_icon', '' );
		$this->has_fields         = false;
		$this->method_title       = __( 'My-Payment', 'woocommerce' );
		$this->method_description = __( 'My custom payment', 'woocommerce' );

		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();

	}

	/**
	 * Initialize Gateway Settings Form Fields
	 */
	public function init_form_fields() {

		$this->form_fields = array(

			'enabled' => array(
				'title'   => __( 'Enable/Disable', 'my-payment' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable Offline Payment', 'my-payment' ),
				'default' => 'yes'
			),

			'title' => array(
				'title'       => __( 'Title', 'my-payment' ),
				'type'        => 'text',
				'description' => __( 'This controls the title for the payment method the customer sees during checkout.', 'my-payment' ),
				'default'     => __( 'Offline Payment', 'my-payment' ),
				'desc_tip'    => true,
			),

			'description' => array(
				'title'       => __( 'Description', 'my-payment' ),
				'type'        => 'textarea',
				'description' => __( 'Payment method description that the customer will see on your checkout.', 'my-payment' ),
				'default'     => __( 'Please remit payment to Store Name upon pickup or delivery.', 'my-payment' ),
				'desc_tip'    => true,
			),

			'instructions' => array(
				'title'       => __( 'Instructions', 'my-payment' ),
				'type'        => 'textarea',
				'description' => __( 'Instructions that will be added to the thank you page and emails.', 'my-payment' ),
				'default'     => '',
				'desc_tip'    => true,
			),
		);
	}
}