<?php
declare(strict_types=1);
use Twilio\TwiML\VoiceResponse;

final class OutboundCall extends Twilio {

	public function __construct() {

		// calling the Twilio constructor
		parent::__construct();

	}

	public function make_call(string $from_number, string $to_number): VoiceResponse {

		$dial = $this->voice_response->dial('', array(
			'callerId' => $from_number
		));
		$dial->number($to_number);

		return $this->voice_response;

	}

}
