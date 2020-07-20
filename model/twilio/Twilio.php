<?php
declare(strict_types=1);
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;
use Twilio\Exceptions\RestException;
use Twilio\Security\RequestValidator;
use Twilio\TwiML\VoiceResponse;

class Twilio {

	protected $voice_response;

	public function __construct() {

		$this->voice_response = new VoiceResponse();

	}

}

final class TwilioException extends \Exception {}