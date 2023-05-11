<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('files', ['namespace' => 'App\Modules\Files\Controllers', 'filter' => 'web-auth'], function($subroutes){
    $subroutes->add('action/(:any)','FilesAction::$1');
    $subroutes->add('ajax/(:any)','FilesAjax::$1');
    $subroutes->add('', 'Files::index');
	$subroutes->add('(:any)', 'Files::$1');

});