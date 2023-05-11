<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('akademik', ['namespace' => 'App\Modules\Akademik\Controllers', 'filter' => 'web-auth'], function($subroutes){
    $subroutes->add('action/(:any)','AkademikAction::$1');
    $subroutes->add('ajax/(:any)','AkademikAjax::$1');
    $subroutes->add('', 'Akademik::index');
	$subroutes->add('(:any)', 'Akademik::$1');

});