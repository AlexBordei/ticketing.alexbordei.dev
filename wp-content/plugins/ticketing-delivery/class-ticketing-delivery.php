<?php
/**
 * Plugin Name:       Ticketing Delivery
 * Description:       Handling ticketing delivery to SMS or Email trough SendGrid
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Alex Bordei
 * Author URI:        https://alexbordei.dev
 */

if ( ! class_exists( 'Ticketing_Delivery' ) ) {

	define( 'SENDGRID_API_KEY', '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' );
	define( 'SENDGRID_EMAIL_FROM', 'email@ticketing.alexbordei.dev' );
	define( 'SENDGRID_EMAIL_FROM_NAME', 'Alex Bordei Dev Ticketing' );

	class Ticketing_Delivery {
		public function __construct() {
			require_once plugin_dir_path( __FILE__ ) . 'controllers/class-ticketing-delivery-includes.php';
		}
	}

	new Ticketing_Delivery();
}
