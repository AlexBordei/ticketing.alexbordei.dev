<?php
if ( ! class_exists( 'Ticketing_Delivery_Sender' ) ) {

	/**
	 * Class Ticketing_Delivery_Sender
	 */
	class Ticketing_Delivery_Sender {
		/**
		 * @param array $to
		 * @param array $from
		 * @param string $subject
		 * @param string $content
		 *
		 * @return bool
		 * @throws \SendGrid\Mail\TypeException
		 */
		public static function send_email( $to, $from, $subject, $content ) {
			$email = new \SendGrid\Mail\Mail();
			$email->setFrom( $from['email'], $from['name'] );
			$email->setSubject( $subject );
			$email->addTo( $to['email'], $to['name'] );
			$email->addContent( 'text/plain', $content );
			$sendgrid = new \SendGrid( SENDGRID_API_KEY );

			try {
				$sendgrid->send( $email );
				return true;
			} catch ( Exception $e ) {
				return false;
			}
		}
	}

	new Ticketing_Delivery_Sender();
}
