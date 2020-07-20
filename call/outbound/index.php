<?php
declare(strict_types=1);
use BaseApi\{Api, ApiException};

require_once 'model/twilio/call/outbound/OutboundCall.php';

if (empty($_POST['to']) || empty($_POST['from'])) {
	\header($_SERVER['SERVER_PROTOCOL'].' 401 Not Authorized');
	echo Api::output(false, 'Please provide to and from values');
	exit;
}

try {
	$call = new OutboundCall();
} catch (Exception $ex) {
	\header($_SERVER['SERVER_PROTOCOL'].' 401 Not Authorized');
	echo Api::output(false, $ex->getMessage());
	exit;
}

echo $call->make_call($_POST['from'], $_POST['to']);
