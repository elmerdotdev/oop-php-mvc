<?php
// Start Session
session_start();

// Include Config
require('config.php');

require('classes/messages.php');
require('classes/bootstrap.php');
require('classes/controller.php');
require('classes/model.php');

require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');

$bootstrap = new Bootstrap($_GET); // Get all url parameters
$controller = $bootstrap->createController();

if($controller){
	$controller->executeAction();
}

?>