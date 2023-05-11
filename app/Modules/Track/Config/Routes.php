<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('track', ['namespace' => 'App\Modules\Track\Controllers'], function($subroutes){
    $subroutes->add('action/(:any)','TrackAction::$1');
    $subroutes->add('ajax/(:any)','TrackAjax::$1');
    $subroutes->add('', 'Track::index');
	$subroutes->add('(:any)', 'Track::$1');

});