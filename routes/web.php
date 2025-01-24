<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/creativeIndustries', 'CreativeIndustryController@index');
$router->post('/creativeIndustries', 'CreativeIndustryController@store');
$router->get('/creativeIndustries/{creativeIndustry}', 'CreativeIndustryController@show');
$router->put('/creativeIndustries/{creativeIndustry}', 'CreativeIndustryController@update');
$router->patch('/creativeIndustries/{creativeIndustry}', 'CreativeIndustryController@update');
$router->delete('/creativeIndustries/{creativeIndustry}', 'CreativeIndustryController@destroy');

