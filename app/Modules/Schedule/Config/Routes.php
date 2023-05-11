<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('schedule', ['namespace' => 'App\Modules\Schedule\Controllers', 'filter' => 'web-auth'], function($subroutes){
    $subroutes->add('action/(:any)','ScheduleAction::$1');
    $subroutes->add('ajax/(:any)','ScheduleAjax::$1');
    $subroutes->add('', 'Schedule::index');
	$subroutes->add('(:any)', 'Schedule::$1');

});