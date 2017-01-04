<?php

use Cars\Models\User;
use Illuminate\Support\Facades\Request;

Route::get('autocomplete/demo', function () {
    return view('components/autocomplete_demo');
})->name('autocomplete');

Route::post('autocomplete/demo', function () {
    return Request::all();
});

Route::get('autocomplete/users', function () {
    $term = Request::get('term');
    return User::findByNameOrEmail($term);
});