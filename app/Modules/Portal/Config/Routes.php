<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('portal', ['namespace' => 'App\Modules\Portal\Controllers'], function($subroutes){
	
    $subroutes->add('action/(:any)','PortalAction::$1');
    $subroutes->add('ajax/(:any)','PortalAjax::$1');
    $subroutes->add('', 'Portal::index');
	$subroutes->add('(:any)', 'Portal::$1');
});