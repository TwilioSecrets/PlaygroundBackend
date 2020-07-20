<?php
declare(strict_types=1);
use BaseApi\{Router, RouterException};
require_once 'vendor/autoload.php';
require_once 'model/twilio/Twilio.php';
require_once 'model/twilio/capability/TwilioCapability.php';

$Router = new Router(\parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$Router->route();
