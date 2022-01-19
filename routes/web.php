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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('authAdmin')->group(function () {
    Route::view('/dashboard', 'admin.index')->name('admin');
    //-- Ilots --//
    Route::resource('ilots', Models\IlotController::class);
    //-- Machines --//
    Route::resource('machines', Models\MachineController::class);
    //-- Employes --//
    Route::resource('employes', Models\UserController::class)->parameters([
        'employes' => 'user'
    ]);
    //-- profile --//
    Route::view('/profile', 'admin.profile');
    Route::post('/profile', 'HomeController@profileP');
    //-- settings --//
    Route::view('/settings', 'admin.settings');
    Route::post('/settings', 'AdminController@editSettingsP');
});

Route::prefix('gerant')->middleware('authGerant')->group(function () {
    Route::view('/dashboard', 'gerant.index')->name('gerant');
    //-- OrderFabrication --//
    Route::resource('orderFabrications', Models\OrderFabricationController::class)->only([
        'index', 'show', 'edit' , 'update'
    ]);
    //-- Plan de production --//
    Route::resource('planProduction', Models\ProdPlanningController::class)->parameters([
        'planProduction' => 'prodPlanning'
    ]);
    //-- Qte Par Taille --//
    Route::resource('quantity', Models\QteParTailleController::class)->parameters([
        'quantity' => 'QteParTaille'
    ]);
    //-- Articles --//
    Route::resource('articles', Models\ArticleController::class);
    //-- Factures --//
    Route::resource('factures', Models\FactureController::class);
    //-- Bordereaux --//
    Route::view('/bordereaux', 'gerant.bordereaux');
    Route::post('/bordereaux', 'gerantController@bordereauxP');
    //-- Clients --//
    Route::resource('clients', Models\UserController::class)->parameters([
        'clients' => 'user'
    ])->except([
        'create', 'store'
    ]);
    //-- profile --//
    Route::view('/profile', 'gerant.profile');
    Route::post('/profile', 'HomeController@profileP');
});

Route::prefix('client')->middleware('authClient')->group(function () {
    Route::view('/dashboard', 'client.index')->name('client');
    //-- OrderFabrication --//
    Route::resource('orderFabrications', Models\OrderFabricationController::class);
    //-- Qte Par Taille --//
    Route::resource('quantity', Models\QteParTailleController::class)->parameters([
        'quantity' => 'QteParTaille'
    ]);
    //-- profile --//
    Route::view('/profile', 'client.profile');
    Route::post('/profile', 'HomeController@profileP');
});

Route::prefix('clientprivilege')->middleware('authClientPrivilege')->group(function () {
    Route::view('/dashboard', 'clientprivilege.index')->name('clientprivilege');
    //-- OrderFabrication --//
    Route::resource('orderFabrications', Models\OrderFabricationController::class);
    //-- Qte Par Taille --//
    Route::resource('quantity', Models\QteParTailleController::class)->parameters([
        'quantity' => 'QteParTaille'
    ]);
    //-- profile --//
    Route::view('/profile', 'clientprivilege.profile');
    Route::post('/profile', 'HomeController@profileP');
});

Route::prefix('secretaire')->middleware('authSecretaire')->group(function () {
    Route::view('/dashboard', 'secretaire.index')->name('secretaire');
    //-- Production journaliére --//
    Route::resource('orderFabrications', Models\OrderFabricationController::class)->only([
        'index'
    ]);
    //-- Production journaliére --//
    Route::resource('quantity', Models\QteParTailleController::class)->parameters([
        'quantity' => 'QteParTaille'
    ]);
    //-- Bordereaux --//
    Route::view('/bordereaux', 'secretaire.bordereaux');
    Route::post('/bordereaux', 'secretaireController@bordereauxP');
    //-- Employes --//
    Route::resource('employes', Models\UserController::class)->parameters([
        'employes' => 'user'
    ]);
    //-- profile --//
    Route::view('/profile', 'secretaire.profile');
    Route::post('/profile', 'HomeController@profileP');
});