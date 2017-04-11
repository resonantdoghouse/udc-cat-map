<?php
require '../app/db.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

// use Tracy\Debugger;
// Debugger::enable();

$app = new \Slim\App;

// Get Page Name
$_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $_SERVER['REQUEST_URI_PATH']);
// echo '<strong>' . $segments[1] . '</strong><br>';

if(isset($segments[2])){
	$page_name = $segments[2];

	if($page_name == 'cats' || $page_name == 'cat'){
		require_once('../app/api/cat.php');
	} else {
		die('Please use API endpoints');
	}
}


$app->run();
