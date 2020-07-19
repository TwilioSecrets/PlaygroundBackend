<?php
declare(strict_types=1);
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;

final class TwilioCapability {

	private $TokenObj;
	private $VoiceObj;

	public function __construct(string $account_sid, string $api_key, string $api_secret, int $timeout = 3600) {

		$this->TokenObj = new AccessToken(
			$account_sid,
			$api_key,
			$api_secret,
			$timeout,
			$_SERVER['REMOTE_ADDR']
		);

		$this->VoiceObj = new VoiceGrant();

	}

	public function outgoing_capability(string $app_sid): string {

		$this->VoiceObj->setOutgoingApplicationSid($app_sid);

		$this->TokenObj->addGrant($this->VoiceObj);

		return $this->TokenObj->toJWT();

	}

}
