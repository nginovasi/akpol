<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('publik', ['namespace' => 'App\Modules\Publik\Controllers', 'filter' => 'public-auth'], function($subroutes){
    $subroutes->add('action/(:any)','PublikAction::$1');
    $subroutes->add('ajax/(:any)','PublikAjax::$1');
    $subroutes->add('', 'Publik::index');
	$subroutes->add('(:any)', 'Publik::$1');
});