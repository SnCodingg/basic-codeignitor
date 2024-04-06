<?php

use App\Controllers\HelpersController;
use App\Controllers\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/sample', function(){
    echo "<h1>Hello</h1>";
    return view('sample');
});

$routes->get('/uri-method/(:alpha)/(:num)','Home::urlMehod/$1/$2');
$routes->get('/query-method','Home::queryMehod');

$routes->get('/select-data', 'Home::selectData');
$routes->get('/user-model',[UserController::class,'index']);
$routes->get('/insert-user-model',[UserController::class,'insert']);
$routes->get('/update-user-model',[UserController::class,'update']);
$routes->get('/delete-user-model',[UserController::class,'delete']);
//Helpers
$routes->get('/form-helper',[HelpersController::class,'formHelper']);

$routes->get('/form-two', function(){
  return view('/helpers/form-two');
});

$routes->post('/form-save',[HelpersController::class,'submitForm']);
$routes->get('/print-message',[HelpersController::class,'listCall']);
$routes->get('/length-message',[HelpersController::class,'myLength']);
$routes->get('/list-users',[HelpersController::class,'listUsers']);

$routes->get('/pagination',[UserController::class,'paginationController']);
$routes->get('/pagination-view',[UserController::class,'paginationView']);
$routes->get('/user-session',[UserController::class,'userSession']);
$routes->match(["get","post"],"/my-file",[UserController::class,'fileUpload']);
$routes->match(["get","post"],"/my-formdata", [UserController::class,'myFormData']);
$routes->match(["get","post"],"/file-rule",[UserController::class,'otherFileValidation']);
$routes->match(["get","post"],"/my-token",[UserController::class,'myToken']);








