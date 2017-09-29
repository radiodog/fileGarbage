<?php
require __DIR__.'/../vendor/autoload.php';


$app = new \Slim\App([
	'settings' => ['displayErrorsDetails' => true,
					'db' => [
						'driver' => 'pgsql',
						'host' => 'localhost',
						'database' => 'mydb',
						'user' => 'user',
						'password' => 'user',
						'charset' => 'utf8',
						'collation' => '',
						'prefix' => '',
						'port' => '5432'
					]
	]
]);

$container = $app->getContainer();

$container['view'] = function($container){
	$view = new \Slim\Views\Twig(__DIR__.'/../resources/views', ['cache' => false]);

	$view->addExtension( new \Slim\Views\TwigExtension(
		$container->router,
		$container->request->getUri()
	));
	return $view;
};
$container['App'] = $app;
$container['upload_directory'] = 'C:\work\web\fileGarbage\upload\\';

$container['HomeController'] = function($container){
	return new App\Controllers\HomeController($container);
};

$container['UserDataTable'] = function($container){
	return new App\Classes\UserDataTable($container);
};

$container['dbn'] = function($container){
	return $container['UserDataTable']->addConnection(); 
};

$container['UserDataTable']->returnResultData($container['UserDataTable']->getAll());

//var_dump($container['resultData']->getName()); 