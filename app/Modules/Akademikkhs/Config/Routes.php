<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('akademikkhs', ['namespace' => 'App\Modules\Akademikkhs\Controllers', 'filter' => 'web-auth'], function($subroutes){
    $subroutes->add('action/(:any)','AkademikkhsAction::$1');
    $subroutes->add('ajax/(:any)','AkademikkhsAjax::$1');
    $subroutes->add('', 'Akademikkhs::index');
	$subroutes->add('(:any)', 'Akademikkhs::$1');

});