<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('masterdata', ['namespace' => 'App\Modules\Masterdata\Controllers', 'filter' => 'web-auth'], function($subroutes){
    $subroutes->add('action/(:any)','MasterdataAction::$1');
    $subroutes->add('ajax/(:any)','MasterdataAjax::$1');
    $subroutes->add('', 'Masterdata::index');
	$subroutes->add('(:any)', 'Masterdata::$1');

});