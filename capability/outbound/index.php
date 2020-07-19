<?php
declare(strict_types=1);
use BaseApi\{Api, ApiException};

try {
	$api = new Api('POST');
	$api->validate_request(array('account_sid', 'api_key', 'api_secret', 'app_sid'));
	$input = $api->get_input_data();
} catch (ApiException $ex) {
	\header($_SERVER['SERVER_PROTOCOL'].' 400 Bad Request');
	echo Api::output(false, $ex->getMessage());
	exit;
}

try {
	$timeout = (isset($input['timeout']) ? $input['timeout'] : 3600);
	$capability = new TwilioCapability($input['account_sid'], $input['api_key'], $input['api_secret'], $timeout);
} catch (Exception $ex) {
	\header($_SERVER['SERVER_PROTOCOL'].' 401 Not Authorized');
	echo Api::output(false, $ex->getMessage());
	exit;
}

echo Api::output(true, 'Returned Token', array(
	'key' => $capability->outgoing_capability($input['app_sid'])
));
