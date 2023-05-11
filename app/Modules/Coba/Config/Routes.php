<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('coba', ['namespace' => 'App\Modules\Coba\Controllers', 'filter' => 'web-auth'], function($subroutes){
    $subroutes->add('action/(:any)','CobaAction::$1');
    $subroutes->add('ajax/(:any)','CobaAjax::$1');
    $subroutes->add('', 'Coba::index');
	$subroutes->add('(:any)', 'Coba::$1');

});