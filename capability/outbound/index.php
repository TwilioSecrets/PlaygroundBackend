<?php
declare(strict_types=1);
use BaseApi\{Api, ApiException};
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;

try {
	$api = new Api('POST');
	$api->validate_request(array('account_sid', 'api_key', 'api_secret', 'app_sid'));
	$input = $api->get_input_data();
} catch (ApiException $ex) {
	\header($_SERVER['SERVER_PROTOCOL'].' 400 Bad Request');
	echo Api::output(false, $ex->getMessage());
	exit;
}