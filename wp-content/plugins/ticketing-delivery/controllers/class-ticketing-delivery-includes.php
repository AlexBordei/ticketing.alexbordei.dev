<?php
if ( ! class_exists( 'Ticketing_Delivery_Includes' ) ) {
	class Ticketing_Delivery_Includes {
		public function __construct() {
			// Composer
			require_once plugin_dir_path( __FILE__ ) . '../vendor/autoload.php';

			// Controllers
			require_once plugin_dir_path( __FILE__ ) . 'class-ticketing-delivery-sender.php';
			require_once plugin_dir_path( __FILE__ ) . 'class-ticketing-delivery-post.php';
			require_once plugin_dir_path( __FILE__ ) . 'class-ticketing-delivery-api.php';
		}
	}

	new Ticketing_Delivery_Includes();
}
