<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('penilaian', ['namespace' => 'App\Modules\Penilaian\Controllers', 'filter' => 'web-auth'], function($subroutes){
    $subroutes->add('action/(:any)','PenilaianAction::$1');
    $subroutes->add('ajax/(:any)','PenilaianAjax::$1');
    $subroutes->add('', 'Penilaian::index');
	$subroutes->add('(:any)', 'Penilaian::$1');

});