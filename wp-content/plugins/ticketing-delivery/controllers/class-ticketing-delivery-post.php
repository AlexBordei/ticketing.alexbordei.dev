<?php
if ( ! class_exists( 'Ticketing_Delivery_Post' ) ) {
	class Ticketing_Delivery_Post {
		public function __construct() {
			add_action( 'rest_after_insert_ticket', array( $this, 'save_post_send_message' ), 10, 3 );
		}

		public function save_post_send_message( $post, $request, $creating ) {
			if ( 'publish' === $post->post_status ) {
				$name    = get_post_meta( $post->ID, 'name', true );
				$status  = get_post_meta( $post->ID, 'status', true );
				$email   = get_post_meta( $post->ID, 'email', true );
				$content = get_the_content( null, false, $post->ID );
				$subject = get_the_title( $post->ID );

				$sent_status = Ticketing_Delivery_Sender::send_email(
					array(
						'email' => $email,
						'name'  => $name,
					),
					array(
						'email' => SENDGRID_EMAIL_FROM,
						'name'  => SENDGRID_EMAIL_FROM_NAME,
					),
					$subject,
					$content
				);

				update_post_meta( $post->ID, 'email_sent', $sent_status, '' );
			}

		}
	}

	new Ticketing_Delivery_Post();
}
