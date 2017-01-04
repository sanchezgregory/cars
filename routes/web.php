<?php

/*
|--------------------------------------------------------------------------
| Web routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Cars\Models\User;

Route::get('/', function () {
    return view('bootstrap');
});

Route::get('users/{id}', function ($id) {
    return User::findOrFail($id);
});

Route::get('bootstrap', function () {
    return view('bootstrap');
});

include __DIR__.'/dropdowns.php';
include __DIR__.'/features.php';
include __DIR__.'/autocomplete.php';