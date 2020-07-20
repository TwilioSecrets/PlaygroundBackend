<?php
declare(strict_types=1);
use BaseApi\{Api, ApiException};
use ShinePHP\Http\{IncomingRequest, IncomingRequestException};

\header('Access-Control-Allow-Origin: http://localhost:4500');
\header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
\header('Access-Control-Allow-Headers: Content-Type');
\header('Allow: application/json');
\header('Content-Type: application/json');

// F you cors
if (IncomingRequest::validate_request_method('OPTIONS')) {
	\header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
	exit;
}

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
	'token' => $capability->outgoing_capability($input['app_sid'])
));
