<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once './vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = "ACac9c1a11304d00411488172995de4c4c";
$token = "fe04cb4c2483a7f0764248904ef71162";
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("whatsapp:+254743652519", // to
                           [
                               "from" => "whatsapp:+14155238886",
                               "body" => "KLAUSTOONS :
Thank you for subscribing to the front row seats of our universe creation. Your OTP code is 1238.
                               
Finish up on registration and sit back for the magic to happen."
                           ]
                  );

print($message->sid);