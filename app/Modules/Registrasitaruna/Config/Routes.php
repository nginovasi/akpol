<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('registrasitaruna', ['namespace' => 'App\Modules\Registrasitaruna\Controllers', 'filter' => 'web-auth'], function($subroutes){
    $subroutes->add('action/(:any)','RegistrasitarunaAction::$1');
    $subroutes->add('ajax/(:any)','RegistrasitarunaAjax::$1');
    $subroutes->add('', 'Registrasitaruna::index');
	$subroutes->add('(:any)', 'Registrasitaruna::$1');

});