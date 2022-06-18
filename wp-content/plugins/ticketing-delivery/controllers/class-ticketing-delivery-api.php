<?php
if ( ! class_exists( 'Ticketing_Delivery_API' ) ) {
	class Ticketing_Delivery_API {
		public function __construct() {
			register_rest_field(
				'ticket',
				'email_sent',
				array(
					'get_callback' => function ( $data ) {
						return (bool) get_post_meta( $data['id'], 'email_sent', true );
					},
				)
			);
		}
	}

	new Ticketing_Delivery_API();
}
