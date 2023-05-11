<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('panicbutton', ['namespace' => 'App\Modules\Panicbutton\Controllers', 'filter' => 'web-auth'], function($subroutes){
    $subroutes->add('action/(:any)','PanicbuttonAction::$1');
    $subroutes->add('ajax/(:any)','PanicbuttonAjax::$1');
    $subroutes->add('', 'Panicbutton::index');
	$subroutes->add('(:any)', 'Panicbutton::$1');

});