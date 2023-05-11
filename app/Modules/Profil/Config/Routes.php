<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('profil', ['namespace' => 'App\Modules\Profil\Controllers', 'filter' => 'web-auth'], function($subroutes){
    $subroutes->add('action/(:any)','ProfilAction::$1');
    $subroutes->add('ajax/(:any)','ProfilAjax::$1');
    $subroutes->add('', 'Profil::index');
	$subroutes->add('(:any)', 'Profil::$1');

});