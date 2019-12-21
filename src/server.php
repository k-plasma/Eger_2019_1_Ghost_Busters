<?php // Handles the basic server functionalities.
define('BASEPATH', __DIR__);
$config = json_decode(file_get_contents(BASEPATH.'/config.json'));

if ($config->sessioned) session_start();

$requestBody = (array)json_decode(file_get_contents('php://input'));
if (!empty($_GET) && !empty($requestBody))
$_REQUEST = array_merge($_GET, $requestBody);

if ($config->csrfRequired)
	if ($_SERVER['REQUEST_METHOD'] != 'GET' && (!isset($_POST['csrf']) || !in_array($_POST['csrf'], $_SESSION['csrf'], true)))
	{
		header($_SERVER["SERVER_PROTOCOL"] . ' 400 Bad Request');
		echo 'Bad request happened';
    	exit;
	}

// Autoloading core directory.
foreach (glob(BASEPATH.'/core/*.php') as $filename) require_once $filename;

// Namespace mapping.
spl_autoload_register(function($className) {
	$classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
	require_once BASEPATH.'/lib/'.$classPath.'.php';
	if (method_exists($className, 'init')) $className::init();
});

// Function and base class auto loading.
require_once BASEPATH.'/controllers/AController.php';
require_once BASEPATH.'/autoload.php';

// Loading language.
define('LANG', substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
$langPath = BASEPATH.'/resources/lang/'.LANG.'.json';
if (LANG != 'en' && file_exists($langPath)) define('TTARRAY', (array)json_decode(file_get_contents($langPath)));
else define('TTARRAY', []);

// Routing.
$router = new AltoRouter();
foreach (glob(BASEPATH.'/routes/*.php') as $filename) require_once $filename;
$match = $router->match();
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
	echo 'Not Found';
	exit;
}