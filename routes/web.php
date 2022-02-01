<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
Route::resources([
    '/' => [WelcomeController::class, 'index'],
    '/new' => [WelcomeController::class, 'new'],
    '/search' => [WelcomeController::class, 'search'],
    '/list' => [WelcomeController::class, 'list'],
    '/list/search' => [WelcomeController::class, 'list_search'],

    '/list/view/{id}' => [WelcomeController::class, 'auto_red_form'],
    '/list/view/{id}/update' => [WelcomeController::class, 'auto_rauto_updateed_form'],
    
    
    '/brand-all' => [ControllersBrandAuto::class, 'index'],
    '/brand_export' => [ControllersBrandAuto::class, 'brand_export'],
    '/brand-search' => [ControllersBrandAuto::class, 'brand_search'],
    '/brand-ajax-search' => [ControllersBrandAuto::class, 'brand_ajax_search'],
]);
/* */