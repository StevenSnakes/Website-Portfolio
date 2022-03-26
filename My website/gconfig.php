<?php
  session_start();
//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('73399884433-cn10tb32c26dl92dfraeq8ng5f6vbs3v.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://sandbox.mbcoltd.co.uk/bs/loggedin.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
?>
