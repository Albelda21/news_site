<?php

use Library\Request;
use Library\Controller;
use Library\Config;
use Library\Session;
use Library\Container;
use Library\RepositoryManager;

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS . '..' . DS);
define('VIEW_DIR', ROOT . 'View' . DS);
define('LIB_DIR', ROOT . 'Library' . DS);



spl_autoload_register(function ($className) {
    $file = ROOT . str_replace('\\', DS, "{$className}.php");
    
    if (!file_exists($file)) {
        throw new \Exception("{$className} not found", 500);
    }
    
    require $file;
});

try {
	
	// echo new Library\Password('admin');
	// echo '<br>';
	// echo new Library\Password('manager');


	Session::start();

	//move conf to separate file
	Config::set('db_user', 'root');
	Config::set('db_pass', '');
	Config::set('db_name', 'news_site');
	Config::set('db_host', 'localhost');

	$dsn = 'mysql: host=' . Config::get('db_host') . '; dbname='. Config::get('db_name');
	$pdo = new \PDO($dsn, Config::get('db_user'), Config::get('db_pass'));
	$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	$repositoryManager = (new RepositoryManager())->setPDO($pdo);

	//$router = new Router(CONFIG_DIR . 'routes.php');

	$container = new Container();
	$container->set('database_connection', $pdo);
	$container->set('repository_manager', $repositoryManager);
	//$container->set('router', $router);

   // $router->match($request);
    //$route = $router->getCurrentRoute();

	$request = new Request();
	$route = $request->get('route', 'site/index');
	$route = explode('/', $route);
	$controller = 'Controller\\' . ucfirst($route[0]) . 'Controller';
	$action = $route[1] . 'Action';

	$controller = new $controller(); //BookController();
	$controller->setContainer($container);

	
	if (!method_exists($controller, $action)) {
		throw new \Exception("Page not found", 404);
	}

	$content = $controller->$action($request);
} catch (\Exception $e) {
	$content =  Controller::renderError($e->getMessage(), $e->getCode());
}


echo $content;

//require VIEW_DIR . 'layout.phtml';


// echo '<hr>';
// var_dump($controller, $action);